<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CEmpresa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");

        $this->load->model("MEmpresa");
        
    }
    // This code administers the contracted enterprise, allowing:
    // ✅ List them
    // ✅ Add new enterprise to a contract
    // ✅ Edit information
    // ✅ Delete (switch to inactive)
    // ✅ Search for enterprise by name or code
    public function index()
    {


        $data['title'] = 'IPS NUEVA | LISTAR EPS';


        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VHead");

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["empresa"] = $this->MEmpresa->ver();

        $this->load->view("CEmpresa/VListar.php", $datos);

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


        $data['title'] = 'IPS NUEVA | LISTAR EPS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CPlantilla/VHeader", $data);

        $datos["empresa"] = $this->MEmpresa->ver();

        $this->load->view("CEmpresa/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }


    public function agregar()
    {


        $empNit = $this->input->post('nit');
        $empCodigoEAPB = $this->input->post('codigo1');
        $empCodigo = $this->input->post('codigo2');
        $empNombre = $this->input->post('nombre');
        $empDireccion = $this->input->post('direccion');
        $empTelefono = $this->input->post('telefono');

        $datos = array(
            'empNit' => $empNit,
            'empCodigoEAPB' => $empCodigoEAPB,
            'empCodigo' => $empCodigo,
            'empNombre' => $empNombre,
            'empDireccion' => $empDireccion,
            'empTelefono' => $empTelefono

        );

        $this->MEmpresa->guardar($datos);

        redirect(base_url("index.php/CEmpresa/index_/agregado"));
    }

    public function modRecuperar($idEmpresa)
    {

        $data['title'] = 'IPS NUEVA | ACTUALIZAR EMPRESA';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");
        $this->load->view("CPlantilla/VHeader", $data);


        $param["empresa"] = $this->MEmpresa->recuperardatos($idEmpresa);

        $this->load->view("CEmpresa/VModificar.php", $param);

        $this->load->view("CPlantilla/VFooter");
    }

    public function Editar()
    {

        $idEmpresa = $this->input->post('id');
        $empNit = $this->input->post('nit');
        $empCodigoEAPB = $this->input->post('codigo1');
        $empCodigo = $this->input->post('codigo2');
        $empNombre = $this->input->post('nombre');
        $empDireccion = $this->input->post('direccion');
        $empTelefono = $this->input->post('telefono');

        $datos = array(
            'empNit' => $empNit,
            'empCodigoEAPB' => $empCodigoEAPB,
            'empCodigo' => $empCodigo,
            'empNombre' => $empNombre,
            'empDireccion' => $empDireccion,
            'empTelefono' => $empTelefono

        );


        $this->MEmpresa->actualizardatos($datos, $idEmpresa);

        redirect(base_url("index.php/CEmpresa/index_/actualizar"));
    }

    public function eliminar($idEmpresa)
    {
        $estado = array(
            'empEstado' => 'INACTIVO'
        );

        $this->MEmpresa->eliminar($estado, $idEmpresa);

        redirect(base_url("index.php/CEmpresa/index_/eliminado"));
    }
}
