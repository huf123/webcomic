<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('read_model');
	}
	public function tes()
	{
		$size = getimagesize(base_url("assets/images/panorama9.jpg"));
		echo $size[0];
		echo "<br>";
		echo $size[1];
		echo "<br>";
		echo $size[2];
		echo "<br>";
		echo $size[3];
		echo "<br>";
	}
	public function index()
	{
		$data['title'] = "Home | Explore Banyuwangi";
		$data['chap'] = $this->read_model->se("","");
		$data['cha'] = $this->read_model->se("","");
		$data['slide'] = $this->read_model->se("","WHERE ch_slide = 1");
		$this->load->view('home_head',$data);
		$this->load->view('home_front',$data);
		$this->load->view('home_foot');
	}
	public function login()
	{
		$data['role'] = 3;
		if($this->session->userdata('uid')){
			redirect($_SERVER['HTTP_REFERER'],'refresh');
		}else{
			$this->load->view('signin',$data);			
			$this->session->set_userdata('url',$_SERVER['HTTP_REFERER']);
		}
	}
	public function logging()
	{
		$data = array(
			"uname" => $this->input->post('uname'),
			"upwd" => md5($this->input->post('upwd')),
			"role" => 3);
		$row = $this->db->get_where('ta_user',$data,1)->row();
		if($row){
			$this->session->set_userdata('uid',$row->uid);
			$this->session->set_userdata('fullname',$row->fullname);
			redirect($this->session->userdata('url'),'refresh');			
			$this->session->unset_userdata('url');
		}else{
			redirect(base_url('home/login'),'refresh');
		}
	}
	public function v($cat_slug,$slug)
	{
		$where = array('se_slug' => $cat_slug, 'ch.ch_slug' => $slug);

		//Get All Content in a Chapter
		$this->db->select('ct_name,ct_type');
		$this->db->from('ta_content');
		$this->db->join('ta_chapter as ch','ch_id = ct_chapter');
		$this->db->join('ta_season','ch_category = se_id');
		$this->db->order_by('ct_order', 'ASC');
		$this->db->where($where);
		$data['cont'] = $this->db->get()->result();
		$data['chap'] = $this->db->query("SELECT `ch`.`ch_id` as `ch_id`, `ch`.`ch_title` as `ch_title`, `ch`.`ch_desc` as `ch_desc`, round(AVG(rt_rating),1) as ch_rating, `ch`.`ch_tag` as `ch_tag`, `ch`.`ch_slug` as `ch_slug`, `se_slug`, `ch0`.`ch_slug` as `prev`, `ch1`.`ch_slug` as `next`,`ch`.`ch_featured_img` as `ch_featured_img`
			FROM `ta_chapter` as `ch` 
			LEFT JOIN `ta_season` ON `ch_category` = `se_id` 
			LEFT JOIN `ta_rating` ON `ch_id` = `rt_chapter`
			LEFT JOIN `ta_chapter` as `ch0` ON `ch`.`ch_id`-1 = `ch0`.`ch_id`
			LEFT JOIN `ta_chapter` as `ch1` ON `ch`.`ch_id`+1 = `ch1`.`ch_id`
			WHERE `se_slug` = '$cat_slug' AND `ch`.`ch_slug` = '$slug'")->row();

		//Get All Title
		$this->db->select('ch_id,ch_title,ch_slug,ch_featured_img,ch_order');
		$this->db->order_by('ch_order', 'ASC');
		$data['title'] = $this->db->get('ta_chapter')->result();

		$this->load->view('home_detail',$data);
	}
	public function tag($tag)
	{
		$data['title'] = "tag : ".$tag." | Explore Banyuwangi";
		$data['se'] = $this->read_model->se("","WHERE ch_tag LIKE '%".$tag."%'");
		$this->load->view('home_head',$data);
		$this->load->view('home_result',$data);
		$this->load->view('home_foot');
	}
	public function search()
	{
		$search = $this->input->post('search');
		$data['title'] = "search : ".$search." | Explore Banyuwangi";
		$qmore = "WHERE ch_tag LIKE '%".$search."%' OR se_title LIKE '%".$search."%' OR ch_title LIKE '%".$search."%'";
		$data['se'] = $this->read_model->se("",$qmore);
		$this->load->view('home_head',$data);
		$this->load->view('home_result',$data);
		$this->load->view('home_foot');
	}
	public function add_rating()
	{
		$rating = $this->input->post('rating');
		$chapter = $this->input->post('chap');
		$reader = $this->session->userdata('uid');

		$data = array(
			'rt_rating'=>$rating,
			'rt_user'=>$reader,
			'rt_chapter'=>$chapter);

		$where = array(
			'rt_user'=>$reader,
			'rt_chapter'=>$chapter);

		$this->db->where($where);
		$this->db->from('ta_rating');
		$count = $this->db->count_all_results();
		if($count>0){
			$this->db->update('ta_rating',array("rt_rating"=>$rating),$where);
		}else{
			$this->db->insert('ta_rating',$data);
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */