<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MCups_Contratado extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
	// It would be the CRUD functionality to update, save, delete, and list information about the patient from the table cups_contratado
	public function ver($idContrato)
	{

		$consulta = $this->db->query("SELECT * FROM cups_contratado AS cc
			INNER JOIN categoria_cups AS cate_cups ON  cate_cups.id_cat_cups = cc.id_categoria_cups
			INNER JOIN cups AS c ON c.idCups = cc.cups_idCups
			WHERE cc.contrato_idContrato = $idContrato
			AND cc.cup_con_estado = 'ACTIVO'
			");

		return $consulta->result();
	}

	public function eliminar($estado, $id_cups_contrato)
	{
		$this->db->where('id_cups_contrato', $id_cups_contrato);
		$consulta = $this->db->update('cups_contratado', $estado);
		if ($consulta == true) {
			return true;
		} else {
			return false;
		}
	}
	public function recuperardatos($id_cups_contrato)

	{

		$consulta = $this->db->query("
			SELECT * FROM cups_contratado AS cc
			INNER JOIN contrato AS con ON con.idContrato = cc.contrato_idContrato
			INNER JOIN cups AS c ON c.idCups = cc.cups_idCups 

			WHERE id_cups_contrato = $id_cups_contrato");

		return $consulta->result();
	}

	public function actualizardatos($datos, $id_cups_contrato)
	{
		$this->db->where('id_cups_contrato', $id_cups_contrato);
		$consulta = $this->db->update('cups_contratado', $datos);


		if ($consulta == true) {
			return true;
		} else {
			return false;
		}
	}

	public function guardar($datos)
	{
		$consulta = $this->db->insert('cups_contratado', $datos);

		if ($consulta) {
			return true;
		} else {
			return null;
		}
	}

	public function getCupsByNombre($cupsNombre, $documento)
	{
		$consulta = $this->db->query("SELECT * FROM paciente AS p
          INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
          INNER JOIN contrato AS c ON c.empresa_idEmpresa = e.idEmpresa
          INNER JOIN cups_contratado AS cc ON cc.contrato_idContrato = c.idContrato
          INNER JOIN cups AS cp ON cp.idCups = cc.cups_idCups

          WHERE
          p.pacDocumento = '" . $documento . "' AND
          cp.cupNombre LIKE '%" . $cupsNombre . "%'
          ");

		return $consulta->result();
	}

	public function getCupsByCodigo($cupsCodigo, $documento)
	{
		$consulta = $this->db->query("SELECT * FROM paciente AS p
            INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
            INNER JOIN contrato AS c ON c.empresa_idEmpresa = e.idEmpresa
            INNER JOIN cups_contratado AS cc ON cc.contrato_idContrato = c.idContrato
            INNER JOIN cups AS cp ON cp.idCups = cc.cups_idCups

            WHERE
            p.pacDocumento = '" . $documento . "' AND
            cp.cupCodigo LIKE '" . $cupsCodigo . "%'


            ");
		return $consulta->result();
	}
	public function getCupsByCodigoContrato($cupsCodigo, $idContrato)
	{
		$consulta = $this->db->query("SELECT * FROM contrato AS c
            INNER JOIN cups_contratado AS cc ON cc.contrato_idContrato = c.idContrato
            INNER JOIN cups AS cp ON cp.idCups = cc.cups_idCups

            WHERE
            c.idContrato = '" . $idContrato . "' AND
            cp.cupCodigo LIKE '" . $cupsCodigo . "%'


            ");
		return $consulta->result();
	}

	public function getCupsByNombreContrato($cupsNombre, $idContrato)
	{
		$consulta = $this->db->query("SELECT * FROM contrato AS c
            INNER JOIN cups_contratado AS cc ON cc.contrato_idContrato = c.idContrato
            INNER JOIN cups AS cp ON cp.idCups = cc.cups_idCups

            WHERE
            c.idContrato = '" . $idContrato . "' AND
            cp.cupNombre LIKE '%" . $cupsNombre . "%'


            ");
		return $consulta->result();
	}
}
