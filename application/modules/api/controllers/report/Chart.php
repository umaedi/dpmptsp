<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Chart extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
		$this->load->model('report/m_chart');
		$this->load->model('m_main');
    }
	
	public function makro_get()
    {
        $year 		= $this->get('year');
        $data['jumlah_penduduk']		= $this->chart($year,'Jumlah Penduduk (Ribu Jiwa)', 'ICON_PENDUDUK.png', 'admin/','jumlah_penduduk_kabupaten','Pertumbuhan penduduk adalah suatu perubahan populasi yang terjadi sewaktu-waktu dan bisa dihitung sebagai perubahan dalam jumlah individu atau dalam sebuah populasi menggunakan satuan “per waktu unit” untuk pengukuran.');
        $data['ipm']					= $this->chart($year,'Indeks Pembangunan Manusia (IPM)', 'iCON_IPM.png', 'admin/','ipm_kabupaten_waykanan','Indeks Pembangunan Manusia (IPM) / Human Development Index (HDI) adalah pengukuran perbandingan dari harapan hidup, melek huruf, pendidikan dan standar hidup untuk semua negara di seluruh dunia.');
        $data['ahp']					= $this->chart($year,'Angka Harapan Hidup', 'ICON_ANGKA_HARAPAN_HIDUP.png', 'admin/','angka_harapan_hidup','');
        $data['harapan_lama_sekolah']	= $this->chart($year,'Harapan Lama Sekolah', 'icon_angka_harapan_sekolah.png', 'admin/','angka_harapan_lama_sekolah','');
        $data['rata_lama_sekolah']		= $this->chart($year,'Rata-Rata Lama Sekolah', 'icon_rata2_sekolah.png', 'admin/','rata_rata_lama_sekolah','');
        $data['pertumbuhan_ekonomi']	= $this->chart($year,'Pertumbuhan Ekonomi (%)', 'ICON_PERTUMBUHAN_EKONOMI.png', 'admin/','perkembangan_data_makro_kabupaten','');
        $data['inflasi']	            = $this->chart($year,'Tingkat Inflasi (%)', 'icon_INFLASI.png', 'admin/','perkembangan_data_makro_kabupaten','');
        $data['tingkat_kemiskinan']		= $this->chart($year,'Tingkat Kemiskinan (%)', 'icon_KEMISKINAN.png', 'admin/','tingkat_kemiskinan_kabupaten','');
        $data['tingkat_pengangguran']	= $this->chart($year,'Tingkat Pengangguran Terbuka (%)', 'ICON_PENGANGGURAN.png', 'admin/','ketenagakerjaan','');
       
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($data)
            {
                // Set the response and exit
                $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
       
	}
	
	private function chart($year, $title, $icon, $sub, $path, $deskripsi){
		
		$year 		= $year; if($year == ""){ $year = date('Y'); };
		$result 	= $this->m_chart->get_makro($title, $year);
		$x			= array();
		$item		= array();
		
		
		foreach ($result as $val){
				$x[] =	$val['tahun'];
				if($val['value'] !=''){
				$item[] =	[$val['tahun'], (float)$val['value']];
				}
				}
		$now        = end($item);
		$prev		= prev($item);
		$compare	= $now[1] - $prev[1];
		if( $now[1] > $prev[1]){ $status = "naik"; }elseif( $now[1] < $prev[1]){ $status = "turun"; }else{ $status = "stabil";};
		
		switch ($status) {
			case "naik":
				$keterangan = $title.' Th. '.(int)$now[0].' '.$status.' '.$compare.' poin dibanding Th. '.$prev[0];
				break;
			case "turun":
				$keterangan = $title.' Th. '.(int)$now[0].' '.$status.' '.$compare.' poin dibanding Th. '.$prev[0];
				break;
			case "stabil":
				$keterangan = $title.' Th. '.(int)$now[0].' cenderung '.$status.' dari Th. '.$prev[0];
				break;
		}
		
		$chart['breadcrumb'] 		= 'BAPPEDA Kab. Tulang Bawang';		
		$chart['categories'] 		= $x;
		$chart['icon'] 		        = base_url('assets/images/app/'.$icon);
		$chart['title'] 			= $title;
		$chart['last'] 	            = array("tahun" =>(int)$now[0], "value" => $now[1], "keterangan" => $keterangan);
		$chart['series'] 			= $item;
		$chart['sub'] 			    = $sub;
		$chart['path'] 			    = $path;
		$chart['deskripsi'] 		= $deskripsi;
	
		
		return $chart;
	}
	
	
	
}
