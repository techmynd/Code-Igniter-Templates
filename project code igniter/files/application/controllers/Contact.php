<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','security'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }

	public function index()
	{

		//$this->output->cache('86400');

		//set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        // $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {
            //validation fails - load regular view
	        
	        
			
			$this->load->view('page_contact');
			

        }
        else
        {



            // validation successful
            // code to send mail
            // email settings
		    $config['protocol'] = 'sendmail';
		    $config['mailtype'] = 'html';
		    $config['wordwrap'] = TRUE;
		    $config['charset'] = 'iso-8859-1';
		    $config['newline'] = "\r\n"; //use double quotes here
		    $this->email->initialize($config);

			//get the form data
			// TRUE > enables the xss filtering
		    $name = $this->input->post('name',TRUE);
		    $from_email = $this->input->post('email',TRUE);
		    $phone = $this->input->post('phone',TRUE);
		    $message = $this->input->post('message',TRUE);
		    $subject="Email from website";

		    //set to_email id to which you want to receive mails
		    $to_email = 'admin@techmynd.com';

		    $messageBody = "
		    Name: $name<br>
		    Email Address: $from_email<br>
		    Phone: $phone<br>
		    Message: $message<br>
		    ";

		    //send mail
		    $this->email->from($from_email, $name);
		    $this->email->to($to_email);
		    $this->email->subject($subject);
		    $this->email->message($messageBody);
		    if ($this->email->send())
		    {
		        // mail sent
		        $this->session->set_flashdata('msg','<div class="alert alert-success">Your email has been sent successfully!</div>');
		        redirect('contact/');
		    }
		    else
		    {
		        //error
		        $this->session->set_flashdata('msg','<div class="alert alert-danger">There is error in sending email! Please try again later</div>');
		        redirect('contact/');
		    }




		    $this->load->view('header');
			$this->load->view('page_contact');
			$this->load->view('footer');




        }

		
	}

	//custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
