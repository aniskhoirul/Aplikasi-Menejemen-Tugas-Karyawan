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
        $a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_abs();
		foreach ($dt as $k) {
			$idu = $k->id_absensi;
			$no_id = $k->no_id;
			$jml = $k->jml_wajib;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $no_id . '","' . $jml . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
    }

    public function store()
    {
        $no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$jml = trim(str_replace("'", "''", $this->input->post("jml")));
		$operasi = $this->M_master->mtambah_abs($no_id, $jml);
		echo base64_encode($operasi);
    }

    public function filter()
    {
        $id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_abs($id);
        // echo json_encode($dt);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_absensi;
					$no_id = $k->no_id;
					$jml = $k->jml_wajib;
				}
				echo base64_encode("1|" . $id . "|" . $no_id . "|" . $jml);
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
		$no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$jml = trim(str_replace("'", "''", $this->input->post("jml")));
		$operasi = $this->M_master->mubah_abs($id, $no_id, $jml);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_abs($a);

		echo base64_encode($operasi);
    }
}