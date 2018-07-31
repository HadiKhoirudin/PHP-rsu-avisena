<?php
class MY_Controller extends CI_Controller{
    public function render_page($content, $data = NULL)
	{
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footernya'] = $this->load->view('template/footer', $data, TRUE);
        
        $this->load->view('template/isi', $data);
    }
}