<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataDosenController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['jabatan'] = $this->db->get('tb_jabatan')->result();
        $this->load->view('template/header');
        $this->load->view('admin/datadosen', $data);
    }

    public function json()
    {
        $a = 1;
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
        $dt = $this->M_master->mdata_dos();
        foreach ($dt as $k) {
            $no_id = $k->no_id;
            $nidn = $k->nidn;
            $id_jbn = $k->jabatan;
            $nama = $k->nama_dosen;
            $tgl_lahir = $k->tgl_lahir;
            $tl = $k->tempat_lahir;

            $tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $no_id . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $no_id . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
            $dtisi .= '["' . $a++ . '","' . $nidn . '","' . $id_jbn . '","' . $nama . '","' . $tgl_lahir . '","' . $tl . '","'  . $tomboledit . '"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }

    public function store()
    {
        $nidn = trim(str_replace("'", "''", $this->input->post("nidn")));
        $id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
        $nama = trim(str_replace("'", "''", $this->input->post("nama")));
        $tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
        $tl = trim(str_replace("'", "''", $this->input->post("tl")));
        $pass = trim(str_replace("'", "''", md5($this->input->post("pass"))));
        $operasi = $this->M_master->mtambah_dos($nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass);
        echo base64_encode($operasi);
    }

    public function filter()
    {
        $no_id = trim($this->input->post("no_id"));
		$dt = $this->M_master->mfilter_dos($no_id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$no_id = $k->no_id;
					$nidn = $k->nidn;
					$id_jbn = $k->id_jabatan;
					$nama = $k->nama_dosen;
					$tgl_lahir = $k->tgl_lahir;
					$tl = $k->tempat_lahir;
				}
                // echo json_encode($id_jbn);
				echo base64_encode("1|" . $no_id . "|" . $nidn . "|" . $id_jbn . "|" . $nama . "|" . $tgl_lahir . "|" . $tl);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
    }

    public function update()
    {
        $no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$nidn = trim(str_replace("'", "''", $this->input->post("nidn")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));
		$operasi = $this->M_master->mubah_dos($no_id, $nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("no_id")));

		$operasi = $this->M_master->mhapus_dos($a);

		echo base64_encode($operasi);
    }
}
