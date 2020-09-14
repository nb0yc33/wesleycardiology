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

         }  else {
             $this->index();
         } 
     }  

     public function study(){
          $this->load->model("main_model");   


          if($this->input->post("Add"))
          {
               $this->load->view("select", $data);
               $this->main_model->insert_study_r($data);
          }


     }

     public function select()
     {  
          $patientID = $this->uri->segment(3);  
          $this->load->model("main_model");  
          $data["patient_data"] = $this->main_model->fetch_patient($patientID);  
          $data["fetch_data"] = $this->main_model->fetch_data();  
          $this->load->view("select", $data);

          $this->load->library('form_validation');  
          $this->form_validation->set_rules("Height", "Height", 'required');         
          $this->form_validation->set_rules("Weight", "Weight", 'required');  
          $this->form_validation->set_rules("StudyDate", "Study Date", 'required');  
          $this->form_validation->set_rules("PrimaryOperator", "Primary Operator", 'required');
          $this->form_validation->set_rules("Radiographer", "Radiographer", 'required');
 
          if($this->form_validation->run())  
          {            

               if($this->input->post("Add"))
               {
                    $data['groupC'] = $this->main_model->getAllCatheters();
                    $data['groupB'] = $this->main_model->getAllBalloons();
                    $data['groupS'] = $this->main_model->getAllStents();

                    if($this->input->post("ca") == "1"){
                         $ca = 1;
                    } else {
                         $ca = 0;
                    }

                    if($this->input->post("left_heart_pressures") == "1"){
                         $lhp = 1;
                    } else {
                         $lhp = 0;
                    }

                    if($this->input->post("right_pressures") == "1"){
                         $rhp = 1;
                    } else {
                         $rhp = 0;
                    }

                    if($this->input->post("oxygen_saturation_run") == "1"){
                         $osr = 1;
                    } else {
                         $osr = 0;
                    }

                    if($this->input->post("cardiac_output") == "1"){
                         $co = 1;
                    } else {
                         $co = 0;
                    }

                    if($this->input->post("tavr") == "1"){
                         $tavr = 1;
                    } else {
                         $tavr = 0;
                    }

                    if($this->input->post("cine") == "1"){
                         $cine = 1;
                    } else {
                         $cine = 0;
                    }

                    if($this->input->post("fluoro") == "1"){
                         $fluoro = 1;
                    } else {
                         $fluoro = 0;
                    }

                    if($this->input->post("dsa") == "1"){
                         $dsa = 1;
                    } else {
                         $dsa = 0;
                    }

                    if($this->input->post("IVUS") == "1"){
                         $ivus = 1;
                    } else {
                         $ivus = 0;
                    }

                    if($this->input->post("TOE") == "1"){
                         $toe = 1;
                    } else {
                         $toe = 0;
                    }

                    if($this->input->post("OCT") == "1"){
                         $oct = 1;
                    } else {
                         $oct = 0;
                    }

                    if($this->input->post("TtE") == "1"){
                         $tte = 1;
                    } else {
                         $tte = 0;
                    }

                    if($this->input->post("ICE") == "1"){
                         $ice = 1;
                    } else {
                         $ice = 0;
                    }

                    if($this->input->post("iFR") == "1"){
                         $ifr = 1;
                    } else {
                         $ifr = 0;
                    }

                    if($this->input->post("FFR") == "1"){
                         $ffr = 1;
                    } else {
                         $ffr = 0;
                    }

                    if($this->input->post("poba1ca") == "1"){
                         $poba1ca = 1;
                    } else {
                         $poba1ca = 0;
                    }

                    if($this->input->post("poba2ca") == "1"){
                         $poba2ca = 1;
                    } else {
                         $poba2ca = 0;
                    }

                    if($this->input->post("poba1svg") == "1"){
                         $poba1svg = 1;
                    } else {
                         $poba1svg = 0;
                    }

                    if($this->input->post("poba2svg") == "1"){
                         $poba2svg = 1;
                    } else {
                         $poba2svg = 0;
                    }

                    if($this->input->post("pedicledpoba") == "1"){
                         $pedicledpoba = 1;
                    } else {
                         $pedicledpoba = 0;
                    }

                    if($this->input->post("stent1ca") == "1"){
                         $stent1ca = 1;
                    } else {
                         $stent1ca = 0;
                    }

                    if($this->input->post("stent1svg") == "1"){
                         $stent1svg = 1;
                    } else {
                         $stent1svg = 0;
                    }

                    if($this->input->post("stents1svg") == "1"){
                         $stents1svg = 1;
                    } else {
                         $stents1svg = 0;
                    }

                    
                    if($this->input->post("stentsmultisvg") == "1"){
                         $stentsmultisvg = 1;
                    } else {
                         $stentsmultisvg = 0;
                    }

                    if($this->input->post("stents1ca") == "1"){
                         $stents1ca = 1;
                    } else {
                         $stents1ca = 0;
                    }

                    if($this->input->post("pedicledstent") == "1"){
                         $pedicledstent = 1;
                    } else {
                         $pedicledstent = 0;
                    }

                    if($this->input->post("asd") == "1"){
                         $asd = 1;
                    } else {
                         $asd = 0;
                    }

                    if($this->input->post("vsd") == "1"){
                         $vsd = 1;
                    } else {
                         $vsd = 0;
                    }

                    if($this->input->post("pda") == "1"){
                         $pda = 1;
                    } else {
                         $pda = 0;
                    }

                    if($this->input->post("pfo") == "1"){
                         $pfo = 1;
                    } else {
                         $pfo = 0;
                    }    
                    
                    if($this->input->post("para_leak") == "1"){
                         $paraleak = 1;
                    } else {
                         $paraleak = 0;
                    }

                    if($this->input->post("aorticvalv") == "1"){
                         $aorticvalv = 1;
                    } else {
                         $aorticvalv = 0;
                    }

                    if($this->input->post("mitralvalv") == "1"){
                         $mitralvalv = 1;
                    } else {
                         $mitralvalv = 0;
                    }

                    if($this->input->post("tricuspid") == "1"){
                         $tricuspid = 1;
                    } else {
                         $tricuspid = 0;
                    }               

                    if($this->input->post("pulmonary") == "1"){
                         $pulmonary = 1;
                    } else {
                         $pulmonary = 0;
                    }

                    if($this->input->post("aorticrep") == "1"){
                         $aorticrep = 1;
                    } else {
                         $aorticrep = 0;
                    }

                    if($this->input->post("mitralrep") == "1"){
                         $mitralrep = 1;
                    } else {
                         $mitralrep = 0;
                    }

                    
                    if($this->input->post("mitralclip") == "1"){
                         $mitralclip = 1;
                    } else {
                         $mitralclip = 0;
                    }

                    if($this->input->post("otherrep") == "1"){
                         $otherrep = 1;
                    } else {
                         $otherrep = 0;
                    }

                    if($this->input->post("myocardiumbio") == "1"){
                         $myocardiumbio = 1;
                    } else {
                         $myocardiumbio = 0;
                    }

                    if($this->input->post("myocardialsa") == "1"){
                         $myocardialsa = 1;
                    } else {
                         $myocardialsa = 0;
                    }

                    if($this->input->post("2d_eps") == "1"){
                         $eps2d = 1;
                    } else {
                         $eps2d = 0;
                    }   
                    
                    if($this->input->post("3d_eps") == "1"){
                         $eps3d = 1;
                    } else {
                         $eps3d = 0;
                    }

                    if($this->input->post("rfablation") == "1"){
                         $rfablation = 1;
                    } else {
                         $rfablation = 0;
                    }

                    if($this->input->post("cryoablation") == "1"){
                         $cryoablation = 1;
                    } else {
                         $cryoablation = 0;
                    }

                    if($this->input->post("cardioversion") == "1"){
                         $cardioversion = 1;
                    } else {
                         $cardioversion = 0;
                    }

                    
                    if($this->input->post("iabp") == "1"){
                         $iabpinsertion = 1;
                    } else {
                         $iabpinsertion = 0;
                    }

                    if($this->input->post("renal_denervation") == "1"){
                         $renaldenervation = 1;
                    } else {
                         $renaldenervation = 0;
                    }

                    if($this->input->post("pericardiocentesis") == "1"){
                         $pericardiocentesis = 1;
                    } else {
                         $pericardiocentesis = 0;
                    }

                    
                    if($this->input->post("insert_vasc") == "1"){
                         $insertvascclosure = 1;
                    } else {
                         $insertvascclosure = 0;
                    }

                    if($this->input->post("limb_vasc") == "1"){
                         $limbvascular = 1;
                    } else {
                         $limbvascular = 0;
                    }

                    if($this->input->post("visceral_vasc") == "1"){
                         $visceralvascular = 1;
                    } else {
                         $visceralvascular = 0;
                    }

                    if($this->input->post("evar") == "1"){
                         $evar = 1;
                    } else {
                         $evar = 0;
                    }

                    if($this->input->post("pta") == "1"){
                         $pta = 1;
                    } else {
                         $pta = 0;
                    }

                    if($this->input->post("vasc_lower") == "1"){
                         $lowervascular = 1;
                    } else {
                         $lowervascular = 0;
                    }

                    if($this->input->post("implant_pain") == "1"){
                         $implantpain = 1;
                    } else {
                         $implantpain = 0;
                    }

                    if($this->input->post("single_shots") == "1"){
                         $singleshots = 1;
                    } else {
                         $singleshots = 0;
                    }

                    $data = array(
                         "PatientID"=> $patientID,
                         "Graft" => $this->input->post("Graft"),
                         "CA"=> $ca,
                         "LV_Gram" => $this->input->post("lv_gram"),
                         "LeftHeartStudy" => $lhp,
                         "RightHeartPressures" => $rhp,
                         "OxygenSR" => $osr,
                         "CardiacOutput" => $co,
                         "Aortogram" => $this->input->post("aortogram"),
                         "TAVR_Workup" => $tavr,
                         "CineFemoral" => $cine,
                         "FluoroFemoral" => $fluoro,
                         "FemoralDSA" => $dsa,
                         "IVUS" => $ivus,
                         "TOE" => $toe,
                         "OCT" => $oct,
                         "TtE" => $tte,
                         "ICE" => $ice,
                         "iFR" => $ifr,
                         "FFR" => $ffr,
                         "CoronaryNotes" => $this->input->post("coronary_notes"),
                         "POBA_1_CA" => $poba1ca,
                         "POBA_2_CA"=> $poba2ca,
                         "POBA_1_SVG" => $poba1svg,
                         "POBA_2_SVG" => $poba2svg,
                         "PedicledPOBA" => $pedicledpoba,
                         "Stent1_CA" => $stent1ca,
                         "Stent1_SVG" => $stent1svg,
                         "Stents1_SVG" => $stents1svg,
                         "Stents_Multi_SVG" => $stentsmultisvg,
                         "Stents1_CA" => $stents1ca,
                         "PedicledStent" => $pedicledstent,
                         "InterventionalNotes" => $this->input->post("interventional_notes"),
                         "ASD" => $asd,
                         "VSD" => $vsd,
                         "PDA" => $pda,
                         "PFO" => $pfo,
                         "ParaLeak" => $paraleak,
                         "AorticValv" => $aorticvalv,
                         "MitralValv" => $mitralvalv,
                         "Tricuspid" => $tricuspid,
                         "Pulmonary" => $pulmonary,
                         "AorticRep" => $aorticrep,
                         "MitralRep" => $mitralrep,
                         "MitralClip" => $mitralclip,
                         "OtherRep" => $otherrep,
                         "StructuralNotes" => $this->input->post("structural_notes"),
                         "MyocardiumBio" => $myocardiumbio,
                         "MyocardialSA" => $myocardialsa,
                         "EPS_2D" => $eps2d,
                         "EPS_2D_Details" => $this->input->post("2d_eps_details"),
                         "EPS_3D" => $eps3d,
                         "EPS_3D_Details" => $this->input->post("3d_eps_details"),
                         "RF_Ablation" => $rfablation,
                         "CryoAblation" => $cryoablation,
                         "Cardioversion" => $cardioversion,
                         "ElectroNotes" => $this->input->post("electro_notes"),
                         "PPM_Type_1" => $this->input->post("ppm_type_1"),
                         "PPM_Type_2" => $this->input->post("ppm_type_2"),
                         "ICD_Type_1" => $this->input->post("icd_type_1"),
                         "ICD_Type_2" => $this->input->post("icd_type_2"),
                         "TPW_Type" => $this->input->post("tpw_type"),
                         "ICM_Type" => $this->input->post("icm_type"),
                         "AntibacPouch" => $this->input->post("antibac_pouch"),
                         "PacingNotes" => $this->input->post("pacing_notes"),
                         "IABP_Insertion" => $iabpinsertion,
                         "IABP_Details" => $this->input->post("iabp_details"),
                         "RenalDenervation" => $renaldenervation,
                         "Pericardiocentesis" => $pericardiocentesis,
                         "InsertVascClosure" => $insertvascclosure,
                         "LimbVascular" => $limbvascular,
                         "VisceralVascular" => $visceralvascular,
                         "EVAR" => $evar,
                         "PTA" => $pta,
                         "Vasc1Notes" => $this->input->post("vasc_1_notes"),
                         "Vasc3Notes" => $this->input->post("vasc_3_notes"),
                         "UpperOrRenal" => $this->input->post("vasc_2"),
                         "LowerVascular" => $lowervascular,
                         "ImplantPain" => $implantpain,
                         "OtherPain" => $this->input->post("pain_notes"),
                         "NonCardiacNotes" => $this->input->post("noncardiac_notes"),
                         "Height" =>$this->input->post("Height"),
                         "Weight" =>$this->input->post("Weight"),
                         "StudyDate" =>$this->input->post("StudyDate"),
                         "CCT" => $this->input->post("cct"),
                         "PrimaryOperator" =>$this->input->post("PrimaryOperator"),
                         "Radiographer" =>$this->input->post("Radiographer"),
                         "DAP" => $this->input->post("dap"),
                         "SRDL" => $this->input->post("srdl"),
                         "AirKerma" => $this->input->post("ca_kerma"),
                         "FluoroTime" => $this->input->post("fluoro_time"),
                         "Cardiac_0" => $this->input->post("cardiac_3.75"),
                         "Cardiac_1" => $this->input->post("cardiac_7.5"),
                         "Cardiac_2" => $this->input->post("cardiac_15"),
                         "Cardiac_3" => $this->input->post("cardiac_25_30"),
                         "Vascular_1" => $this->input->post("vasc_0.5_2"),
                         "Vascular_2" => $this->input->post("vasc_3_6"),
                         "Rotational_1" => $this->input->post("rotate_3"),
                         "Rotational_2" => $this->input->post("rotate_stent"),
                         "SingleShots" => $singleshots,
                         "Acquisition" => $this->input->post("acquisition"),
                         "FluoroFlavour" => $this->input->post("fluoro_flavour"),
                         "Contrast" => $this->input->post("contrast_type_qty"),
                         "Catheter_1" => $this->input->post("catheter_1"),
                         "Catheter_2" => $this->input->post("catheter_2"),
                         "Balloon_1" => $this->input->post("balloon_1"),
                         "Balloon_2" => $this->input->post("balloon_2"),
                         "Stent_1" => $this->input->post("stent_1"),
                         "Stent_2" => $this->input->post("stent_2"),
                         "AccessRoute1" => $this->input->post("access_route_1"),
                         "Access1_Outcome" => $this->input->post("access_1_outcome"),
                         "AccessRoute2" => $this->input->post("access_route_2"),
                         "Access2_Outcome" => $this->input->post("access_2_outcome")    
                    );   
                    $this->main_model->insert_study_r($data);
               } 
          }
     } 

     public function updated()  
     {  
          $this->index();  
     }       


}