<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KaryawanController extends CI_Controller
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
        $data['jabatan'] = $this->db->get('tb_jabatan')->result();
        $this->load->view('template/header');
        $this->load->view('dosen/karyawan', $data);
    }

    public function json()
    {
        $a = 1;
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
        $dt = $this->M_master->mdata_kr();
        foreach ($dt as $k) {
            $no_id = $k->no_id;
            $nama = $k->nama_karyawan;
            $id_jbn = $k->jabatan;
            $tgl_lahir = $k->tgl_lahir;
            $tl = $k->tempat_lahir;
            $email = $k->email;
            $tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $no_id . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $no_id . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
            $dtisi .= '["' . $a++ . '","' . $nama . '","' . $id_jbn . '","' . $tgl_lahir . '","' . $tl . '","' . $email . '","' . $tomboledit . '"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }

    public function filter()
    {
        $no_id = trim($this->input->post("no_id"));
        $dt = $this->M_master->mfilter_kr($no_id);
        if (is_array($dt)) {
            if (count($dt) > 0) {
                foreach ($dt as $k) {
                    $no_id = $k->no_id;
                    $nama = $k->nama_karyawan;
                    $id_jbn = $k->id_jabatan;
                    $tgl_lahir = $k->tgl_lahir;
                    $tl = $k->tempat_lahir;
                    $pass = $k->password;
                    $email = $k->email;
                }
                echo base64_encode("1|" . $no_id . "|" . $nama . "|" . $id_jbn . "| " . $tgl_lahir . "| " . $tl . "|" . $email);
            } else {
                echo base64_encode("0|");
            }
        } else {
            echo base64_encode("0|");
        }
    }

    public function store()
    {
        $nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", md5($this->input->post("pass"))));
		$email = trim(str_replace("'", "''", $this->input->post("email")));

		$operasi = $this->M_master->mtambah_kr($nama, $id_jbn, $tgl_lahir, $tl, $pass, $email);
		echo base64_encode($operasi);
    }

    public function update()
    {
        $no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));
		$email = trim(str_replace("'", "''", $this->input->post("email")));

		$operasi = $this->M_master->mubah_kr($no_id, $nama, $id_jbn, $tgl_lahir, $tl, $pass, $email);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("no_id")));

		$operasi = $this->M_master->mhapus_kr($a);

		echo base64_encode($operasi);
    }
}
