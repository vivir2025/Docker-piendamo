<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CLogin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");

        $this->load->model("MUsuario");
    }


    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('CLogin/VLogin.php');
    }


    public function login()
    {

        $login = $this->input->post('log');
        $pwd = $this->input->post('pwd');
        //echo $login.' - '.$pwd; 

        $fila = $this->MUsuario->obtenerUsuarioPorLogin($login, $pwd);


        //echo print_r($fila[0]);


        if ($fila != null) {

            //Proceder a verificar clave
            if ($fila->usuClave == $pwd) {

                if ($fila->estado_idEstado != 1) { //Si no esta activo
                    //echo "bloqueado";
                    $data = [];
                    $data["msg"] = "Su usuario se encuentra bloqueado.";
                    $this->load->view('CLogin/Vlogin.php', $data);
                } else {

                    $data = array(
                        'rol_user' => $fila->rol_idRol,
                        'nom_rol' => $fila->rolNombre,
                        'id_user' => $fila->idUsuario,
                        'nom_user' => $fila->usuNombre . ' ' . $fila->usuApellido,
                        'login' => true //Login indica si se ha iniciado sesion correctamente
                    );
                    //echo print_r($data);

                    //Creacion de la variable de sesion
                    $this->session->set_userdata($data);

                    //Se redirecciona al usuario
                    redirect(base_url("index.php/CHome/"));
                }
            } else { //Clave no es correcta
                //echo "Credenciales de acceso incorrectas";
                $data = [];
                $data["msg"] = "El login y clave no coinciden. Por favor verifique.";
                $this->load->view('CLogin/Vlogin.php', $data);
            }
        } else { // Login no esta registrado en la BD
            //echo "Credenciales de acceso incorrectas";
            $data = [];
            $data["msg"] = "El login y clave no coinciden. Por favor verifique.";
            $this->load->view('CLogin/Vlogin.php', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
