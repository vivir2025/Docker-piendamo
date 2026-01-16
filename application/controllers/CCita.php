<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MPaciente");
        $this->load->model("MCita");
    }
    ///This is the functionality to add the appointments to the corresponding agendas
    public function index()
    {
        echo "Funcionalidad por defecto. No hay lógica implementada.";
        exit;
    }

    public function usuario_detalle()
    {
        // POST data
        $postData = $this->input->post();

        // get data
        $data = $this->MPaciente->get_paciente_detalle($postData);

        echo json_encode($data);
    }

    public function agregar()
    {
        $agenda_idAgenda = $this->input->post('idAgenda');
        $fecha_hora_inicio = $this->input->post('fecha_inicial');
        $fecha_hora_fin = $this->input->post('fecha_fin');
        $paciente_idPaciente = $this->input->post('id_paciente');
        $idCupsContratado = $this->input->post('cups_contratado');
        $citFechaDeseada = $this->input->post('fecha_deseada');
        $citNota = $this->input->post('nota');
        $citFecha = $this->input->post('ageFecha');
        $citPatologia = $this->input->post('patologia');

        $datos = array(
            'agenda_idAgenda' => $agenda_idAgenda,
            'citFechaInicio' => $fecha_hora_inicio,
            'citFechaFinal' => $fecha_hora_fin,
            'paciente_idPaciente' => $paciente_idPaciente,
            'idCupsContratado' => $idCupsContratado,
            'citFechaDeseada' => $citFechaDeseada,
            'citNota' => $citNota,
            'citEstado' => 'PROGRAMADO',
            'citFecha' => $citFecha,
            'citPatologia' => $citPatologia,
            'usu_creo_cita' => $this->session->userdata('id_user')
        );

        // print_r($datos);

        $cita = $this->MCita->guardar($datos);

        json_encode($cita);

        //redirect(base_url("index.php/CAgenda"));
    }

    public function cancelar()

    {
        $idCita = $this->input->post('idCita');
        $motivo = $this->input->post('motivo');

        $citMotivo =  "Motivo: " . $motivo . "// Cancelo: " . $this->session->userdata('nom_user') . "// Fecha: " . date("Y-m-d H:i:s", time());


        $datos = array(

            'citMotivo' => $citMotivo,
            'citEstado' => 'CANCELADO'

        );

        $cita = $this->MCita->cancelar_cita($idCita, $datos);

        json_encode($cita);
        //redirect(base_url("index.php/CAgenda"));
    }
}
