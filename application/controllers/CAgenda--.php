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

        //Verificacion de Permisos
        if ($this->session->userdata('rol_user') == 2) { //Rol de usuario general
            echo "<p><b>ACCESO DENEGADO.</b> Señor usuario, se encuentra intentando acceder"
                . " a un sitio al cual no tiene permiso de acceso.</p>";
            exit;
        }
    }

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

    public function addMinutes($horaInicial, $minutoAnadir)
    {

        $segundos_horaInicial = strtotime($horaInicial);
        $segundos_minutoAnadir = $minutoAnadir * 60;
        //echo($segundos_minutoAnadir);
        $nuevaHora = date("H:i", $segundos_horaInicial + $segundos_minutoAnadir);

        return $nuevaHora;
    }

    public function mostrarAgenda()
    {

        $idUsuario = $this->input->post('usuario');
        $ageFecha = $this->input->post('fecha');
        $idProceso = $this->input->post('proceso');

        $data = $this->MAgenda->getAgenda($idUsuario, $ageFecha, $idProceso);

        echo "<div class='container'>";
        echo "<table class='table table-bordered'>";

        if (sizeof($data) > 0) {
            $ageHoraInicio = $data[0]->ageHoraInicio;
            $ageHoraInicio = $this->addMinutes($ageHoraInicio, 0);
            foreach ($data as $d) {
                echo "<tr>";
                echo "<tr><td colspan='7'><center>AGENDA DE : <b>" . $d->ageFecha . "</b></center></td></tr>";
                echo "<td>Profesional</td>";
                echo "<td>Area</td>";
                echo "<td>Sede</td>";
                echo "<td>Consultorio</td>";
                echo "<td>Brigada</td>";
                echo "<td>Opcion</td>";
                echo "</tr>";
                echo "<tbody>";

                echo "<tr><td>" . $d->usuNombre . " " . $d->usuApellido . "</td>";
                echo "<td>" . $d->proNombre . "</td>";
                echo "<td>" . $d->sedNombre . "</td>";
                echo "<td>" . $d->ageConsultorio . "</td>";
                echo "<td>" . $d->briNombre . "</td>";
                echo "<td><a class='btn btn-danger'onclick=eliminar(\"{$d->idAgenda}\")>BORRAR</a> </td></tr>";

                while (strtotime($ageHoraInicio) < strtotime($d->ageHoraFin)) {

                    $hora_final = $this->addMinutes($ageHoraInicio, $d->ageIntervalo);
                    $statusHorario = $this->getStatusHorario($d->ageFecha, $ageHoraInicio, $hora_final, $d->idAgenda, $d->idUsuario, $d->idProceso);
                    $fechaInit = date($d->ageFecha . ' ' . $ageHoraInicio);
                    $fechaEnd = date($d->ageFecha . ' ' . $hora_final);
                    // print_r($statusHorario);
                    //echo $hora_final;
                    echo "<tr>";
                    echo "<th colspan = '3'>Hora</th>";
                    echo "<th colspan = '3'>Datos</th>";
                    echo "</tr>";
                    // print_r($statusHorario);
                    echo "<tr>";
                    echo "<td colspan = '3'>{$ageHoraInicio}/{$hora_final}</td>";
                    echo "<td colspan = '3'>";
                    if ($statusHorario > 0 && $statusHorario[0]->citEstado == 'PROGRAMADO') {
                        echo "Paciente: ".  $statusHorario[0]->pacNombre . " " . $statusHorario[0]->pacNombre2 . " " . $statusHorario[0]->pacApellido . " " . $statusHorario[0]->pacApellido2 . "<br>";
                        echo "Identificación: ". $statusHorario[0]->pacDocumento .  "<br>";
						echo "Estado cita: " . $statusHorario[0]->citEstado . "<br>";
                        echo "<a  onclick= cancel(\"{$statusHorario[0]->idCita}\") data-toggle='modal' data-target='.bd-example-modal-lg-cancelar-cita' class='btn btn-danger'>Cancelar cita</a>";
                    } elseif ($statusHorario > 0 && $statusHorario[0]->citEstado == 'FINALIZADO') {

                        echo "Paciente: ". $statusHorario[0]->pacNombre . " " . $statusHorario[0]->pacNombre2 . " " . $statusHorario[0]->pacApellido . " " . $statusHorario[0]->pacApellido2 . "<br>";
                        echo "Identificación: ". $statusHorario[0]->pacDocumento .  "<br>";
						echo "<p style='color:red';>" . $statusHorario[0]->citEstado . "</p>";
                    } elseif ($statusHorario > 0 && $statusHorario[0]->citEstado == 'FINALIZADO Y FACTURADO') {

                        echo "Paciente: ". $statusHorario[0]->pacNombre . " " . $statusHorario[0]->pacNombre2 . " " . $statusHorario[0]->pacApellido . " " . $statusHorario[0]->pacApellido2 . "<br>";
                        echo "Identificación: ". $statusHorario[0]->pacDocumento .  "<br>";
						echo "<p style='color:red';>" . $statusHorario[0]->citEstado . "</p>";
                    } elseif ($statusHorario > 0 && $statusHorario[0]->citEstado == 'FACTURADO') {

                        echo "Paciente: ". $statusHorario[0]->pacNombre . " " . $statusHorario[0]->pacNombre2 . " " . $statusHorario[0]->pacApellido . " " . $statusHorario[0]->pacApellido2 . "<br>";
                        echo "Identificación: ". $statusHorario[0]->pacDocumento .  "<br>";
						echo "<p style='color:red';>" . $statusHorario[0]->citEstado . "</p>";
                    } else {

                        echo "<a class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'
                        onclick='save_agenda(\"{$d->idProceso}\",\"{$d->idUsuario}\",\"{$d->ageFecha}\",\"{$fechaInit}\",\"{$fechaEnd}\",\"{$d->idAgenda}\")'>Agregar Cita</a>";
                    }
                    echo "</td>";
                    echo "</tr>";



                    /* echo "<tr><td colspan = '4'>Cita<br><a class='btn btn-info' href='" .
                    base_url('index.php/CCita/agendar_cita/' . $d->idAgenda) . "'>Cita</a></td></tr>";*/

                    $ageHoraInicio = $hora_final;
                }
                echo "</tbody>";
                // echo "</div>";
            }
        } else {
            echo "<tr><td>No se encontro ninguna agenda asociada con los datos ingresados.</td></tr>";
        }

        echo "</table>";
        echo "</div>";
    }

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

        json_encode($data);
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
