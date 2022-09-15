<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GajiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			if (!$this->session->userdata('role') == 'keuangan') {
				redirect('login');
			}
		}
	}

	public function index()
	{
		$data['dtkaryawan'] = $karyawan = $this->M_master->mdata_kr();

		$bulan = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
		$id_karyawan = $this->input->get('id_karyawan') != '' ? $this->input->get('id_karyawan') : $karyawan[0]->no_id;

		$jenis_gaji = $this->db->select('*')->from('tb_jn_gaji')->get()->result();

		foreach ($jenis_gaji as $jenis) {
			$wheredata = [
				'id_karyawan' => $id_karyawan,
				'id_jn' => $jenis->id_jn_gaji,
				'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan,
			];
			$data_gaji = $this->db->select('*')
				->from('tb_dt_gaji')
				->join('tb_jn_gaji', 'tb_dt_gaji.id_jn=tb_jn_gaji.id_jn_gaji')
				->where($wheredata)
				->get()->row();

			@$jenis->id_dt_gaji = $data_gaji->id_dt_gaji;
			@$jenis->nama_jn_gaji;
			@$jenis->nominal_gaji = $data_gaji->nominal_gaji;
			@$jenis->nama_gaji = $data_gaji->nama_gaji;
		}


		$data['jenis_gaji'] = $jenis_gaji;
		$data['bulan']	   		= $bulan;
		$data['id_karyawan']	= $id_karyawan;
		$this->load->view('template/header');
		$this->load->view('admin/gaji', $data);
	}

	public function store()
	{
		$id_jn = $this->input->post('id_jn');
		$nama_gaji = $this->input->post('nama_gaji');
		$nominal_gaji = $this->input->post('nominal_gaji');

		$id_dt_gaji = $this->input->post('id_dt_gaji');

		if ($this->input->post('is_edit') == 'tambah') {
			foreach ($id_jn as $key => $value) {
				$data = [
					'id_jn' => $value,
					'id_karyawan' => $this->input->post('id_karyawan'),
					'nama_gaji' => $nama_gaji[$key],
					'nominal_gaji' => $nominal_gaji[$key],
					'tanggal' => $this->input->post('tanggal'),
				];
				$result = $this->db->insert('tb_dt_gaji', $data);
			}
		} else {
			foreach ($id_jn as $key => $value) {
				$data = [
					'id_jn' => $value,
					'id_karyawan' => $this->input->post('id_karyawan'),
					'nama_gaji' => $nama_gaji[$key],
					'nominal_gaji' => $nominal_gaji[$key],
					'tanggal' => $this->input->post('tanggal'),
				];
				$result = $this->db->update('tb_dt_gaji', $data, ['id_dt_gaji' => $id_dt_gaji[$key]]);
			}
		}

		if ($result) {
            echo json_encode([
                'status' => true,
                'msg'  => (@$this->input->post('is_edit') != 'tambah' ? "Berhasil Edit Data" : "Berhasil Menambah Data")
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'msg'  => (@$this->input->post('is_edit') != 'tambah' ? "Gagal Edit Data" : "Gagal Menambah Data")
            ]);
        }
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
