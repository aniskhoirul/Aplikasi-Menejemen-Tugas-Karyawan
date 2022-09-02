<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataMahasiswaController extends CI_Controller
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
        $data['prodi'] = $this->db->get('tb_prodi')->result();
        $this->load->view('template/header');
        $this->load->view('dosen/datamahasiswa', $data);
    }

    public function json()
    {
        $a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_mh();
		foreach ($dt as $k) {
			$nim = $k->nim;
			$nama = $k->nama;
			$id_pr = $k->nama_prodi;
			$fakultas = $k->nama_fakultas;
			$id_tm = $k->id_thn_masuk;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $nim . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $nim . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $id_pr . '","' . $fakultas . '","' . $id_tm . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
    }

    public function store()
    {
        // $nim = (int)preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
        $nim = rand(111111111, 999999999);
        $nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_pr = trim(str_replace("'", "''", $this->input->post("id_pr")));
		$id_tm = trim(str_replace("'", "''", $this->input->post("id_tm")));
		$pass = trim(str_replace("'", "''", md5($this->input->post("pass"))));
        
        $data = [
            'nim' => $nim,
			'nama' => $nama,
			'id_prodi' => $id_pr,
			'id_thn_masuk' => $id_tm,
			'pasword' => $pass,
		];
        // $operasi = $this->M_master->mtambah_mh($nama, $id_pr, $id_tm, $pass);
		$operasi = $this->db->insert('mahasiswa', $data);
		echo base64_encode($operasi);
    }

    public function filter()
    {
        $nim = trim($this->input->post("nim"));
		$dt = $this->M_master->mfilter_mh($nim);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$nim = $k->nim;
					$nama = $k->nama;
					$id_pr = $k->id_prodi;
					$id_tm = $k->id_thn_masuk;
					$pass = $k->pasword;
				}
				echo base64_encode("1|" . $nim . "|" . $nama . "|" . $id_pr . "| " . $id_tm . "|" . $pass);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
    }

    public function update()
    {
        $nim = trim(str_replace("'", "''", $this->input->post("nim")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_pr = trim(str_replace("'", "''", $this->input->post("id_pr")));
		$id_tm = trim(str_replace("'", "''", $this->input->post("id_tm")));
		$pass = trim(str_replace("'", "''", md5($this->input->post("pass"))));

		$operasi = $this->M_master->mubah_mh($nim, $nama, $id_pr, $id_tm, $pass);
		echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("nim")));

		$operasi = $this->M_master->mhapus_mh($a);

		echo base64_encode($operasi);
    }
}