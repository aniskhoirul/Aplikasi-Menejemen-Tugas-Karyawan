<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPenilaianController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $karyawan  = $this->M_Kinerja->get_data_karyawan();
        $bulan        = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");

        foreach ($karyawan as $row) {
            $wheredata = [
                'id_karyawan' => $row->no_id,
                'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
            ];

            $ambil = $this->M_Kinerja->get_one_kinerja_pegawai($wheredata);

            @$row->hasil     = $ambil->hasil > 0 ? $ambil->hasil : 0;
            @$row->grade     = $ambil->grade != '' ? $ambil->grade : 'E';
        }

        $data['menu']               = 'lapkinerja';
        $data['bulan']               = $bulan;
        $data['dtkaryawan']     = $karyawan;
        $this->load->view('template/header', $data);
        $this->load->view('admin/laporan_penilaian', $data);
    }

    public function cetak_laporan()
    {
        $this->load->library('Pdf');

        $karyawan  = $this->M_Kinerja->get_data_karyawan();
        $bulan        = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");

        foreach ($karyawan as $row) {
            $wheredata = [
                'id_karyawan' => $row->no_id,
                'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
            ];

            $ambil = $this->M_Kinerja->get_one_kinerja_pegawai($wheredata);

            @$row->hasil     = $ambil->hasil > 0 ? $ambil->hasil : 0;
            @$row->grade     = $ambil->grade != '' ? $ambil->grade : 'E';
        }

        $data['bulan']               = $bulan;
        $data['dtkaryawan']     = $karyawan;
        $this->load->view('admin/laporan_penilaian_cetak', $data);
    }

    public function chart()
    {
        $bulan        = $this->input->get('bulan') != '' ? $this->input->get('bulan') : date("Y-m");
        $wheredata = [
            'DATE_FORMAT(tanggal, "%Y-%m") =' => $bulan
        ];

        $a = $this->db->select('grade')
            ->from('tb_kinerja_pegawai')
            ->join('tb_karyawan', 'tb_kinerja_pegawai.id_karyawan=tb_karyawan.no_id', 'right')
            ->where('tb_kinerja_pegawai.grade', 'A')
            ->where($wheredata)
            ->group_by('id_karyawan')
            ->get()->num_rows();

        $b = $this->db->select('grade')
            ->from('tb_kinerja_pegawai')
            ->join('tb_karyawan', 'tb_kinerja_pegawai.id_karyawan=tb_karyawan.no_id', 'right')
            ->where('tb_kinerja_pegawai.grade', 'B')
            ->where($wheredata)
            ->group_by('id_karyawan')
            ->get()->num_rows();

        $c = $this->db->select('grade')
            ->from('tb_kinerja_pegawai')
            ->join('tb_karyawan', 'tb_kinerja_pegawai.id_karyawan=tb_karyawan.no_id', 'right')
            ->where('tb_kinerja_pegawai.grade', 'C')
            ->where($wheredata)
            ->group_by('id_karyawan')
            ->get()->num_rows();

        $d = $this->db->select('grade')
            ->from('tb_kinerja_pegawai')
            ->join('tb_karyawan', 'tb_kinerja_pegawai.id_karyawan=tb_karyawan.no_id', 'right')
            ->where('tb_kinerja_pegawai.grade', 'D')
            ->where($wheredata)
            ->group_by('id_karyawan')
            ->get()->num_rows();

        $e = $this->db->select('grade')
            ->from('tb_kinerja_pegawai')
            ->join('tb_karyawan', 'tb_kinerja_pegawai.id_karyawan=tb_karyawan.no_id', 'right')
            ->where('tb_kinerja_pegawai.grade', 'E')
            ->group_by('id_karyawan')
            ->get()->num_rows();

        echo json_encode([
            'nilai' => [$a, $b, $c, $d, $e],
            'grade' => ['Grade A', 'Grade B', 'Grade C', 'Grade D', 'Grade E'],
        ]);
    }
}
