<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCups extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MCups");
    }

    // This code administers the contracted CUPS, allowing:
    // ✅ List them
    // ✅ Add new CUPS to a contract
    // ✅ Edit information
    // ✅ Delete (switch to inactive)
    // ✅ Search for CUPS by name or code

    public function index()
    {

        $data['title'] = 'IPS NUEVA | LISTAR CUPS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["cups"] = $this->MCups->ver();

        $this->load->view("CCups/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function index_($tipo)
    {

        if ($tipo == 'agregado') {
            $data['tipmsg'] = 'success';
            $data['msg'] = '<strong>Excelente! </strong>registro se añadido correctamente.';
        } elseif ($tipo == 'eliminado') {

            $data['tipmsg'] = 'danger';
            $data['msg'] = '<strong>Bien! </strong>registro eliminado correctamente!.';
        } elseif ($tipo == 'actualizar') {
            $data['tipmsg'] = 'success';
            $data['msg'] = '<strong>Excelente! </strong>registro se actualizo correctamente.';
        }

        $data['title'] = 'IPS NUEVA | LISTAR CUPS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CPlantilla/VHeader", $data);

        $datos["cups"] = $this->MCups->ver();

        $this->load->view("CCups/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function agregar()
    {
        $cupCodigo = $this->input->post('codigo');
        $cupNombre = $this->input->post('nombre');

        $datos = array(
            'cupCodigo' => $cupCodigo,
            'cupNombre' => $cupNombre
        );

        $this->MCups->guardar($datos);

        redirect(base_url("index.php/CCups/index_/agregado"));
    }

    public function modRecuperar($idCups)
    {

        $data['title'] = 'IPS | ACTUALIZAR CUPS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["cups"] = $this->MCups->recuperardatos($idCups);

        $this->load->view("CCups/VModificar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function Editar()
    {

        $idCups = $this->input->post('id');
        $cupCodigo = $this->input->post('codigo');
        $cupNombre = $this->input->post('nombre');

        $datos = array(
            'cupCodigo' => $cupCodigo,
            'cupNombre' => $cupNombre
        );

        $this->MCups->actualizardatos($datos, $idCups);

        redirect(base_url("index.php/CCups/index_/actualizar"));
    }

    public function eliminar($idCups)
    {
        $estado = array(
            'cupEstado' => 'INACTIVO'
        );

        $this->MCups->eliminar($estado, $idCups);

        redirect(base_url("index.php/CCups/index_/eliminado"));
    }
}
