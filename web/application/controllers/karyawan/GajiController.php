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
        $this->load->view('template/header');
        $this->load->view('karyawan/gaji');
    }

    public function json()
    {
        $this->db->select('*');
        $this->db->from('tb_jn_gaji');
        $this->db->join('tb_dt_gaji', 'tb_jn_gaji.id_jn_gaji=tb_dt_gaji.id_dt_gaji', 'left');
        $gaji = $this->db->get();
        
        $a = 1;
		$dtJSON = '{"data": [x]}';
		$dtisi = "";
		foreach ($gaji->result() as $k) {
			$nama_jn_gaji = $k->nama_jn_gaji;
			$nama_gaji = $k->nama_gaji;
			$nominal_gaji = $k->nominal_gaji;
			
			$dtisi .= '["' . $a++ . '","' . $nama_jn_gaji . '","' . $nama_gaji . '","Rp. ' . number_format($nominal_gaji) . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("x", $dtisifix, $dtJSON);
		echo $data;
    }
}
