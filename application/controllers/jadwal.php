<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends MY_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('jadwal_model', 'jadwal_model', TRUE);
		
		$this->data['success'] = $this->session->flashdata('success');
		$this->data['hari_tanggal'] = $this->jadwal_model->cari_hari_tanggal();
		$this->data['kelas_ruang'] = $this->jadwal_model->cari_kelas_ruang();
		
		$this->data['jumlah_kelas'] = $this->jadwal_model->jumlah_kelas();
		$this->data['jumlah_pelajaran'] = $this->jadwal_model->jumlah_pelajaran();
		
		$count_jumlah_kelas = $this->data['jumlah_kelas'] + 1 ;
		for($kelas = 1; $kelas < $count_jumlah_kelas; $kelas++){
			$this->data['pelajaran'][$kelas] = $this->jadwal_model->cari_pelajaran($kelas);
		}
    }

	
	public function index(){
		$this->data['function'] = 'index';
		$this->load->view('navbar_view', $this->data);
		$this->load->view('jumbotron_view');
		$this->load->view('jadwal_view', $this->data);
		$this->load->view('footer_view');
	}
	
	
	public function update(){
		$this->data['function'] = 'update';
		
		// JIKA USER BELUM LOG IN //
		if ($this->session->userdata('login') == FALSE){
			redirect('login');
		}
		
		// USER SUDAH LOG IN //
		else{
		
			// JIKA USER KLIK 'UPDATE' //
			if($this->input->post('submit')){
			
				// JIKA UPDATE DATA BERHASIL //
				if($this->jadwal_model->update()){
					$this->session->set_flashdata('success', TRUE);
					$this->session->set_flashdata('text', '<i class="fa fa-refresh" style="margin-right: 10px;"></i>Update jadwal berhasil');
					redirect('update');
				}
				
				// SAAT UPDATE DATA GAGAL //
				else{
					$this->session->set_flashdata('success', FALSE);
					redirect('update');
				}
			}
			
			// JIKA USER KLIK 'TAMBAH' //
			else if($this->input->post('create')){
				
				// JIKA TAMBAH KELAS BERHASIL //
				if($this->jadwal_model->create()){
					$this->session->set_flashdata('success', TRUE);
					$this->session->set_flashdata('text', '<i class="fa fa-plus" style="margin-right: 10px;"></i>Proses tambah kelas berhasil');
					redirect('update');
				}
				
				else{
					redirect('update');
				}
			}
			
			// JIKA USER KLIK 'HAPUS' //
			else if($this->input->post('delete')){
			
				// JIKA HAPUS KELAS BERHASIL //
				if($this->jadwal_model->delete()){
					$this->session->set_flashdata('success', TRUE);
					$this->session->set_flashdata('text', '<i class="fa fa-trash-o" style="margin-right: 10px;"></i>Proses hapus kelas berhasil');
					redirect('update');
				}
				
				else{
					redirect('update');
				}
			}
			
			// SAAT PERTAMA KALI MENGAKSES HALAMAN 'Update' //
			else{
				$this->load->view('navbar_view', $this->data);
				$this->load->view('jumbotron_view');
				$this->load->view('update_view', $this->data);
				$this->load->view('footer_view');
			}
		}
	}
	
	
	public function cari($kelas=NULL){
		$this->data['function'] = 'cari';
		
		
		// SAAT PERTAMA KALI MENGAKSES HALAMAN 'Cari' // TIDAK ADA KETERANGAN KELAS //
		if(empty($kelas)){
			$this->load->view('navbar_view', $this->data);
			$this->load->view('jumbotron_view');
			$this->load->view('cari_form_view');
			$this->load->view('footer_view');
		}
		
		
		// SUDAH ADA KETERANGAN KELAS //
		else{
			$this->data['search_auto'] = $this->jadwal_model->search_auto($kelas);
			$this->data['hari_dicari'] = $this->jadwal_model->search_auto_hari($kelas);
			$this->data['kelas_dicari'] = $this->jadwal_model->search_auto_kelas($kelas);
			$this->data['no_kelas_dicari'] = $kelas;
			
			$this->load->view('navbar_view', $this->data);
			$this->load->view('jumbotron_view');
			$this->load->view('cari_form_view', $this->data);
			$this->load->view('cari_view', $this->data);
			$this->load->view('footer_view');
		}
		
		
		// JIKA USER KLIK 'CARI JADWAL' //
		if($this->input->post('submit')){
			$kelas = $this->input->post('kelas');
			redirect("cari/{$kelas}#go");
		}
	}
}