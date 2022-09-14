<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianPegawaiController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	
		$data['dtkaryawan'] = $karyawan = $this->M_master->mdata_kr(); 
		
		$kualitas 			= $this->M_Kinerja->get_data_kinerja(array());

		$id_karyawan = $this->input->get('id_karyawan') != '' ? $this->input->get('id_karyawan') : $karyawan[0]->no_id;
		$bulan 		 = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");

		foreach($kualitas as $row){
			$wheredata = [
				'id_karyawan' => $id_karyawan,
				'id_kualitas_kerja' => $row->id_kualitas_kerja,
				'id_detil_kualitas' => $row->id,
				'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
			];

			$ambil = $this->M_Kinerja->get_one_kinerja_pegawai($wheredata);
			
			@$row->point_kinerja 	  = $ambil->point_kinerja;
			@$row->id_kinerja_pegawai = $ambil->id;

			## perhitungan kehadiran
			$hadir = $this->M_Kinerja->get_one_kehadiran(['a.id_absen' => $id_karyawan]);
			@$row->point_kehadiran = $hadir->persentase;

		}

		$data['kualitas'] 		= $kualitas;
		$data['menu']	   		= 'kinerja';
		$data['id_karyawan']	= $id_karyawan;
		$data['bulan']	   		= $bulan;
		$this->load->view('template/header', $data);
		$this->load->view('admin/penilaian', $data);
	}

	public function simpan()
    {

        $tanggal       		= $this->input->post('tanggal');
        $id_karyawan        = $this->input->post('id_karyawan');
        $id_detil_kualitas  = $this->input->post('id_detil_kualitas');
        $id_kualitas_kerja  = $this->input->post('id_kualitas_kerja');
        $id_kinerja_pegawai = $this->input->post('id_kinerja_pegawai');
        $point_kinerja    	= $this->input->post('point_kinerja');
        $isedit   		 	= $this->input->post('isedit');

		if($isedit != 'tambah'){
			foreach ($id_detil_kualitas as $key => $row) {
				$itemdata['id_karyawan']  = $id_karyawan;
				$itemdata['id_kualitas_kerja']  = $id_kualitas_kerja[$key];
				$itemdata['id_detil_kualitas']  = $row;
				$itemdata['point_kinerja']  = $point_kinerja[$key];
				$itemdata['grade']  = grade(array_sum($point_kinerja));
				$itemdata['tanggal']  = $tanggal;
				$itemdata['hasil']  = array_sum($point_kinerja);
				$result = $this->M_Kinerja->update($itemdata, ['id' => $id_kinerja_pegawai[$key]]);
			}

		}else{
			foreach ($id_detil_kualitas as $key => $row) {
				$itemdata['id_karyawan']  = $id_karyawan;
				$itemdata['id_kualitas_kerja']  = $id_kualitas_kerja[$key];
				$itemdata['id_detil_kualitas']  = $row;
				$itemdata['point_kinerja']  = $point_kinerja[$key];
				$itemdata['grade']  = grade(array_sum($point_kinerja));
				$itemdata['tanggal']  = $tanggal;
				$itemdata['hasil']  = array_sum($point_kinerja);
				$result = $this->M_Kinerja->insert($itemdata);
			}
		}

        if ($result) {
            echo json_encode([
                'status' => true,
                'msg'  => (@$isedit != 'tambah' ? "Berhasil Edit Data" : "Berhasil Menambah Data")
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'msg'  => (@$isedit != 'tambah' ? "Gagal Edit Data" : "Gagal Menambah Data")
            ]);
        }
    }

	public function cetak()
	{
		$this->load->library('Pdf');

		$kualitas 			= $this->M_Kinerja->get_data_kinerja(array());

		$id_karyawan = $this->input->get('id_karyawan') != '' ? $this->input->get('id_karyawan') : '';
		$bulan 		 = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");

		foreach($kualitas as $row){
			$wheredata = [
				'id_karyawan' => $id_karyawan,
				'id_kualitas_kerja' => $row->id_kualitas_kerja,
				'id_detil_kualitas' => $row->id,
				'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
			];

			$ambil = $this->M_Kinerja->get_one_kinerja_pegawai($wheredata);
			
			@$row->point_kinerja 	  = $ambil->point_kinerja;
			@$row->id_kinerja_pegawai = $ambil->id;
			@$row->grade 			  = $ambil->grade;
			@$row->hasil 			  = $ambil->hasil;

			## perhitungan kehadiran
			$hadir = $this->M_Kinerja->get_one_kehadiran(['a.id_absen' => $id_karyawan]);
			@$row->point_kehadiran = $hadir->persentase;

		}

		$data['kualitas'] 		= $kualitas;
		$data['bulan'] 			= $bulan;
		$data['karyawan'] 		= $this->M_Kinerja->get_one_karyawan(['no_id' => $id_karyawan]);
		$this->load->view('admin/penilaian_cetak', $data);
	}
}