<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CContrato extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MContrato");
        $this->load->model("MEmpresa");
    }
    ///This is contract crud where you add, update, and delete company contracts
    public function index()
    {

        $data['title'] = 'IPS NUEVA | LISTAR CONTRATO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["empresa"] = $this->MEmpresa->ver();
        $datos["contrato"] = $this->MContrato->ver();

        $this->load->view("CContrato/VListar.php", $datos);

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


        $data['title'] = 'IPS NUEVA | LISTAR CONTRATO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CPlantilla/VHeader", $data);

        $datos["empresa"] = $this->MEmpresa->ver();
        $datos["contrato"] = $this->MContrato->ver();

        $this->load->view("CContrato/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function modRecuperar($idContrato)
    {

        $data['title'] = 'IPS NUEVA | LISTAR CONTRATO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["empresa"] = $this->MEmpresa->ver();
        $datos["contrato"] = $this->MContrato->recuperardatos($idContrato);

        $this->load->view("CContrato/VModificar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function agregar()
    {
        $conNumero = $this->input->post('numero');
        $conPlanBeneficio = $this->input->post('plan');
        $conPoliza = $this->input->post('poliza');
        $empresa_idEmpresa = $this->input->post('empresa');
        $conValor = $this->input->post('Valor');
        $conPorDescuento = $this->input->post('descuento');
        $conTipo = $this->input->post('tipo');
        $conFechaInicio = $this->input->post('fecha_inicio');
        $conFechaFin = $this->input->post('fecha_fin');
        $conDescripcion = $this->input->post('descripcion');
        $conCopago = $this->input->post('copago');

        $datos = array(
            'conNumero' => $conNumero,
            'conPlanBeneficio' => $conPlanBeneficio,
            'conPoliza' => $conPoliza,
            'empresa_idEmpresa' => $empresa_idEmpresa,
            'conValor' => $conValor,
            'conPorDescuento' => $conPorDescuento,
            'conTipo' => $conTipo,
            'conFechaInicio' => $conFechaInicio,
            'conFechaFin' => $conFechaFin,
            'conDescripcion' => $conDescripcion,
            'conFechaRegistro' => date("Y-m-d", time()),
            'conCopago' => $conCopago

        );

        $this->MContrato->guardar($datos);

        redirect(base_url("index.php/CContrato/index_/agregado"));
    }

    public function Editar()
    {
        $idContrato = $this->input->post('id');
        $conNumero = $this->input->post('numero');
        $conPlanBeneficio = $this->input->post('plan');
        $conPoliza = $this->input->post('poliza');
        $empresa_idEmpresa = $this->input->post('empresa');
        $conValor = $this->input->post('Valor');
        $conPorDescuento = $this->input->post('descuento');
        $conTipo = $this->input->post('tipo');
        $conFechaInicio = $this->input->post('fecha_inicio');
        $conFechaFin = $this->input->post('fecha_fin');
        $conDescripcion = $this->input->post('descripcion');
        $conCopago = $this->input->post('copago');
        $conEstado = $this->input->post('estado');

        $datos = array(
            'conNumero' => $conNumero,
            'conPlanBeneficio' => $conPlanBeneficio,
            'conPoliza' => $conPoliza,
            'empresa_idEmpresa' => $empresa_idEmpresa,
            'conValor' => $conValor,
            'conPorDescuento' => $conPorDescuento,
            'conTipo' => $conTipo,
            'conFechaInicio' => $conFechaInicio,
            'conFechaFin' => $conFechaFin,
            'conDescripcion' => $conDescripcion,
            'conEstado' => $conEstado,
            'conCopago' => $conCopago

        );

        $this->MContrato->actualizardatos($datos, $idContrato);

        redirect(base_url("index.php/CContrato/index_/actualizar"));
    }

    public function eliminar($idContrato)
    {
        $estado = array(
            'conEstado' => 'INACTIVO'
        );

        $this->MContrato->eliminar($estado, $idContrato);

        redirect(base_url("index.php/CContrato/index_/eliminado"));
    }
}
