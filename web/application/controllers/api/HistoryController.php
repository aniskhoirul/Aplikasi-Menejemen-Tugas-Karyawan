<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class HistoryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->database();
    }

	public function index()
	{
		$id_user = $this->input->get('no_id');
        
        $detail = $this->db->query("SELECT * FROM `tb_job` 
									INNER JOIN `tb_karyawan` ON tb_karyawan.no_id=tb_job.no_id 
									INNER JOIN `tb_jn_job` ON tb_job.id_jn_job=tb_jn_job.id_jn_job
									AND tb_job.no_id='$id_user' ORDER BY tb_job.id_job DESC
									")->result();
		echo json_encode($detail);
	}

    public function show()
    {
        $id = $this->input->get('id');
        $detail = $this->db->query("SELECT * FROM `tb_job` 
									INNER JOIN `tb_karyawan` ON tb_karyawan.no_id=tb_job.no_id 
									INNER JOIN `tb_detail_job` ON tb_job.id_job=tb_detail_job.id_job 
									INNER JOIN `tb_jn_job` ON tb_job.id_jn_job=tb_jn_job.id_jn_job 
									AND tb_detail_job.id_job='$id'
									")->row();
		echo json_encode($detail);
    }
}