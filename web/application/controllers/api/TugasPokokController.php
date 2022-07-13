<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class TugasPokokController extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->database();
    }

	public function index()
	{
		$id_user = $this->input->get('no_id');
		$this->db->select('*');
		$this->db->from('tb_job');
		$this->db->join('tb_karyawan', 'tb_job.no_id=tb_karyawan.no_id');
		$this->db->join('tb_jn_job', 'tb_job.id_jn_job=tb_jn_job.id_jn_job');
		$this->db->join('tb_detail_job', 'tb_job.id_job=tb_detail_job.id_job');
		$this->db->where('tb_job.no_id', $id_user);
		$this->db->where('tb_jn_job.nama_jn_job', 'pokok');
		$query = $this->db->get();
		echo json_encode($query->result());
	}

	public function show()
	{
		$id = $this->input->get('id');

		$this->db->select('*');
		$this->db->from('tb_detail_job');
		$this->db->join('tb_job', 'tb_detail_job.id_job=tb_job.id_job');
		$this->db->where('tb_detail_job.id_detail', $id);
		$query = $this->db->get();
		echo json_encode($query->row());
	}
   
}
