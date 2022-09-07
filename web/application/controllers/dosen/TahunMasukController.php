<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TahunMasukController extends CI_Controller
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
        $this->load->view('dosen/tahun_masuk');
    }

    public function json()
    {
        $a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_tm();
		foreach ($dt as $k) {
			$idu = $k->id_thn_masuk;
			$nama = $k->nama_tahun;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
    }

    public function store()
    {
        $a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_tm($a);
		echo base64_encode($operasi);
    }

    public function filter()
    {
        $id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_tm($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_thn_masuk;
					$nama = $k->nama_tahun;
				}
				echo base64_encode("1|" . $id . "|" . $nama);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
    }

    public function update()
    {
        $id = trim(str_replace("'", "''", $this->input->post("id")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_tm($id, $nama);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_tm($a);

		echo base64_encode($operasi);
    }
}