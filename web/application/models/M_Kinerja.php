<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Kinerja extends CI_Model
{
    public function get_data_kinerja($wheredata)
    {
        $this->db->select('a.id, a.id_kualitas_kerja, a.nama, k.point, k.nama as nama_kualitas')
            ->from('tb_detail_kualitas a')
            ->join('tb_kualitas_kerja k', 'a.id_kualitas_kerja = k.id', 'inner')
            ->where($wheredata)
            ->order_by('k.id', 'asc');
        return $this->db->get()->result();
    }

    public function get_one_kinerja_pegawai($wheredata)
    {
        $this->db->select('kp.*')
            ->from('tb_kinerja_pegawai kp')
            ->where($wheredata);
        return $this->db->get()->row();
    }

    public function get_one_kehadiran($wheredata)
    {
        $this->db->select('IFNULL(SUM(nilai_absensi), 1) as jumlah, jml_wajib,  ROUND((IFNULL(SUM(nilai_absensi), 1) * 100) / jml_wajib) as persentase');
        $this->db->from('tb_dt_absensi');
        $this->db->join('tb_absensi', 'tb_dt_absensi.id_absen = tb_absensi.id_absensi');
        $this->db->where($wheredata);
        return $this->db->get()->row();
    }

    public function get_data_kualitas($wheredata)
    {
        $this->db->select('*')
            ->from('tb_kualitas_kerja')
            ->where($wheredata)
            ->order_by('id', 'asc');
        return $this->db->get()->result();
    }

   

    public function insert($data)
    {
        $this->db->insert('tb_kinerja_pegawai', $data);
        return $this->db->affected_rows();
    }

    public function update($updatedata, $wheredata)
    {
        return $this->db->update('tb_kinerja_pegawai', $updatedata, $wheredata);
    }

    public function get_data_karyawan($wheredata = array())
    {
        $this->db->select('k.*, j.jabatan')
            ->from('tb_karyawan k')
            ->join('tb_jabatan j', 'j.id_jabatan = k.id_jabatan', 'inner')
            ->where($wheredata)
            ->order_by('k.nama_karyawan', 'asc');
        return $this->db->get()->result();
    }

    public function get_one_karyawan($wheredata)
    {
        $this->db->select('*')
            ->from('tb_karyawan')
            ->where($wheredata);
        return $this->db->get()->row();
    }
}


