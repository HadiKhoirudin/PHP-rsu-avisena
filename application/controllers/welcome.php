<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Welcome extends CI_Controller
{
 
    //....
 
    public function index()
    {
        // Muat library PDF
        $this->load->library('pdf');
//        $this->pdf->load_view('welcome');
 
 
        // Buat HTML atau load dari view
        $html = "<div class='kotak' ".
                "style='border:2px solid #ccc; ".
                "padding: 20px; ".
                "background: #aaf;' ".
                ">".
                "<h1>Demo CodeIgniter dan mPDF. Mantap!</h1>".
                "<a href='http://duniahost.com'>Web Hosting</a>".
                "</div>"; 

        // Lakukan pengerjaan PDF
        $this->pdf->WriteHTML(utf8_encode($html));
        $this->pdf->WriteHTML($html,1);
        $this->pdf->Output("output.pdf", 'I');
    }
}