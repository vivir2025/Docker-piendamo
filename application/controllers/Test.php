<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MCups");
    }

    public function index()
    {

        /*$data['title'] = 'IPS NUEVA | LISTAR CUPS';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");*/

        $cups = $this->MCups->ver_sql();


        print_r($cups);

        $this->load->view("CCups/VListar.php", $datos);

        //$this->load->view("CPlantilla/VFooter");
    }
}
