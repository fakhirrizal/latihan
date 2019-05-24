<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data_matkul = $this->Master_model->manualQuery("SELECT a.* FROM mata_kuliah a WHERE a.deleted='0'");
		$data = array();
		foreach ($data_matkul as $key => $value) {
			$pengampu = '';
			$data_dosen = $this->Master_model->manualQuery("SELECT b.nama FROM pengampu a LEFT JOIN dosen b ON a.dosen_id=b.id WHERE a.mata_kuliah_id=".$value->id." AND a.deleted='0' AND b.deleted='0'");
			foreach ($data_dosen as $key => $value2) {
				$pengampu .= $value2->nama.'<br>';
			}
			$data[] = array(
				'id' => $value->id,
				'mata_kuliah' => $value->mata_kuliah,
				'pengampu' => $pengampu
			);
		}
		$data_tampil['data_matkul'] = $data;
		$data_tampil['data_matkul_master'] = $data_matkul;
		$data_tampil['data_dosen'] = $this->Master_model->manualQuery("SELECT a.* FROM dosen a WHERE a.deleted='0'");
		$this->load->view('home',$data_tampil);
	}
	public function simpan_data(){
		$this->db->trans_start();
		for ($i=0; $i < COUNT($this->input->post('dosen')); $i++) {
			$data = array(
				'dosen_id' => $this->input->post('dosen')[$i],
				'mata_kuliah_id' => $this->input->post('matkul')
			);
			$this->Master_model->insertData('pengampu',$data);
		}
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			echo 'alert("Gagal tambah data!!")';
			echo "<script>window.location='".site_url()."'</script>";
		}
		else{
			echo '<script>alert("Berhasil tambah data!!")</script>';
			echo "<script>window.location='".site_url()."'</script>";
		}
	}
}
