<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MAgenda extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }

  public function guardar($datos)
  {
    $consulta = $this->db->insert('agenda', $datos);

    return $this->db->insert_id();
  }

  public function getAgenda($idUsuario, $ageFecha, $idProceso)
  {
    $consulta = $this->db->query("

      SELECT *

      FROM agenda AS a
      INNER JOIN usuario AS u ON u.idUsuario = a.usuario_idUsuario
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
      INNER JOIN sede AS s ON s.idSede = a.sede_idSede
      INNER JOIN brigada AS b ON b.idBrigada = a.brigada_idBrigada
      WHERE

      a.proceso_idProceso = '" . $idProceso . "' AND  
      a.usuario_idUsuario = '" . $idUsuario . "' AND 
      a.ageFecha = '" . $ageFecha . "'
      ");
    return $consulta->result();
  }

  public function informacion_cita($idProceso, $idUsuario, $fechaInit)
  {
    $consulta = $this->db->query("

      SELECT * FROM  cita AS c
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario

      WHERE

      c.citEstado != 'CANCELADO' AND
      p.idProceso = '" . $idProceso . "' AND
      u.idUsuario =  '" . $idUsuario . "' AND 
      c.citFechaInicio =  '" . $fechaInit . "'
      ");

    if ($consulta->num_rows() > 0) {

      return $consulta->result();
    } else {

      return 0;
    }
  }

  public function getAgendaByid($idAgenda)
  {
    $consulta = $this->db->query("

      SELECT *

      FROM agenda AS a
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso

      WHERE

      a.idAgenda = $idAgenda ");

    return $consulta->result();
  }

  public function eliminar($idAgenda) {
    $consulta = $this->db->query("DELETE FROM agenda WHERE idAgenda=$idAgenda");
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }



  function get_campos_agenda()
  {
    $result = $this->db->list_fields('agenda');


    return $result;

  }

  public function ver_agenda_by_fecha($fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM agenda AS a

      WHERE
      a.ageFecha BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'
      ");

    return $consulta->result();
  }
}
