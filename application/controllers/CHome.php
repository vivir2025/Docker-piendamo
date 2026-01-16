<?php

defined('BASEPATH') or exit('No direct script access allowed');
// This part where the menu bar calls us on the home page ...
class CHome extends CI_Controller
{

    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();
        $this->load->helper("url");
    }

    public function index()
    {

        $data['title'] = 'IPS | PANEL DE CONTROL';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CHome/VHome.php");

        $this->load->view("CPlantilla/VFooter");
    }
}
