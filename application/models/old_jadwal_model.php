<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	public function __construct(){
        parent::__construct();
	}
	
	
	
	public function cari_hari_tanggal(){
		return $this->db->get('hari-tanggal')->result();
	}
	
	public function cari_pelajaran($kelas){
		return $this->db->where('kelas', $kelas)->get('pelajaran')->result();
	}
	
    public function cari_kelas_ruang(){
		return $this->db->order_by('no', 'ASC')->get('kelas-ruang')->result();
	}
	
	
	
	public function jumlah_kelas(){
		return $this->db->get('kelas-ruang')->num_rows();
	}
	
	public function jumlah_pelajaran(){
		return $this->db->get('pelajaran')->num_rows();
	}
	
	
	
	public function update(){
	
		for($no_tanggal = 1; $no_tanggal < 8; $no_tanggal++){
			$this->db->where('no', $no_tanggal)
			->update('hari-tanggal', array('tanggal' => $this->input->post("tanggal_{$no_tanggal}")));
		}
	
		for($no_kelas_ruang = 1; $no_kelas_ruang < $this->jumlah_kelas()+1; $no_kelas_ruang++){
			$this->db->where('no', $no_kelas_ruang)
			->update('kelas-ruang', array('kelas' => strtoupper($this->input->post("kelas_{$no_kelas_ruang}")), 'ruang' => strtoupper($this->input->post("ruang_{$no_kelas_ruang}"))));
		}
	
		for($no_pelajaran = 1; $no_pelajaran < $this->jumlah_pelajaran()+1; $no_pelajaran++){
			$this->db->where('kode', $no_pelajaran)
			->update('pelajaran', array('p1' => strtoupper($this->input->post(($no_pelajaran*2)-1)), 'p2' => strtoupper($this->input->post($no_pelajaran*2))));
		}
	
		return $this->db->affected_rows() > 0;
	}
	
	
	
	public function create(){
		$data = array('no' => $this->jumlah_kelas()+1, 'kelas' => '', 'ruang' => '');
		$this->db->insert('kelas-ruang', $data);
		
		for($count = 1; $count < 8; $count++){
			$blank = array('kode' => $this->jumlah_pelajaran()+1, 'hari' => $count, 'kelas' => $this->jumlah_kelas(), 'p1' => '', 'p2' => '');
			$this->db->insert('pelajaran', $blank);
		}
		
		return TRUE;
	}
	
	public function delete(){
		$this->db->where('kelas', $this->jumlah_kelas())->delete('pelajaran');
		$this->db->where('no', $this->jumlah_kelas())->delete('kelas-ruang');
		
		return TRUE;
	}
	
	
	
	public function search_auto(){
		$kelas = $this->input->post("kelas");
		$where = "kelas = {$kelas} AND p1 != ''";
		return $this->db->where($where)->get('pelajaran')->result();
	}
	
	public function search_auto_hari(){
		$where = "";

		foreach($this->search_auto() as $row){
			$where = $where . "no = {$row->hari} OR ";
		}
		
		$where = $where . "FALSE"; // buat nutup OR di terakhir string $where //
		
		return $this->db->where($where)->get('hari-tanggal')->result();
	}
	
	public function search_auto_kelas(){
		foreach($this->search_auto() as $row){
			$kelas = $row->kelas;
			break;
		}
		
		return $this->db->where('no', $kelas)->get('kelas-ruang')->result();
	}
}