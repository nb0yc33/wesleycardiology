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

    function insert_study_vmp($data)  
    {  
         $this->db->insert("StudyVMP", $data);  
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

    function delete_patient($data, $id)
    {
         $this->db->where("PatientID", $id);
         $this->db->delete("Patients", $data);
         redirect(base_url(). "main/updated");
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
    
    function post_r()
    {
          //ensure mandatory fields are filled
          $this->load->library('form_validation');  
          $this->form_validation->set_rules("Height", "Height", 'required');         
          $this->form_validation->set_rules("Weight", "Weight", 'required');  
          $this->form_validation->set_rules("StudyDate", "Study Date", 'required');  
          $this->form_validation->set_rules("PrimaryOperator", "Primary Operator", 'required');
          $this->form_validation->set_rules("Radiographer", "Radiographer", 'required');
          $this->form_validation->set_rules("StudyType", "Study Type", 'required');
          
          if($this->form_validation->run())  
          {            
               if($this->input->post("AddRadiographer"))
               {
                    //store checkbox responses as bit(0 or 1) for DB
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
     
                         if($this->input->post("srdl") == "1"){
                              $srdl = 1;
                         } else {
                              $srdl = 0;
                         }
     
                         if($this->input->post("non-pedicled_graft") == "1"){
                              $nonpedicledgraft = 1;
                         } else {
                              $nonpedicledgraft = 0;
                         }
     
                         if($this->input->post("pedicled_RIMA") == "1"){
                              $pedicledrima = 1;
                         } else {
                              $pedicledrima = 0;
                         }
     
                         if($this->input->post("pedicled_LIMA") == "1"){
                              $pedicledlima = 1;
                         } else {
                              $pedicledlima = 0;
                         }
                         
                         //retrieve input as an array for DB entry
                         $data = array(
                              "PatientID"=> $patientID,
                              "NonPedicledGraft" => $nonpedicledgraft,
                              "PedicledRIMA" => $pedicledrima,
                              "PedicledLIMA" => $pedicledlima,
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
                              "StudyType" =>$this->input->post("StudyType"),
                              "DAP" => $this->input->post("dap"),
                              "SRDL" => $srdl,
                              "AirKerma" => $this->input->post("ca_kerma"),
                              "FluoroTime" => $this->input->post("fluoro_time"),
                              "Cardiac_0" => $this->input->post("cardiac_3"),
                              "Cardiac_1" => $this->input->post("cardiac_7"),
                              "Cardiac_2" => $this->input->post("cardiac_15"),
                              "Cardiac_3" => $this->input->post("cardiac_25_30"),
                              "Vascular_1" => $this->input->post("vasc_2"),
                              "Vascular_2" => $this->input->post("vasc_3_6"),
                              "Rotational_1" => $this->input->post("rotate_3"),
                              "Rotational_2" => $this->input->post("rotate_stent"),
                              "SingleShots" => $singleshots,
                              "Acquisition" => $this->input->post("acquisition"),
                              "FluoroFlavour" => $this->input->post("fluoro_flavour"),
                              "Contrast" => $this->input->post("contrast_type_qty"),
                              "Catheter_1" => $_POST["catheter_1"],
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
                         $this->insert_study_r($data);
                         
                    }
               }
    }

    function post_vmp()
    {

          if($this->input->post("AddVMP"))
          {
               //store checkbox responses as bit(0 or 1) for DB
               if($this->input->post("diabetes") == "1"){
                    $diabetes = 1;
               } else {
                    $diabetes = 0;
               }

               if($this->input->post("pvd") == "1"){
                    $pvd = 1;
               } else {
                    $pvd = 0;
               }

               if($this->input->post("prev_cabg") == "1"){
                    $prevcabg = 1;
               } else {
                    $prevcabg = 0;
               }

               if($this->input->post("prev_pci") == "1"){
                    $prevpci = 1;
               } else {
                    $prevpci = 0;
               }

               if($this->input->post("no_creatinine") == "1"){
                    $nocreatinine = 1;
               } else {
                    $nocreatinine = 0;
               }

               if($this->input->post("lv_test") == "1"){
                    $lvtest = 1;
               } else {
                    $lvtest = 0;
               }

               if($this->input->post("cardiogenic_shock") == "1"){
                    $cardiogenicshock = 1;
               } else {
                    $cardiogenicshock = 0;
               }

               if($this->input->post("ooha") == "1"){
                    $ooha = 1;
               } else {
                    $ooha = 0;
               }

               if($this->input->post("pre-procedural_intubation") == "1"){
                    $preproceduralintubation = 1;
               } else {
                    $preproceduralintubation = 0;
               }

               if($this->input->post("acs") == "1"){
                    $acs = 1;
               } else {
                    $acs = 0;
               }

               if($this->input->post("pre-hospital_notification")){
                    $prehospitalnotification = 1;
               } else {
                    $prehospitalnotification = 0;
               }

               if($this->input->post("intubation_required")){
                    $intubationrequired = 1;
               } else {
                    $intubationrequired = 0;
               }

               if($this->input->post("mechanical_circulatory_required")){
                    $mechanicalcirculatorysupport = 1;
               } else {
                    $mechanicalcirculatorysupport = 0;
               }

               if($this->input->post("intervention1_outcome")){
                    $l1outcome = 1;
               } else {
                    $l1outcome = 0;
               }

               if($this->input->post("intervention1_instent_restenosis")){
                    $l1instentrestenosis = 1;
               } else {
                    $l1instentrestenosis = 0;
               }

               if($this->input->post("intervention1_stent_thrombosis")){
                    $l1stentthrombosis = 1;
               } else {
                    $l1stentthrombosis = 0;
               }

               if($this->input->post("intervention2_outcome")){
                    $l2outcome = 1;
               } else {
                    $l2outcome = 0;
               }

               if($this->input->post("intervention2_instent_restenosis")){
                    $l2instentrestenosis = 1;
               } else {
                    $l2instentrestenosis = 0;
               }

               if($this->input->post("intervention2_stent_thrombosis")){
                    $l2stentthrombosis = 1;
               } else {
                    $l2stentthrombosis = 0;
               }
               
               if($this->input->post("intervention3_outcome")){
                    $l2outcome = 1;
               } else {
                    $l2outcome = 0;
               }

               if($this->input->post("intervention3_instent_restenosis")){
                    $l2instentrestenosis = 1;
               } else {
                    $l2instentrestenosis = 0;
               }

               if($this->input->post("intervention3_stent_thrombosis")){
                    $l2stentthrombosis = 1;
               } else {
                    $l2stentthrombosis = 0;
               }

               if($this->input->post("complication_status")){
                    $complication = 1;
               } else {
                    $complication = 0;
               }

               if($this->input->post("dissection")){
                    $dissection = 1;
               } else {
                    $dissection = 0;
               }

               if($this->input->post("periprocedural_mi")){
                    $periproceduralmi = 1;
               } else {
                    $periproceduralmi = 0;
               }

               if($this->input->post("major_bleeding")){
                    $majorbleedingevent = 1;
               } else {
                    $majorbleedingevent = 0;
               }

               if($this->input->post("tamponade")){
                    $tamponade = 1;
               } else {
                    $tamponade = 0;
               }

               if($this->input->post("other_complication")){
                    $othercomplicationstatus = 1;
               } else {
                    $othercomplicationstatus = 0;
               }

               if($this->input->post("perforation")){
                    $perforation = 1;
               } else {
                    $perforation = 0;
               }

               if($this->input->post("death")){
                    $death = 1;
               } else {
                    $death = 0;
               }

               if($this->input->post("life_threatening_arrhythmia")){
                    $lifethreatarrhythmia = 1;
               } else {
                    $lifethreatarrhythmia = 0;
               }

               if($this->input->post("pnemothorax")){
                    $pnemothorax = 1;
               } else {
                    $pnemothorax = 0;
               }

               if($this->input->post("cva_stroke")){
                    $cvastroke = 1;
               } else {
                    $cvastroke = 0;
               }

               if($this->input->post("unplanned_cabg")){
                    $unplannedcabg = 1;
               } else {
                    $unplannedcabg = 0;
               }

               if($this->input->post("haemotoma_10cm")){
                    $haemotoma10 = 1;
               } else {
                    $haemotoma10 = 0;
               }

               if($this->input->post("pseudoanerysm")){
                    $pseudoanerysm = 1;
               } else {
                    $pseudoanerysm = 0;
               }

               if($this->input->post("valve_damage")){
                    $valvedamage = 1;
               } else {
                    $valvedamage = 0;
               }

               if($this->input->post("contrast_reaction_intervention")){
                    $contrastreactionintervention = 1;
               } else {
                    $contrastreactionintervention = 0;
               }

               if($this->input->post("unplanned_device_implant")){
                    $unplanneddeviceimplant = 1;
               } else {
                    $unplanneddeviceimplant = 0;
               }

               if($this->input->post("failure_deploy_implant_pacing_lead")){
                    $pacingleadfailure = 1;
               } else {
                    $pacingleadfailure = 0;
               }

               //retrieve input as an array for DB entry
               $data = array(
                    "Diabetes" => $diabetes,
                    "ManageDiabetes" => $this->input->post("diabetes_management"),
                    "PeripheralVasc" => $pvd,
                    "PrevCABG" => $prevcabg,
                    "CABG_Date" => $this->input->post("cabg_date"), 
                    "PrevPCI" => $prevpci,
                    "PCI_Date" => $this->input->post("pci_date"),
                    "PreprocedureC" => $this->input->post("pre-procedure_creatinine"),
                    "CreatinineNA" => $nocreatinine,
                    "TestLV" => $lvtest,
                    "DateLV" => $this->input->post("lv_test_date"),
                    "LV_Test_Type" => $this->input->post("lv_test_type"),
                    "ResultEF" => $this->input->post("ef_result"),
                    "EF_Result_Type" => $this->input->post("ef_type"),
                    "Estimated_eGFR" => $this->input->post("estimated_egfr"),
                    "Estimated_eGFR_Type" => $this->input->post("estimated_egfr_details"),
                    "CardiogenicShock" => $cardiogenicshock,
                    "OOHA" => $ooha,
                    "PreproceduralIntubation" => $preproceduralintubation,
                    "PCI_Indication" => $this->input->post("pci_indication"),
                    "ACS" => $acs,
                    "ACS_Type" => $this->input->post("acs_type"),
                    "ACS_Presentation" => $this->input->post("acs_presentation"),
                    "PreHospitalNotification" => $prehospitalnotification,
                    "SystemOnsetDate" => $this->input->post("system_onset_date"),
                    "SystemOnsetTime" => $this->input->post("system_onset_time"),
                    "FirstMedicalContactDate" => $this->input->post("1st_medical_contact_date"),
                    "FirstMedicalContactTime" => $this->input->post("1st_medical_contact_time"),
                    "FirstDiagnosticACG_Date" => $this->input->post("1st_diagnostic_ecg_date"),
                    "FirstDiagnosticACG_Time" => $this->input->post("1st_diagnostic_ecg_time"),
                    "FirstDeviceTime" => $this->input->post("1st_device_time"),
                    "IntubationRequired" => $intubationrequired,
                    "MechanicalCirculatory" => $mechanicalcirculatorysupport,
                    "LesionLocation_L1" => $this->input->post("lesion1_location"),
                    "L1_Outcome" => $l1outcome,
                    "L1_InstentRestenosis" => $l1instentrestenosis,
                    "L1_StentThrombosis" => $l1stentthrombosis,
                    "LesionLocation_L2" => $this->input->post("lesion2_location"),
                    "L2_Outcome" => $l2outcome,
                    "L2_InstentRestenosis" => $l2instentrestenosis,
                    "L2_StentThrombosis" => $l2stentthrombosis,
                    "LesionLocation_L3" => $this->input->post("lesion3_location"),
                    "L3_Outcome" => $l3outcome,
                    "L3_InstentRestenosis" => $l3instentrestenosis,
                    "L3_StentThrombosis" => $l3stentthrombosis,
                    "ComplicationStatus" => $complication,
                    "Dissection" => $dissection,
                    "PeriproceduralMI" => $periproceduralmi,
                    "MajorBleedingEvent" => $majorbleedingevent,
                    "Tamponade" => $tamponade,
                    "OtherComplicationStatus" => $othercomplicationstatus,
                    "OtherComplication" => $this->input->post("other_complication_text"),
                    "Perforation" => $perforation,
                    "Death" => $death,
                    "LifeThreatArrhythmia" => $lifethreatarrhythmia,
                    "Pnemothorax" => $pnemothorax,
                    "CVA_Stroke" => $cvastroke,
                    "UnplannedCABG" => $unplannedcabg,
                    "Haemotoma10" => $haemotoma10,
                    "Pseudoanerysm" => $pseudoanerysm,
                    "ValveDamage" => $valvedamage,
                    "ContrastReactionIntervention" => $contrastreactionintervention,
                    "UnplannedDevImplant" => $unplanneddeviceimplant,
                    "PacingLeadFailure" => $pacingleadfailure
               );   
               $this->insert_study_vmp($data);
          }
     }
}
?>