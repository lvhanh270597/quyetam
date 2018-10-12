<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Place extends CI_Controller {
    
    // declare variables
    public function __construct(){
        parent::__construct();                                        
    }       
    
    public function index(){
        $data = ['all' => $this->place_ml->get_all()];
        display('places', $data);
    }

    public function add_place(){
        if (!$this->session->userdata('admin')){
            redirect(base_url());
        }
        $message_success = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success"> 
					<strong>                                        
						Your profile has been updated successfully!
					</strong>
				</div>  
			</div>
		</div>    ';
		$message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-error"> 
					<strong>                                        
						Your profile has been updated successfully!
					</strong>
				</div>  
			</div>
		</div>    ';		

        $data = [ 'message' => '' ];
        if ($this->input->post()){
            if ($this->place_ml->add()){
                $data['message'] = $message_success;
            }
            else{
                $data['message'] = $message_error;
            }
        }

        display('add_place', $data, true);
    }

    public function edit_place($id){
        if (!$this->session->userdata('admin')){
            redirect(base_url());
        }

        $message_success = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success"> 
					<strong>                                        
						Your profile has been updated successfully!
					</strong>
				</div>  
			</div>
		</div>    ';
		$message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-error"> 
					<strong>                                        
						Your profile has been updated successfully!
					</strong>
				</div>  
			</div>
		</div>    ';		
                
        $data = ['message' => ''];
        $this_place = $this->place_ml->get_by_primary($id);
        if ($this->input->post('update')){
            if ($this->place_ml->edit($this_place['id'])){
                $data['message'] = $message_success;
            }
            else{
                $data['message'] = $message_error;
            }
        }
        if ($this->input->post('delete')){
            $this->place_ml->delete($this_place['id']);
            redirect('place');
        }
        $this_place = $this->place_ml->get_by_primary($id);
        $data = array_merge($data, $this_place);
        display('edit_place', $data);
    }

    public function detail($id){        
        $message_success = get_message_success('Added successfully!');
		$message_error = get_message_error('Fail adding!');        
        $data = ['message' => ''];
        $this_place = $this->place_ml->get_by_primary($id);
        if ($this->input->post('update')){
            if ($this->place_ml->edit($this_place['id'])){
                $data['message'] = $message_success;
            }
            else{
                $data['message'] = $message_error;
            }
        }
        if ($this->input->post('delete')){
            $this->place_ml->delete($this_place['id']);
            redirect('place');
        }
        $this_place = $this->place_ml->get_by_primary($id);
        $data = array_merge($data, $this_place);
        
        display('detail_place', $data);
    }

}