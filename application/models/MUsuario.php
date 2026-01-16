<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MUsuario extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
  // This is the function of obtaining to log in and depending on the role the menu is displayed
  function obtenerUsuarioPorLogin($login, $pwd)
  {

    $query = $this->db->join('rol d', 'u.rol_idRol = d.idRol');
    $query = $this->db->where('u.usuLogin', $login);
    $query = $this->db->where('u.usuClave', $pwd);
    $query = $this->db->get('usuario u');

    return $query->row();
  }
  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM usuario AS u
          INNER JOIN estado AS e ON e.idEstado = u.estado_idEstado
          INNER JOIN rol AS r ON r.idRol = u.rol_idRol");

    return $consulta->result();
  }
  public function eliminar($estado, $idUsuario)
  {
    $this->db->where('idUsuario', $idUsuario);
    $consulta = $this->db->update('usuario', $estado);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
  public function guardar($datos)
  {
    $consulta = $this->db->insert('usuario', $datos);

    if ($consulta) {
      return true;
    } else {
      return null;
    }
  }
  public function recuperardatos($idUsuario)
  {

    $consulta = $this->db->query("SELECT * FROM usuario WHERE idUsuario = $idUsuario");

    return $consulta->result();
  }
  public function actualizardatos($datos, $idUsuario)
  {
    $this->db->where('idUsuario', $idUsuario);
    $consulta = $this->db->update('usuario', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
  function ver_medico()
  {

    $records = $this->db->query("SELECT *

          FROM usuario AS u
          INNER JOIN estado AS e ON e.idEstado = u.estado_idEstado
          INNER JOIN rol AS r ON r.idRol = u.rol_idRol
          WHERE r.idRol = 2
          AND u.estado_idEstado = 1");

    $usuario = $records->result_array();
    return $usuario;
  }
}
