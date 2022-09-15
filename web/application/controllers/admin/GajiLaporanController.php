<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GajiLaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			if (!$this->session->userdata('role') == 'keuangan') {
				redirect('login');
			}
		}
	}

	public function index()
	{
        $karyawan = $this->db->select('*')->from('tb_karyawan')->get()->result();
        $bulan = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
        
        foreach ($karyawan as $row) {
            $wheredata = [
                'id_karyawan' => $row->no_id,
                'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
            ];

            $data_gaji = $this->db->select('*')->from('tb_dt_gaji')->join('tb_jn_gaji', 'tb_dt_gaji.id_jn=tb_jn_gaji.id_jn_gaji')->where($wheredata)->get()->result();

            @$row->total_gaji     = $data_gaji;
        }

        $data['bulan']          = $bulan;
        $data['dtkaryawan']     = $karyawan;
        // echo json_encode($karyawan);
		$this->load->view('template/header');
		$this->load->view('admin/laporangaji', $data);
    }

    public function cetak()
    {
        $this->load->library('Pdf');

        $karyawan = $this->db->select('*')->from('tb_karyawan')->get()->result();
        $bulan = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
        
        foreach ($karyawan as $row) {
            $wheredata = [
                'id_karyawan' => $row->no_id,
                'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
            ];

            $data_gaji = $this->db->select('*')->from('tb_dt_gaji')->join('tb_jn_gaji', 'tb_dt_gaji.id_jn=tb_jn_gaji.id_jn_gaji')->where($wheredata)->get()->result();

            @$row->total_gaji     = $data_gaji;
        }

        $data['bulan']          = $bulan;
        $data['dtkaryawan']     = $karyawan;
        $this->load->view('admin/laporan_penggajian_cetak', $data);
    }
}