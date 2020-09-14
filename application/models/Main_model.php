<?php
class Main_model extends CI_Model
{

    function insert_data($data)  
    {  
         $this->db->insert("Patients", $data);  
         $this->load->view('search');
    }

    function insert_study_r($data)  
    {  
         $this->db->insert("StudyR", $data);  
    }  
    

    function fetch_data()  
    {  
         $this->db->select("*");  
         $this->db->from("patients");  
         $query = $this->db->get();  
         return $query;  
    } 
    
    function fetch_patient($id)  
    {  
         $this->db->where("PatientID", $id);  
         $query = $this->db->get("patients");  
         return $query;  
    }
    
    function select_patient($id)
    {
          $this->db->where("PatientID", $id);
          $query = $this->db->get("StudyR");
          return $query;

    }

    function update_patient($data, $id)  
    {  
         $this->db->where("PatientID", $id);  
         $this->db->update("Patients", $data);  
         redirect(base_url() . "main/updated"); 
    }

    function getAllCatheters()
    {
     $this->db->select('Description');
     $this->db->from('CodeValues');
     $this->db->like('Display', 'Catheter');
     $query = $this->db->get();    
     return $query->result();
    }    

    function getAllBalloons()
    {
     $this->db->select('Description');
     $this->db->from('CodeValues');
     $this->db->like('Display', 'Balloon');
     $query = $this->db->get();    
     return $query->result();
    }        

    function getAllStents()
    {
     $this->db->select('Description');
     $this->db->from('CodeValues');
     $this->db->like('Display', 'Stent');
     $query = $this->db->get();    
     return $query->result();
    }    


        
}
?>