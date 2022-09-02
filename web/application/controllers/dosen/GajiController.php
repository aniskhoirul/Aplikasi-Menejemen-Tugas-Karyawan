<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GajiController extends CI_Controller
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
        $data['jenis_gaji'] = $this->db->get('tb_jn_gaji')->result();
        $this->load->view('template/header');
		$this->load->view('dosen/gaji', $data);
    }

    public function json()
    {
        $a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_gaji();
		foreach ($dt as $k) {
			$idu = $k->id_dt_gaji;
			$id_jn_gaji = $k->nama_jn_gaji;
			$nama = $k->nama_gaji;
			$nominal = $k->nominal_gaji;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $id_jn_gaji . '","' . $nama . '","' . $nominal . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
    }

    public function store()
    {
        $id_jn_gaji = trim(str_replace("'", "''", $this->input->post("id_jn_gaji")));
		$nama_gaji = trim(str_replace("'", "''", $this->input->post("nama")));
		$nominal_gaji = trim(str_replace("'", "''", $this->input->post("nominal")));
		$operasi = $this->M_master->mtambah_gaji($id_jn_gaji, $nama_gaji, $nominal_gaji);
		echo base64_encode($operasi);
    }

    public function filter()
    {
        $id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_gaji($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_dt_gaji;
					$id_jn_gaji = $k->id_jn_gaji;
					$nama = $k->nama_gaji;
					$nominal = $k->nominal_gaji;
				}
				echo base64_encode("1|" . $id . "|" . $id_jn_gaji . "|" . $nama . "|" . $nominal);
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
		$id_jn_gaji = trim(str_replace("'", "''", $this->input->post("id_jn_gaji")));
		$nama_gaji = trim(str_replace("'", "''", $this->input->post("nama")));
		$nominal_gaji = trim(str_replace("'", "''", $this->input->post("nominal")));
		$operasi = $this->M_master->mubah_gaji($id, $id_jn_gaji, $nama_gaji, $nominal_gaji);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_gaji($a);

		echo base64_encode($operasi);
    }
}