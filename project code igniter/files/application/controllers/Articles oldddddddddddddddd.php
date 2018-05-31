<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {
	
	// start from 0
	public function index($start=0)
	{
		// $this->output->cache('86400');
		//load model
        // $this->load->model('articles_model');
        // load 'get_articles' function from 'articles_model' model and store it in data

		// show 5 articles
       // $data['articles']=$this->articles_model->get_articles(5,$start);

        $this->load->library('pagination');
		$config['base_url'] = base_url().'articles/';
		$config['total_rows'] = $this->articles_model->get_articles_count();
		$config['per_page'] = 5;
		$config["uri_segment"] = 2;
		//$config['use_page_numbers'] = TRUE;

		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = "&lt;&lt; First";
		$config['last_link'] = "Last &gt;&gt;";
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		//$data['pages'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		// //call the model function to get the department data
		$data['articles'] = $this->articles_model->get_articles($config["per_page"], $this->uri->segment(2));
		$data['pages'] = $this->pagination->create_links();
		//$offset = $this->uri->segment(2);

        //$this->load->view('page_articles');
        // load view and load model data with it 
        $this->load->view('page_articles',$data);

	}


    //single article
	function article($id){
	$this->load->model('articles_model');
	$data['article']=$this->articles_model->get_single_article($id);
	$this->load->view('page_article',$data);
	}

	
}