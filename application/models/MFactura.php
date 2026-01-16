<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MFactura extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
  // This is the functionality as it is saved to generate the invoices for the appointments attended
  public function getPaciente1($pacDocumento)
  {
    $consulta = $this->db->query("

      SELECT * FROM  cita AS c

      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario

      WHERE

      (c.citEstado = 'PROGRAMADO' OR
      c.citEstado = 'FINALIZADO') AND
      pac.pacDocumento = '" . $pacDocumento . "'

      ");
    return $consulta->result();
  }

  public function getPaciente($pacDocumento)
  {
    $consulta = $this->db->query("

      SELECT * FROM  cita AS c

      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario

      WHERE
      c.citEstado = 'PROGRAMADO' AND
      pac.pacDocumento = '" . $pacDocumento . "'

      ");
    return $consulta->result();
  }

  /*public function getPaciente_sin_agendamiento($pacDocumento)
  {
    $consulta = $this->db->query("

      SELECT * FROM  cita AS c

      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa

      WHERE
      pac.pacDocumento = '" . $pacDocumento . "'

      ");
    return $consulta->result();
  }*/

  public function getPaciente_sin_agendamiento($pacDocumento)
  {
    $consulta = $this->db->query("

     SELECT * FROM paciente AS pac
     INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
     WHERE
     pac.pacDocumento = '" . $pacDocumento . "'");

    return $consulta->result();
  }

  public function get_data_paciente($idCita)
  {
    $consulta = $this->db->query("

      SELECT * FROM  cita AS c
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN agenda AS a ON  a.idAgenda = c.agenda_idAgenda
      INNER JOIN usuario AS u ON  a.usuario_idUsuario = u.idUsuario 
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
      INNER JOIN departamento AS d ON d.idDepartamento  = pac.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio  = pac.municipio_residencia
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
      INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

      WHERE

      c.idCita = '" . $idCita . "'


      ");
    return $consulta->result();
  }

  public function guardar($datos)
  {
    $consulta = $this->db->insert('factura', $datos);


    return $this->db->insert_id();;
  }

  public function actualizar_estado_cita($estado_cita, $idCita)
  {
    $this->db->where('idCita', $idCita);
    $consulta = $this->db->update('cita', $estado_cita);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function verPorIdFactura($idFactura)
  {

    $consulta = $this->db->query("

     SELECT p.proNombre, u.usuNombre, u.usuApellido, u.usuRegistroProfesional, emp.empNit, emp.empNombre, con.conNumero , pac.pacDocumento, pac.pacNombre, pac.pacApellido, pac.pacFecNacimiento, pac.pacSexo, pac.pacTelefono, r.regNombre, ta.tipNombre, cu.cupCodigo, cu.cupNombre, cc.cupTarifa, f.facCopago 
     , usu.usuNombre AS nombre_agendo_cita, usu.usuApellido AS apellido_agendo_cita FROM factura AS f
     INNER JOIN cita AS c ON c.idCita = f.cita_idCita
     INNER JOIN agenda AS a ON a.idAgenda = c.agenda_idAgenda
     INNER JOIN proceso AS p ON p.idProceso = a.proceso_idProceso
     INNER JOIN usuario AS u ON u.idUsuario = a.usuario_idUsuario
     INNER JOIN usuario AS usu ON usu.idUsuario = c.usu_creo_cita
     INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
     INNER JOIN cups AS cu ON cu.idCups = cc.cups_idCups
     INNER JOIN contrato AS con ON con.idContrato = cc.contrato_idContrato
     INNER JOIN empresa AS emp ON emp.idEmpresa = con.empresa_idEmpresa
     INNER JOIN paciente AS pac ON pac.idPaciente = f.paciente_idPaciente
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

     WHERE

     f.idFactura = '" . $idFactura . "'");

    return $consulta->result();
  }
  public function verPorIdFacturaServicio($idFactura)
  {

    $consulta = $this->db->query("

     SELECT * FROM factura AS f
     INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = f.contrato_idContrato
     INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
     INNER JOIN contrato AS c ON c.idContrato = cc.contrato_idContrato
     INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa
     INNER JOIN paciente AS pac ON pac.empresa_idEmpresa = e.idEmpresa
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

     WHERE

     f.idFactura = '" . $idFactura . "'");

    return $consulta->result();
  }

   public function verPorIdFacturaServicio1($idFactura)
  {

    $consulta = $this->db->query("

     SELECT * FROM factura AS f

     INNER JOIN factura_cup AS fc ON fc.factura_idFactura = f.idFactura
     INNER JOIN cups AS cup ON cup.idCups = fc.cups_idCups
     INNER JOIN contrato AS c ON c.idContrato = f.contrato_idContrato
     INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa
     INNER JOIN paciente AS pac ON pac.idPaciente = f.paciente_idPaciente
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

     WHERE

     f.idFactura = '" . $idFactura . "'");

    return $consulta->result();
  }

  public function getFactuarByDoc($pacDocumento)
  {

    $consulta = $this->db->query("

     SELECT * FROM factura AS f
       
     INNER JOIN paciente AS pac ON pac.idPaciente = f.paciente_idPaciente
     INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

     WHERE

     pac.pacDocumento = '" . $pacDocumento . "'");

    return $consulta->result();
  }


   public function info_refacturar($idFactura)
  {

    $consulta = $this->db->query("

     SELECT * FROM factura AS f
 
     INNER JOIN factura_cup AS fc ON fc.factura_idFactura = f.idFactura
     INNER JOIN cups AS cup ON cup.idCups = fc.cups_idCups
     INNER JOIN contrato AS c ON c.idContrato = f.contrato_idContrato
     INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa
     INNER JOIN paciente AS pac ON pac.idPaciente = f.paciente_idPaciente
     INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
     INNER JOIN departamento AS d ON d.idDepartamento  = pac.depto_residencia
     INNER JOIN municipio AS m ON m.idMunicipio  = pac.municipio_residencia
     INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

    
     WHERE

     f.idFactura = '" . $idFactura . "'");

    return $consulta->result();
  }

  public function actualizardatos($id, $datos)
  {
    $this->db->where('idFactura', $id);
    $consulta = $this->db->update('factura', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }


   public function verPorIdRefactura($idFactura)
  {

    $consulta = $this->db->query("

     SELECT * FROM factura AS f

     INNER JOIN factura_cup AS fc ON fc.factura_idFactura = f.idFactura
     INNER JOIN cups AS cup ON cup.idCups = fc.cups_idCups
     INNER JOIN contrato AS c ON c.idContrato = f.contrato_idContrato
     INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa
     INNER JOIN paciente AS pac ON pac.idPaciente = f.paciente_idPaciente
     INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
     INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion

     WHERE

     f.idFactura = '" . $idFactura . "'");

    return $consulta->result();
  }
}
