<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('read_model');
		if(!$this->session->userdata('fullname')){
			redirect(base_url('auth/login'),'refresh');
		}
	}
	public function index()
	{
		redirect('dashboard/chapter','refresh');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'),'refresh');
	}
	public function chapter()
	{		
		$data['title'] = 'All Chapters';
		$data['chap'] = $this->read_model->se("se_title,ch_post_date,ch_last_date,","");
		$this->load->view('head',$data);
		$this->load->view('chap_view',$data);
		$this->load->view('foot');
	}
	public function content($ch_id)
	{
		$data['title'] = 'New Content';
		// $data['content'] = $this->db->get()->result();
		$this->load->view('head',$data);
		$this->load->view('newct_view');
		$this->load->view('foot');
	}
	public function save_content()
	{
		$config['upload_path'] = base_url('assets/images/');
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$name = $this->upload->data('ch_featured_img');
			$width = $this->upload->data('image_width');
			$height = $this->upload->data('image_height');
			if($width>$height) $ct_type = 1; 
				else $ct_type = 2;
			$data  = array(
				'ct_name' => $name,
				'ct_type' => $ct_type,
				'ct_uploader' => $this->session->userdata('uid'),
				'ct_upload_time' => date('Y-m-d'),
				'ct_chapter' => $this->session->userdata('ch_id'),
				'ct_order'=>'');
			$this->db->insert('ta_content', $data);
			redirect(base_url('dashboard/chapter'),'refresh');
			// $data = array();
			// foreach ($_FILES as $key) {
			// 	if($width>$height)
			// 	$data['ct_type'] = 2;	
			// 	else $data['ct_type'] = 1;
				
			// 	$data[] = array(
			// 		'ct_name' => $key->name,
			// 		'ct_order'=> '');
			// }
			// $this->db->insert_batch('ta_content', $data);
		}
	}
	public function ch_new()
	{
		$data['title'] = 'New Chapter';
		$data['cat'] = $this->db->get('ta_season')->result();

		$this->load->view('head',$data);
		$this->load->view('newch_view',$data);
		$this->load->view('foot');
	}
	public function edit($id)
	{
		$data['title'] = 'Edit Chapter';
		$data['cont'] = $this->db->get_where('ta_content',
		array('ct_chapter' => $id))->result();
		$data['chap'] = $this->db->get_where('ta_chapter',array('ch_id' => $id),1)->row();
		$data['cat'] = $this->db->get('ta_season')->result();

		$this->load->view('head',$data);
		$this->load->view('edit_view',$data);
		$this->load->view('foot');
	}
	public function save_chapter()
	{
		$config['upload_path'] = FCPATH.'assets/images/cover';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload("ch_featured_img")){
			$error = array('error' => $this->upload->display_errors());
		}

		$filename = $this->upload->data('file_name');
		$config = array(
			'image_library'=>'gd2',
			'source_image'=>FCPATH.'assets/images/cover/'.$filename,
			'maintain_ratio'=>TRUE,
			'height'=>50,
			'create_thunb'=>FALSE,
			'new_image'=>FCPATH.'assets/images/cover/thumb'.$filename
		);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		$data = array(
			'ch_featured_img'=>$filename,
			'ch_title'=>$this->input->post('ch_title'),
			'ch_post_date'=>date('Y-m-d'),
			'ch_last_date'=>date('Y-m-d'),
			'ch_tag'=>$this->input->post('ch_tag'),
			'ch_desc'=>$this->input->post('ch_desc'),
			'ch_author'=>$this->session->userdata('uid'),
			'ch_category'=>$this->input->post('ch_category'),
			'ch_slug'=>str_replace(' ','-', strtolower($this->input->post('ch_title'))));
		$this->db->insert('ta_chapter',$data);
		$ch_id = $this->db->insert_id();
		redirect(base_url('dashboard/content/'.$ch_id),'refresh');
	}
	public function update_chapter()
	{	$where = array('ch_id'=>$this->input->post('ch_id'));
		$data = array(
			'ch_title'=>$this->input->post('ch_title'),
			'ch_last_date'=>date('Y-m-d'),
			'ch_tag'=>$this->input->post('ch_tag'),
			'ch_desc'=>$this->input->post('ch_desc'),
			'ch_category'=>$this->input->post('ch_category'));
		var_dump($_POST);
		// echo json_encode($_GET);
		// $this->db->update('ta_chapter', $data, $where);
		// redirect(base_url('dashboard/chapter'),'refresh');
	}
	public function delete($id)
	{
		$ch_where = array('ch_id' => $id);

		$result = $this->db->get_where('ta_content', array('ct_chapter' => $id))->result();
		$this->db->select('ch_featured_img');
		$this->db->from('ta_chapter');
		$this->db->where($ch_where);
		$featured_img = $this->db->get()->row()->ch_featured_img;
		
		unlink(FCPATH . "assets/images/cover/".$featured_img);
		foreach ($result as $r) {
			unlink(FCPATH . "assets/images/cover/".$r->ct_name);
		}
		
		$this->db->delete('ta_chapter',$ch_where);
		$this->db->delete('ta_content',array('ct_chapter' => $id));
		redirect(base_url('dashboard/chapter'),'refresh');
	}
	public function category()
	{
		$data['cat'] = $this->read_model->all_cat();
		$data['cate'] = "";
		$data['title'] = 'All Category';
		$this->load->view('head',$data);
		$this->load->view('cat_view',$data);
		$this->load->view('foot');
	}
	public function edit_cat($id)
	{
		$data['title'] = 'Edit Category';
		$data['cat'] = $this->read_model->all_cat();
		$data['cate'] = $this->db->get_where('ta_season',
			array('se_id' => $id),1)->row();
		$this->load->view('head',$data);
		$this->load->view('cat_edit',$data);
		$this->load->view('foot');
	}
	public function save_cat()
	{
		$se_title = $this->input->post('se_title');

		$data = array(
			'se_title' => $se_title,
			'se_desc' => $this->input->post('se_desc'),
			'se_slug' => str_replace(" ", "-", strtolower($se_title)));
		
		$this->db->insert('ta_season', $data);
		redirect(base_url('dashboard/category'),'refresh');
	}
	public function update_cat()
	{
		$where = array('se_id'=>$this->input->post('se_id'));
		$data = array(
			'se_title'=>$this->input->post('se_title'),
			'se_desc'=>$this->input->post('se_desc'));
		$this->db->update('ta_season',$data,$where);
		redirect(base_url('dashboard/category'),'refresh');
	}
	public function delete_cat($id)
	{
		$this->db->delete('ta_season',array('se_id' => $id));
		redirect(base_url('dashboard/category'),'refresh');
	}
	public function delete_img()
	{
		//Ambil token foto
		$id=$this->input->post('ct_id');
		$foto=$this->db->get_where('ta_content',array('ct_id'=>$id));

		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_foto;
			if(file_exists($file=base_url('assets/images/cover').$nama_foto)){
				unlink($file);
			}
			$this->db->delete('ta_content',array('ct_id'=>$id));
		}
		echo "{}";
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */