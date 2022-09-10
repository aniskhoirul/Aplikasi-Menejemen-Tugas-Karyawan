<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_master extends CI_Model
{

	public function mdata_jbn()
	{
		$sql = "SELECT * FROM tb_jabatan";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_jbn($id)
	{
		$sql = "DELETE FROM tb_jabatan WHERE id_jabatan='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_jbn($a)
	{
		$sql = "INSERT INTO tb_jabatan VALUES('','$a');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_jbn($id)
	{
		$sql = "SELECT * FROM tb_jabatan WHERE id_jabatan='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_jbn($id, $nm)
	{
		$sql = "UPDATE tb_jabatan SET  jabatan='$nm' WHERE id_jabatan='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//FAKULTAS//
	public function mdata_fk()
	{
		$sql = "SELECT*FROM tb_fakultas";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_fk($id)
	{
		$sql = "DELETE FROM tb_fakultas WHERE id_fakultas='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_fk($a)
	{
		$sql = "INSERT INTO tb_fakultas VALUES('','$a');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_fk($id)
	{
		$sql = "SELECT*FROM tb_fakultas WHERE id_fakultas='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_fk($id, $nama)
	{
		$sql = "UPDATE tb_fakultas SET nama_fakultas='$nama' WHERE id_fakultas ='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//PRODI//
	public function mdata_pr()
	{
		$sql = "SELECT * FROM tb_prodi INNER JOIN tb_fakultas ON tb_prodi.id_fakultas=tb_fakultas.id_fakultas";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_pr($id)
	{
		$sql = "DELETE FROM tb_prodi WHERE id_prodi='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_pr($idfk, $nama)
	{
		$sql = "INSERT INTO tb_prodi VALUES('','$idfk','$nama');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_pr($id)
	{
		$sql = "SELECT * FROM tb_prodi WHERE id_prodi='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_pr($id, $idfk, $nama)
	{
		$sql = "UPDATE tb_prodi SET id_fakultas ='$idfk',
		nama_prodi ='$nama' WHERE id_prodi ='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//MAHASISWA//
	public function mdata_mh()
	{
		$sql = "SELECT * FROM tb_mahasiswa INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi=tb_prodi.id_prodi INNER JOIN tb_fakultas ON tb_prodi.id_fakultas=tb_fakultas.id_fakultas";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_mh($nim)
	{
		$sql = "DELETE FROM tb_mahasiswa WHERE nim ='$nim'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_mh($nama, $id_pr, $id_tm, $pass)
	{
		$nim = 12 . (int)preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
		// $sql = "INSERT INTO tb_mahasiswa VALUES($nim,'$nama','$id_pr','$id_tm','$pass')";
		$data = [
			'nim' => $nim,
			'nama' => $nama,
			'id_prodi' => $id_pr,
			'id_thn_masuk' => $id_tm,
			'pasword' => $pass,
		];
		$sql = $this->db->insert('tb_mahasiswa', $data);
		// echo json_encode($sql);
		// $querySQL = $this->db->query($sql);
		if ($sql) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_mh($nim)
	{
		$sql = "SELECT * FROM tb_mahasiswa WHERE nim ='$nim'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_mh($nim, $nama, $id_pr, $id_tm, $pass)
	{
		if ($pass == "") {
			$sql = "UPDATE mahasiswa SET nama='$nama',id_prodi='$id_pr',id_thn_masuk='$id_tm' WHERE nim='$nim'";
		}else{
			$sql = "UPDATE mahasiswa SET nama='$nama',id_prodi='$id_pr',id_thn_masuk='$id_tm', pasword ='$pass'  WHERE nim='$nim'";
		}
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//absensi//
	public function mdata_abs()
	{
		$sql = "SELECT * FROM tb_absensi INNER JOIN tb_jabatan ON tb_absensi.id_jabatan=tb_jabatan.id_jabatan";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_abs($id)
	{
		$sql = "DELETE FROM tb_absensi WHERE id_absensi='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_abs($id_jabatan, $jml)
	{
		$sql = "INSERT INTO tb_absensi VALUES('','$id_jabatan','$jml');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_abs($id)
	{
		$sql = "SELECT * FROM tb_absensi WHERE id_absensi='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_abs($id, $id_jabatan, $jml)
	{
		$sql = " UPDATE tb_absensi SET id_jabatan='$id_jabatan',jml_wajib='$jml' WHERE id_absensi='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//JN SURAT//
	public function mdata_js()
	{
		$sql = "SELECT*FROM tb_jn_surat";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_js($id)
	{
		$sql = "DELETE FROM tb_jn_surat WHERE id_jn_surat='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_js($a)
	{
		$sql = "INSERT INTO tb_jn_surat VALUES('','$a');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_js($id)
	{
		$sql = "SELECT * FROM tb_jn_surat WHERE id_jn_surat ='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_js($id, $nama)
	{
		$sql = "UPDATE tb_jn_surat SET nama_surat='$nama' WHERE id_jn_surat ='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//DOSEN//
	public function mdata_dos()
	{
		$sql = "SELECT * FROM tb_dosen INNER JOIN tb_jabatan ON tb_dosen.id_jabatan=tb_jabatan.id_jabatan";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_dos($no_id)
	{
		$sql = "DELETE FROM tb_dosen WHERE no_id ='$no_id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_dos($nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass)
	{
		$sql = "INSERT INTO tb_dosen VALUES('','$nidn','$id_jbn','$nama','$tgl_lahir','$tl','$pass');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_dos($no_id)
	{
		$sql = "SELECT * FROM tb_dosen WHERE no_id='$no_id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_dos($no_id, $nidn, $id_jbn, $nama, $tgl_lahir, $tl, $pass)
	{
		if ($pass == "") {
			$sql = " UPDATE tb_dosen SET nidn='$nidn',id_jabatan='$id_jbn',nama_dosen='$nama',tgl_lahir='$tgl_lahir',tempat_lahir='$tl' WHERE no_id='$no_id'";
		}else{
			$sql = " UPDATE tb_dosen SET nidn='$nidn',id_jabatan='$id_jbn',nama_dosen='$nama',tgl_lahir='$tgl_lahir',tempat_lahir='$tl',password='$pass'  WHERE no_id='$no_id'";
		}
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//JENIS GAJI//
	public function mdata_jgaji()
	{
		$sql = "SELECT * FROM tb_jn_gaji";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_jgaji($id)
	{
		$sql = "DELETE FROM tb_jn_gaji WHERE id_jn_gaji='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_jgaji($a)
	{
		$sql = "INSERT INTO tb_jn_gaji VALUES('','$a');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_jgaji($id)
	{
		$sql = "SELECT * FROM tb_jn_gaji WHERE id_jn_gaji='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_jgaji($id, $nama)
	{
		$sql = "UPDATE tb_jn_gaji SET nama_jn_gaji='$nama' WHERE id_jn_gaji ='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//GAJI//
	public function mdata_gaji()
	{
		$sql = "SELECT * FROM tb_dt_gaji INNER JOIN tb_jn_gaji ON tb_dt_gaji.id_jn_gaji=tb_jn_gaji.id_jn_gaji";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_gaji($id)
	{
		$sql = "DELETE FROM tb_dt_gaji WHERE id_dt_gaji='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_gaji($id_jn_gaji, $nama, $nominal)
	{
		$sql = "INSERT INTO tb_dt_gaji VALUES('','$id_jn_gaji','$nama','$nominal');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_gaji($id)
	{
		$sql = "SELECT * FROM tb_dt_gaji WHERE id_dt_gaji='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_gaji($id, $id_jn_gaji, $nama, $nominal)
	{
		$sql = " UPDATE tb_dt_gaji SET id_jn_gaji='$id_jn_gaji' ,nama_gaji='$nama' ,nominal_gaji='$nominal' WHERE id_dt_gaji='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//KARYAWAN//
	public function mdata_kr()
	{
		$sql = "SELECT * FROM tb_karyawan INNER JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_kr($no_id)
	{
		$sql = "DELETE FROM tb_karyawan WHERE no_id ='$no_id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_kr($nama, $id_jbn, $tgl_lahir, $tl, $pass, $email)
	{
		$sql = "INSERT INTO tb_karyawan VALUES('','$nama','$id_jbn','$tgl_lahir','$tl','$pass','$email');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_kr($no_id)
	{
		$sql = "SELECT * FROM tb_karyawan WHERE no_id ='$no_id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_kr($no_id, $nama, $id_jbn, $tgl_lahir, $tl, $pass, $email)
	{
		if ($pass == "") {
			$sql = "UPDATE tb_karyawan SET nama_karyawan='$nama',id_jabatan='$id_jbn',tgl_lahir='$tgl_lahir',tempat_lahir='$tl', email ='$email'  WHERE no_id='$no_id'";
		}else{
			$sql = "UPDATE tb_karyawan SET nama_karyawan='$nama',id_jabatan='$id_jbn',tgl_lahir='$tgl_lahir',tempat_lahir='$tl', password ='$pass', email ='$email'  WHERE no_id='$no_id'";
		}

		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//GAJI//
	public function mdata_surat()
	{
		$sql = "SELECT * FROM tb_dt_surat";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_surat($id)
	{
		$sql = "DELETE FROM tb_dt_surat WHERE id_dt_surat='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_surat($id_jn_surat, $id_thn_masuk, $upload_surat)
	{
		$sql = "INSERT INTO tb_dt_surat VALUES('','$id_jn_surat','$id_thn_masuk','$upload_surat ');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_surat($id)
	{
		$sql = "SELECT * FROM tb_dt_surat WHERE id_dt_surat='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_surat($id, $id_jn_surat, $id_thn_masuk, $upload_surat)
	{
		$sql = " UPDATE tb_dt_ SET id_jn_surat='$id_jn_surat' ,id_thn_masuk='$id_thn_masuk' ,upload_surat='$upload_surat ' WHERE id_dt_surat='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	//FAKULTAS//
	public function mdata_tm()
	{
		$sql = "SELECT*FROM tb_thn_masuk";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mhapus_tm($id)
	{
		$sql = "DELETE FROM tb_thn_masuk WHERE id_thn_masuk='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mtambah_tm($a)
	{
		$sql = "INSERT INTO tb_thn_masuk VALUES('','$a');";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}
	public function mfilter_tm($id)
	{
		$sql = "SELECT*FROM tb_thn_masuk WHERE id_thn_masuk='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
	public function mubah_tm($id, $nama)
	{
		$sql = "UPDATE tb_thn_masuk SET nama_tahun='$nama' WHERE id_thn_masuk ='$id';";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return "1";
		} else {
			return "0";
		}
	}

	public function m_filter_tugas($id)
	{
		$sql = "SELECT*FROM tb_job WHERE id_job='$id'";
		$querySQL = $this->db->query($sql);
		if ($querySQL) {
			return $querySQL->result();
		} else {
			return 0;
		}
	}
}
