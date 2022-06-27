<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class TugasTambahanController extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->database();
    }

	public function index()
	{
		$this->db->select('*');
		$this->db->from('tb_job');
		$this->db->join('tb_jabatan', 'tb_job.id_jabatan=tb_jabatan.id_jabatan');
		$this->db->join('tb_jn_job', 'tb_job.id_jn_job=tb_jn_job.id_jn_job');
		$this->db->where('tb_jn_job.nama_jn_job', 'tambahan');
        $query = $this->db->get();
		echo json_encode($query->result());
	}
}
