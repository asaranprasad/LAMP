<!-- This is the Controller page -->


<?php
class Pages extends CI_Controller {

	//preloads the model and the helper classes
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
		$this->load->helper('form');
		$this->load->helper('html');	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	//loads the required view-page with the required data array passed to it
	public function load_page($data,$page)
	{
		$data['images'] = $this->site_model->get_table();
		$data['title'] =$page;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer',$data);

	}


	//initial function invoked to check whether required page is available
	public function view($page = 'add')
	{

		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			show_404();
		}
		
		$data['msg'] = "";
		$this->load_page($data,$page);
		
	}

	//gets the input fields from the view and redirects it to the model function insert()
	//also displays corresponding failure/success message for post to DB
	public function input($page = 'add')
	{
		$data['msg'] = "Entry failed";
		$this->form_validation->set_rules('img_name', 'File Name', 'required');
		$this->form_validation->set_rules('img_addr', 'File Path', 'required');
		$this->form_validation->set_rules('img_url', 'OnClick URL', 'required');
		$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";		//Regex check for URL

		if ($this->form_validation->run() == FALSE)
			$data['msg'] = "Some fields are found empty. All fields are mandatory!";
		

	        else if (!preg_match($pattern, $this->input->post('img_url')))
			$data['msg'] = "The OnClick URL entered is not valid! Please enter a valid URL";
		else if (!preg_match($pattern, $this->input->post('img_addr')))
			$data['msg'] = "The File path URL entered is not valid! Please enter a valid URL";


		
		
		else
		{	

			
			if($this->input->post('dbsubmit'))
			{	if($this->site_model->insert())
					$data['msg'] = "Entry Successfully Submitted!";
				else $data['msg'] = "DB entry failed!";	
			}
		}
			$this->load_page($data,$page);
	}

	//gets the img_id from view and sends to remove() of model
	//displays corresponding success/failure message
	public function delete($page = 'edit')
	{
		$data['msg'] = "Action Failed!";

		if($this->input->post('delete_sub'))
		{	if($this->site_model->remove())
				$data['msg'] = "Record Successfully deleted from DB!";
			else $data['msg'] = "Record deletion failed!";	}


		$this->load_page($data,'edit');
	}


	//gets img_id from view and sends it to modify() of model
	//diplays corresponding success/failure message
	public function update($page = 'edit')
	{
		$data['msg'] = "Entry failed";
		$this->form_validation->set_rules('img_name', 'File Name', 'required');
		$this->form_validation->set_rules('img_addr', 'File Path', 'required');
		$this->form_validation->set_rules('img_url', 'OnClick URL', 'required');
		$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";		//Regex check for URL

		if ($this->form_validation->run() == FALSE)
			$data['msg'] = "Some fields are found empty. All fields are mandatory!";
		

	        else if (!preg_match($pattern, $this->input->post('img_url')))
			$data['msg'] = "The OnClick URL entered is not valid! Please enter a valid URL";
		else if (!preg_match($pattern, $this->input->post('img_addr')))
			$data['msg'] = "The File path URL entered is not valid! Please enter a valid URL";


		
		else
		{

			if($this->input->post('edit_entry'))
			{	if($this->site_model->modify())
					$data['msg'] = "Record Successfully updated!";
				else $data['msg'] = "DB entry failed!";	
			}

			$this->load_page($data,$page);
			return;
		}

		$this->edit_load('edit_bit',$data['msg']);

	}

		public function edit_load($page='edit_bit',$msg = "")
	{	
		$data['msg']=$msg;		
		$data['row'] = $this->site_model->get_row();
		$data['title'] =$page;
		$data['images'] = $this->site_model->get_table();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/edit_bit', $data);
		$this->load->view('pages/edit', $data);
		$this->load->view('templates/footer',$data);


		

	}

	
}


?>
