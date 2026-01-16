<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CRips extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MRips");
        $this->load->model("MEmpresa");
        $this->load->model("MContrato");
    }

    public function detalle_contrato()

    {

        $id = $this->input->post('id');

        $contrato = $this->MContrato->get_data_contrato($id);

        //print_r($contrato);

        if ($contrato != false) {
            echo json_encode($contrato);
        }
    }

    public function index()
    {
        echo "Funcionalidad por defecto. No hay lógica implementada.";
        exit;
    }


    public function archivo_ac()
    {

        $data['title'] = 'IPS | ARCHIVO AC';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAC.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_af()
    {

        $data['title'] = 'IPS | ARCHIVO AF';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAF.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_ap()
    {

        $data['title'] = 'IPS | ARCHIVO AP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAP.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_ct()
    {

        $data['title'] = 'IPS | ARCHIVO CT';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoCT.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_us()
    {

        $data['title'] = 'IPS | ARCHIVO US';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoUS.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    // public function exportar_ap() {
    //     $mysql_datetime = date("Y-m-d H:i:s");
    //     $fecha_archivo = str_ireplace(["-", ":", " "], "", $mysql_datetime);
    //     $nombre_archivo = "AP" . $fecha_archivo . ".txt";
    
    //     $fecha1 = date("Y-m-d", strtotime($this->input->post('fecha1')));
    //     $fecha2 = date("Y-m-d", strtotime($this->input->post('fecha2')));
    
    
    
    //     $data_laboratorio = $this->MRips->ver_labora($fecha1, $fecha2);
    
    //     // Map de exámenes con sus códigos CUP
    //     $cup_map = [
    //         'colesterol_total' => 903818, 'colesterol_hdl' => 903815, 'trigliceridos' => 903868,
    //         'colesterol_ldl' => 903817, 'hemoglobina' => 902213, 'hematocrocito' => 902211,
    //         'plaquetas' => 902211, 'hemoglobina_glicosilada' => 903427, 'glicemia_basal' => 903063,
    //         'glicemia_post' => 903063, 'creatinina' => 903823, 'creatinuria' => 903876,
    //         'microalbuminuria' => 903027, 'albumina' => 903804, 'relacion_albuminuria_creatinuria' => 903857,
    //         'parcial_orina' => 907106, 'depuracion_creatinina' => 903823, 'creatinina_orina_24' => 903824,
    //         'proteina_orina_24' => 903808, 'hormona_estimulante_tiroides' => 903801,
    //         'hormona_paratiroidea' => 903802, 'albumina_suero' => 903803, 'fosforo_suero' => 903807,
    //         'nitrogeno_ureico' => 903856, 'acido_urico_suero' => 903805, 'calcio' => 903806,
    //         'sodio_suero' => 903809, 'potasio_suero' => 903810, 'hierro_total' => 903846,
    //         'ferritina' => 903016, 'transferrina' => 903811, 'fosfatasa_alcalina' => 903833,
    //         'acido_folico_suero' => 903812, 'vitamina_b12' => 903813, 'nitrogeno_ureico_orina_24' => 903814
    //     ];
    
    //     // Verificar si hay datos
    //     if (empty($data_laboratorio)) {
    //         echo "NO HAY DATOS PARA MOSTRAR";
    //         exit;
    //     }
    
    //     // Configurar cabecera del archivo de texto
    //     header('Content-type: text/plain');
    //     header("Content-Disposition: attachment; filename=\"$nombre_archivo\"");
    
    //     // Procesar datos de laboratorio
    //     foreach ($data_laboratorio as $d) {
    //         // Crear un objeto DateTime a partir del valor de la base de datos
    //         $fecha_lab_obj = DateTime::createFromFormat('d/m/Y', $d->fecha);
    //         // Convertir la fecha al formato d/m/Y
    //         $fecha_lab = $fecha_lab_obj ? $fecha_lab_obj->format('d/m/Y') : 'Fecha no válida';
    
    //         $cup_codigos = [];
    
           
    
    //         // Diagnósticos asociados a la cita (si aplica)
    //         $diagnostico = $this->MRips->diagnosticoByIdCita($d->idCita ?? null);
    //         $diag_1 = isset($diagnostico[1]->diaCodigo) ? $diagnostico[1]->diaCodigo : "";
    //         $diag_2 = isset($diagnostico[2]->diaCodigo) ? $diagnostico[2]->diaCodigo : "";
    //         $diag_3 = isset($diagnostico[3]->diaCodigo) ? $diagnostico[3]->diaCodigo : "";
    
    //         // Buscar exámenes de laboratorio realizados
    //         foreach ($cup_map as $campo => $cup) {
    //             if (!empty($d->$campo)) {
    //                 $cup_codigos[] = $cup;
    //             }
    //         }
    
    //         // Imprimir cada CUP en una nueva línea
    //         foreach ($cup_codigos as $cup) {
    //             $datos = "FACP,190010882401,CC," . $d->identificacion . "," . $fecha_lab . "," . $cup . ",1,1,5,I10X," . $diag_1 . "," . $diag_2 . "," . $diag_3 . ",0\r\n";
                
    //             print $datos;
    //         }
    //     }
    // }
    
    public function exportar_ap() {
        $mysql_datetime = date("Y-m-d H:i:s");
        $fecha_archivo = str_ireplace(["-", ":", " "], "", $mysql_datetime);
        $nombre_archivo = "AP" . $fecha_archivo . ".txt";
    
        $fecha1 = date("Y-m-d", strtotime($this->input->post('fecha1')));
        $fecha2 = date("Y-m-d", strtotime($this->input->post('fecha2')));
    
        $data_laboratorio = $this->MRips->ver_labora($fecha1, $fecha2);
        $data_servicios = $this->MRips->servicios($fecha1, $fecha2);
    
        // Map de exámenes con sus códigos CUP
        $cup_map = [
            'colesterol_total' => 903818, 'colesterol_hdl' => 903815, 'trigliceridos' => 903868,

            'colesterol_ldl' => 903816, 'hemoglobina' => 902210, 'hematocrocito' => 902207,

            'plaquetas' => 902209, 'hemoglobina_glicosilada' => 903427, 'glicemia_basal' => 903841,

            'glicemia_post' => 903845, 'creatinina' => 903895, 'creatinuria' => 903876,

            'microalbuminuria' => 903026, 'albumina' => 903803, 'relacion_albuminuria_creatinuria' => 903026,

            'parcial_orina' => 907106, 'depuracion_creatinina' => 903823, 'creatinina_orina_24' => 903824,

            'proteina_orina_24' => 903862, 'hormona_estimulante_tiroides' => 904902,

            'hormona_paratiroidea' => 904911, 'albumina_suero' => 903803, 'fosforo_suero' => 903835,

            'nitrogeno_ureico' => 903856, 'acido_urico_suero' => 903801, 'calcio' => 903603,

            'sodio_suero' => 903864, 'potasio_suero' => 903859, 'hierro_total' => 903846,

            'ferritina' => 903016, 'transferrina' => 903045, 'fosfatasa_alcalina' => 903833,

            'acido_folico_suero' => 903105, 'vitamina_b12' => 903703, 'nitrogeno_ureico_orina_24' => 903857
        ];
    
        // Configurar cabecera del archivo de texto
        header('Content-type: text/plain');
        header("Content-Disposition: attachment; filename=\"$nombre_archivo\"");
    
        // Procesar datos de laboratorio
        foreach ($data_laboratorio as $d) {
            // Crear un objeto DateTime a partir del valor de la base de datos
            $fecha_lab_obj = DateTime::createFromFormat('d/m/Y', $d->fecha);
            // Convertir la fecha al formato d/m/Y
            $fecha_lab = $fecha_lab_obj ? $fecha_lab_obj->format('d/m/Y') : 'Fecha no válida';
    
            $cup_codigos = [];
    
            // Diagnósticos asociados a la cita (si aplica)
            $diagnostico = $this->MRips->diagnosticoByIdCita($d->idCita ?? null);
            $diag_1 = isset($diagnostico[1]->diaCodigo) ? $diagnostico[1]->diaCodigo : "";
            $diag_2 = isset($diagnostico[2]->diaCodigo) ? $diagnostico[2]->diaCodigo : "";
            $diag_3 = isset($diagnostico[3]->diaCodigo) ? $diagnostico[3]->diaCodigo : "";
    
            // Buscar exámenes de laboratorio realizados
            foreach ($cup_map as $campo => $cup) {
                if (!empty($d->$campo)) {
                    $cup_codigos[] = $cup;
                }
            }
    
            // Imprimir cada CUP en una nueva línea
            foreach ($cup_codigos as $cup) {
                $datos = "FACP,190010882401,CC," . $d->identificacion . "," . $fecha_lab . "," . $cup . ",1,1,5,I10X," . $diag_1 . "," . $diag_2 . "," . $diag_3 . ",0\r\n";
                print $datos;
            }
        }
    
        // Procesar datos de servicios
        foreach ($data_servicios as $s) {
            // Convertir la fecha de servicios al formato d/m/Y
            $fecha_servicio_obj = DateTime::createFromFormat('Y-m-d', $s->facFecha);
            $fecha_servicio = $fecha_servicio_obj ? $fecha_servicio_obj->format('d/m/Y') : 'Fecha no válida';
    
            $datos = "FACP,190010882401,CC," . $s->pacDocumento . "," . $fecha_servicio . "," . $s->cupCodigo . ",1,1,5,I10X,,,,0\r\n";
            print $datos;
        }
    }
     

    
    


    public function exportar_ac()
    {
        $mysql_datetime = date("Y-m-d H:i:s");
    
        $fecha1 = str_ireplace("-", " ", $mysql_datetime);
        $fecha2 = str_ireplace(":", " ", $fecha1);
        $fecha3 = str_ireplace(" ", "", $fecha2); // Quito los símbolos para crear el nombre con la fecha
    
        // Nombre del archivo
        $nombre_archivo = "AC" . $fecha3 . ".txt";
    
        $id_ips = $this->input->post('eps');
        $id_contrato = $this->input->post('idContrato');
        $fecha1 = $this->input->post('fecha1');
        $fecha2 = $this->input->post('fecha2');
    
        // Obtener datos con la consulta optimizada
        $data = $this->MRips->ver_citas_finalizadas($id_ips, $id_contrato, $fecha1, $fecha2);
    
        // Arreglo para evitar duplicados por fecha y código CUP
        $registros_unicos = [];
    
        if ($nombre_archivo) {
            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo\"");
    
            if (sizeof($data) > 0) {
                foreach ($data as $d) {
                    $fecha_cc = date("d/m/Y", strtotime($d->citFecha));
    
                    // Crear clave única con la fecha y el código CUP
                    $clave_unica = $d->pacDocumento . "_" . $fecha_cc . "_" . $d->cupCodigo;
    
                    // Verificar si el usuario ya fue registrado con la misma fecha y CUP
                    if (!isset($registros_unicos[$clave_unica])) {
                        // Marcar como registrado
                        $registros_unicos[$clave_unica] = true;
    
                        // Obtener los diagnósticos
                        $diagnostico = $this->MRips->diagnosticoByIdCita($d->idCita);
    
                        // Validación de diagnósticos
                        $principal = isset($diagnostico[0]->diaCodigo) ? $diagnostico[0]->diaCodigo : "";
                        $diag_1 = isset($diagnostico[1]->diaCodigo) ? $diagnostico[1]->diaCodigo : "";
                        $diag_2 = isset($diagnostico[2]->diaCodigo) ? $diagnostico[2]->diaCodigo : "";
                        $diag_3 = isset($diagnostico[3]->diaCodigo) ? $diagnostico[3]->diaCodigo : "";
    
                        // Generamos los datos sin los campos que venían de factura
                        $datos = "FACP,191300882403,CC," . $d->pacDocumento . "," .  $fecha_cc . ",," . $d->cupCodigo . ",10,15," . $principal . "," . $diag_1 . "," . $diag_2 . "," . $diag_3 . ",3,0,0,0 \r\n";
    
                        print $datos;
                    }
                }
            } else {
                print "NO HAY DATOS PARA MOSTRAR";
            }
        }
    }
    
    



    public function exportar_af()
    {

        $mysql_datetime = date("Y-m-d H:i:s");

        $fecha1 = str_ireplace("-", " ", $mysql_datetime);
        $fecha2 = str_ireplace(":", " ", $fecha1);
        $fecha3 = str_ireplace(" ", "", $fecha2); //quito los simbolos para crear el nombre con la fecha
        // y no confundir los txt

        //nombre*********
        $nombre_archivo = "AF" . $fecha3;

        $id_ips = $this->input->post('eps');
        $id_contrato = $this->input->post('idContrato');
        $fecha1 = $this->input->post('fecha1');
        $fecha2 = $this->input->post('fecha2');


        /*if ($id_ips == 0) {
            $data = $this->MRips->ver_by_fecha($fecha1, $fecha2);

            $diagnostico = $this->MRips->diagnosticoByIdCita($data[0]->idCita);
        } else {*/
            $data = $this->MRips->ver_by_empresa($id_ips, $id_contrato, $fecha1, $fecha2);
        //}

        if ($nombre_archivo) {

            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");

            if (sizeof($data) > 0) {
                foreach ($data as $d) {

                    $fecha_cc = date("d/m/Y", strtotime($d->citFecha));

                    /*$fecha_fact  = $row2['periodo'];

                    $ids = explode(',', $fecha_fact);

                    $periodo_1 = $ids[0];
                    $periodo_2 = $ids[1];*/

                    $periodo_1 = date("d/m/Y", strtotime($fecha1));
                    $periodo_2 = date("d/m/Y", strtotime($fecha2));

                    $datos = $d->empNit . ",FUNDACION NACER PARA VIVIR IPS,NI,900817959,FV" . $d->idFactura . "," . $fecha_cc . "," . $periodo_1 . "," . $periodo_2 . "," . $d->empCodigo . "," . $d->empNombre . "," . $d->conNumero . "," . $d->conPlanBeneficio . "," . $d->conPoliza . "," . $d->facCopago . "," . $d->facComision . "," . $d->facDescuento . "," . $d->facValorConsulta . " \r\n";

                    print $datos;
                }
            } else {

                $datos = "NO HAY DATOS PARA MOSTRAR";
                print $datos;
            }
        }
    }
   
    
    public function exportar_ct() {
        $mysql_datetime = date("Y-m-d H:i:s");
        $fecha          = date("Y-m-d");
        $fecha_rip      = str_ireplace("-", "/", $fecha);
    
        $fecha1 = str_ireplace("-", " ", $mysql_datetime);
        $fecha2 = str_ireplace(":", " ", $fecha1);
        $fecha3 = str_ireplace(" ", "", $fecha2); // quito los símbolos para crear el nombre con la fecha y no confundir los txt
    
        // Nombre del archivo
        $nombre_archivo = "CT" . $fecha3 . ".txt";
    
        $fechax = date("Y-m");
        $fechaxx = str_ireplace("-", "", $fechax);
    
        $fecha_rip = date("d/m/Y", strtotime($fecha));
    
        $af = "AF" . $fechaxx;
        $us = "US" . $fechaxx;
        $ac = "AC" . $fechaxx;
        $ap = "AP" . $fechaxx;
    
        $id_ips = $this->input->post('eps');
        $id_contrato = $this->input->post('idContrato');
        $fecha1 = date("Y-m-d", strtotime($this->input->post('fecha1')));
        $fecha2 = date("Y-m-d", strtotime($this->input->post('fecha2')));
    
        // Contar líneas generadas por cada función
        ob_start();
        $this->exportar_ap();
        $suma_ap = count(explode("\r\n", ob_get_clean())) - 1;
    
        ob_start();
        $this->exportar_ac();
        $suma_ac = count(explode("\r\n", ob_get_clean())) - 1;
    
        ob_start();
        $this->exportar_us();
        $total_registros_us = count(explode("\r\n", ob_get_clean())) - 1;
    
        // Obtener número de registros AF como línea fija
        $total_registros_af = 1;
    
        if ($nombre_archivo) {
            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");
    
            // Generar datos
            $datos1 = "AF,191300882403," . $fecha_rip . "," . $af . "," . $total_registros_af . "\r\n";
            $datos2 = "US,191300882403," . $fecha_rip . "," . $us . "," . $total_registros_us . "\r\n";
            $datos3 = "AC,191300882403," . $fecha_rip . "," . $ac . "," . $suma_ac . "\r\n";
            $datos4 = "AP,191300882403," . $fecha_rip . "," . $ap . "," . $suma_ap . "\r\n";
    
            // datos totales
            $datos = $datos3 . $datos4 . $datos2 . $datos1;
            print $datos;
        } else {
            print "NO HAY DATOS PARA MOSTRAR";
        }
    }
    
      
    public function exportar_us()
    {

        $mysql_datetime = date("Y-m-d H:i:s");

        $fecha1 = str_ireplace("-", " ", $mysql_datetime);
        $fecha2 = str_ireplace(":", " ", $fecha1);
        $fecha3 = str_ireplace(" ", "", $fecha2); //quito los simbolos para crear el nombre con la fecha
        // y no confundir los txt

        //nombre*********
        $nombre_archivo = "US" . $fecha3;

        $id_ips = $this->input->post('eps');
        $id_contrato = $this->input->post('idContrato');
        $fecha1 = $this->input->post('fecha1');
        $fecha2 = $this->input->post('fecha2');


        /*if ($id_ips == 0) {
            $data = $this->MRips->ver_by_fecha($fecha1, $fecha2);

            $diagnostico = $this->MRips->diagnosticoByIdCita($data[0]->idCita);
        } else {*/
            $data = $this->MRips->ver_citas_us($id_ips, $id_contrato, $fecha1, $fecha2);
        //}

        if ($nombre_archivo) {

            header('Content-type: text/plain');
            header("Content-Disposition: attachment; filename=\"$nombre_archivo.txt\"");

            if (sizeof($data) > 0) {
                foreach ($data as $d) {

                    list($anio, $mes, $dia) = explode("-", $d->pacFecNacimiento);
                    $anio_dif = date("Y") - $anio;
                    $mes_dif = date("m") - $mes;
                    $dia_dif = date("d") - $dia;

                    if ($dia_dif < 0 || $mes_dif < 0) {
                        $anio_dif--;
                        //return $anio_dif;
                    }

                    $sexo = ($d->pacSexo == 'F') ? 2 : 1;

                    $datos = "CC," . $d->pacDocumento . ",ESS062,2," . $d->pacApellido . "," .  $d->pacApellido2 . "," . $d->pacNombre . "," . $d->pacNombre2 . "," . $anio_dif . ",". $sexo ."," . $d->pacSexo . "," . $d->depto_residencia . "," . $d->municipio_residencia . "," . $d->zr_nom_abreviacion . " \r\n";

                    print $datos;
                }
            } else {

                $datos = "NO HAY DATOS PARA MOSTRAR";
                print $datos;
            }
        }
    }
}
