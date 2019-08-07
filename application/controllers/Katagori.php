<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Katagori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Katagori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'katagori/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'katagori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'katagori/index.html';
            $config['first_url'] = base_url() . 'katagori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Katagori_model->total_rows($q);
        $katagori = $this->Katagori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'katagori_data' => $katagori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'katagori/katagori_list',
        );
        $this->load->view('template', $data);
    }

    public function read($id)
    {
        $row = $this->Katagori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
	    );
            $this->load->view('katagori/katagori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('katagori'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('katagori/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	);
        $this->load->view('katagori/katagori_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Katagori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('katagori'));
        }
    }

    public function update($id)
    {
        $row = $this->Katagori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('katagori/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->load->view('katagori/katagori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('katagori'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Katagori_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('katagori'));
        }
    }

    public function delete($id)
    {
        $row = $this->Katagori_model->get_by_id($id);

        if ($row) {
            $this->Katagori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('katagori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('katagori'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Katagori.php */
/* Location: ./application/controllers/Katagori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-06 18:32:15 */
/* http://harviacode.com */