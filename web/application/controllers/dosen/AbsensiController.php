<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AbsensiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nidn')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('template/header');
		$this->load->view('dosen/absensi');
    }

    public function json()
    {
        $this->db->select('*');
        $this->db->from('tb_absensi');
        $this->db->join('tb_jabatan', 'tb_absensi.id_jabatan=tb_jabatan.id_jabatan');
        $this->db->where('tb_jabatan.jabatan', $this->session->userdata('jabatan'));
        $absensi = $this->db->get();

        $a = 1;
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
        foreach ($absensi->result() as $k) {
            $jabatan = $k->jabatan;
            $jml_wajib = $k->jml_wajib;

            $tomboledit = "<a href='". base_url() ."dosen/absensi/show' class='btn btn-warning waves-effect waves-light'>Detail</a>";
            $dtisi .= '["' . $a++ . '","' . $jabatan . '","'.$jml_wajib.'","' . $tomboledit . '"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }

    public function show()
    {
        $this->load->view('template/header');
        $this->load->view('dosen/absensi_detail');
    }

    public function json_detail()
    {
        $this->db->select('*');
        $this->db->from('tb_absensi');
        $this->db->join('tb_jabatan', 'tb_absensi.id_jabatan=tb_jabatan.id_jabatan');
        $this->db->join('tb_dt_absensi', 'tb_absensi.id_absensi=tb_dt_absensi.id_absen');
        $this->db->where('tb_dt_absensi.id_no_id', $this->session->userdata('no_id'));
        $detail = $this->db->get();

        // echo json_encode($detail->result());
        $a = 1;
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
        foreach ($detail->result() as $k) {
            $waktu = $k->waktu;
            $nilai_absensi = $k->nilai_absensi;

            $dtisi .= '["' . $a++ . '","' . $waktu . '","'.$nilai_absensi.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
}
