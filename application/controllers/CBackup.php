<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CBackup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MPaciente");
        $this->load->model("MAgenda");
        $this->load->model("MCita");
        $this->load->model("MHistoria");
    }


    public function index()
    {

        $data['title'] = 'IPS | BACKUP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");



        $this->load->view("CBACKUP/VConsultar.php");

        $this->load->view("CPlantilla/VFooter");
    }
    ///Why does he catch in the header
    public function backup_hc()
    {

        $data['title'] = 'IPS | BACKUP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");



        $this->load->view("CBACKUP/VConsultar_hc.php");

        $this->load->view("CPlantilla/VFooter");
    }
    ///Here are the different functions to extract the information by means of date range to synchronize general SQL code in a TXT

    public function backup_pacActualizado()
    {

        $data['title'] = 'IPS | BACKUP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");



        $this->load->view("CBACKUP/VConsultarmodi.php");

        $this->load->view("CPlantilla/VFooter");
    }
    

    public function exportar_sql_hc()
    {

        $nombre_archivo = "SQL_HC";

        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');


        $data = $this->MAgenda->ver_agenda_by_fecha($fecha1, $fecha2);

        $data_cita = $this->MCita->ver_cita_by_fecha($fecha1, $fecha2);

        $data_hc = $this->MHistoria->ver_hc_by_fecha($fecha1, $fecha2);

        $data_hc_complementaria = $this->MHistoria->ver_hc_complementaria_by_fecha($fecha1, $fecha2);

        $data_hc_medicamento = $this->MHistoria->ver_hc_medicamento_by_fecha($fecha1, $fecha2);

        $data_hc_cups = $this->MHistoria->ver_hc_cups_by_fecha($fecha1, $fecha2);

        $data_hc_diagnostico = $this->MHistoria->ver_hc_diagnostico_by_fecha($fecha1, $fecha2);

        $data_hc_remision = $this->MHistoria->ver_hc_remision_by_fecha($fecha1, $fecha2);


        $datos_agenda = $this->MAgenda->get_campos_agenda();

        $datos_cita = $this->MCita->get_campos_cita();

        $datos_hc = $this->MHistoria->get_campos_hc();

        $datos_hc_complementaria = $this->MHistoria->get_campos_hc_complementaria();

        $datos_hc_medicamento = $this->MHistoria->get_campos_hc_medicamento();

        $datos_hc_cups = $this->MHistoria->get_campos_hc_cups();

        $datos_hc_diagnostico = $this->MHistoria->get_campos_hc_diagnostico();

        $datos_hc_remision = $this->MHistoria->get_campos_hc_remision();



        if ($nombre_archivo) {

            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");

            $datos = "--\r\n-- Volcado de datos para la tabla `agenda`\r\n--\r\n\r\n";

            $datos .=   "INSERT INTO `agenda` (";

            foreach ($datos_agenda as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES ' . "\r\n";


            //$datos .= '<br>';

            foreach ($data as $table_row) {
                $datos .= '(';
                foreach ($table_row as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }
            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `cita`\r\n--\r\n\r\n";

            $datos .=   "INSERT INTO `cita` (";

            foreach ($datos_cita as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_cita as $table_row_cita) {
                $datos .= '(';
                foreach ($table_row_cita as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }
            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `hc`\r\n--\r\n\r\n";

            $datos .=   "INSERT INTO `hc` (";

            foreach ($datos_hc as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc as $table_row_hc) {
                $datos .= '(';
                foreach ($table_row_hc as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `hc_complementaria`\r\n--\r\n\r\n";

            $datos .=   "INSERT INTO `hc_complementaria` (";

            foreach ($datos_hc_complementaria as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc_complementaria as $table_row_hc_complementaria) {
                $datos .= '(';
                foreach ($table_row_hc_complementaria as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `historia_medicamento`\r\n--\r\n\r\n";


            $datos .=   "INSERT INTO `historia_medicamento` (";

            foreach ($datos_hc_medicamento as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc_medicamento as $table_row_hc_medicamento) {
                $datos .= '(';
                foreach ($table_row_hc_medicamento as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `historia_cups`\r\n--\r\n\r\n";


            $datos .=   "INSERT INTO `historia_cups` (";

            foreach ($datos_hc_cups as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc_cups as $table_row_hc_cups) {
                $datos .= '(';
                foreach ($table_row_hc_cups as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `historia_diagnostico`\r\n--\r\n\r\n";


            $datos .=   "INSERT INTO `historia_diagnostico` (";

            foreach ($datos_hc_diagnostico as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc_diagnostico as $table_row_hc_diagnostico) {
                $datos .= '(';
                foreach ($table_row_hc_diagnostico as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n" . "\r\n";

            print $datos;

            $datos = "--\r\n-- Volcado de datos para la tabla `historia_remision`\r\n--\r\n\r\n";



            $datos .=   "INSERT INTO `historia_remision` (";

            foreach ($datos_hc_remision as $f) {
                $datos .=   "`" . $f . "`,";
            }

            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";


            foreach ($data_hc_remision as $table_row_hc_remision) {
                $datos .= '(';
                foreach ($table_row_hc_remision as $column => $value) {
                    $datos .= "'" . addslashes($value) . "',";
                }
                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }

            $datos = substr($datos, 0, -1) . '; ' . "\r\n";

            print $datos;
        } else {

            $datos = "NO HAY DATOS PARA MOSTRAR";
            print $datos;
        }
    }

    public function exportar_sql_paciente()
    {

        $nombre_archivo = "SQL_PACIENTES";

        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');


        $data = $this->MPaciente->ver_paciente_by_fecha($fecha1, $fecha2);


        $field = $this->MPaciente->get_field();



    
        if ($nombre_archivo) {

            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");

            $datos =   "INSERT INTO `paciente` (";

            foreach ($field as $f) {
                $datos .=   "`" . $f . "`,";
            }

            //$datos .=   ")VALUES";


            $datos = substr($datos, 0, -1);
            $datos .= ')';

            $datos .= ' VALUES' . "\r\n";

            foreach ($data as $p) {
                $datos .= '(';



                $datos .=



                 /*1"''" */    $p->idPaciente. ",'" 
                /*3*/          . $p->empresa_idEmpresa   . "','" 
                /*4*/    . $p->regimen_idRegimen . "','" 
                /*5*/         . $p->id_tipo_afiliacion . "','" 
                /*6*/         . $p->id_zona_residencia . "','" 
                /*7*/      . $p->depto_nacimiento . "','" 
                /*8*/         . $p->depto_residencia . "','" 
                /*9*/          . $p->municipio_nacimiento . "','" 
                /*10*/       . $p->municipio_residencia . "','" 
                /*11*/             . $p->raza_idRaza . "','" 
                /*12*/         . $p->escolaridad_idEscolaridad . "','" 
                /*13*/          . $p->parentesco_idParentesco . "','" 
                /*14*/          . $p->pacTipDocumento . "','"
                /*15*/             . $p->pacRegistro . "','"
                /*16*/             . $p->pacNombre . "','" 
                /*17*/             . $p->pacNombre2 . "','" 
                /*18*/             . $p->pacApellido . "','" 
                /*19*/              . $p->pacApellido2 . "','" 
                /*20*/             . $p->pacDocumento . "','" 
                /*21*/                  . $p->pacFecNacimiento . "','" 
                /*22*/                   . $p->pacSexo . "','" 
                /*23*/                . $p->pacDireccion . "','" 
                /*24*/                   . $p->pacTelefono . "','" 
                /*25*/               . $p->pacCorreo . "','" 
                /*26*/                 . $p->pacObservacion . "','" 
                /*27*/                 . $p->pacEstCivil . "','" 
                /*28*/                . $p->pacOcupacion . "','" 
                /*29*/                 . $p->nombre_acudiente . "','" 
                /*30*/                 . $p->pacParentesco . "','" 
                /*31*/              . $p->telefono_acudiente . "','" 
                /*32*/            . $p->direccion_acudiente . "','" 
                /*33*/              . $p->pacEstado . "','" 
                /*34*/               . $p->pacAcompananteNombre . "','" 
                /*35*/              . $p->pacAcompananteTelefono . "','"
				/*36*/               . $p->pacFecRegistro . "','"
				/*37*/              . $p->novedad_idnovedad . "','"
                 /*38*/               .$p->auxiliar_idauxiliar . "','"
                                       .$p->Brigada_idBrigada . "','"
                                       .$p->Fecha_Actua . "''";
                                      
                                



                $datos = substr($datos, 0, -1);
                $datos .= '),';
            }
            $datos = substr($datos, 0, -1) . '; ';

            print $datos;
        } else {

            $datos = "NO HAY DATOS PARA MOSTRAR";
            print $datos;
        }
    }

    public function exportar_sql_paciente_actua()
        {
            $nombre_archivo = "SQL_PACIENTES";
        
            $fecha1 = $this->input->post('fecha');
            $fecha2 = $this->input->post('fecha1');
        
            $data = $this->MPaciente->ver_paciente_by_actualizar($fecha1, $fecha2);
            $field = $this->MPaciente->get_field();
        
            if ($nombre_archivo && !empty($data)) {
                header('Content-type: text/plain');
                header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");
        
                foreach ($data as $p) {
                    // Genera la consulta de actualización
                    $update_query = "UPDATE `paciente` SET ";
                    foreach ($field as $f) {
                        $value = $this->db->escape($p->$f);
                        $update_query .= "`$f` = $value, ";
                    }
                    $update_query = rtrim($update_query, ', '); // Elimina la coma y el espacio extra al final
                    $update_query .= " WHERE `idPaciente` = {$p->idPaciente};";
                    echo $update_query . "\r\n";
                }
            } else {
                $datos = "NO HAY DATOS PARA EXPORTAR";
                echo $datos;
            }
        }
        
}
