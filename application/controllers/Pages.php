<?php

class Pages extends CI_Controller{
    
    public function view($param = null){
        
        if($param == null ){
            $page = "home";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   
    
            $data['title'] = "New Posts";
            $data['posts'] = $this->Posts_model->get_posts();
    
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            } else {
        
            $page = "single";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   
         
            $data['posts'] = $this->Posts_model->get_posts_single($param);
            $data['title'] =  $data['posts']['title'];
            $data['body'] =  $data['posts']['body'];
            $data['id'] =  $data['posts']['id'];

            // print_r($data);
            if($data['posts']){
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            }else{
                show_404();
            }
        }
    }   

    public function login(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        if($this->form_validation->run() == FALSE){
   
        
         $page = "login";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');

    }else{

        $user_id = $this->Posts_model->login();

        if($user_id){
            $user_data = array(
                
                'firstname' => $user_id['firstname'],
               'lastname' => $user_id['lastname '],
                'fullname' => $user_id['firstname'].' '.$user_id['lastname'],
                'access' => $user_id['is_admin'],
                'logged_in' => true
            );
    
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in as '.$this->session->fullname);
                redirect(base_url());
            }else{

                $this->session->set_flashdata('failed_login','Login is invalid');
                redirect('login');
        }
    }
}

    public function logout(){

        $this->session->unset_userdata('firstname');
        $this->session->unset_userdata('lastname');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('access');
        $this->session->unset_userdata('logged_in');
      
        $this->session->set_flashdata('user_loggedout','You are now logged out!');
        redirect('login');
    }

    // addschedule
    public function add(){
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        $this->form_validation->set_rules('schoolname', 'School name', 'required'); 
        $this->form_validation->set_rules('schoolcode', 'School code', 'required'); 

        if($this->form_validation->run() == FALSE){

        $page = "add";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }   
        $data['records'] = $this->Posts_model->get_records();
        // $data['school_record'] = $this->Posts_model->get_records_single();
        // $data['school_code'] =  $data['school_record']['school_code'];
        // $data['school_name'] =  $data['school_record']['school_name'];
       
        
        $data['title'] = "Add School";

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
     
        $this->load->view('templates/footer');
        }else{

            $this->Posts_model->insert_post();
            $this->session->set_flashdata('post_added', 'New school was added');
            redirect(base_url().'add');

        }
   } 

   public function addschedule(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    // $this->form_validation->set_rules('schoolcode', 'School name', 'required'); 
    $this->form_validation->set_rules('school_year', 'School year', 'required'); 
    // $this->form_validation->set_rules('testing_date', 'Testing date', 'required'); 
    $this->form_validation->set_rules('no_of_takers', 'No of takers', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_schedule";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_records();
    $data['record'] = $this->Posts_model->get_schedule();
 
   
    
    $data['title'] = "Add Schedule";
    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_schedule();
        $this->session->set_flashdata('post_added_schedule', 'New Schedule was Added!');
        redirect(base_url().'addschedule');

    }
} 

    public function edit($param){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        $this->form_validation->set_rules('title', 'title', 'required'); 
        $this->form_validation->set_rules('body', 'body', 'required'); 

        if($this->form_validation->run() == FALSE){

        $page = "edit";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }   
        $data['title'] = "Edit Post";
        $data['posts'] = $this->Posts_model->get_posts_edit($param);
        $data['title'] =  $data['posts']['title'];
        $data['body'] =  $data['posts']['body'];
        $data['id'] =  $data['posts']['id'];

        
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
       
        $this->load->view('templates/footer');
        }else{

            $this->Posts_model->update_post();
            $this->session->set_flashdata('post_updated', 'Post was updated');
            redirect(base_url().'edit/'.$param);

        }
}
        public function delete(){
            $this->Posts_model->delete_post();
            $this->session->set_flashdata('post_delete', 'Post was deleted');
            redirect(base_url());
    
}

        // add school
        public function addschool(){
        
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
            $this->form_validation->set_rules('title', 'title', 'required'); 
            $this->form_validation->set_rules('body', 'body', 'required'); 
    
            if($this->form_validation->run() == FALSE){
    
            $page = "add";
    
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   
    
            $data['title'] = "Add School";
    
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
         
            $this->load->view('templates/footer');
            }else{
    
                $this->Posts_model->insert_post();
                $this->session->set_flashdata('post_added', 'New post was added');
                redirect(base_url());
    
            }
       } 
        
         // add school

}