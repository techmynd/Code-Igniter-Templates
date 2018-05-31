<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_found extends CI_Controller {

	public function index()
	{
		//$this->output->cache('86400');
		$this->load->view('not_found');

	}
}
