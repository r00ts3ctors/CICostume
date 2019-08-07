<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
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
        );
        $this->load->view('member/member_list', $data);
    }

    public function read($id)
    {
        $row = $this->Member_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idMember' => $row->idMember,
		'idReferal' => $row->idReferal,
		'nama' => $row->nama,
		'panggilan' => $row->panggilan,
		'hp' => $row->hp,
		'email' => $row->email,
		'idDetail' => $row->idDetail,
		'idSaldo' => $row->idSaldo,
		'username' => $row->username,
		'password' => $row->password,
		'pin' => $row->pin,
	    );
            $this->load->view('member/member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('member/create_action'),
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
	);
        $this->load->view('member/member_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idMember' => $this->input->post('idMember',TRUE),
		'idReferal' => $this->input->post('idReferal',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'panggilan' => $this->input->post('panggilan',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'idDetail' => $this->input->post('idDetail',TRUE),
		'idSaldo' => $this->input->post('idSaldo',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'pin' => $this->input->post('pin',TRUE),
	    );

            $this->Member_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('member'));
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
	    );
            $this->load->view('member/member_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idMember' => $this->input->post('idMember',TRUE),
		'idReferal' => $this->input->post('idReferal',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'panggilan' => $this->input->post('panggilan',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'idDetail' => $this->input->post('idDetail',TRUE),
		'idSaldo' => $this->input->post('idSaldo',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'pin' => $this->input->post('pin',TRUE),
	    );

            $this->Member_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('member'));
        }
    }

    public function delete($id)
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $this->Member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idMember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idReferal', 'idreferal', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('panggilan', 'panggilan', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('idDetail', 'iddetail', 'trim|required');
	$this->form_validation->set_rules('idSaldo', 'idsaldo', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('pin', 'pin', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-06 16:00:10 */
/* http://harviacode.com */
