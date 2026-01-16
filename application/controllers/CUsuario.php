<?php

defined('BASEPATH') or exit('No direct script access allowed');
// This is CRUD where it is updated adds deletes user information
class CUsuario extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MRol");
        $this->load->model("MEstado");
        $this->load->model("MUsuario");
        $this->load->model("MEspecialidad");
    }

    public function index()
    {

        $data['title'] = 'IPS | LISTAR USUARIO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["especialidad"] = $this->MEspecialidad->ver();
        $datos["estado"] = $this->MEstado->ver();
        $datos["rol"] = $this->MRol->ver();
        $datos["usuario"] = $this->MUsuario->ver();

        $this->load->view("CUsuario/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }
    public function index_($tipo)
    {

        if ($tipo == 'agregado') {
            $data['tipmsg'] = 'success';
            $data['msg'] = '<strong>Excelente! </strong>registro se añadido correctamente.';
        } elseif ($tipo == 'eliminado') {

            $data['tipmsg'] = 'danger';
            $data['msg'] =  '<strong>Bien! </strong>registro eliminado correctamente!.';
        } elseif ($tipo == 'actualizar') {
            $data['tipmsg'] = 'success';
            $data['msg'] = '<strong>Excelente! </strong>registro se actualizo correctamente.';

        }elseif ($tipo == 'campo_vacio') {
            $data['tipmsg'] = 'danger';
            $data['msg'] = '<strong>Error! </strong>registro no se guardo, por favor no deje campos vacios.';
        }

        $data['title'] = 'IPS | LISTAR USUARIO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CPlantilla/VHeader", $data);

        $datos["especialidad"] = $this->MEspecialidad->ver();
        $datos["estado"] = $this->MEstado->ver();
        $datos["rol"] = $this->MRol->ver();
        $datos["usuario"] = $this->MUsuario->ver();

        $this->load->view("CUsuario/VListar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }
    public function agregar()
    {

        $file_name = $_FILES['firma']['name'];
        $file_tmp = $_FILES['firma']['tmp_name'];
        $file_type = $_FILES['firma']['type'];


        $usuDocumento = $this->input->post('documento');
        $usuNombre = $this->input->post('nombre');
        $usuApellido = $this->input->post('apellido');
        $usuTelefono = $this->input->post('telefono');
        $usuCorreo = $this->input->post('correo');
        $rol_idRol = $this->input->post('rol');

        if ($rol_idRol == 2){

            $fp = fopen($file_tmp, 'r+b');
            $binario = fread($fp, filesize($file_tmp));
            fclose($fp);

            if ($this->input->post('especialidad') != "" && $this->input->post('resolucion') != "" && $binario != "") {

                $especialidad_idEspecialidad = $this->input->post('especialidad');
                $usuRegistroProfesional = $this->input->post('resolucion');

            } else {

                redirect(base_url("index.php/CUsuario/index_/campo_vacio"));
            }
        }else{

            $especialidad_idEspecialidad = NULL;
            $usuRegistroProfesional = NULL;
            $binario = NULL;

        }
        
        $usuLogin = $this->input->post('login');
        $usuClave = $this->input->post('pwd');



        $datos = array(
            'usuDocumento' => $usuDocumento,
            'usuNombre' => $usuNombre,
            'usuApellido' => $usuApellido,
            'usuTelefono' => $usuTelefono,
            'usuCorreo' => $usuCorreo,
            'rol_idRol' => $rol_idRol,
            'especialidad_idEspecialidad' => $especialidad_idEspecialidad,
            'usuRegistroProfesional' => $usuRegistroProfesional,
            'usuFirma' => $binario,
            /*'docArcNombre' => $file_name,
            'docTipArchivo' => $file_type,*/
            'usuLogin' => $usuLogin,
            'usuClave' => $usuClave,
            'estado_idEstado' => 1
        );

        $this->MUsuario->guardar($datos);
        //// //redirecciono la pagina a la url por defecto
        redirect(base_url("index.php/CUsuario/index_/agregado"));
    }

    public function modRecuperar($idUsuario)
    {

        $data['title'] = 'IPS | ACTUALIZAR USUARIO';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $datos["especialidad"] = $this->MEspecialidad->ver();
        $datos["estado"] = $this->MEstado->ver();
        $datos["rol"] = $this->MRol->ver();
        $datos["usuario"] = $this->MUsuario->recuperardatos($idUsuario);

        $this->load->view("CUsuario/VModificar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

    public function Editar()
    {

        $idUsuario = $this->input->post('id');
        $usuDocumento = $this->input->post('documento');
        $usuNombre = $this->input->post('nombre');
        $usuApellido = $this->input->post('apellido');
        $usuTelefono = $this->input->post('telefono');
        $usuCorreo = $this->input->post('correo');
        $rol_idRol = $this->input->post('rol');
        if ($this->input->post('especialidad') == '') {
            $especialidad_idEspecialidad = null;
        } else {
            $especialidad_idEspecialidad = $this->input->post('especialidad');
        }
        $usuRegistroProfesional = $this->input->post('resolucion');
        $usuLogin = $this->input->post('login');
        $usuClave = $this->input->post('pwd');
        $estado_idEstado = $this->input->post('estado');


        if($_FILES['firma']['size'] !=0)
        {
            $file_name = $_FILES['firma']['name'];
            $file_tmp = $_FILES['firma']['tmp_name'];
            $file_type = $_FILES['firma']['type'];

            $fp = fopen($file_tmp, 'r+b');
            $binario = fread($fp, filesize($file_tmp));
            fclose($fp);

            $data_image = array(
                'usuFirma' => $binario
            );

            $this->MUsuario->actualizardatos($data_image, $idUsuario);

        }

        $datos = array(
            'usuDocumento' => $usuDocumento,
            'usuNombre' => $usuNombre,
            'usuApellido' => $usuApellido,
            'usuTelefono' => $usuTelefono,
            'usuCorreo' => $usuCorreo,
            'rol_idRol' => $rol_idRol,
            'especialidad_idEspecialidad' => $especialidad_idEspecialidad,
            'usuRegistroProfesional' => $usuRegistroProfesional,
            'usuLogin' => $usuLogin,
            'usuClave' => $usuClave,
            'estado_idEstado' => $estado_idEstado
        );

        $this->MUsuario->actualizardatos($datos, $idUsuario);

        redirect(base_url("index.php/CUsuario/index_/actualizar"));
    }

    public function eliminar($idUsuario)
    {
        $estado = array(
            'estado_idEstado' => 2
        );

        $this->MUsuario->eliminar($estado, $idUsuario);

        redirect(base_url("index.php/CUsuario/index_/eliminado"));
    }
}
