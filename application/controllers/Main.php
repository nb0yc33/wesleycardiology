<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function index()
	{ 
        $this->load->view("search");
     }
    
    public function form_validation()  
    {   
         $this->load->library('form_validation');  
         $this->form_validation->set_rules("MRN", "MRN", 'required');         
         $this->form_validation->set_rules("FirstName", "First Name", 'required');  
         $this->form_validation->set_rules("LastName", "Last Name", 'required');  
         $this->form_validation->set_rules("DateOfBirth", "Date of Birth", 'required');
         $this->form_validation->set_rules("Gender", "Gender", 'required');

         if($this->form_validation->run())  
         {  
              $this->load->model("main_model");  
              $data = array(  
                   "MRN"=>$this->input->post("MRN"),
                   "FirstName"=>$this->input->post("FirstName"),  
                   "LastName" =>$this->input->post("LastName"),
                   "MiddleName" =>$this->input->post("MiddleName"),
                   "DateOfBirth" =>$this->input->post("DateOfBirth"),
                   "Gender" =>$this->input->post("Gender")
              );   
              if($this->input->post("Save"))  
              {  
                   $this->main_model->insert_data($data);  
              }  
              else if($this->input->post("Update"))  
              {  
                   $this->main_model->update_patient($data, $this->input->post("hidden_id"));  
                   
              } 
              else if($this->input->post("Delete"))
              {
                   $this->main_model->delete_patient($data, $this->input->post("hidden_id2"));
              } 
          }
     }  

     public function study(){
          $this->load->model("main_model");   


          if($this->input->post("AddRadiographer"))
          {
               $this->load->view("select", $data);
               $this->main_model->insert_study_r($data);
          }
          else if($this->input->post("AddVMP"))
          {
               $this->load->view("select", $data);
               $this->main_model->insert_study_r($data);
          }
     }

     public function select(){
          $patientID = $this->uri->segment(3);  
          $data["patient"] = $patientID;
          $this->load->model("main_model");  
          $data["patient_data"] = $this->main_model->fetch_patient($patientID);  
          $data["fetch_data"] = $this->main_model->fetch_data();
          $data['groupC'] = $this->main_model->getAllCatheters();
          $data['groupB'] = $this->main_model->getAllBalloons();
          $data['groupS'] = $this->main_model->getAllStents();
          $this->load->view("select", $data);
     }

     public function r(){  

          $this->load->main_model();
          $this->main_model->post_r();

     } 

     public function vmp(){  
          
          $this->load->main_model();
          $this->main_model->post_vmp();
     
     }

     public function updated()  
     {  
          $this->index();  
     }       


}