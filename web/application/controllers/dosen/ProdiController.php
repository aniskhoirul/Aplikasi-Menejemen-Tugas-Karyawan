<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProdiController extends CI_Controller
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
        $data['fakultas'] = $this->db->get('tb_fakultas')->result();
        $this->load->view('template/header');
		$this->load->view('dosen/prodi', $data);
    }

    public function json()
    {
        $a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_pr();
		foreach ($dt as $k) {
			$idu = $k->id_prodi;
			$idfk = $k->id_fakultas;
			$nama = $k->nama_prodi;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $idfk . '","' . $nama . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
    }

    public function filter()
    {
        $id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_pr($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_prodi;
					$idfk = $k->id_fakultas;
					$nama = $k->nama_prodi;
				}
				echo base64_encode("1|" . $id . "|" . $idfk . "|" . $nama);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
    }

    public function store()
    {
        $idfk = trim(str_replace("'", "''", $this->input->post("idfk")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mtambah_pr($idfk, $nama);
		echo base64_encode($operasi);
    }

    public function update()
    {
        $id = trim(str_replace("'", "''", $this->input->post("id")));
		$idfk = trim(str_replace("'", "''", $this->input->post("idfk")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_pr($id, $idfk, $nama);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_pr($a);

		echo base64_encode($operasi);
    }
}