<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->view('form-matakuliah');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode Matakuliah','required|min_length[3]', 
        [
            'required' => 'Kode Matakuliah Harus diisi',
            'min_lenght' => 'Kode terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama', 'Nama Matakuliah','required|min_length[3]',
        [
            'required' => 'Nama Matakuliah Harus diisi',
            'min_lenght' => 'Nama terlalu pendek'
        ]);
        $data = [
                    'kode' => $this->input->post('kode'),
                    'nama' => $this->input->post('nama'),
                    'sks' => $this->input->post('sks')
                ];
        (!$this->form_validation->run()) ? $this->load->view('form-matakuliah') : $this->load->view('form-data', $data); 
    }  
}