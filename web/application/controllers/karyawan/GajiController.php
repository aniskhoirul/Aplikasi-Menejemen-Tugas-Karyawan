<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GajiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('no_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['dtkaryawan'] = $karyawan = $this->M_master->mdata_kr();

		$bulan = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
		$id_karyawan = $this->input->get('id_karyawan') != '' ? $this->input->get('id_karyawan') : $karyawan[0]->no_id;

		$jenis_gaji = $this->db->select('*')->from('tb_jn_gaji')->get()->result();

		foreach ($jenis_gaji as $jenis) {
			$wheredata = [
				'id_karyawan' => $this->session->userdata('no_id'),
				'id_jn' => $jenis->id_jn_gaji,
				'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan,
			];
			$data_gaji = $this->db->select('*')
				->from('tb_dt_gaji')
				->join('tb_jn_gaji', 'tb_dt_gaji.id_jn=tb_jn_gaji.id_jn_gaji')
				->where($wheredata)
				->get()->row();

			@$jenis->id_dt_gaji = $data_gaji->id_dt_gaji;
			@$jenis->nama_jn_gaji;
			@$jenis->nominal_gaji = $data_gaji->nominal_gaji;
			@$jenis->nama_gaji = $data_gaji->nama_gaji;
		}


		$data['jenis_gaji'] = $jenis_gaji;
		$data['bulan']	   		= $bulan;
		$data['id_karyawan']	= $id_karyawan;

        $this->load->view('template/header');
        $this->load->view('karyawan/gaji', $data);
    }

    public function cetak()
    {
        $this->load->library('Pdf');

        $data['dtkaryawan'] = $karyawan = $this->M_master->mdata_kr();

		$bulan = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
		$id_karyawan = $this->input->get('id_karyawan') != '' ? $this->input->get('id_karyawan') : $karyawan[0]->no_id;

		$jenis_gaji = $this->db->select('*')->from('tb_jn_gaji')->get()->result();

		foreach ($jenis_gaji as $jenis) {
			$wheredata = [
				'id_karyawan' => $this->session->userdata('no_id'),
				'id_jn' => $jenis->id_jn_gaji,
				'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan,
			];
			$data_gaji = $this->db->select('*')
				->from('tb_dt_gaji')
				->join('tb_jn_gaji', 'tb_dt_gaji.id_jn=tb_jn_gaji.id_jn_gaji')
				->where($wheredata)
				->get()->row();

			@$jenis->id_dt_gaji = $data_gaji->id_dt_gaji;
			@$jenis->nama_jn_gaji;
			@$jenis->nominal_gaji = $data_gaji->nominal_gaji;
			@$jenis->nama_gaji = $data_gaji->nama_gaji;
		}


		$data['jenis_gaji'] = $jenis_gaji;
		$data['bulan']	   		= $bulan;
		$data['id_karyawan']	= $id_karyawan;

        $this->load->view('karyawan/gaji_cetak', $data);
    }
}
