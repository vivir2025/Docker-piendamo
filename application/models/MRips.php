<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MRips extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }

  public function servicios($fecha1, $fecha2)
  {
      $consulta = $this->db->query("
          SELECT 
            p.pacDocumento, 
            f.facFecha, 
            cup.cupCodigo
          FROM 
            factura AS f
          LEFT JOIN 
            paciente AS p ON p.idPaciente = f.paciente_idPaciente
          LEFT JOIN 
            cita AS c ON c.idCita = f.cita_idCita
          LEFT JOIN 
            factura_cup AS fc ON fc.factura_idFactura = f.idFactura
          LEFT JOIN 
            cups AS cup ON cup.idCups = fc.cups_idCups
          WHERE
            f.facFecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'
      ");
  
      return $consulta->result();
  }



  public function ver_citas_finalizadas($id_ips, $id_contrato, $fecha1, $fecha2)
{
    $sql = "
        SELECT c.idCita, c.citFecha, p.pacDocumento, cup.cupCodigo, 
               e.idEmpresa, contra.idContrato, p.idPaciente, p.empresa_idEmpresa,
               d.diaCodigo AS diagnostico_principal
        FROM cita AS c
        INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
        INNER JOIN contrato AS contra ON contra.idContrato = cc.contrato_idContrato
        INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
        INNER JOIN paciente AS p ON p.idPaciente = c.paciente_idPaciente
        INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
        LEFT JOIN hc AS h ON h.cita_idCita = c.idCita
        LEFT JOIN historia_diagnostico AS hd ON hd.historia_idHistoria = h.id_hc
        LEFT JOIN diagnostico AS d ON d.idDiagnostico = hd.diagnostico_idDiagnostico
        WHERE c.citEstado = 'FINALIZADO'
        AND e.idEmpresa = ?
        AND contra.idContrato = ?
        AND c.citFecha BETWEEN ? AND ?
    ";

    $consulta = $this->db->query($sql, [$id_ips, $id_contrato, $fecha1, $fecha2]);
    return $consulta->result();
}
public function ver_citas_us($id_ips, $id_contrato, $fecha1, $fecha2)
{
    $sql = "
        SELECT 
            e.idEmpresa, 
            p.pacDocumento, 
            p.pacApellido, 
            p.pacApellido2, 
            p.pacNombre, 
            p.pacNombre2, 
            p.pacFecNacimiento, 
            p.pacSexo, 
            p.depto_residencia, 
            p.municipio_residencia, 
            zr.zr_nom_abreviacion 
        FROM cita AS c
        INNER JOIN paciente AS p ON p.idPaciente = c.paciente_idPaciente
        INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
        INNER JOIN zona_residencial AS zr ON zr.zona_residencial = p.id_zona_residencia
        INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
        INNER JOIN contrato AS contra ON contra.idContrato = cc.contrato_idContrato
        WHERE c.citEstado = 'FINALIZADO'
        AND c.citFecha BETWEEN ? AND ?
    ";

    // Condicionalmente agregar filtros si se proporcionan valores
    $params = [$fecha1, $fecha2];

    if (!empty($id_ips)) {
        $sql .= " AND e.idEmpresa = ?";
        $params[] = $id_ips;
    }

    if (!empty($id_contrato)) {
        $sql .= " AND contra.idContrato = ?";
        $params[] = $id_contrato;
    }

    $sql .= " GROUP BY p.pacDocumento";

    $consulta = $this->db->query($sql, $params);
    return $consulta->result();
}



  public function ver_by_empresa($id_ips, $id_contrato, $fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM factura AS f
      INNER JOIN cita AS c ON c.idCita = f.cita_idCita
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN contrato AS contra ON contra.idContrato = cc.contrato_idContrato
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS p ON p.idPaciente = c.paciente_idPaciente
      INNER JOIN departamento AS d ON d.idDepartamento  = p.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio  = p.municipio_residencia
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = p.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = p.regimen_idRegimen
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = p.pacTipDocumento
      INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa


      WHERE
      (c.citEstado = 'FINALIZADO Y FACTURADO' OR c.citEstado = 'FINALIZADO')
      AND
      e.idEmpresa = '" . $id_ips . "' AND
      contra.idContrato =  '" . $id_contrato . "' AND
      c.citFecha BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'
      ");

    return $consulta->result();
  }

  public function ver_by_empresa_us($id_ips, $id_contrato, $fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM factura AS f
      INNER JOIN cita AS c ON c.idCita = f.cita_idCita
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN contrato AS contra ON contra.idContrato = cc.contrato_idContrato
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS p ON p.idPaciente = c.paciente_idPaciente
      INNER JOIN departamento AS d ON d.idDepartamento  = p.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio  = p.municipio_residencia
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = p.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = p.regimen_idRegimen
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = p.pacTipDocumento
      INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa


      WHERE
      c.citEstado = 'FINALIZADO' AND
      e.idEmpresa = '" . $id_ips . "' AND
      contra.idContrato =  '" . $id_contrato . "' AND
      c.citFecha BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'
      group BY p.pacDocumento
      ");

    return $consulta->result();
  }

  public function ver_by_fecha($fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM factura AS f
      INNER JOIN cita AS c ON c.idCita = f.cita_idCita
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN contrato AS contra ON contra.idContrato = cc.contrato_idContrato
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN paciente AS p ON p.idPaciente = c.paciente_idPaciente
      INNER JOIN departamento AS d ON d.idDepartamento  = p.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio  = p.municipio_residencia
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = p.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = p.regimen_idRegimen
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = p.pacTipDocumento
      INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa


      WHERE
      c.citEstado = 'FINALIZADO Y FACTURADO' AND 
      c.citFecha BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'
      ");

    return $consulta->result();
  }

  public function diagnosticoByIdCita($idCita)
{
    $sql = "
        SELECT d.diaCodigo
        FROM historia_diagnostico AS hd
        INNER JOIN diagnostico AS d ON d.idDiagnostico = hd.diagnostico_idDiagnostico
        WHERE hd.historia_idHistoria IN (
            SELECT id_hc FROM hc WHERE cita_idCita = ?
        )
    ";

    $consulta = $this->db->query($sql, [$idCita]);
    return $consulta->result();
}


public function ver_labora($fecha1, $fecha2) {
  $sql = "SELECT * FROM hcs_paraclinico 
          WHERE STR_TO_DATE(fecha, '%d/%m/%Y') 
          BETWEEN ? AND ?";
  return $this->db->query($sql, [$fecha1, $fecha2])->result();
}


}
