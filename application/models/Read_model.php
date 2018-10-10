<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_model extends CI_Model {

	public function all_cat()
	{
		return $this->db->query('
			SELECT COUNT(ch_id) as se_chap, se_title, se_id, se_slug, se_desc
			FROM ta_season
			LEFT JOIN ta_chapter ON ta_chapter.ch_category = ta_season.se_id
			GROUP BY se_id')->result();
	}

	public function se($select,$qmore)
	{
		return $this->db->query("
			SELECT ".$select."ch_id,ch_title,fullname,ch_desc,round(AVG(rt_rating),1) as ch_rating,ch_featured_img,se_slug,ch_slug
			FROM ta_chapter
			LEFT JOIN ta_season ON se_id = ch_category
			LEFT JOIN ta_user ON ch_author = uid
			LEFT JOIN ta_rating ON rt_chapter = ch_id ".$qmore."
			GROUP BY ch_id ORDER BY ch_order")->result();
	}

}

/* End of file read_model.php */
/* Location: ./application/models/read_model.php */