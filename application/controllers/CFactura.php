<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CFactura extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MHistorial");
        $this->load->model("MFactura");
        $this->load->model("MContrato");
        $this->load->model("MPaciente");
        $this->load->model("MCita");
        $this->load->model("MFactura_cup");
    }
    // this part is to bill for medical appointments attended there is all its logic

    public function index()
    {

        $data['title'] = 'IPS | PROCEDIMIENTOS PENDIENTES POR FACTURAR';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CFactura/VListar.php");

        $this->load->view("CPlantilla/VFooter");
    }

    public function factura_sin_agendamiento()
    {

        $data['title'] = 'IPS | PROCEDIMIENTOS PARA FACTURAR DE PACIENTES SIN AGENDAMIENTO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CFactura/VListar_Sin_Agendar.php");

        $this->load->view("CPlantilla/VFooter");
    }

    public function buscar_paciente()
    {

        $pacDocumento = $this->input->post('documento');

        $data = $this->MFactura->getPaciente1($pacDocumento);
        //print_r($data);

        echo "<table class='table table-bordered'>";
        if (sizeof($data) > 0) {
            echo "<tr>";
            echo "<td>Fecha Cita</td>";
            echo "<td>Documento</td>";
            echo "<td>Paciente</td>";
            echo "<td>Servicio</td>";
            echo "<td>Profesional</td>";
            echo "<td>EPS</td>";
            echo "<td>Facturar</td>";
            echo "</tr>";
            echo "<tbody>";
            foreach ($data as $d) {
                echo "<tr>";
                echo "<td>" . $d->citFechaInicio . "</td>";
                echo "<td>" . $d->pacDocumento . "</td>";
                echo "<td>" . $d->pacNombre . " " . $d->pacApellido . "</td>";
                echo "<td>" . $d->cupNombre . "</td>";
                echo "<td>" . $d->usuNombre . " " . $d->usuApellido . "</td>";
                echo "<td>" . $d->empNombre . "</td>";
                echo "<td>";
                echo "<a class='btn btn-info' href='" . base_url('index.php/CFactura/agregar_factura/' . $d->idCita) . "'>Facturar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }

        echo "</table>";
    }

    public function buscar_paciente_facturar()
    {

        $pacDocumento = $this->input->post('documento');

        $data = $this->MFactura->getPaciente_sin_agendamiento($pacDocumento);
        //print_r($data);

        echo "<table class='table table-bordered'>";
        if (sizeof($data) > 0) {
            echo "<tr>";
            echo "<td>Documento</td>";
            echo "<td>Paciente</td>";
            echo "<td>EPS</td>";
            echo "<td>Facturar</td>";
            echo "</tr>";
            echo "<tbody>";
            foreach ($data as $d) {
                echo "<tr>";
                echo "<td>" . $d->pacDocumento . "</td>";
                echo "<td>" . $d->pacNombre . " " . $d->pacApellido . "</td>";
                echo "<td>" . $d->empNombre . "</td>";
                echo "<td>";
                echo "<a class='btn btn-link' href='" . base_url('index.php/CFactura/agregar_factura_sin_agenda/' . $d->idPaciente) . "'>Facturar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }

        echo "</table>";
    }

    public function agregar_factura($idCita)
    {
        $data['title'] = 'IPS | FACTURAR';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $paciente = $this->MFactura->get_data_paciente($idCita);

        $idEmpresa = $paciente[0]->idEmpresa;

        $datos['paciente'] = $paciente;
        $datos["contrato"] = $this->MContrato->get_data_contrato($idEmpresa);

        $this->load->view("CFactura/VFacturar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function agregar_factura_sin_agenda($idPaciente)
    {
        $data['title'] = 'IPS | FACTURAR';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $paciente = $this->MPaciente->recuperardatos($idPaciente);

        $idEmpresa = $paciente[0]->idEmpresa;

        $datos['paciente'] = $paciente;
        $datos["contrato"] = $this->MContrato->get_data_contrato($idEmpresa);

        $this->load->view("CFactura/VFacturar_Sin_Agenda.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function detalle_contrato()

    {

        $idContrato = $this->input->post('idContrato');

        $contrato = $this->MContrato->detalle_contrato($idContrato);

        //print_r($contrato);

        if ($contrato != false) {
            echo json_encode($contrato);
        }
    }

    public function guardar_factura()

    {
        $idCita = $this->input->post('cita');

        $idPaciente = $this->input->post('idPaciente');
        $idCups = $this->input->post('idCups');
        

        $datos = array(
            'paciente_idPaciente' => $idPaciente,
            'cita_idCita' => $idCita,
            'contrato_idContrato' => $this->input->post('contrato'),
            'facFecha' => date("Y-m-d", time()),
            'facCopago' => $this->input->post('copago'),
            'facComision' => $this->input->post('comision'),
            'facDescuento' => $this->input->post('descuento'),
            'facValorConsulta' => $this->input->post('valor'),
            'facSubTotal' => $this->input->post('total'),
            'facAutorizacion' => $this->input->post('autorizacion')

        );

        $estado = $this->MCita->info_cita($idCita);

        if ($estado[0]->citEstado == 'FINALIZADO') {
            $data = array(
                'citEstado' => 'FINALIZADO Y FACTURADO',
            );
        } else {

            $data = array(
                'citEstado' => 'FACTURADO',
            );
        }

        $this->MFactura->actualizar_estado_cita($data, $idCita);

        $idFactura = $this->MFactura->guardar($datos);


        $datos_cups = array(
            'factura_idFactura' => $idFactura,
            'cups_idCups' => $idCups,
            'tarifa' => $this->input->post('valor')
        );

        $this->MFactura_cup->guardar($datos_cups);

        redirect(base_url("index.php/CFactura/imprimir/" . $idFactura));
    }

    public function imprimir($idFactura)
    {

        $data['title'] = 'IPS | IMPRIMIO: '.$this->session->userdata('nom_user');

        $this->load->view("CPlantilla/VHead", $data);

        $datos["datos_factura"] = $this->MFactura->verPorIdFactura($idFactura);

        $this->load->view("CFactura/VImprimir.php", $datos);
    }

    public function imprimir_servicio($idFactura)
    {

        $data['title'] = 'IPS | IMPRIMIO: '.$this->session->userdata('nom_user');

        $this->load->view("CPlantilla/VHead", $data);

        $datos["datos_factura"] = $this->MFactura->verPorIdFacturaServicio1($idFactura);

        $this->load->view("CFactura/VImprimir_Servicio.php", $datos);
    }

    public function guardar_factura_sin_agenda()

    {

        $idCups = $this->input->post('idCups');

        $contrato = $this->input->post('contrato');
        $copago = $this->input->post('copago');
        $comision = $this->input->post('comision');
        $descuento = $this->input->post('descuento');
        $valor = $this->input->post('valor');
        $total = $this->input->post('total');
        $autorizacion = $this->input->post('autorizacion');
        $cantidad = $this->input->post('cantidad');
        $idPaciente = $this->input->post('idPaciente');


        $datos = array(
            'paciente_idPaciente' => $idPaciente,
            'contrato_idContrato' => $contrato,
            'facFecha' => date("Y-m-d", time()),
            'facCopago' => $copago,
            'facComision' => $comision,
            'facDescuento' => $descuento,
            'facValorConsulta' => $valor,
            'facSubTotal' => $total,
            'facAutorizacion' => $autorizacion,
            'facSubTotal' => $total,
            'facCantidad' => $cantidad


        );

        $idFactura = $this->MFactura->guardar($datos);


        $datos_cups = array(
            'factura_idFactura' => $idFactura,
            'cups_idCups' => $idCups,
            'tarifa' => $valor
        );

        $this->MFactura_cup->guardar($datos_cups);

        print_r($idFactura);

        //redirect(base_url("index.php/CFactura/imprimir_servicio/" . $idFactura));
    }

    public function refacturar_paciente()
    {

        $data['title'] = 'IPS | REFACTURAR';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CFactura/VRefacturar.php");

        $this->load->view("CPlantilla/VFooter");
    }

    public function buscar_paciente_refacturar()
    {
        $pacDocumento = $this->input->post('documento');

        $data = $this->MFactura->getFactuarByDoc($pacDocumento);
        //print_r($data);

        echo "<table class='table table-bordered'>";
        if (sizeof($data) > 0) {
            echo "<tr>";
            echo "<td>Fecha</td>";
            echo "<td>Eps</td>";
            echo "<td>Facturar</td>";
            echo "</tr>";
            echo "<tbody>";
            foreach ($data as $d) {
                echo "<tr>";
                echo "<td>" . $d->facFecha . "</td>";
                echo "<td>" . $d->empNombre . "</td>";
                echo "<td>";
                echo "<a class='btn btn-link' href='" . base_url('index.php/CFactura/editar_factura/' . $d->idFactura) . "'>Edirtar facturar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }

        echo "</table>";
    }

    public function editar_factura($idFactura)
    {
        $data['title'] = 'IPS | REFACTURAR';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");


        $factura = $this->MFactura->info_refacturar($idFactura);


        $datos['factura'] = $factura;
        $datos["contrato"] = $this->MContrato->get_data_contrato($factura[0]->empresa_idEmpresa);

        if ($factura[0]->cita_idCita == '' || $factura[0]->cita_idCita == 'NULL' || $factura[0]->cita_idCita == 'null') {

            $datos["cita"] = 'NULL';
            
        }else{

            $datos["cita"] = $this->MCita->info_cita($factura[0]->cita_idCita);

        }

        $this->load->view("CFactura/VRefacturarEditar", $datos);

        $this->load->view("CPlantilla/VFooter");
    }


    public function refacturar()
    {
        $id = $this->input->post('id');
        $idPaciente = $this->input->post('idPaciente');
        $cita = $this->input->post('cita');
        $contrato = $this->input->post('contrato');
        $fecha = $this->input->post('fecha');
        $copago = $this->input->post('copago');
        $comision = $this->input->post('comision');
        $descuento = $this->input->post('descuento');
        $valor = $this->input->post('valor');
        $total = $this->input->post('total');
        $autorizacion = $this->input->post('autorizacion');
        $cantidad = $this->input->post('cantidad');

        $idFactura_cup = $this->input->post('idFactura_cup');
        $idCup = $this->input->post('idCup');
    
        $datos = array(
            'paciente_idPaciente' => $idPaciente,
            'cita_idCita' => $cita,
            'contrato_idContrato' => $contrato,
            'facFecha' => $fecha,
            'facCopago' => $copago,
            'facComision' => $comision,
            'facDescuento' => $descuento,
            'facValorConsulta' => $valor,
            'facSubTotal' => $total,
            'facAutorizacion' => $autorizacion,
            'facCantidad' => $cantidad

        );


        $datos_factura_cup = array(
            'factura_idFactura' => $id,
            'cups_idCups' => $idCup,
            'tarifa' => $valor,
        );


        $this->MFactura->actualizardatos($id, $datos);

        $this->MFactura_cup->actualizardatos($idFactura_cup, $datos_factura_cup);

        redirect(base_url("index.php/CFactura/imprimir_refactura/" . $id));
    }

    public function imprimir_refactura($idFactura)
    {

        $data['title'] = 'IPS | IMPRIMIO: '.$this->session->userdata('nom_user');

        $this->load->view("CPlantilla/VHead", $data);

        $datos["datos_factura"] = $this->MFactura->verPorIdRefactura($idFactura);

        $this->load->view("CFactura/VImprimir_Refactura.php", $datos);
    }

}