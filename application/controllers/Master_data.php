<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Master_data_model"); //load model data
    }

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data["title"] = "Master Data";
		$data["status_nav"] = "master data";
		$data["list_laporan"] = $this->Master_data_model->getAll('tbl_jenis_laporan');

		$this->load->view('template/header', $data);
		$this->load->view('master_data', $data);
		$this->load->view('template/footer', $data);
	}


	public function tambah_jenisLaporan()
	{
		$data["title"] = "Master Data | tambah jenis laporan";
		$data["status_nav"] = "master data";
		$data["last_id"] = $this->Master_data_model->getLastId('id','tbl_jenis_laporan');

		$this->load->view('template/header', $data);
		$this->load->view('jenis_laporan', $data);
		$this->load->view('template/footer', $data);
	}

	public function save()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = $this->Master_data_model->getData('tbl_jenis_laporan', 'jenis', $this->input->post('jenis'));
		if (isset($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	            Jenis Laporan Sudah Ada!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');
			redirect('Master_data/tambah_jenisLaporan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            Input jenis laporan sukses!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');
			
			$data = array(
				'id' => $this->input->post('id'),
				'jenis' => $this->input->post('jenis'),
				'nomor' => $this->input->post('nomor'),
				'date_created' => $this->input->post('date_created')
			);

			$this->Master_data_model->save('tbl_jenis_laporan', $data);
			redirect('Master_data/tambah_jenisLaporan');
		}
	}

	public function edit_jenisLaporan()
	{
		date_default_timezone_set('Asia/Jakarta');
		if($this->input->get('mode') == null){
			$data_jenis = $this->Master_data_model->getData("tbl_jenis_laporan", "id", $this->input->get('id'));

			$data["title"] = "Master Data | edit jenis laporan";
			$data["status_nav"] = "master data";
			$data["last_id"] = $this->Master_data_model->getLastId('id', 'tbl_jenis_laporan');
			$data["id"] = $data_jenis['id'];
			$data["jenis"] = $data_jenis['jenis'];
			$data["nomor"] = $data_jenis['nomor'];		

			$this->load->view('template/header', $data);
			$this->load->view('edit_jenis_laporan', $data);
			$this->load->view('template/footer', $data);
		}else{
			// Proses save update
			$id = $this->input->post('id');
			$data = array(
				'id' => $id,
				'jenis' => $this->input->post('jenis'),
				'nomor' => $this->input->post('nomor'),
				'date_modified' => $this->input->post('date_modified')
			);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            Edit jenis laporan sukses!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');

			$this->Master_data_model->update('tbl_jenis_laporan',$data,'id',$id);
			redirect('Master_data');
		}
	}

	public function delete_jenis()
	{
		$table = 'tbl_jenis_laporan';
		$id = $this->input->get('id');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
		$msg['success'] = true;
		$this->db->delete($table, array("id" => $id));
		$this->output->set_output(json_encode($msg));
	}

	public function data_pengawas()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data["title"] = "Data pengawas";
		$data["status_nav"] = "master data";
		$data["list_pengawas"] = $this->Master_data_model->getAll('tbl_petugaslab');

		$this->load->view('template/header', $data);
		$this->load->view('data_pengawas', $data);
		$this->load->view('template/footer', $data);
	}

	public function tambah_pengawas()
	{
		$data["title"] = "Master Data | tambah pengawas";
		$data["status_nav"] = "master data";
		$data["last_id"] = $this->Master_data_model->getLastId('id_petugaslab','tbl_petugaslab');

		$this->load->view('template/header', $data);
		$this->load->view('tambah_pengawas', $data);
		$this->load->view('template/footer', $data);
	}

	public function save_pengawas()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = $this->Master_data_model->getData('tbl_petugasLab', 'nip', $this->input->post('nip'));
		if (isset($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	            data pengawas Sudah Ada!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');
			redirect('Master_data/tambah_pengawas');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            Input data pengawas sukses!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');
			
			$data = array(
				'id_petugasLab' => $this->input->post('id_petugasLab'),
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'wilayah' => $this->input->post('wilayah'),
				'date_created' => $this->input->post('date_created')
			);

			$this->Master_data_model->save('tbl_petugaslab', $data);
			redirect('Master_data/tambah_pengawas');
		}
	}

	public function edit_pengawas()
	{
		date_default_timezone_set('Asia/Jakarta');
		if($this->input->get('mode') == null){
			$data_pengawas = $this->Master_data_model->getData("tbl_petugaslab", "id_petugasLab", $this->input->get('id'));

			$data["title"] = "Master Data | edit pengawas";
			$data["status_nav"] = "master data";
			$data["last_id"] = $this->Master_data_model->getLastId('id_petugasLab', 'tbl_petugaslab');
			$data["id"] = $data_pengawas['id_petugasLab'];
			$data["nip"] = $data_pengawas['nip'];
			$data["nama"] = $data_pengawas['nama'];
			$data["wilayah"] = $data_pengawas['wilayah'];	

			$this->load->view('template/header', $data);
			$this->load->view('edit_pengawas', $data);
			$this->load->view('template/footer', $data);
		}else{
			// Proses save update
			$id = $this->input->post('id_petugasLab');
			$data = array(
				'id_petugasLab' => $id,
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'wilayah' => $this->input->post('wilayah'),
				'date_modified' => $this->input->post('date_modified')
			);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            Edit pengawas sukses!. 
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button></div>');

			$this->Master_data_model->update('tbl_petugaslab',$data,'id_petugasLab',$id);
			redirect('Master_data/data_pengawas');
		}
	}

	public function delete_pengawas()
	{
		$table = 'tbl_petugaslab';
		$id = $this->input->get('id');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
		$msg['success'] = true;
		$this->db->delete($table, array("id_petugasLab" => $id));
		$this->output->set_output(json_encode($msg));
	}

	public function master_dataDetailHotmix()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data["title"] = "Detail hotmix";
		$data["status_nav"] = "master data";
		$data["list_detail"] = $this->Master_data_model->getAll('tbl_master_hotmix_detail');

		$this->load->view('template/header', $data);
		$this->load->view('master_data_hotmix', $data);
		$this->load->view('template/footer', $data);
	}

	public function ajax_dataDetailHotmix()
	{
		$data = $this->Master_data_model->getAll('tbl_master_hotmix_detail');
		foreach ($data as $row) {
			echo "
				<tr>
					<td>".$row->id."</td>
					<td style='width:100px;'>".$row->jenis."</td>
					<td>".$row->berat_contoh_sebelum_extraksi."</td>
					<td>".$row->berat_filter_sebelum_extraksi."</td>
					<td>".$row->berat_contoh_sesudah_extraksi."</td>
					<td>".$row->berat_filter_sesudah_extraksi."</td>
					<td>".$row->berat_total_agregat."</td>
					<td>".$row->berat_aspal."</td>
					<td>".$row->kadar_aspal."</td>
					<td>
						<a href='#' data=".$row->id ." class='btn btn-primary btn-sm item-edit'><span class='fa fa-edit'></span></a>
						<a href='javascript:void(0);' data=".$row->id ." class='btn btn-danger btn-sm item-delete'><i class='fa fa-trash'></i> </a>
					</td>
				</tr>
			";
		}
	}

	public function save_detailHotmix()
	{
		date_default_timezone_set('Asia/Jakarta');
		$lastId = $this->Master_data_model->getLastId('id','tbl_master_hotmix_detail');
		$data = $this->Master_data_model->getData('tbl_master_hotmix_detail', 'jenis', $this->input->post('jenis'));
    	if(isset($data)){
			echo "Jenis sudah terdaftar!";
		}else{
			// ADD NEW DATA
			$array = array(
				'id' => $lastId+1,
				'jenis' => $this->input->post('jenis'),
				'berat_contoh_sebelum_extraksi' => $this->input->post('contoh_before'),
		    	'berat_filter_sebelum_extraksi' => $this->input->post('filter_before'),
		    	'berat_contoh_sesudah_extraksi' => $this->input->post('contoh_after'),
		    	'berat_filter_sesudah_extraksi' => $this->input->post('filter_after'),
		    	'berat_total_agregat' => $this->input->post('agregat'),
		    	'berat_aspal' => $this->input->post('berat_aspal'),
		    	'kadar_aspal' => $this->input->post('kadar_aspal')
			);
			$this->Master_data_model->save('tbl_master_hotmix_detail', $array);
			echo "SAVE SUCCESS";
		}
	}

	public function edit_detailHotmix()
	{
		if($this->input->get('mode')=='save_edit'){
			$array = array(
				'jenis' => $this->input->post('data1'),
				'berat_contoh_sebelum_extraksi' => $this->input->post('data2'),
			    'berat_filter_sebelum_extraksi' => $this->input->post('data3'),
			    'berat_contoh_sesudah_extraksi' => $this->input->post('data4'),
			    'berat_filter_sesudah_extraksi' => $this->input->post('data5'),
			    'berat_total_agregat' => $this->input->post('data6'),
			    'berat_aspal' => $this->input->post('data7'),
			    'kadar_aspal' => $this->input->post('data8')
			);
			$this->Master_data_model->update('tbl_master_hotmix_detail',$array,'id',$this->input->post('id'));
			print_r($array);	
		}else{
			$id = $this->input->get('id');
			$data = $this->Master_data_model->getData('tbl_master_hotmix_detail', 'id', $id);
			echo $data['id'].';';
			echo $data['jenis'].';';
			echo $data['berat_contoh_sebelum_extraksi'].';';
			echo $data['berat_filter_sebelum_extraksi'].';';
			echo $data['berat_contoh_sesudah_extraksi'].';';
			echo $data['berat_filter_sesudah_extraksi'].';';
			echo $data['berat_total_agregat'].';';
			echo $data['berat_aspal'].';';
			echo $data['kadar_aspal'].';';
		}
	}

	public function delete_detailHotmix()
	{
		$table = 'tbl_master_hotmix_detail';
		$id = $this->input->get('id');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
		$msg['success'] = true;
		$this->db->delete($table, array("id" => $id));
		$this->output->set_output(json_encode($msg));
	}

	public function master_dataAnalisaButiran()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data["title"] = "Detail hotmix";
		$data["status_nav"] = "master data";
		$data["list_detail"] = $this->Master_data_model->getAll('tbl_master_hotmix_analisabutir');

		$this->load->view('template/header', $data);
		$this->load->view('master_dataAnalisaButiran', $data);
		$this->load->view('template/footer', $data);
	}

	public function ajax_AnalisaButiran()
	{
		$data = $this->Master_data_model->getAll('tbl_master_hotmix_analisabutir');
		echo json_encode($data);
	}

}