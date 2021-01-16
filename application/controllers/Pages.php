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

    // addschool
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

   public function add_section_codes(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('section_code', 'Section code', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_section_codes";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_section_codes();
    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];
   
    
    $data['title'] = "Add Section Code";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/deletemodal');
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_section();
        $this->session->set_flashdata('section_code_added', 'New Section was added');
        redirect(base_url().'add_section_codes');

    }
} 

public function add_batch(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('batch', 'Batch', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_batch";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_batch();
    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];    
    $data['title'] = "Add Batch";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_batch();
        $this->session->set_flashdata('batch_added', 'New Batch was added');
        redirect(base_url().'add_batch');

    }
} 



public function add_student(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('LRN', 'LRN', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_student";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   

    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];    
    $data['title'] = "Add Student";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_student();
        $this->session->set_flashdata('student_added', 'New Student was added');
        redirect(base_url().'add_student');

    }
} 


public function add_subject(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('subject', 'Subject', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_subject";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_subjects();
    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];    
    $data['title'] = "Add Subject";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_subject();
        $this->session->set_flashdata('subject_added', 'New Subject was added');
        redirect(base_url().'add_subject');

    }
} 

public function add_grade_level(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('grade_level', 'Grade Level', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_grade_level";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_grade_level();
    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];    
    $data['title'] = "Add Grade Level";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_grade_level();
        $this->session->set_flashdata('grade_level_added', 'New Grade level was added');
        redirect(base_url().'add_grade_level');

    }
} 

public function add_custom_assessment(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('assessment_type', 'Assessment Type', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_custom_assessment";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_custom_assessment();
    // $data['school_record'] = $this->Posts_model->get_records_single();
    // $data['school_code'] =  $data['school_record']['school_code'];
    // $data['school_name'] =  $data['school_record']['school_name'];    
    $data['title'] = "Add Custom Assessment";

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_custom_assessment();
        $this->session->set_flashdata('custom_assessment_added', 'New Assessment Type was added');
        redirect(base_url().'add_custom_assessment');

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

public function add_section(){
        
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    // $this->form_validation->set_rules('schoolcode', 'School name', 'required'); 
    $this->form_validation->set_rules('schools', 'School', 'required'); 
    // $this->form_validation->set_rules('testing_date', 'Testing date', 'required'); 
    // $this->form_validation->set_rules('no_of_takers', 'No of takers', 'required'); 

    if($this->form_validation->run() == FALSE){

    $page = "add_section";
    // $page2 = "filter";

    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
    }   
    $data['records'] = $this->Posts_model->get_records();
    $data['grade_records'] = $this->Posts_model->get_grade_level();
    $data['section_codes'] = $this->Posts_model->get_section_codes();
    $data['batch_records'] = $this->Posts_model->get_batch();
    $data['record'] = $this->Posts_model->get_schedule();
    $data['sections'] = $this->Posts_model->get_sections();
 
   
    
    $data['title'] = "Add Section";
    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    // $this->load->view('pages/'.$page2, $data);
    $this->load->view('templates/footer');
    }else{

        $this->Posts_model->insert_sections();
        $this->session->set_flashdata('post_added_section', 'New Section was Added!');
        redirect(base_url().'add_section');

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
        
         // Delete Section Codes
         public function delete_section_codes(){
            $data = array();
            
            // If record delete request is submitted
            if($this->input->post('bulk_delete_submit')){
                // Get all selected IDss
                $ids  = $this->input->post('checked_id');
                
                 // If id array is not empty
                if(!empty($ids)){
                    // Delete records from the database
                    $delete = $this->Posts_model->delete($ids);
                    
                    // If delete is successful
                    if($delete){
                        $data['statusMsg'] = 'Selected items have been deleted successfully.';
                    }else{
                        $data['statusMsg'] = 'Some problem occurred, please try again.';
                    }
                }else{
                    $data['statusMsg'] = 'Select at least 1 record to delete.';
                }
            }
            $this->session->set_flashdata('section_code_deleted', 'Section/s deleted successfuly!');
            redirect(base_url().'add_section_codes');
            // // Get user data from the database
            // $data['records'] = $this->Posts_model->get_section_codes();
            
            // // // Pass the data to view
            // // $this->load->view('pages/'.$page, $data);;
        }

        // Delete Batch
        public function delete_batch(){
            $data = array();
            
            // If record delete request is submitted
            if($this->input->post('bulk_delete_submit')){
                // Get all selected IDss
                $ids  = $this->input->post('checked_id');
                
                 // If id array is not empty
                if(!empty($ids)){
                    // Delete records from the database
                    $delete = $this->Posts_model->delete_batch($ids);
                    
                    // If delete is successful
                    if($delete){
                        $data['statusMsg'] = 'Selected items have been deleted successfully.';
                    }else{
                        $data['statusMsg'] = 'Some problem occurred, please try again.';
                    }
                }else{
                    $data['statusMsg'] = 'Select at least 1 record to delete.';
                }
            }
            $this->session->set_flashdata('batch_deleted', 'Batch deleted successfuly!');
            redirect(base_url().'add_batch');
            
            // // Get user data from the database
            // $data['records'] = $this->Posts_model->get_section_codes();
            
            // // // Pass the data to view
            // // $this->load->view('pages/'.$page, $data);;
        }

        public function delete_subject(){
            $data = array();
            
            // If record delete request is submitted
            if($this->input->post('bulk_delete_submit')){
                // Get all selected IDss
                $ids  = $this->input->post('checked_id');
                
                 // If id array is not empty
                if(!empty($ids)){
                    // Delete records from the database
                    $delete = $this->Posts_model->delete_subject($ids);
                    
                    // If delete is successful
                    if($delete){
                        $data['statusMsg'] = 'Selected items have been deleted successfully.';
                    }else{
                        $data['statusMsg'] = 'Some problem occurred, please try again.';
                    }
                }else{
                    $data['statusMsg'] = 'Select at least 1 record to delete.';
                }
            }
            $this->session->set_flashdata('subject_deleted', 'Subject deleted successfuly!');
            redirect(base_url().'add_subject');
            
            // // Get user data from the database
            // $data['records'] = $this->Posts_model->get_section_codes();
            
            // // // Pass the data to view
            // // $this->load->view('pages/'.$page, $data);;
        }

         // Delete Grade level
         public function delete_grade_level(){
            $data = array();
            
            // If record delete request is submitted
            if($this->input->post('bulk_delete_submit')){
                // Get all selected IDss
                $ids  = $this->input->post('checked_id');
                
                 // If id array is not empty
                if(!empty($ids)){
                    // Delete records from the database
                    $delete = $this->Posts_model->delete_grade_level($ids);
                    
                    // If delete is successful
                    if($delete){
                        $data['statusMsg'] = 'Selected items have been deleted successfully.';
                    }else{
                        $data['statusMsg'] = 'Some problem occurred, please try again.';
                    }
                }else{
                    $data['statusMsg'] = 'Select at least 1 record to delete.';
                }
            }
            $this->session->set_flashdata('grade_level_deleted', 'Grade level deleted successfuly!');
            redirect(base_url().'add_grade_level');
            
            // // Get user data from the database
            // $data['records'] = $this->Posts_model->get_section_codes();
            
            // // // Pass the data to view
            // // $this->load->view('pages/'.$page, $data);;
        }

        //School and Section List
        public function school_and_section_list(){
        
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
            // // $this->form_validation->set_rules('schoolcode', 'School name', 'required'); 
            // $this->form_validation->set_rules('school_year', 'School year', 'required'); 
            // // $this->form_validation->set_rules('testing_date', 'Testing date', 'required'); 
            // $this->form_validation->set_rules('no_of_takers', 'No of takers', 'required'); 
        
            if($this->form_validation->run() == FALSE){
        
            $page = "school_and_section_list";
        
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   

            $data['records'] = $this->Posts_model->get_sections_filter();
            
            
            $data['title'] = "Schools and Sections List";
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
            }else{
        
                // $this->session->set_flashdata('post_added_schedule', 'New Schedule was Added!');
                // redirect(base_url().'school_and_section_list');
        
            }
        } 

        public function bulk_upload_of_students(){
        
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
            // // $this->form_validation->set_rules('schoolcode', 'School name', 'required'); 
            // $this->form_validation->set_rules('school_year', 'School year', 'required'); 
            // // $this->form_validation->set_rules('testing_date', 'Testing date', 'required'); 
            $this->form_validation->set_rules('no_of_takers', 'No of takers', 'required'); 
        
            if($this->form_validation->run() == FALSE){
        
            $page = "bulk_upload_of_students";
        
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }   

            // $data['records'] = $this->Posts_model->get_sections_filter();
            
            $data['records'] = $this->Posts_model->get_bulk_file();
            $data['title'] = "Bulk Upload of Students";
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    
            }else{
        
                // $this->session->set_flashdata('post_added_schedule', 'New Schedule was Added!');
                // redirect(base_url().'school_and_section_list');
        
            }
        } 
        

}
