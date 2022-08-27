<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master extends CI_Controller
{

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('master/dashboard');
	}

	public function jabatan()
	{
		$this->load->view('template/header');
		$this->load->view('master/jabatan');
	}
	public function json_jbn()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_jbn();
		foreach ($dt as $k) {
			$idu = $k->id_jabatan;
			$jbn = $k->jabatan;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $jbn . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_jbn()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_jbn($a);

		echo base64_encode($operasi);
	}
	public function tambah_jbn()
	{

		$a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_jbn($a);
		echo base64_encode($operasi);
	}
	public function filter_jbn()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_jbn($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_jabatan;
					$nm = $k->jabatan;
				}
				echo base64_encode("1|" . $id . "|" . $nm);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_jbn()
	{

		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$nm = trim(str_replace("'", "''", $this->input->post("nm")));
		$operasi = $this->M_master->mubah_jbn($id, $nm);
		echo base64_encode($operasi);
	}

	//FAKULTAS//

	public function fakultas()
	{
		$this->load->view('template/header');
		$this->load->view('master/Fakultas');
	}
	public function json_fk()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_fk();
		foreach ($dt as $k) {
			$idu = $k->id_fakultas;
			$fk = $k->nama_fakultas;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $fk . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_fk()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_fk($a);

		echo base64_encode($operasi);
	}
	public function tambah_fk()
	{

		$a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_fk($a);
		echo base64_encode($operasi);
	}
	public function filter_fk()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_fk($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_fakultas;
					$nama = $k->nama_fakultas;
				}
				echo base64_encode("1|" . $id . "|" . $nama);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_fk()
	{

		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_fk($id, $nama);
		echo base64_encode($operasi);
	}
	//PRODI//
	public function prodi()
	{
		$this->load->view('template/header');
		$this->load->view('master/prodi');
	}
	public function json_pr()
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
	public function hapus_pr()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_pr($a);

		echo base64_encode($operasi);
	}
	public function tambah_pr()
	{
		$idfk = trim(str_replace("'", "''", $this->input->post("idfk")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mtambah_pr($idfk, $nama);
		echo base64_encode($operasi);
	}
	public function filter_pr()
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
	public function ubah_pr()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$idfk = trim(str_replace("'", "''", $this->input->post("idfk")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_pr($id, $idfk, $nama);
		echo base64_encode($operasi);
	}

	//MAHASISWA//

	public function mahasiswa()
	{
		$this->load->view('template/header');
		$this->load->view('master/mahasiswa');
	}
	public function json_mh()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_mh();
		foreach ($dt as $k) {
			$nim = $k->nim;
			$nama = $k->nama;
			$id_pr = $k->id_prodi;
			$id_tm = $k->id_thn_masuk;
			$pass = $k->pasword;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $nim . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $nim . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $id_pr . '","' . $id_tm . '","' . $pass . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_mh()
	{
		$a = trim(str_replace("'", "''", $this->input->post("nim")));

		$operasi = $this->M_master->mhapus_mh($a);

		echo base64_encode($operasi);
	}
	public function tambah_mh()
	{

		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_pr = trim(str_replace("'", "''", $this->input->post("id_pr")));
		$id_tm = trim(str_replace("'", "''", $this->input->post("id_tm")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));

		$operasi = $this->M_master->mtambah_mh($nama, $id_pr, $id_tm, $pass);
		echo base64_encode($operasi);
	}
	public function filter_mh()
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
	public function ubah_mh()
	{

		$nim = trim(str_replace("'", "''", $this->input->post("nim")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_pr = trim(str_replace("'", "''", $this->input->post("id_pr")));
		$id_tm = trim(str_replace("'", "''", $this->input->post("id_tm")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));

		$operasi = $this->M_master->mubah_mh($nim, $nama, $id_pr, $id_tm, $pass);
		echo base64_encode($operasi);
	}

	//ABSENSI//

	public function absensi()
	{
		$this->load->view('template/header');
		$this->load->view('master/absensi');
	}
	public function json_abs()
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
	public function hapus_abs()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_abs($a);

		echo base64_encode($operasi);
	}
	public function tambah_abs()
	{
		$no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$jml = trim(str_replace("'", "''", $this->input->post("jml")));
		$operasi = $this->M_master->mtambah_abs($no_id, $jml);
		echo base64_encode($operasi);
	}
	public function filter_abs()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_abs($id);
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
	public function ubah_abs()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$jml = trim(str_replace("'", "''", $this->input->post("jml")));
		$operasi = $this->M_master->mubah_abs($id, $no_id, $jml);
		echo base64_encode($operasi);
	}

	//JN SURAT//

	public function jnsurat()
	{
		$this->load->view('template/header');
		$this->load->view('master/jnsurat');
	}
	public function json_js()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_js();
		foreach ($dt as $k) {
			$idu = $k->id_jn_surat;
			$nama = $k->nama_surat;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_js()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_js($a);

		echo base64_encode($operasi);
	}
	public function tambah_js()
	{
		$a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_js($a);
		echo base64_encode($operasi);
	}
	public function filter_js()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_js($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_jn_surat;
					$nama = $k->nama_surat;
				}
				echo base64_encode("1|" . $id . "|" . $nama);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_js()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));

		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_js($id, $nama);
		echo base64_encode($operasi);
	}

	//DOSEN//

	public function dosen()
	{
		$this->load->view('template/header');
		$this->load->view('master/dosen');
	}
	public function json_dos()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_dos();
		foreach ($dt as $k) {
			$no_id = $k->no_id;
			$nidn = $k->nidn;
			$id_jbn = $k->id_jabatan;
			$nama = $k->nama_dosen;
			$tgl_lahir = $k->tgl_lahir;
			$tl = $k->tempat_lahir;
			$pass = $k->pasword;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $no_id . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $no_id . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nidn . '","' . $id_jbn . '","' . $nama . '","' . $tgl_lahir . '","' . $tl . '","' . $pass . '","'  . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_dos()
	{
		$a = trim(str_replace("'", "''", $this->input->post("no_id")));

		$operasi = $this->M_master->mhapus_dos($a);

		echo base64_encode($operasi);
	}
	public function tambah_dos()
	{
		$nidn = trim(str_replace("'", "''", $this->input->post("nidn")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));
		$operasi = $this->M_master->mtambah_dos($nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass);
		echo base64_encode($operasi);
	}
	public function filter_dos()
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
					$pass = $k->pasword;
				}
				echo base64_encode("1|" . $no_id . "|" . $nidn . "" . $id_jbn . "|" . $nama . " | " . $tgl_lahir . "|" . $tl . "|" . $pass);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_dos()
	{
		$no_id = trim(str_replace("'", "''", $this->input->post("no_id")));
		$nidn = trim(str_replace("'", "''", $this->input->post("nidn")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));
		$operasi = $this->M_master->mtambah_dos($no_id, $nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass);
		echo base64_encode($operasi);
	}

	//JENIS GAJI //

	public function jenisgaji()
	{
		$this->load->view('template/header');
		$this->load->view('master/jenisgaji');
	}
	public function json_jgaji()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_jgaji();
		foreach ($dt as $k) {
			$idu = $k->id_jn_gaji;
			$nama = $k->nama_jn_gaji;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_jgaji()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_jgaji($a);

		echo base64_encode($operasi);
	}
	public function tambah_jgaji()
	{
		$a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_jgaji($a);
		echo base64_encode($operasi);
	}
	public function filter_jgaji()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_jgaji($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_jn_gaji;
					$nama = $k->nama_jn_gaji;
				}
				echo base64_encode("1|" . $id . "|" . $nama);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_jgaji()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));

		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_jgaji($id, $nama);
		echo base64_encode($operasi);
	}

	// GAJI //

	public function gaji()
	{
		$this->load->view('template/header');
		$this->load->view('master/gaji');
	}
	public function json_gaji()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_gaji();
		foreach ($dt as $k) {
			$idu = $k->id_dt_gaji;
			$id_jn_gaji = $k->id_jn_gaji;
			$nama = $k->nama_gaji;
			$nominal = $k->nominal_gaji;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $id_jn_gaji . '","' . $nama . '","' . $nominal . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_gaji()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_gaji($a);

		echo base64_encode($operasi);
	}
	public function tambah_gaji()
	{
		$id_jn_gaji = trim(str_replace("'", "''", $this->input->post("id_jn_gaji")));
		$nama_gaji = trim(str_replace("'", "''", $this->input->post("nama")));
		$nominal_gaji = trim(str_replace("'", "''", $this->input->post("nominal")));
		$operasi = $this->M_master->mtambah_gaji($id_jn_gaji, $nama_gaji, $nominal_gaji);
		echo base64_encode($operasi);
	}

	public function filter_gaji()
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
	public function ubah_gaji()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$id_jn_gaji = trim(str_replace("'", "''", $this->input->post("id_jn_gaji")));
		$nama_gaji = trim(str_replace("'", "''", $this->input->post("nama")));
		$nominal_gaji = trim(str_replace("'", "''", $this->input->post("nominal")));
		$operasi = $this->M_master->mubah_gaji($id, $id_jn_gaji, $nama_gaji, $nominal_gaji);
		echo base64_encode($operasi);
	}

	//Karyawan//

	public function Karyawan()
	{
		$this->load->view('template/header');
		$this->load->view('master/Karyawan');
	}
	public function json_kr()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_kr();
		foreach ($dt as $k) {
			$no_id = $k->no_id;
			$nama = $k->nama_karyawan;
			$id_jbn = $k->id_jabatan;
			$tgl_lahir = $k->tgl_lahir;
			$tl = $k->tempat_lahir;
			$pass = $k->pasword;
			$email = $k->email;
			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $no_id . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $no_id . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $nama . '","' . $id_jbn . '","' . $tgl_lahir . '","' . $tl . '","' . $pass . '","' . $email . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_kr()
	{
		$a = trim(str_replace("'", "''", $this->input->post("no_id")));

		$operasi = $this->M_master->mhapus_kr($a);

		echo base64_encode($operasi);
	}
	public function tambah_kr()
	{

		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$id_jbn = trim(str_replace("'", "''", $this->input->post("id_jbn")));
		$tgl_lahir = trim(str_replace("'", "''", $this->input->post("tgl_lahir")));
		$tl = trim(str_replace("'", "''", $this->input->post("tl")));
		$pass = trim(str_replace("'", "''", $this->input->post("pass")));
		$email = trim(str_replace("'", "''", $this->input->post("emai;")));

		$operasi = $this->M_master->mtambah_kr($nama, $id_jbn, $tgl_lahir, $tl, $pass, $email);
		echo base64_encode($operasi);
	}
	public function filter_kr()
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
					$pass = $k->pasword;
					$email = $k->email;
				}
				echo base64_encode("1|" . $no_id . "|" . $nama . "|" . $id_jbn . "| " . $tgl_lahir . "| " . $tl . "|" . $pass . "|" . $email);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_kr()
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

	// GAJI //

	public function surat()
	{
		$this->load->view('template/header');
		$this->load->view('master/surat');
	}
	public function json_surat()
	{
		$a = 1;
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_master->mdata_surat();
		foreach ($dt as $k) {
			$idu = $k->id_dt_surat;
			$id_jn_surat = $k->id_jn_surat;
			$id_thn_masuk = $k->id_thn_masuk;
			$upload_surat  = $k->upload_surat;

			$tomboledit = "<button type='button' class='btn btn-warning waves-effect waves-light' data-id='" . $idu . "'  onclick='filter(this)' data-target='#md_edit' data-toggle='modal' >Edit</button> <button class='btn btn-danger waves-effect waves-light' data-id='" . $idu . "' title='Hapus' onclick='hapus(this)'>Hapus</button>";
			$dtisi .= '["' . $a++ . '","' . $id_jn_surat . '","' . $id_thn_masuk . '","' . $upload_surat  . '","' . $tomboledit . '"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
	public function hapus_surat()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_surat($a);

		echo base64_encode($operasi);
	}
	public function tambah_surat()
	{
		$id_jn_surat = trim(str_replace("'", "''", $this->input->post("id_jn_surat")));
		$id_thn_masuk = trim(str_replace("'", "''", $this->input->post("id_thn_masuk")));
		$upload_surat  = trim(str_replace("'", "''", $this->input->post("upload_surat")));
		$operasi = $this->M_master->mtambah_surat($id_jn_surat, $id_thn_masuk, $upload_surat);
		echo base64_encode($operasi);
	}

	public function filter_surat()
	{
		$id = trim($this->input->post("id"));
		$dt = $this->M_master->mfilter_surat($id);
		if (is_array($dt)) {
			if (count($dt) > 0) {
				foreach ($dt as $k) {
					$id = $k->id_dt_surat;
					$id_jn_surat = $k->id_jn_surat;
					$id_thn_masuk = $k->id_thn_masuk;
					$upload_surat  = $k->upload_surat;
				}
				echo base64_encode("1|" . $id . "|" . $id_jn_surat . "|" . $id_thn_masuk . "|" . $upload_surat);
			} else {
				echo base64_encode("0|");
			}
		} else {
			echo base64_encode("0|");
		}
	}
	public function ubah_surat()
	{
		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$id_jn_surat = trim(str_replace("'", "''", $this->input->post("id_jn_surat")));
		$id_thn_masuk = trim(str_replace("'", "''", $this->input->post("id_thn_nasuk")));
		$upload_surat  = trim(str_replace("'", "''", $this->input->post("upload_surat ")));
		$operasi = $this->M_master->mubah_gaji($id, $id_jn_surat, $id_thn_masuk, $upload_surat);
		echo base64_encode($operasi);
	}
	//TAHUN MASUK//

	public function tahun_masuk()
	{
		$this->load->view('template/header');
		$this->load->view('master/tahun_masuk');
	}
	public function json_tm()
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
	public function hapus_tm()
	{
		$a = trim(str_replace("'", "''", $this->input->post("id")));

		$operasi = $this->M_master->mhapus_tm($a);

		echo base64_encode($operasi);
	}
	public function tambah_tm()
	{

		$a = trim(str_replace("'", "''", $this->input->post("a")));
		$operasi = $this->M_master->mtambah_tm($a);
		echo base64_encode($operasi);
	}
	public function filter_tm()
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
	public function ubah_tm()
	{

		$id = trim(str_replace("'", "''", $this->input->post("id")));
		$nama = trim(str_replace("'", "''", $this->input->post("nama")));
		$operasi = $this->M_master->mubah_tm($id, $nama);
		echo base64_encode($operasi);
	}
}
