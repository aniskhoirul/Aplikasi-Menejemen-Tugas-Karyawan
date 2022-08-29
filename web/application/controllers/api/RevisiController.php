<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class RevisiController extends CI_Controller {
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

		$detail = $this->db->query("SELECT * FROM `tb_job` 
									INNER JOIN `tb_karyawan` ON tb_karyawan.no_id=tb_job.no_id 
									INNER JOIN `tb_detail_job` ON tb_job.id_job=tb_detail_job.id_job 
									INNER JOIN `tb_jn_job` ON tb_job.id_jn_job=tb_jn_job.id_jn_job 
									WHERE YEAR(tb_detail_job.waktu_mulai) = '$tahun' 
									AND MONTH(tb_detail_job.waktu_mulai) = '$bulan' 
									AND tb_job.no_id='$id_user' 
									AND tb_jn_job.nama_jn_job='revisi'
									")->result();
		echo json_encode($detail);
	}

	public function download()
	{
		$id = $this->input->get('id');

		$data = [
			'status' => 'true'
		];
		$this->db->where('id_detail', $id);
		$update = $this->db->update('tb_detail_job', $data);
		if ($update) {
			echo json_encode([
				'status' => 'success'
			]);
		} else {
			echo json_encode([
				'status' => 'error'
			]);
		}
	}

	public function store()
	{
		$config['upload_path'] = './assets/';
		$config['allowed_types'] = 'gif|jpg|pdf';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file_tugas_revisi")) {
			$data = array('upload_data' => $this->upload->data());
			$file = $data['upload_data']['file_name'];
			$data = array(
				'upload' => $file,
			);
			$this->db->where('id_detail', $this->input->post('id-tugas-revisi'));
			$update = $this->db->update('tb_detail_job', $data);
			if ($update) {
				return $this->output->set_content_type('application/json')
					->set_status_header(200)
					->set_output(json_encode([
						'status' => 'success',
						'message' => 'Data berhasil diupload'
					]));
			} else {
				return $this->output->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode([
						'status' => 'error',
						'message' => 'Data Gagal diupload',
					]));
			}
		} else {
			return $this->output->set_content_type('application/json')
				->set_status_header(500)
				->set_output(json_encode([
					'status' => 'error',
					'message' => $this->upload->display_errors()
				]));
		}
	}
}
