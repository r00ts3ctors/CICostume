<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Member_model');
    $this->load->library('form_validation');

  }


  function index(){
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
        $config['base_url'] = base_url() . 'admin/home/index.html?q=' . urlencode($q);
        $config['first_url'] = base_url() . 'admin/home/index.html?q=' . urlencode($q);
    } else {
        $config['base_url'] = base_url() . 'admin/home/index.html';
        $config['first_url'] = base_url() . 'admin/home/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Member_model->total_rows($q);
    $member = $this->Member_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
        'member_data' => $member,
        'q' => $q,
        'pagination' => $this->pagination->create_links(),
        'total_rows' => $config['total_rows'],
        'start' => $start,
        'konten' => 'admin/member_list',
    );
    $this->load->view('template', $data);
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('admin/home/create_action'),
      'id' => set_value('id'),
      'idMember' => set_value('idMember'),
      'idReferal' => set_value('idReferal'),
      'nama' => set_value('nama'),
      'panggilan' => set_value('panggilan'),
      'hp' => set_value('hp'),
      'email' => set_value('email'),
      'idDetail' => set_value('idDetail'),
      'idSaldo' => set_value('idSaldo'),
      'username' => set_value('username'),
      'password' => set_value('password'),
      'pin' => set_value('pin'),
      'konten' => 'admin/member_form',
    );
    $this->load->view('template', $data);
  }


  public function create_action()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
  	$this->form_validation->set_rules('panggilan', 'panggilan', 'trim|required');
  	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
  	$this->form_validation->set_rules('email', 'email', 'trim|required');
  	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


    if ($this->form_validation->run() == FALSE) {
      $this->create();
    }
    else {
      $data = array(
        'idMember' => $this->input->post('idMember',TRUE),
        'idReferal' => $this->input->post('idReferal',TRUE),
        'nama' => $this->input->post('nama',TRUE),
        'panggilan' => $this->input->post('panggilan',TRUE),
        'hp' => $this->input->post('hp',TRUE),
        'email' => $this->input->post('email',TRUE),
      );

      $this->Member_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('admin/home'));
    }
  }

  public function delete($id)
  {
      $row = $this->Member_model->get_by_id($id);

      if ($row) {
          $this->Member_model->delete($id);
          $this->session->set_flashdata('message', 'Delete Record Success');
          redirect(site_url('admin/home'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('admin/home'));
      }
  }

  public function update($id)
  {
    $row = $this->Member_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('member/update_action'),
        'id' => set_value('id', $row->id),
        'idMember' => set_value('idMember', $row->idMember),
        'idReferal' => set_value('idReferal', $row->idReferal),
        'nama' => set_value('nama', $row->nama),
        'panggilan' => set_value('panggilan', $row->panggilan),
        'hp' => set_value('hp', $row->hp),
        'email' => set_value('email', $row->email),
        'idDetail' => set_value('idDetail', $row->idDetail),
        'idSaldo' => set_value('idSaldo', $row->idSaldo),
        'username' => set_value('username', $row->username),
        'password' => set_value('password', $row->password),
        'pin' => set_value('pin', $row->pin),
        'konten' => 'admin/member_update',
      );
      $this->load->view('template', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('admin/home'));
    }
  }














}
