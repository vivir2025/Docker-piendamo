<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MCita extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
  // It would be the CRUD functionality to update, save, delete, and list information about the patient from the table Appointment
  public function guardar($datos)
  {
    $consulta = $this->db->insert('cita', $datos);

    return $this->db->insert_id();
  }

  public function cancelar_cita($idCita, $datos)
  {
    $this->db->where('idCita', $idCita);
    $consulta = $this->db->update('cita', $datos);

    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function actualizardatos($data, $idCita)
  {
    $this->db->where('idCita', $idCita);
    $consulta = $this->db->update('cita', $data);

    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function ver_historial($idPaciente)
  {

    $consulta = $this->db->query("SELECT * FROM cita AS c
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN paciente AS pac ON pac.idPaciente = c.paciente_idPaciente
      INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
      INNER JOIN usuario AS u ON u.idUsuario = a.usuario_idUsuario

      WHERE c.paciente_idPaciente = $idPaciente");

    return $consulta->result();
  }

  public function info_cita($id)
  {

    $consulta = $this->db->query("SELECT * FROM cita AS c

      INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
      INNER JOIN usuario AS u ON u.idUsuario = a.usuario_idUsuario

      WHERE c.idCita = $id");

    return $consulta->result();
  }

  function get_campos_cita()
  {
    $result = $this->db->list_fields('cita');


    return $result;

  }

  public function ver_cita_by_fecha($fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM cita AS c

      WHERE
      c.citFecha BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'
      ");

    return $consulta->result();
  }
}
