<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_form_transaksi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	# { awal form_transaksi	#

	public function buat_kode_transaksi()
	{
		  $this->db->select('RIGHT(transaksi.no_transaksi,4) as kode', FALSE);
		  $this->db->order_by('no_transaksi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "NOT-".$kodemax;    // hasilnya NOT-0001 dst.
		  return $kodejadi;  
	}

	public function buat_kode_pasien()
	{
		  $this->db->select('RIGHT(pasien.no_pasien,4) as kode', FALSE);
		  $this->db->order_by('no_pasien','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "NOP-".$kodemax;    // hasilnya NOP-0001 dst.
		  return $kodejadi;  
	}

	public function combo_box_no_pasien(){
	return $this->db->query('select * from transaksi GROUP BY no_pasien');
	}

	public function combo_box_kode_transaksi(){
	return $this->db->query('select * from master');
	}

	public function simpan_form_transaksi($table, $data)
	{
	$res = $this->db->insert($table, $data);
	return $res;
	}
	#  akhir form_transaksi	} #
}