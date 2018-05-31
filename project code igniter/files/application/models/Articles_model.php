<?php

class Articles_model extends CI_Model {

	// function get_articles() {
	public function get_articles($num=20,$start=0) {

		// $query = $this->db->query("SELECT * FROM articles");
		// $this->db->select()->from('articles');
		// $this->db->select()->from('articles')->where('active',1)->order_by('date_added','desc')->limit(0,20);
	
		$this->db->select()->from('articles')->where('status','1')->order_by('id','asc')->limit($num, $start);
		$query = $this->db->get();
		// return object
		// return $query->result();
        // return array
		return $query->result_array();
		
	}

	function get_articles_count(){
		$this->db->select('id')->from('articles')->where('status',1);
		$query = $this->db->get();
		return $query->num_rows();
	}



	// for single article
	 function get_single_article(){
	 $this->db->select()->from('articles')->where(array('status'=>1,'permalink'=>  $this->uri->segment(3)));
	 $query = $this->db->get()->row();
        
	 return $query;
	 
	}


}
?>