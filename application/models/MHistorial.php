<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MHistorial extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
  // This part entails listing the patients
  // ' histories according to their terminated
  //  canceled status and the others and lists the users'
  //   dissents by document number
   public function getPacientexdoc($pacDocumento)
  {
    $consulta = $this->db->query("

      SELECT * FROM hc AS hc

      INNER JOIN cita AS c ON c.idCita = hc.cita_idCita
      INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
      INNER JOIN paciente AS pac ON pac.idPaciente = c.paciente_idPaciente
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN categoria_cups AS ccups ON ccups.id_cat_cups = cc.id_categoria_cups
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario

      WHERE 
      (c.citEstado = 'FINALIZADO' OR
      c.citEstado = 'FINALIZADO Y FACTURADO') AND
      pac.pacDocumento = '" . $pacDocumento . "' 
      ORDER BY c.citFechaInicio DESC

      ");
    return $consulta->result();
  }
  public function getPacientexdocDesentimiento($pacDocumento)
  {
      $consulta = $this->db->query("
          SELECT *
          FROM desentimiento AS de
          WHERE de.identificacion = '" . $pacDocumento . "'
          ORDER BY de.fecha DESC
      ");
      return $consulta->result();
  }
  public function getPacientexdocSoloVisitas($pacDocumento)
{
    $consulta = $this->db->query("
        SELECT *
        FROM hcs_visitas AS hv
        WHERE hv.identificacion = '" . $pacDocumento . "'
        ORDER BY hv.fecha DESC
    ");
    return $consulta->result();
}

  public function getInfoxidHc($id_hc)
  {
    $consulta = $this->db->query("

      SELECT * FROM hc AS hc

      INNER JOIN cita AS c ON c.idCita = hc.cita_idCita
      INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso

      WHERE 
      hc.id_hc = '" . $id_hc . "' 

      ");
    return $consulta->result();
  }


  public function getPaciente($pacDocumento)
  {
    $consulta = $this->db->query("

      SELECT * FROM hc AS hc

      INNER JOIN cita AS c ON c.idCita = hc.cita_idCita
      INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
      INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
      INNER JOIN paciente AS pac ON pac.idPaciente = c.paciente_idPaciente
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN categoria_cups AS ccups ON ccups.id_cat_cups = cc.id_categoria_cups
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario

      WHERE 
      pac.pacDocumento = '" . $pacDocumento . "' AND
      c.citEstado = 'FINALIZADO' OR
      c.citEstado = 'FINALIZADO Y FACTURADO'

      ");
    return $consulta->result();
  }
}
