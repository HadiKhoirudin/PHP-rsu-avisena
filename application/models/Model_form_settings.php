<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_form_settings extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	# { awal form_transaksi	#

	public function buat_id_login()
	{
		  $this->db->select('login.id', FALSE);
		  $this->db->order_by('id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('login');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika id ternyata sudah ada.      
		   $data = $query->row();      
		   $id = intval($data->id) + 1;    
		  }
		  else {      
		   //jika id belum ada      
		   $id = 1;    
		  }
		  $id_jadi = $id;    // hasilnya 1 dst.
		  return $id_jadi;  
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

    public function delete_settings($table, $where)
    {
        # where digunakan untuk memilih record yang akan dihapus
        $res = $this->db->delete($table, $where);
        # ambil hasil dari variabel $res
        return $res;
    }

    public function update_settings($data)
	{
    extract($data);
    $this->db->where('id', $id);
    $this->db->update($table_name, 
	array(
	'id' => $id_login,
	'username' => $username,
	'password' => $password,
	'akses' => $akses,
	'nama' => $nama,
	'no_ponsel' => $no_ponsel
	));
    return true;
    }

	public function simpan_form_settings($table, $data)
	{
	$res = $this->db->insert($table, $data);
	return $res;
	}
	#  akhir form_transaksi	} #
}