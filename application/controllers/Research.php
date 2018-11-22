<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research extends CI_Controller {

    public function __contruct()
    {
        parent::__contruct();
    }
	public function index()
	{
		if (!$this->session->userdata('admin')){
			redirect('admin/login');
		}		

		$places = $this->place_ml->get_all();
        $map = [];
        foreach ($places as $place){
            $map[$place['id']] = $place['name'];
		}
		
		$data = array(		
			'visited_today' => $this->visited_ml->get_visited_per_date(get_current_time()),
			'data_research' =>  $this->needed_trip_ml->get_research_info(),
			'map' => $map
		);
		$this->load->view('admin/research', $data);
	}	
}
