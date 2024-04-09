<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Home_model"); //load model data
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$tbl = 'tbl_jenis_laporan';
		$data["title"] = "Home";
		$data["status_nav"] = "home";

		$data["data_no"] = $this->Home_model->getLastNo(); 
		$data["data_all"] = $this->Home_model->getAll($tbl);
		$data["data_kepala"] = $this->Home_model->getKepala();

		$this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $data);
	}

	public function landing()
	{
		$data["title"] = "Landing";
		$data["status_nav"] = "home";

		$this->load->view('template/header', $data);
		$this->load->view('landing', $data);
		$this->load->view('template/footer', $data);
	}

	public function printPreview()
	{
		
		$nama_kepala = $this->input->post('kepala');
		$nip = $this->Home_model->getData('NIP', 'tbl_user', 'nama', $nama_kepala);

		if($this->input->post('edit')!==''){
			// for edit view
			$time = strtotime($this->input->post('tanggal'));
			$newformat = Date('Y-m-d', $time);
			$tanggal_indonesia = $this->tanggal_indonesia($newformat);
		}else{
			// string to time
			$time = strtotime(strtr($this->input->post('tanggal'),'/','-'));
			$newformat = Date('Y-m-d',$time);

			$tanggal_indonesia = $this->tanggal_indonesia($newformat); 
		}
		$data = array(
			'no_reg' => $this->input->post('no_reg'),
			'tanggal' => $tanggal_indonesia,
			'tanggal_for_view' => $tanggal_indonesia,
			'kegiatan' => $this->input->post('kegiatan'),
			'nomor' => $this->input->post('nomor'),
			'kode_rekening' => $this->input->post('kode_rekening'),
			'lokasi' => $this->input->post('lokasi'),
			'pelaksana' => $this->input->post('pelaksana'),
			'singkatan' => $this->input->post('singkatan'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'pemborong' => $this->input->post('pemborong'),
			'wilayah' => $this->input->post('wilayah'),
			'abt' => $this->input->post('abt'),
			'kepala' => $this->input->post('kepala'),
			'nip'=> $nip
		);

		$data["page"] = "print_with_border";
		$data["title"] = "PrintPreview";
		$data["status_nav"] = "home";
		$this->load->view('template/header', $data);
		$this->load->view('printPreview', $data);
		$this->load->view('template/footer', $data);
	}

	public function save(){
		$table = $this->Home_model; 
		$date = date('d/m/Y');

		// singkatan pelaksana!
		$words = explode(" ", strtoupper($this->input->post('pelaksana')));
		$acronym = "";
		foreach ($words as $w) {
		  	// check if contain c/v/p/t
			if($w == 'C' || $w == 'V' || $w == 'P' || $w == 'T'){
				$acronym .= "";
			}else if(is_numeric($w)){
				$acronym .= $w;
			}else{
				$acronym .= $w[0];
			}
		}
		$acronym = trim($acronym, "PTCV");
		$data = array(
			'no' => $this->input->post('no_reg'),
			'tanggal' => $date,
			'kode_rekening' => $this->input->post('kode_rekening'),
			'nomor' => $this->input->post('nomor'),
			'kegiatan' => $this->input->post('kegiatan'),			
			'nama_lokasi' => $this->input->post('lokasi'),
			'pelaksana' => $this->input->post('pelaksana'),
			'singkatan_pelaksana' => $acronym,
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'pemborong' => $this->input->post('pemborong'),
			'wilayah' => $this->input->post('wilayah'),
			'abt' => $this->input->post('abt'),
			'kepala_uptd' => $this->input->post('kepala'),
			'diambil' => $date
		);
		$table->save($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data laporan berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
		redirect('Home');
	}

	public function cover()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			// GET SELECTED DATA
			$where = $id;
			
			$tbl = 'tbl_data';
			$kegiatan = 'kegiatan';
			$lokasi = 'nama_lokasi';
			$kode_rekening = 'kode_rekening';
			$pelaksana = 'pelaksana';
			$data["page"] = "print_with_border";
			$data["title"] = "Cover";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);

			$this->load->view('template/header', $data);
			$this->load->view('cover', $data);
			$this->load->view('template/footer', $data);
		}else{
			// GET LAST ROW DATA
			$tbl = 'tbl_data';
			$kegiatan = 'kegiatan';
			$lokasi = 'nama_lokasi';
			$kode_rekening = 'kode_rekening';
			$pelaksana = 'pelaksana';
			$data["page"] = "print_with_border";
			$data["title"] = "Cover";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();

			$this->load->view('template/header', $data);
			$this->load->view('cover', $data);
			$this->load->view('template/footer', $data);
		}

		
	}


	public function tes_bahan()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			$where = $id;
			$data["title"] = "Test Bahan";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);

			$this->load->view('template/header', $data);
			$this->load->view('test_bahan', $data);
			$this->load->view('template/footer', $data);
		}else{
			$tbl = 'tbl_data';
			$data["title"] = "Test Bahan";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();

			$this->load->view('template/header', $data);
			$this->load->view('test_bahan', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function silinder()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			$where = $id;
			$data["title"] = "Silinder";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('silinder', $data);
			$this->load->view('template/footer', $data);
		}else{
			$tbl = 'tbl_data';
			$data["title"] = "Silinder";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('silinder', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function silinderDetail()
	{
		// POST data
    	$postData = $this->input->post('nama');
		$data = $this->Home_model->getData("nip", "tbl_petugaslab", "nama", $postData);
		echo json_encode($data);
	}

	public function silinderBasecourse()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			$where = $id;
			$data["title"] = "Silinder / Base Course";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('silinder_base_course', $data);
			$this->load->view('template/footer', $data);
		}else{
			$tbl = 'tbl_data';
			$data["title"] = "Silinder / Base Course";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('silinder_base_course', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function hotmix()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			$where = $id;
			$data["title"] = "Silinder / Hotmix";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["data_detail"] = $this->Home_model->getAll('tbl_master_hotmix_detail');
			$data["data_analisa"] = $this->Home_model->getAllDistinct("tbl_master_hotmix_analisabutir", "jenis");
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('hotmix', $data);
			$this->load->view('template/footer', $data);
		}else{
			$tbl = 'tbl_data';
			$data["title"] = "Silinder / Hotmix";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["data_detail"] = $this->Home_model->getAll('tbl_master_hotmix_detail');
			$data["data_analisa"] = $this->Home_model->getAllDistinct("tbl_master_hotmix_analisabutir", "jenis");
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('hotmix', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function view_hotmix_detailForChart()
	{
		$val = $this->input->get("id");
		$data = $this->Home_model->getAllWhere("*", "tbl_master_hotmix_grafik", "jenis", $val);
		$label = $this->Home_model->getAllDistinct("tbl_master_hotmix_grafik", "ukuran");
		$i = 1;
		foreach($data as $row){
			$data1[$i] = $row->spec_1;
			$data2[$i] = $row->spec_2;
			$data3[$i] = $row->lolos;
			$i++;
		}
		foreach($data1 as $row){
			echo $row.", ";
		}
		echo "| ";
		foreach($data2 as $row){
			echo $row.", ";
		}
		echo "| ";
		foreach($data3 as $row){
			echo $row.", ";
		}
		echo "| ";
		foreach($label as $row){
			echo $row->ukuran.", ";
		}
	}

	public function view_hotmix_detail()
	{
		$val = $this->input->get("id");
		$data = $this->Home_model->getAllWhere("*", "tbl_master_hotmix_detail", "jenis", $val);
		$i = 1;
		foreach($data as $row){
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sebelum Extraksi</td><td> = ".$row->berat_contoh_sebelum_extraksi." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Filter sebelum Extraksi</td><td> = ".$row->berat_filter_sebelum_extraksi." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sesudah Extraksi</td><td> = ".$row->berat_contoh_sesudah_extraksi." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sesudah Extraksi</td><td> = ".$row->berat_filter_sesudah_extraksi." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sesudah Extraksi</td><td> = ".$row->berat_total_agregat." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sesudah Extraksi</td><td> = ".$row->berat_aspal." Gram</td>";
			echo "</tr>";
			$i++;
			echo "<tr>";
			echo "<td>".$i.". </td>";
			echo "<td>Berat Contoh sesudah Extraksi</td><td> = ".$row->kadar_aspal." %</td>";
			echo "</tr>";
		}
	}

	public function view_analisaButiran()
	{
		$val = $this->input->get("id");
		$data = $this->Home_model->getAllWhere("*", "tbl_master_hotmix_analisabutir", "jenis", $val);
		foreach($data as $row){
			echo "<tr>";
			echo "<td style='border:1px solid;'>".$row->ukuran_saringan."</td>";
			echo "<td style='border:1px solid;'>".$row->tertahan_saringan."</td>";
			echo "<td style='border:1px solid;'>".$row->jumlah_tertahan."</td>";
			echo "<td style='border:1px solid;'>".$row->tertahan."</td>";
			echo "<td style='border:1px solid;'>".$row->lolos."</td>";
			echo "<td style='border:1px solid;'>".$row->spec."</td>";
			echo "</tr>";
		}
	}

	public function ajax_getPetugas()
	{
		$val = $this->input->get("id");
		$nama = $this->Home_model->getData("nama", "tbl_petugaslab", "id_petugasLab", $val);
		$nip = $this->Home_model->getData("nip", "tbl_petugaslab", "id_petugasLab", $val);
		echo "<b>".$nama."</b><br>";
		echo $nip;
	}

	public function tes_kubus()
	{
		$id = $this->input->get('id');
		if(isset($id)){
			$where = $id;
			$data["title"] = "Tes Kubus";
			$data["status_nav"] = "home";
			$data["lastRow"] = $this->Home_model->getById($where);
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('tes_kubus', $data);
			$this->load->view('template/footer', $data);
		}else{
			$tbl = 'tbl_data';
			$data["title"] = "Tes Kubus";
			$data["status_nav"] = "home";
			$data["lastId"]=$this->Home_model->getLastId();
			$data["lastRow"]=$this->Home_model->getLastRow();
			$data["petugas"] = $this->Home_model->getAll('tbl_petugasLab');
			$data["data_laporan"] = $this->Home_model->getAll('tbl_data');
			$data["kepala"] = $this->Home_model->getJoin('tbl_user.nip', 'tbl_user', 'tbl_data', 'tbl_user.nama = tbl_data.kepala_uptd');

			$this->load->view('template/header', $data);
			$this->load->view('tes_kubus', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function database()
	{
		$tbl = 'tbl_data';
		$data["title"] = "Database";
		$data["status_nav"] = "home";
		$data["data_all"] = $this->Home_model->getAll($tbl);

		$this->load->view('template/header', $data);
		$this->load->view('database', $data);
		$this->load->view('template/footer', $data);
	}

	public function database_edit()
	{
		$where = $this->input->get('id');
		$data["data_row"] = $this->Home_model->getById($where);
		$data["data_all"] = $this->Home_model->getAll('tbl_jenis_laporan');
		$data["data_kepala"] = $this->Home_model->getKepala();

		$this->load->view('template/header', $data);
		$this->load->view('database_edit', $data);
		$this->load->view('template/footer', $data);
	}

	public function update(){
		$table = $this->Home_model;
		$no = $this->input->post('no_reg');
		// singkatan pelaksana!
		$words = explode(" ", strtoupper($this->input->post('pelaksana')));
		$acronym = "";
		foreach ($words as $w) {
		  	// check if contain c/v/p/t
			if($w == 'C' || $w == 'V' || $w == 'P' || $w == 'T'){
				$acronym .= "";
			}else if(is_numeric($w)){
				$acronym .= $w;
			}else{
				$acronym .= $w[0];
			}
		}
		$acronym = trim($acronym, "PTCV");
		// $acronym = substr($acronym, 1);
		// singkatan pelaksana!	
		$data = array(
			'no' => $no,
			'tanggal' => $this->input->post('tanggal'),
			'kode_rekening' => $this->input->post('kode_rekening'),
			'nomor' => $this->input->post('nomor'),
			'kegiatan' => $this->input->post('kegiatan'),			
			'nama_lokasi' => $this->input->post('lokasi'),
			'pelaksana' => $this->input->post('pelaksana'),
			'singkatan_pelaksana' => $acronym,
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'pemborong' => $this->input->post('pemborong'),
			'wilayah' => $this->input->post('wilayah'),
			'abt' => $this->input->post('abt'),
			'kepala_uptd' => $this->input->post('kepala'),
			'diambil' => $date
		);
		print_r($data);
		$table->update($data,$no);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data laporan berhasil Di Perbaharui!. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
		redirect('Home/database');
	}

	public function database_delete()
	{
		$table = 'tbl_data';
		$id = $this->input->get('id');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');

		$this->db->delete($table, array("no" => $id));
		redirect('Home/database');
	}

	function tanggal_indonesia($tanggal){

		$bulan = array (
			1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
		);

		$var = explode('-', $tanggal);

		return $var[2] . ' ' . $bulan[ (int)$var[1] ] . ' ' . $var[0];
		// var 0 = tanggal
		// var 1 = bulan
		// var 2 = tahun
	}

}
