<?php

defined('BASEPATH') or exit('No direct script access allowed');
// This is the part of the user's profile where they can change their password and information referenced to the user ...
class CPerfil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MUsuario");
    }

    public function index()
    {

        $data['title'] = 'IPS | EDITAR PERFIL';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["usuario"] = $this->MUsuario->recuperardatos($this->session->userdata('id_user'));

        $this->load->view("CPerfil/VEditar", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function index_($tipo)
    {

        if ($tipo == 'actualizar') {
            $data['tipmsg'] = 'success';
            $data['msg'] = '<strong>Excelente! </strong>cambios guardados!.';
        }

        $data['title'] = 'IPS | EDITAR PERFIL';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CPlantilla/VHeader", $data);

        $datos["usuario"] = $this->MUsuario->recuperardatos($this->session->userdata('id_user'));

        $this->load->view("CPerfil/VEditar", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function Editar()
    {

        $usuDocumento = $this->input->post('documento');
        $usuNombre = $this->input->post('nombre');
        $usuApellido = $this->input->post('apellido');
        $usuTelefono = $this->input->post('telefono');
        $usuCorreo = $this->input->post('correo');
        $usuLogin = $this->input->post('login');
        $usuClave = $this->input->post('pwd');


        $datos = array(
            'usuDocumento' => $usuDocumento,
            'usuNombre' => $usuNombre,
            'usuApellido' => $usuApellido,
            'usuTelefono' => $usuTelefono,
            'usuCorreo' => $usuCorreo,
            'usuLogin' => $usuLogin,
            'usuClave' => $usuClave
        );

        $this->MUsuario->actualizardatos($datos, $this->session->userdata('id_user'));

        redirect(base_url("index.php/CPerfil/index_/actualizar"));
    }
}
