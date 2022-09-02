<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('no_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        echo json_encode(['status' => 'success']);
    }
}