<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TugasController extends CI_Controller
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
        $this->db->select('*');
        $this->db->from('tb_job');
        $this->db->join('tb_karyawan', 'tb_job.no_id=tb_karyawan.no_id');
        $this->db->join('tb_jn_job', 'tb_job.id_jn_job=tb_jn_job.id_jn_job');
        $this->db->order_by("tb_job.id_job", "desc");
        $tugas = $this->db->get();


        $data['karyawan'] = $this->db->get('tb_karyawan')->result();
        $data['jenis_tugas'] = $this->db->get('tb_jn_job')->result();
        $data['data_tugas'] = $tugas->result();
        $this->load->view('template/header');
        $this->load->view('admin/tugas', $data);
    }

    public function show($id)
    {
        $this->db->select('*');
        $this->db->from('tb_job');
        $this->db->join('tb_detail_job', 'tb_job.id_job=tb_detail_job.id_job');
        $this->db->where('tb_detail_job.id_job', $id);
        $detail = $this->db->get();

        $data['detail'] = $detail->row();
        $this->load->view('template/header');
        $this->load->view('admin/tugas_detail', $data);
    }

    public function store()
    {
        $data = [
            'no_id' => $this->input->post('no_id'),
            'id_jn_job' => $this->input->post('id_jn_job'),
            'list_job' => $this->input->post('list_job'),
        ];

        $insert = $this->db->insert('tb_job', $data);
        if ($insert) {
            echo base64_encode("1");
        } else {
            echo base64_encode("0");
        }
    }

    public function filter()
    {
        $id = trim($this->input->post("id"));
        $dt = $this->M_master->m_filter_tugas($id);
        if (is_array($dt)) {
            if (count($dt) > 0) {
                foreach ($dt as $k) {
                    $id = $k->id_job;
                    $no_id = $k->no_id;
                    $id_jn_job = $k->id_jn_job;
                    $list_job = $k->list_job;
                }
                echo base64_encode("1|" . $id . "|" . $no_id . "|" . $id_jn_job . "|" . $list_job);
            } else {
                echo base64_encode("0|");
            }
        } else {
            echo base64_encode("0|");
        }
    }

    public function update()
    {
        $data = [
            'no_id' => $this->input->post('eno_id'),
            'id_jn_job' => $this->input->post('eid_jn_job'),
            'list_job' => $this->input->post('elist_job'),
        ];
        $this->db->where('id_job', $this->input->post('id'));
        $update = $this->db->update('tb_job', $data);
        if ($update) {
            echo base64_encode("1");
        } else {
            echo base64_encode("0");
        }
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $cek = $this->db->get_where('tb_detail_job', ['id_job' => $id]);
        if ($cek->num_rows() > 0) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Data Tugas Masih digunakan, Sehingga Tidak Dapat di Hapus Hanya Dapat di Ubah',
                ]));
        }

        $delete = $this->db->delete('tb_job', array('id_job' => $id));
        if ($delete) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus'
                ]));
        } else {
            return $this->output->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Data gagal dihapus'
                ]));
        }
    }

    public function store_detail()
    {
        $config['upload_path']          = './assets/file_job/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'File gagal diupload'
                ]));
        } else {
            $data = [
                'id_job' => $this->input->post('id_job'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_akhir' => $this->input->post('waktu_akhir'),
                'status' => 'false',
                'data_job' =>  $this->upload->data("file_name"),
                'notif' => 'false'
            ];

            $insert = $this->db->insert('tb_detail_job', $data);
            if ($insert) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode([
                        'status' => 'success',
                        'message' => 'Data berhasil disimpan'
                    ]));
            } else {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(500)
                    ->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Data gagal disimpan'
                    ]));
            }
        }
    }
}
