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
		$id_user = $this->input->get('no_id');
		$tahun = $this->input->get('tahun');
		$bulan = $this->input->get('bulan');

		$this->db->select('*');
		$this->db->from('tb_job');
		$this->db->join('tb_karyawan', 'tb_job.no_id=tb_karyawan.no_id');
		$this->db->join('tb_jn_job', 'tb_job.id_jn_job=tb_jn_job.id_jn_job');
		$this->db->join('tb_detail_job', 'tb_job.id_job=tb_detail_job.id_job');
		$this->db->where('tb_job.no_id', $id_user);
		$this->db->where('tb_jn_job.nama_jn_job', 'tambahan');
		$query = $this->db->get();

		$detail = $this->db->query('SELECT * FROM `tb_job` INNER JOIN `tb_karyawan` ON tb_karyawan.no_id=tb_job.no_id INNER JOIN `tb_detail_job` ON tb_job.id_job=tb_detail_job.id_job WHERE YEAR(waktu_mulai) = '.$tahun.' AND MONTH(waktu_mulai) = '.$bulan.'')->result();
		echo json_encode($detail);
	}
}
