<?php
class Autentifikasi extends CI_Controller
    {
        public function index()
        {
            //jika statusnya sudah login, maka tidak bisa mengakses

            if($this->session->userdata('email')){
            redirect('user');
        }

            $this->form_validation->set_rules('email', 'Alamat Email',
            'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);
            $this->form_validation->set_rules('password', 'Password',
            'required|trim', [
            'required' => 'Password Harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';
            //kata 'login' merupakan nilai dari variabel judul dalam
            $this->load->view('templates/auto_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/auto_footer');
        } else {
            $this->_login();
        }
        }

        private function _login()
            {
                $email = htmlspecialchars($this->input->post('email',
                true));
                $password = $this->input->post('password', true);
                $user = $this->ModelUser->cekData(['email' => $email])->row_array();
                //jika usernya ada
                if ($user) {
                //jika user sudah aktif
                if ($user['is_active'] == 1) {
                //cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                        redirect('admin');
                        } else {
                        if ($user['image'] == 'default.jpg') {
                        $this->session->set_flashdata('pesan',
                        '<div class="alert alert-info alert-message" role="alert">Silahkan
                        Ubah Profile Anda untuk Ubah Photo Profil</div>');
                        }
                        redirect('user');
                }
            }       else {
                    $this->session->set_flashdata('pesan', '<div
                    class="alert alert-danger alert-message" role="alert">Password
                    salah!!</div>');
                    redirect('autentifikasi');
                    }
                    } else {
                    $this->session->set_flashdata('pesan', '<div
                    class="alert alert-danger alert-message" role="alert">User belum
                    diaktifasi!!</div>');
                    redirect('autentifikasi');
                    }
                    } else {
                    $this->session->set_flashdata('pesan', '<div
                    class="alert alert-danger alert-message" role="alert">Email tidak
                    terdaftar!!</div>');
                    redirect('autentifikasi');
                    }
            }

            public function blok()
            {
                $this->load->view('autentifikasi/blok');
            }

            public function gagal()
            {
                $this->load->view('autentifikasi/gagal');
            }

            public function registrasi()
            {
                if ($this->session->userdata('email')) {
                    redirect('user');
                }
                $this->form_validation->set_rules('nama','Nama lengkap','required',[
                    'required' => 'Nama belum diisi!'
                ]);
                $this->form_validation->set_rules('email','alamat email','required|trim|valid_email|is_unique',[
                    'valid_email' => 'Email tidak benar!',
                    'required' => 'Email belum diisi!',
                    'is_unique' => 'Email sudah terdaftar!',
                ]);
                $this->form_validation->set_rules('password1','Password','required|trim|valid_email|is_unique',[
                    'valid_email' => 'Email tidak benar!',
                    'required' => 'Email belum diisi!',
                    'is_unique' => 'Email sudah terdaftar!',
                ]);
            }
    }   