<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class ProfilController extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->database();
    }

	public function index()
	{
		$id_user = $this->input->get('no_id');
        
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->join('tb_jabatan', 'tb_karyawan.id_jabatan=tb_jabatan.id_jabatan');
        $this->db->where('tb_karyawan.no_id', $id_user);
        $profil = $this->db->get();
		echo json_encode($profil->row());
	}
}