<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {


    public function index($kelas = NULL){
    	echo "bangsat";
	}
	

	public function daftarkelas() {
		$kelasTable = $this->db->get('kelas-ruang')->result();
		$kelasRow = $this->db->get('kelas-ruang')->num_rows();

		$data = '';
		$presentRow = 0;
		foreach($kelasTable as $kelas) {
			$data .= 
				"{
					\"no\" : \"{$kelas->no}\",
					\"kelas\" : \"{$kelas->kelas}\",
					\"ruang\" : \"{$kelas->ruang}\"
				}";
			$presentRow++;
			if ($presentRow < $kelasRow) $data .= ',';
		}

		header("Access-Control-Allow-Origin: *");
		echo "[ {$data} ]";
	}


	public function kelas($no = NULL) {
		if ($no != '') {
			$kelas = $this->db->query("SELECT * FROM `kelas-ruang` WHERE `no` = {$no}")->row();

			$data = "
				{
					\"kelas\" : \"{$kelas->kelas}\",
					\"ruang\" : \"{$kelas->ruang}\"
				}
			";

			header("Access-Control-Allow-Origin: *");
			echo "[ {$data} ]";
		}
	}


	public function cari($kelas = NULL) {
		if ($kelas != '') {
			$query = "
				SELECT `hari-tanggal`.hari, `hari-tanggal`.tanggal, pelajaran.p1, pelajaran.p2 FROM `pelajaran` 
				RIGHT JOIN `hari-tanggal` ON pelajaran.hari = `hari-tanggal`.no 
				WHERE `kelas` = {$kelas} AND pelajaran.p1 != ''
			";
	
			$table = $this->db->query($query)->result();
			$tableRow = $this->db->query($query)->num_rows();
	
			$presentRow = 0;
			$data = "";
			
			foreach($table as $a) {
				$data .= "
					{
						\"hari\" : \"{$a->hari}\",
						\"tanggal\" : \"{$a->tanggal}\",
						\"p1\" : \"{$a->p1}\",
						\"p2\" : \"{$a->p2}\"
					}";
				$presentRow++;
				if ($presentRow < $tableRow) $data .= ',';
			}
			
			header("Access-Control-Allow-Origin: *");
			echo "[ {$data} ]";
		}
	}


	public function cari_jadwal($kelas = NULL){
		$table = $this->db->query("
			SELECT `hari-tanggal`.hari, `hari-tanggal`.tanggal, pelajaran.p1, pelajaran.p2 FROM `pelajaran` 
			RIGHT JOIN `hari-tanggal` ON pelajaran.hari = `hari-tanggal`.no 
			WHERE `kelas` = {$kelas} AND pelajaran.p1 != ''
		")->result();

		foreach($table as $a) {
			echo "
				{$a->hari}, {$a->tanggal} </br>
				Pelajaran pertama: {$a->p1} </br>
				Pelajaran kedua: {$a->p2} </br> </br>
			";
		}
	}
	
	
}