<!-- This is the model file for the project and holds all the DB related functions-->


<?php
class site_model extends CI_Model {
	
	//loads the connectivity parameters to the MySql database
	public function __construct()
	{
		$this->load->database();
	}


	//retrieves the entire table for the input 'images' from the DB
	public function get_table()
	{
		
		$query = $this->db->get('images');
		return $query->result_array();
	}

	public function get_row()
	{
		
		$query = $this->db->get_where('images', array('img_id' => $this->input->post('img_id')));
		
		return $query->row_array();
	}
	
	//inserts the data as a record into the table
	public function insert()
	{

	 

 		$data = array(
   			'img_name'=>$this->input->post('img_name'),
			'img_addr'=>$this->input->post('img_addr'),
			'img_url'=>$this->input->post('img_url'),
		);

		return $this->db->insert('images', $data);
		
		
	}

	//uses the img_id as a primary key to identify records and modify them
	//$case variable is used to store either img_name or img_addr or img_url which needs to be changed


	public function modify()
	{
 		$data = array(
   			'img_name'=>$this->input->post('img_name'),
			'img_addr'=>$this->input->post('img_addr'),
			'img_url'=>$this->input->post('img_url'),
		);
			$this->db->where('img_id', $this->input->post('img_id'));
			return $this->db->update('images', $data); 		
		
	}

	//identifies a record using the img_id and deletes it from the table
	public function remove()
	{
		return $this->db->delete('images', array('img_id' => $this->input->post('img_id'))); 
	}



}
?>
