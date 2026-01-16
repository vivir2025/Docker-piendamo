<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAgenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MProceso");
        $this->load->model("MSede");
        $this->load->model("MUsuario");
        $this->load->model("MAgenda");
        $this->load->model("MCita");
        $this->load->model("MFactura");
        $this->load->model("MBrigada");

// Permit Verification - Restrict access for general users
        if ($this->session->userdata('rol_user') == 2) { 
            echo "<p><b>ACCESO DENEGADO.</b> Señor usuario, se encuentra intentando acceder"
                . " a un sitio al cual no tiene permiso de acceso.</p>";
            exit;
        }
    }
 // Load the agenda view with necessary data
    public function index()
    {

        $data['title'] = 'IPS NUEVA | CRONOGRAMA AGENDA';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["proceso"] = $this->MProceso->ver();
        $datos["sede"] = $this->MSede->ver();
        $datos["brigada"] = $this->MBrigada->ver();
        $usuario = $this->MUsuario->ver_medico();

        $datos['usuario'] = $usuario;

        $this->load->view("CAgenda/VAgendar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

// Add minutes to a given time
    public function addMinutes($horaInicial, $minutoAnadir)
    {

        $segundos_horaInicial = strtotime($horaInicial);
        $segundos_minutoAnadir = $minutoAnadir * 60;
        //echo($segundos_minutoAnadir);
        $nuevaHora = date("H:i", $segundos_horaInicial + $segundos_minutoAnadir);

        return $nuevaHora;
    }
 // Display the schedule for a specific user, date, and process
    public function mostrarAgenda(){
    $idUsuario = $this->input->post('usuario');
    $ageFecha = $this->input->post('fecha');
    $idProceso = $this->input->post('proceso');

    $data = $this->MAgenda->getAgenda($idUsuario, $ageFecha, $idProceso);

    if (sizeof($data) > 0) {
        $ageHoraInicio = $data[0]->ageHoraInicio;
        $ageHoraInicio = $this->addMinutes($ageHoraInicio, 0);
        
        foreach ($data as $d) {
            // Contar citas para esta agenda específica
            $contador_citas = $this->MAgenda->contar_citas_por_agenda($d->idAgenda);
            
            // Initialize counters for this specific agenda
            $citas_programadas = 0;
            $citas_finalizadas = 0;
            
            // Count scheduled and completed appointments for this agenda
            foreach ($contador_citas as $cita) {
                if ($cita->citEstado == 'PROGRAMADO') {
                    $citas_programadas = $cita->total;
                } elseif ($cita->citEstado == 'FINALIZADO') {
                    $citas_finalizadas = $cita->total;
                }
            }
            
            // Convertir fecha a español
            setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
            $fecha_formateada = strftime("%A, %d de %B de %Y", strtotime($d->ageFecha));
            
            echo "<div class='agenda-display-card'>";
            echo "<div class='agenda-info-header'>";
            echo "<h5><i class='fa fa-calendar-alt'></i> Agenda - " . ucfirst($fecha_formateada) . "</h5>";
            
            echo "<div class='agenda-details'>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-user-md'></i>";
            echo "<div><span class='label'>Profesional</span><span class='value'>" . $d->usuNombre . " " . $d->usuApellido . "</span></div>";
            echo "</div>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-stethoscope'></i>";
            echo "<div><span class='label'>Área</span><span class='value'>" . $d->proNombre . "</span></div>";
            echo "</div>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-building'></i>";
            echo "<div><span class='label'>Sede</span><span class='value'>" . $d->sedNombre . "</span></div>";
            echo "</div>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-users'></i>";
            echo "<div><span class='label'>Brigada</span><span class='value'>" . $d->briNombre . "</span></div>";
            echo "</div>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-clipboard-list'></i>";
            echo "<div><span class='label'>Citas Programadas</span><span class='value'>" . $citas_programadas . "</span></div>";
            echo "</div>";
            
            echo "<div class='agenda-detail-item'>";
            echo "<i class='fa fa-check-circle'></i>";
            echo "<div><span class='label'>Citas Finalizadas</span><span class='value'>" . $citas_finalizadas . "</span></div>";
            echo "</div>";
            
            echo "</div>"; // fin agenda-details
            
            echo "<div style='margin-top: 15px;'>";
            echo "<button class='btn-agenda-action btn-agenda-danger' onclick='eliminar(\"{$d->idAgenda}\")'><i class='fa fa-trash'></i> Borrar Agenda</button>";
            echo "</div>";
            
            echo "</div>"; // fin agenda-info-header

            // Tabla de citas
            echo "<table class='agenda-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th style='width: 80px;'>#</th>";
            echo "<th style='width: 120px;'>Horario</th>";
            echo "<th>Paciente</th>";
            echo "<th style='width: 130px;'>Documento</th>";
            echo "<th style='width: 130px;'>Estado</th>";
            echo "<th style='width: 200px;'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Inicializar contador de citas para esta agenda
            $numero_cita = 0;
            $tiene_citas = false;
            
            while (strtotime($ageHoraInicio) < strtotime($d->ageHoraFin)) {
                $hora_final = $this->addMinutes($ageHoraInicio, $d->ageIntervalo);
                $statusHorario = $this->getStatusHorario($d->ageFecha, $ageHoraInicio, $hora_final, $d->idAgenda, $d->idUsuario, $d->idProceso);
                $fechaInit = date($d->ageFecha . ' ' . $ageHoraInicio);
                $fechaEnd = date($d->ageFecha . ' ' . $hora_final);

                echo "<tr>";
                
                // Mostrar número de cita si hay una cita agendada
                if ($statusHorario > 0 && in_array($statusHorario[0]->citEstado, ['PROGRAMADO', 'FINALIZADO', 'FINALIZADO Y FACTURADO', 'FACTURADO'])) {
                    $numero_cita++;
                    $tiene_citas = true;
                    echo "<td><span class='cita-numero'>Cita #$numero_cita</span></td>";
                } else {
                    echo "<td><span style='color: #95a5a6;'>--</span></td>";
                }
                
                echo "<td><span class='cita-hora'>{$ageHoraInicio}<br><small style='color: #7f8c8d;'>a</small><br>{$hora_final}</span></td>";
                
                // Columna Paciente
                echo "<td>";
                if ($statusHorario > 0 && in_array($statusHorario[0]->citEstado, ['PROGRAMADO', 'FINALIZADO', 'FINALIZADO Y FACTURADO', 'FACTURADO'])) {
                    echo "<span class='cita-paciente'>" . $statusHorario[0]->pacNombre . " " . $statusHorario[0]->pacNombre2 . " " . $statusHorario[0]->pacApellido . " " . $statusHorario[0]->pacApellido2 . "</span>";
                } else {
                    echo "<span style='color: #95a5a6;'>Sin asignar</span>";
                }
                echo "</td>";
                
                // Columna Documento
                echo "<td>";
                if ($statusHorario > 0 && in_array($statusHorario[0]->citEstado, ['PROGRAMADO', 'FINALIZADO', 'FINALIZADO Y FACTURADO', 'FACTURADO'])) {
                    echo "<span class='cita-documento'>" . $statusHorario[0]->pacDocumento . "</span>";
                } else {
                    echo "<span style='color: #95a5a6;'>--</span>";
                }
                echo "</td>";
                
                // Columna Estado
                echo "<td>";
                if ($statusHorario > 0) {
                    $estado = $statusHorario[0]->citEstado;
                    if ($estado == 'PROGRAMADO') {
                        echo "<span class='badge-estado badge-programado'>Programado</span>";
                    } elseif ($estado == 'FINALIZADO') {
                        echo "<span class='badge-estado badge-finalizado'>Finalizado</span>";
                    } elseif ($estado == 'FINALIZADO Y FACTURADO') {
                        echo "<span class='badge-estado badge-finalizado'>Finalizado y Facturado</span>";
                    } elseif ($estado == 'FACTURADO') {
                        echo "<span class='badge-estado badge-finalizado'>Facturado</span>";
                    }
                } else {
                    echo "<span style='color: #95a5a6;'>Disponible</span>";
                }
                echo "</td>";
                
                // Columna Acciones
                echo "<td>";
                if ($statusHorario > 0 && $statusHorario[0]->citEstado == 'PROGRAMADO') {
                    echo "<button onclick='cancel(\"{$statusHorario[0]->idCita}\")' data-toggle='modal' data-target='.bd-example-modal-lg-cancelar-cita' class='btn-agenda-action btn-agenda-danger'><i class='fa fa-times'></i> Cancelar</button>";
                } elseif ($statusHorario == 0 || !in_array($statusHorario[0]->citEstado, ['PROGRAMADO', 'FINALIZADO', 'FINALIZADO Y FACTURADO', 'FACTURADO'])) {
                    echo "<button class='btn-agenda-action btn-agenda-primary' data-toggle='modal' data-target='.bd-example-modal-lg' onclick='save_agenda(\"{$d->idProceso}\",\"{$d->idUsuario}\",\"{$d->ageFecha}\",\"{$fechaInit}\",\"{$fechaEnd}\",\"{$d->idAgenda}\")'><i class='fa fa-plus'></i> Agregar Cita</button>";
                } else {
                    echo "<span style='color: #95a5a6;'>--</span>";
                }
                echo "</td>";
                
                echo "</tr>";

                $ageHoraInicio = $hora_final;
            }
            
            // Si no hay citas, mostrar mensaje
            if (!$tiene_citas) {
                echo "<tr><td colspan='6' class='empty-state' style='padding: 30px;'>";
                echo "<i class='fa fa-calendar-times'></i>";
                echo "<h5>Sin citas agendadas</h5>";
                echo "<p>Esta agenda aún no tiene citas programadas</p>";
                echo "</td></tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // fin agenda-display-card
        }
    } else {
        echo "<div class='empty-state'>";
        echo "<i class='fa fa-calendar-times'></i>";
        echo "<h5>No se encontraron agendas</h5>";
        echo "<p>No se encontró ninguna agenda asociada con los datos ingresados</p>";
        echo "</div>";
    }
}

  // Get appointment status for a specific time slot
    public function getStatusHorario($ageFecha, $ageHoraInicio, $hora_final, $idAgenda, $idUsuario, $idProceso)
    {
        $infoCita = null;

        $fechaInit = date($ageFecha . ' ' . $ageHoraInicio);

        $row = $this->MAgenda->informacion_cita($idProceso, $idUsuario, $fechaInit);

        return $row;
    }

    public function agregar()
    {

        $usuario_idUsuario = $this->input->post('profesional');
        $proceso_idProceso = $this->input->post('area');
        $sede_idSede = $this->input->post('sede');
        $ageConsultorio = $this->input->post('consultorio');
        $ageFecha = $this->input->post('fecha');
        $ageHoraInicio = $this->input->post('inicio');
        $ageHoraFin = $this->input->post('fin');
        $ageIntervalo = $this->input->post('intervalo');
        $ageModalidad = $this->input->post('modalidad');
        $ageEtiqueta = $this->input->post('etiqueta');
        $brigada_idBrigada = $this->input->post('brigada');

        // Verificar si hay traslape de horarios con agendas existentes
        $traslape = $this->MAgenda->verificar_traslape_horario(
            $usuario_idUsuario, 
            $proceso_idProceso, 
            $ageFecha, 
            $ageHoraInicio, 
            $ageHoraFin
        );
        
        if (count($traslape) > 0) {
            $agenda_existente = $traslape[0];
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Ya existe una agenda para este profesional y área en el horario ' . 
                            $agenda_existente->ageHoraInicio . ' - ' . $agenda_existente->ageHoraFin . 
                            '. Por favor seleccione un horario diferente.'
            ));
            return;
        }

        $datos = array(
            'usuario_idUsuario' => $usuario_idUsuario,
            'proceso_idProceso' => $proceso_idProceso,
            'sede_idSede' => $sede_idSede,
            'ageConsultorio' => $ageConsultorio,
            'ageFecha' => $ageFecha,
            'ageHoraInicio' => $ageHoraInicio,
            'ageHoraFin' => $ageHoraFin,
            'ageIntervalo' => $ageIntervalo,
            'ageModalidad' => $ageModalidad,
            'ageEtiqueta' => $ageEtiqueta,
            'brigada_idBrigada' => $brigada_idBrigada,

        );

        $idAgenda = $this->MAgenda->guardar($datos);

        $data = $this->MAgenda->getAgendaByid($idAgenda);

        echo json_encode(array(
            'status' => 'success',
            'message' => 'Agenda creada exitosamente',
            'data' => $data
        ));
    }
    public function historial($idPaciente)
    {
        $data['title'] = 'IPS | HISTORIAL CITAS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["historial"] = $this->MCita->ver_historial($idPaciente);

        $this->load->view("CAgenda/VHistorial.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    // Delete a schedule entry

    public function eliminar($idAgenda)
    {
        $this->MAgenda->eliminar($idAgenda);

        redirect(base_url("index.php/CAgenda"));
    }

    public function paciente()
    {

        $data['title'] = 'IPS | CITAS POR DOCUMENTO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CAgenda/VListar.php");

        $this->load->view("CPlantilla/VFooter");
    }

    public function buscar_paciente()
    {

        $pacDocumento = $this->input->post('documento');

        $data = $this->MFactura->getPaciente($pacDocumento);
        //print_r($data);

        echo "<table class='table table-bordered' id='data'>";
        if (sizeof($data) > 0) {
            echo "<tr >";
            echo "<td>Paciente</td>";
            echo "<td>Area</td>";
            echo "<td>Estado</td>";
            echo "<td>Hora</td>";
            echo "<td>Registro medico</td>";
            echo "<td>Profesional</td>";
            echo "</tr>";
            echo "<tbody>";
            foreach ($data as $d) {
                echo "<tr onclick='cancelar($d->idCita)' data-toggle='modal' data-target='.bd-example-modal-lg-cancelar-cita'>";
                echo "<td>CC: " . $d->pacDocumento . "<br>Nombre: " . $d->pacNombre . " " . $d->pacNombre2 . " " . $d->pacApellido . " " . $d->pacApellido2 . "</td>";
                echo "<td>" . $d->proNombre . "</td>";
                echo "<td>" . $d->citEstado . "</td>";
                echo "<td>" . $d->citFechaInicio . "</td>";
                echo "<td>" . $d->usuRegistroProfesional . "</td>";
                echo "<td>" . $d->usuNombre . " " . $d->usuApellido . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }

        echo "</table>";
    }
}
