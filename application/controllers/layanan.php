<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
    
		$this->load->model('model_form_transaksi');
		$this->load->model('model_form_settings');
		$this->load->model('model_laporan');
		$this->load->model('model_laporan','laporan');
	
		if($this->session->userdata('id_jenis_user') <> 'Admin')
		{
			redirect('login');
		}
	}
	public function index()
	{
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Selamat datang <b>'.$this->session->userdata('nama_login').'</b> di halaman <b>Home</b> :D';
		$data['t_icon_notififikasi'] = 'ti-home';
		$data['t_notififikasi_type'] = 'success';
		$this->render_page('halaman/beranda', $data);
	}



/*
	#{ awal fungsi pasien #
	public function pasien()
	{
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Silahkan gunakan halaman  ini untuk : <br><b>Data pasien ^_^</b>';
		$data['t_icon_notififikasi'] = 'ti-user';
		$data['t_notififikasi_type'] = 'info';
		$this->render_page('halaman/tabel_pasien', $data);
	}
	# akhir fungsi pasien } #
*/	


	public function transaksi()
	{
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Silahkan gunakan halaman ini untuk : <br><b> 1) Meninjau data transaksi pasien, & <br> 2) Mencetak data laporan transaksi pasien.</b>';
		$data['t_icon_notififikasi'] = 'ti-files';
		$data['t_notififikasi_type'] = 'warning';
		$this->render_page('halaman/tabel_transaksi', $data);
	}
	
	# {awal fungsi form_transaksi #

	public function form_transaksi()
	{
		$data['t_kode_transaksi'] = $this->model_form_transaksi->buat_kode_transaksi();
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Silahkan gunakan halaman ini untuk : <br><b> Mengisi form transaksi pasien, <br> & mencetak kwitansinya n_n </b>';
		$data['t_icon_notififikasi'] = 'ti-pencil-alt';
		$data['t_notififikasi_type'] = 'danger';
		
		$this->render_page('halaman/form_transaksi', $data);
	}
	
    public function simpan_form_transaksi()
    {

		$a = $this->input->post('output_nominal_hidden');
		$b = $this->input->post('jumlah');
		$total_jumlah =  $a*$b;
        $data = array(
            'id' => '',
            'no_transaksi' => $this->input->post('no_transaksi'),
            'tanggal' => $this->input->post('tanggal'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'guna_bayar' => $this->input->post('guna_bayar'),
            'nominal' => $this->input->post('output_nominal_hidden'),
            'jumlah' => $this->input->post('jumlah'),
            'total' => $total_jumlah
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('halaman/cetak_kwitansi', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Kwitansi '.$this->input->post('no_transaksi').' -'.$this->model_laporan->tanggal_indo($this->input->post('tanggal'), true).' - rsu-avisena.com', 'I');		
        $data = $this->model_form_transaksi->simpan_form_transaksi('transaksi', $data);
		
    }

	# akhir fungsi form_transaksi} #
	

	#{ awal laporan #
	
	public function laporan()
	{
		$data['t_tabel_laporan'] = $this->model_laporan->dapatkan_record_tabel_laporan();
		$data['t_sum_nominal_jumlah'] = $this->model_laporan->sum_nominal_jumlah();
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Silahkan gunakan halaman  ini untuk : <br> <b> 1) Mencari data, <br> 2) Meng-ekspor semua data laporan, & <br> 3) Mencetak laporan berdasarkan tanggal. ^_^</b>';
		$data['t_icon_notififikasi'] = 'ti-files';
		$data['t_notififikasi_type'] = 'warning';
		$this->render_page('halaman/tabel_laporan', $data);
	}


    public function ajax_list_laporan()
    {
        $list = $this->laporan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $laporan) {
            $no++;
            $row = array();
            $row[] = date('d-m-Y', strtotime($laporan->tanggal));;
            $row[] = $laporan->no_transaksi;
            $row[] = $laporan->guna_bayar;
			$nominalnya = number_format ($laporan->nominal, 0, ',', '.');
            $row[] = 'Rp. '.$nominalnya;
            $row[] = $laporan->jumlah;
			$totalnya = number_format ($laporan->total, 0, ',', '.');
            $row[] = 'Rp. '.$totalnya;
 
            //add html for action
            $row[] = '<center><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data_laporan('."'".$laporan->id."'".')">❌</a></center>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->laporan->count_all(),
                        "recordsFiltered" => $this->laporan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

/* 
    public function ajax_edit_laporan($id)
    {
        $data = $this->laporan->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add_laporan()
    {
        $data = array(
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_pasien' => $this->input->post('no_pasien'),
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'guna_bayar' => $this->input->post('guna_bayar'),
                'nominal' => $this->input->post('nominal'),
                'jumlah' => $this->input->post('jumlah'),
                'total' => $this->input->post('total'),
            );
        $insert = $this->laporan->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update_laporan()
    {
        $data = array(
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_pasien' => $this->input->post('no_pasien'),
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'guna_bayar' => $this->input->post('guna_bayar'),
                'nominal' => $this->input->post('nominal'),
                'jumlah' => $this->input->post('jumlah'),
                'total' => $this->input->post('total'),
            );
        $this->laporan->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
*/
    public function ajax_delete_laporan($id)
    {
        $this->laporan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    public function cetak_laporan()
	{
	$data['t_tanggal_awal'] = $this->input->post('tanggal_awal');
	$data['t_tanggal_akhir'] = $this->input->post('tanggal_akhir');
    $this->pdf->load_view('halaman/cetak_laporan', $data);
    $this->pdf->setFooter('{PAGENO} / {nb}');
	// Lakukan pengerjaan PDF
	$this->pdf->WriteHTML(utf8_encode($html));
	$this->pdf->WriteHTML($html,1);
	$this->pdf->Output('Laporan Data Transaksi Priode '.$this->model_laporan->tanggal_indo($this->input->post('tanggal_awal'), true).' - '.$this->model_laporan->tanggal_indo($this->input->post('tanggal_akhir'), true).' - rsu-avisena.com', 'I');
    }
	
  public function export_laporan(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('rsu-avisena.com')
                 ->setLastModifiedBy('rsu-avisena.com')
                 ->setTitle("Laporan Data Transaksi ".date('d-m-Y'))
                 ->setSubject("Laporan")
                 ->setDescription("Laporan Semua Data Transaksi")
                 ->setKeywords("Data Laporan");

    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA TRANSAKSI RSU AVISENA"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NO TRANSAKSI"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "GUNA BAYAR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "NOMINAL"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "JUMLAH"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TOTAL"); // Set kolom E3 dengan tulisan "ALAMAT"

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $hasil_laporan = $this->model_laporan->export_excel();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($hasil_laporan as $data)
	{ // Lakukan looping pada variabel laporan
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->guna_bayar);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nominal);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jumlah);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->total);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Export Data Transaksi  '.date('d-m-Y').' rsu-avisena.com.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
	
	# akhir laporan } #

	public function settings()
	{
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$data['t_notififikasi'] = 'Silahkan gunakan halaman ini untuk : <br><b> 1) Menambah atau menghapus data login, & <br> 2) Melakukan perubahan data login.</b>';
		$data['t_icon_notififikasi'] = 'ti-settings';
		$data['t_notififikasi_type'] = 'info';
		$this->render_page('halaman/tabel_setting', $data);
	}

	public function form_settings()
	{
		
		switch($this->input->get('fn'))
		{
			case 'add' : $data['t_notififikasi'] = 'Silahkan gunakan halaman  ini untuk : <br><b>Menambahkan data login ^_^</b>';
			              $data['t_icon_notififikasi'] = 'ti-user';
			              $data['t_notififikasi_type'] = 'success';
			break;
			case 'edit' : $data['t_notififikasi'] = 'Silahkan gunakan halaman  ini untuk : <br><b>Mengubah data login ^_^</b>';
			              $data['t_icon_notififikasi'] = 'ti-info';
			              $data['t_notififikasi_type'] = 'danger';
			break;
		}
		
		
		$data['t_id_login'] = $this->model_form_settings->buat_id_login();
		$data['t_akses'] = $this->session->userdata('id_jenis_user');
		$data['t_nama_login'] = $this->session->userdata('nama_login');
		$this->render_page('halaman/form_settings', $data);
	}

	public function simpan_settings()
	{
        $data = array(
            'id' => $this->input->post('id_login'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'akses' => $this->input->post('akses'),
            'nama' => $this->input->post('nama'),
            'no_ponsel' => $this->input->post('no_ponsel')
             );
        $data = $this->model_form_settings->simpan_form_settings('login', $data);
        redirect(base_url('layanan/settings?s=o'), 'refresh');
	}

	public function update_settings() 
	{   
    $data = array(
    'table_name' => 'login', // pass the real table name
            'id' => $this->input->post('id_login'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'akses' => $this->input->post('akses'),
            'nama' => $this->input->post('nama'),
            'no_ponsel' => $this->input->post('no_ponsel')
    );
    if($this->model_form_settings->update_settings($data)) // call the method from the model
    {
        redirect(base_url('layanan/settings?s=o'), 'refresh');
    }
    else
    {
        // update not successful
    }

	}

	public function delete_settings()
	{
        $data = array('id' => $this->input->get('hapus_id'));
        $where = $this->model_form_settings->delete_settings('login', $data);
        redirect(base_url('layanan/settings?s=o'), 'refresh');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
