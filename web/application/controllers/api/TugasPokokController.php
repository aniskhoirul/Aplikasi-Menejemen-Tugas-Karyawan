<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class TugasPokokController extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
		// $this->load->library('upload');
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
		$this->db->where('tb_jn_job.nama_jn_job', 'pokok');
		$query = $this->db->get();

		$detail = $this->db->query('SELECT * FROM `tb_job` INNER JOIN `tb_karyawan` ON tb_karyawan.no_id=tb_job.no_id INNER JOIN `tb_detail_job` ON tb_job.id_job=tb_detail_job.id_job WHERE YEAR(waktu_mulai) = '.$tahun.' AND MONTH(waktu_mulai) = '.$bulan.'')->result();
		echo json_encode($detail);
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
		$config['overwrite']= TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file_tugas_pokok")){
			$data = array('upload_data' => $this->upload->data());
			$file= $data['upload_data']['file_name'];
			$data = array(
				'upload'=> $file,
			);
			$this->db->where('id_detail', $this->input->post('id-tugas-pokok'));
			$update = $this->db->update('tb_detail_job', $data);
			if ($update) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Data berhasil diupload',
				]);
			}else{
				echo json_encode([
					'status' => 'error',
					'message' => 'Data Gagal diupload',
				]);
			}
		}else{
			echo json_encode([
				'status' => 'error',
				'message' => $this->upload->display_errors(),
			]);
		}

	
	}
   
}
