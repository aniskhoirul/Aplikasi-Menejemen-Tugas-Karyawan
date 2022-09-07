<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SuratController extends CI_Controller
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
        $data['jenis_surat'] = $this->db->get('tb_jn_surat')->result();
        $data['tahun_masuk'] = $this->db->get('tb_thn_masuk')->result();
        $this->load->view('template/header');
        $this->load->view('dosen/surat', $data);
    }

    public function json()
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

    public function store()
    {
        // $id_jn_surat = trim(str_replace("'", "''", $this->input->post("id_jn_surat")));
        // $id_thn_masuk = trim(str_replace("'", "''", $this->input->post("id_thn_masuk")));
        // $upload_surat  = trim(str_replace("'", "''", $this->input->post("upload_surat")));
        // $operasi = $this->M_master->mtambah_surat($id_jn_surat, $id_thn_masuk, $upload_surat);
        // echo base64_encode($operasi);
        $config['upload_path'] = './assets/file_surat/';
        $config['allowed_types'] = 'gif|jpg|pdf';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("upload")) {
            $data = array('upload_data' => $this->upload->data());
            $file = $data['upload_data']['file_name'];
            $data = array(
                'id_jn_surat' => trim(str_replace("'", "''", $this->input->post("id_jn_surat"))),
                'id_thn_masuk' => trim(str_replace("'", "''", $this->input->post("id_thn_masuk"))),
                'upload_surat' => $file,
            );
            $insert = $this->db->insert('tb_dt_surat', $data);
            echo json_encode($insert);
            // if ($insert) {
            //     return "1";
            // } else {
            //     return "0";
            // }
        } else {
            return $this->output->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => $this->upload->display_errors()
                ]));
        }
    }

    public function filter()
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
                echo base64_encode("1|" . $id . "|" . $id_jn_surat . "|" . $id_thn_masuk);
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
        $id_jn_surat = trim(str_replace("'", "''", $this->input->post("id_jn_surat")));
        $id_thn_masuk = trim(str_replace("'", "''", $this->input->post("id_thn_nasuk")));
        $upload_surat  = trim(str_replace("'", "''", $this->input->post("upload_surat ")));
        $operasi = $this->M_master->mubah_gaji($id, $id_jn_surat, $id_thn_masuk, $upload_surat);
        echo base64_encode($operasi);
    }

    public function destroy()
    {
        $a = trim(str_replace("'", "''", $this->input->post("id")));

        $operasi = $this->M_master->mhapus_surat($a);

        echo base64_encode($operasi);
    }
}
