<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function index()
    {
        // $this->load->view('template/header');
        $this->load->view('login');
    }

    public function auth()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required', [
            'required' => 'Harap isi bidang username anda!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Harap isi bidang password!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'login-gagal',
                '<div class="alert alert-danger" role="alert">
                    Email/NIDN atau password harus diisi!
                </div>'
            );
            redirect(base_url('login'));
        } else {
            $email = $this->input->post("email", TRUE);
            $password = md5($this->input->post('password', TRUE));

            $this->db->select('*');
            $this->db->from('tb_dosen');
            $this->db->join('tb_jabatan', 'tb_dosen.id_jabatan=tb_jabatan.id_jabatan');
            $this->db->where('tb_dosen.nidn', $email);
            $this->db->where('tb_dosen.password', $password);
            $dosen = $this->db->get();

            if ($dosen->num_rows() > 0) {
                $data = $dosen->row();
                $simpan = [
                    'no_id' => $data->no_id,
                    'nidn' => $data->nidn,
                    'jabatan' => $data->jabatan,
                    'nama' => $data->nama_dosen,
                ];
                $this->session->set_userdata($simpan);
                redirect(base_url('dosen/dashboard'));
            } else {
                $this->db->select('*');
                $this->db->from('tb_karyawan');
                $this->db->join('tb_jabatan', 'tb_karyawan.id_jabatan=tb_jabatan.id_jabatan');
                $this->db->where('tb_karyawan.email', $email);
                $this->db->where('tb_karyawan.pasword', $password);
                $karyawan = $this->db->get();

                if ($karyawan->num_rows() > 0) {
                    $data = $karyawan->row();
                    $simpan = [
                        'no_id' => $data->no_id,
                        'email' => $data->email,
                        'jabatan' => $data->jabatan,
                        'nama' => $data->nama_karyawan,
                    ];
                    $this->session->set_userdata($simpan);
                    redirect(base_url('karyawan/dashboard'));
                } else {
                    $this->db->select('*');
                    $this->db->from('tb_admin');
                    $this->db->join('tb_jabatan', 'tb_admin.id_jabatan=tb_jabatan.id_jabatan');
                    $this->db->join('tb_role', 'tb_admin.id_role=tb_role.id');
                    $this->db->where('tb_admin.username', $email);
                    $this->db->where('tb_admin.password', $password);
                    $admin = $this->db->get();

                    if ($admin->num_rows() > 0) {
                        $data = $admin->row();
                        $simpan = [
                            'nama' => $data->name,
                            'username' => $data->username,
                            'email' => $data->email,
                            'role' => $data->role,
                            'jabatan' => $data->jabatan,
                        ];
                        $this->session->set_userdata($simpan);
                        redirect(base_url('admin/dashboard'));
                    }else{
                        $this->session->set_flashdata(
                            'login-gagal',
                            '<div class="alert alert-danger" role="alert">
                                Email/NIDN atau password salah!
                            </div>'
                        );
                        redirect(base_url('login'));
                    }

                }
            }
        }
    }

    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $this->session->set_flashdata('success-logout', 'Berhasil!');
        redirect(base_url('login'));
    }
}
