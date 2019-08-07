<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tukang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'tukang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tukang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tukang/index.html';
            $config['first_url'] = base_url() . 'tukang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tukang_model->total_rows($q);
        $tukang = $this->Tukang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tukang_data' => $tukang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'tukang/tukang_list',
        );
        $this->load->view('template', $data);
    }

    public function read($id)
    {
        $row = $this->Tukang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'kecamatan' => $row->kecamatan,
	 'konten' => 'tukang/tukang_read'    );
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'konten' => 'tukang/tukang_form',
            'action' => site_url('tukang/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'kecamatan' => set_value('kecamatan'),
	);
        $this->load->view('template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Tukang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tukang'));
        }
    }

    public function update($id)
    {
        $row = $this->Tukang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'konten' => 'tukang/tukang_form',
                'action' => site_url('tukang/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
	    );
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang'));
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
		'alamat' => $this->input->post('alamat',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Tukang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tukang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tukang_model->get_by_id($id);

        if ($row) {
            $this->Tukang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tukang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tukang.php */
/* Location: ./application/controllers/Tukang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Dikembangkan oleh Fakrullah Maulana dan dibuat pada : 2019-08-07 17:37:15  */
/* http://harviacode.com  dan maulana.ninja*/