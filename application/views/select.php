<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Patient</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	* {
		font-size: 10px;
        font-family: 'Open Sans', sans-serif;
	}

	.container {
		width: 100%;
		text-align: center;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		padding-bottom: 1em;
	}

	#container1 {
		background: #E0DEDE;
		padding: 1em 1em 1em 1em;
		border: 2px solid lightgray;
		border-radius: 10px;
	}

	#container2 {
		background: #E0DEDE;
		padding: 1em 1em 1em 1em;
		border: 2px solid lightgray;
		border-radius: 10px;
	}

    #container3 {
		background: #E0DEDE;
		padding: 1em 1em 1em 1em;
		border: 2px solid lightgray;
		border-radius: 10px;
        width: 40%;
    }

    th {
        font-size: 12px;
    }

    .btn-info, .btn-info:hover, .btn-info:active, .btn-info:visited, .btn-info:focus {
        background-color: #685aa3 !important;
        border-color: #685aa3;
    }

    .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        width: 100%;
        border: none;
        border: 2px solid lightgray;
		border-radius: 5px;
        text-align: left;
        outline: none;
        font-size: 14px;
    }

    .active, .collapsible:hover {
        background-color: #555;
    }

    .content {
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    } 

    #addContainer {
        padding-top: 1.5em;
    }
	</style>

		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="<?php echo base_url(); ?>">CCT Activity & Radiation Record</a>
    			</div>
    			<ul class="nav navbar-nav">
      				<li><a href="#">Daily Activity List</a></li>
      				<li><a href="#">Extract Tool</a></li>
      				<li><a href="#">Code Sets</a></li>
    			</ul>
  			</div>
		</nav>
		
	</head>
	<body>
	<div class="container">
		<div id="container1">
        <h4 align="left">Update Patient</h4>
			<?php echo validation_errors(); ?> 
      		<form method="post" action="<?php echo base_url()?>main/form_validation">
                 <?php  
            if(isset($patient_data))  
            {  
                foreach($patient_data->result() as $row)  
                {  
           ?>  
                    <div class="form-group">  
                        <label>MRN</label>  
                        <input type="number" name="MRN" value="<?php echo $row->MRN; ?>" class="form-control" />  
                        <span class="text-danger"><?php echo form_error("MRN"); ?></span>  
                    </div>

                    <div class="form-group">  
                        <label>Surname</label>  
                            <input type="text" name="LastName" value="<?php echo $row->LastName; ?>" class="form-control" />  
                            <span class="text-danger"><?php echo form_error("LastName"); ?></span>  
                    </div>  

                    <div class="form-group">  
                        <label>First Name</label>  
                            <input type="text" name="FirstName" value="<?php echo $row->FirstName; ?>" class="form-control" />  
                            <span class="text-danger"><?php echo form_error("FirstName"); ?></span>  
                    </div>  

                    <div class="form-group">  
                        <label>Middle Name</label>  
                            <input type="text" name="MiddleName" value="<?php echo $row->MiddleName; ?>" class="form-control" />  
                            <span class="text-danger"><?php echo form_error("MiddleName"); ?></span>  
                    </div>   

                    <div class="form-group">  
                        <label>DOB</label>  
                            <input type="date" name="DateOfBirth" value="<?php echo $row->DateOfBirth; ?>" class="form-control" />  
                            <span class="text-danger"><?php echo form_error("DateOfBirth"); ?></span>  
                    </div>

                    <div class="form-group">
							<label for="Gender">Gender:</label>
					    	<select id="Gender" name="Gender" size="3">
  								<option value="Male">Male</option>
 						    	<option value="Female">Female</option>
                            	<option value="Other">Other</option>
                        	</select>	
					</div>
           
                    <div class="form-group">  
                        <input type="hidden" name="hidden_id" value="<?php echo $row->PatientID; ?>" />  
                        <input type="submit" name="Update" value="Update" class="btn btn-info" />  
                    </div>       
           <?php       
                }  
            } 
            ?>
		    </form>
		</div>
        <div id="container2">
            <h4 align="left">Existing Studies</h4>
               <br />
			<div id="result"></div>
			<div style="clear:both">
			</div>
		    <br />
		    <br />
		    <br />
		    <br />               
        </div>
        <div id="container3">
            <h4 align="left">Add Study - Radiographer</h4>
            <?php echo validation_errors(); ?> 
            <form method="post" action="<?php echo base_url()?>main/select/<?php echo $row->PatientID; ?>">
                <button type="button" class="collapsible">Coronary Diagnostic</button>
                <div class="content">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Coronary Angiogram</th>
                                <td>
                                <input type="hidden" name="ca" value="0" />
                                <input type="checkbox" id="ca" name="ca" value="1">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Grafts</th>
                                <td>
                                <label> <input type="radio" id="svg" name="Graft" value="SVG"/>SVG/Radial/Free LIMA/RIMA</label>
                                <label> <input type="radio" id="pedicled" name="Graft" value="Pedicled"/>Pedicled</label>
                                <label> <input type="radio" id="lima" name="Graft" value="LIMA"/>LIMA</label>
                                <label> <input type="radio" id="rima" name="Graft" value="RIMA"/>RIMA</label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">LV Gram</th>
                                <td>
                                    <label> <input type="radio" id="single" name="lv_gram" value="Single"/>Single</label>
                                    <label> <input type="radio" id="multiple" name="lv_gram" value="Multiple"/>Multiple</label>                                
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Left Heart Study</th>
                                <td>
                                <input type="hidden" name="left_heart_pressures" value="0" />
                                <label><input type="checkbox" id="lefth" value="1" name="left_heart_pressures"/> Left heart pressures </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Right Heart Study</th>
                                <td>
                                <input type="hidden" name="right_pressures" value="0" />
                                <label><input type="checkbox" id="righth1" value="1" name="right_pressures"/> Pressures </label>
                                <input type="hidden" name="oxygen_saturation_run" value="0" />
                                <label><input type="checkbox" id="righth2" value="1" name="oxygen_saturation_run"/> Oxygen saturation run </label>
                                <input type="hidden" name="cardiac_output" value="0" />
                                <label><input type="checkbox" id="righth3" value="1" name="cardiac_output"/> Cardiac output </label>
                                </td>
                            </tr>                            
                            <tr>
                                <th scope="row">Aortogram</th>
                                <td>
                                    <label> <input type="radio" id="asc" name="aortogram" value="Ascending"/>Ascending</label>
                                    <label> <input type="radio" id="desc" name="aortogram" value="Descending"/>Descending</label>  
                                    <label> <input type="radio" id="multi_aorto" name="aortogram" value="Multiple"/>Multiple</label>                                                                   
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">TAVR</th>
                                <td>
                                <input type="hidden" name="tavr" value="0" />
                                <label><input type="checkbox" id="tavr" value="1" name="tavr"/> TAVR workup </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Femoral Access Review</th>
                                <td>
                                <input type="hidden" name="cine" value="0" />
                                <label><input type="checkbox" id="fem_access1" value="1" name="cine"/> Cine </label>
                                <input type="hidden" name="fluoro" value="0" />
                                <label><input type="checkbox" id="fem_access2" value="1" name="fluoro"/> Fluoro </label>
                                <input type="hidden" name="dsa" value="0" />
                                <label><input type="checkbox" id="fem_access3" value="1" name="dsa"/> DSA </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Ultrasound/CA assessment</th>
                                <td>
                                <input type="hidden" name="IVUS" value="0" />
                                <label><input type="checkbox" id="ultra_assess1" value="1" name="IVUS"/> IVUS </label>
                                <input type="hidden" name="TOE" value="0" />
                                <label><input type="checkbox" id="ultra_assess2" value="1" name="TOE"/> TOE </label>
                                <input type="hidden" name="OCT" value="0" />
                                <label><input type="checkbox" id="ultra_assess3" value="1" name="OCT"/> OCT </label>
                                <input type="hidden" name="TtE" value="0" />
                                <label><input type="checkbox" id="ultra_assess4" value="1" name="TtE"/> TtE </label>
                                <input type="hidden" name="ICE" value="0" />
                                <label><input type="checkbox" id="ultra_assess5" value="1" name="ICE"/> ICE </label>
                                <input type="hidden" name="iFR" value="0" />
                                <label><input type="checkbox" id="ultra_assess6" value="1" name="iFR"/> iFR </label>
                                <input type="hidden" name="FFR" value="0" />
                                <label><input type="checkbox" id="ultra_assess7" value="1" name="FFR"/> FFR </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Other notes</th>
                                <td>
                                <input type="text" id="coronary_notes" name="coronary_notes"/> 
                                </td>
                            </tr>                                                       
                        </tbody>
                    </table>
                </div>
                <button type="button" class="collapsible">Interventional Cardiology</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> POBA </th>
                                <th scope="col"> Stent </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="poba1ca" value="0" />
                                    <label><input type="checkbox" id="poba_1" value="1" name="poba1ca"/> POBA 1 CA </label><br>
                                    <input type="hidden" name="poba2ca" value="0" />
                                    <label><input type="checkbox" id="poba_2" value="1" name="poba2ca"/> POBA =>2 CA </label><br>
                                    <input type="hidden" name="poba1svg" value="0" />
                                    <label><input type="checkbox" id="poba_3" value="1" name="poba1svg"/> POBA 1 SVG </label><br>
                                    <input type="hidden" name="poba2svg" value="0" />
                                    <label><input type="checkbox" id="poba_4" value="1" name="poba2svg"/> POBA =>2 SVG </label><br>
                                    <input type="hidden" name="pedicledpoba" value="0" />
                                    <label><input type="checkbox" id="poba_5" value="1" name="pedicledpoba"/> Pedicled LIMA/RIMA </label>
                                </td>
                                <td>
                                    <input type="hidden" name="stent1ca" value="0" />
                                    <label><input type="checkbox" id="stent_1" value="1" name="stent1ca"/> 1 stent, single CA </label><br>
                                    <input type="hidden" name="stent1svg" value="0" />
                                    <label><input type="checkbox" id="stent_2" value="1" name="stent1svg"/> 1 stent, single SVG </label><br>
                                    <input type="hidden" name="stents1svg" value="0" />
                                    <label><input type="checkbox" id="stent_3" value="1" name="stents1svg"/> =>2 stents, single SVG </label><br>
                                    <input type="hidden" name="stentsmultisvg" value="0" />
                                    <label><input type="checkbox" id="stent_4" value="1" name="stentsmultisvg"/> =>2 stents, multiple SVG </label><br>
                                    <input type="hidden" name="stents1ca" value="0" />
                                    <label><input type="checkbox" id="stent_5" value="1" name="stents1ca"/> =>2 stents, single CA </label><br> 
                                    <input type="hidden" name="pedicledstent" value="0" />
                                    <label><input type="checkbox" id="stent_6" value="1" name="pedicledstent"/> Pedicled LIMA/RIMA </label><br>
                                </td>
                            </tr>  
                            <tr>
                                <th scope="row">Other notes</th>
                                <td>
                                <input type="text" id="interventional_notes" name="interventional_notes"/> 
                                </td>
                            </tr>                                                     
                        </tbody>
                    </table>
                </div>
                <button type="button" class="collapsible">Structural</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> Device closure </th>
                                <th scope="col"> Valvuloplasty </th>
                                <th scope="col"> Heart Valve Replacement/Repair </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="asd" value="0" />
                                    <label><input type="checkbox" id="closure_1" value="1" name="asd"/> ASD </label><br>
                                    <input type="hidden" name="vsd" value="0" />
                                    <label><input type="checkbox" id="closure_2" value="1" name="vsd"/> VSD </label><br>
                                    <input type="hidden" name="pda" value="0" />
                                    <label><input type="checkbox" id="closure_3" value="1" name="pda"/> PDA  </label><br>
                                    <input type="hidden" name="pfo" value="0" />
                                    <label><input type="checkbox" id="closure_4" value="1" name="pfo"/> PFO </label><br>
                                    <input type="hidden" name="para_leak" value="0" />
                                    <label><input type="checkbox" id="closure_5" value="1" name="para_leak"/> Paravalvular leak </label>
                                </td>
                                <td>
                                    <input type="hidden" name="aorticvalv" value="0" />
                                    <label><input type="checkbox" id="valvulo_1" value="1" name="aorticvalv"/> Aortic </label><br>
                                    <input type="hidden" name="mitralvalv" value="0" />
                                    <label><input type="checkbox" id="valvulo_2" value="1" name="mitralvalv"/> Mitral </label><br>
                                    <input type="hidden" name="tricuspid" value="0" />
                                    <label><input type="checkbox" id="valvulo_3" value="1" name="tricuspid"/> Tricuspid </label><br>
                                    <input type="hidden" name="pulmonary" value="0" />
                                    <label><input type="checkbox" id="valvulo_4" value="1" name="pulmonary"/> Pulmonary </label><br>
                                </td>
                                <td>
                                    <input type="hidden" name="aorticrep" value="0" />
                                    <label><input type="checkbox" id="valve_rep_1" value="1" name="aorticrep"/> Aortic </label><br>
                                    <input type="hidden" name="mitralrep" value="0" />
                                    <label><input type="checkbox" id="valve_rep_2" value="1" name="mitralrep"/> Mitral </label><br>
                                    <input type="hidden" name="mitralclip" value="0" />
                                    <label><input type="checkbox" id="valve_rep_3" value="1" name="mitralclip"/> Mitral clip </label><br>
                                    <input type="hidden" name="otherrep" value="0" />
                                    <label><input type="checkbox" id="valve_rep_4" value="1" name="otherrep"/> Other </label><br>
                                </td>                                
                            </tr>  
                            <tr>
                                <th scope="row">Other notes</th>
                                <td>
                                <input type="text" id="structural_notes" name="structural_notes"/> 
                                </td>
                            </tr>                                                     
                        </tbody>
                    </table>
                </div>
                <button type="button" class="collapsible">Other Cardiac Procedures</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Biopsy</th>
                                <td>
                                <input type="hidden" name="myocardiumbio" value="0" />
                                <label><input type="checkbox" id="biopsy" value="1" name="myocardiumbio"/> Myocardium </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Embolisation</th>
                                <td>
                                <input type="hidden" name="myocardialsa" value="0" />
                                <label><input type="checkbox" id="embolisation" value="1" name="myocardialsa"/> Myocardial septal ablation </label>
                                </td>
                            </tr>                           
                        </tbody>
                    </table>                   
                </div>  
                <button type="button" class="collapsible">Electrophysiology</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="2d_eps" value="0" />
                                    <label><input type="checkbox" id="2d_eps" value="1" name="2ds_eps"/> 2D EPS </label><br>
                                </td>
                                <td>
                                    <label> <input type="radio" id="2d_init" name="2d_eps_details" value="Initial"/>Initial</label>
                                    <label> <input type="radio" id="2d_init" name="2d_eps_details" value="Redo"/>Redo</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="3d_eps" value="0" />
                                    <label><input type="checkbox" id="3d_eps" value="1" name="3d_eps"/> 3D EPS </label><br>
                                </td>
                                <td>
                                    <label> <input type="radio" id="3d_init" name="3d_eps_details" value="Initial"/>Initial</label>
                                    <label> <input type="radio" id="3d_init" name="3d_eps_details" value="Redo"/>Redo</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="rfablation" value="0" />
                                    <label><input type="checkbox" id="rf_ablation" value="1" name="rfablation"/> RF Ablation(s) </label><br>
                                    <input type="hidden" name="cryoablation" value="0" />
                                    <label><input type="checkbox" id="cryo_ablation" value="1" name="cryoablation"/> Cryo Ablation(s) </label><br>
                                    <input type="hidden" name="cardioversion" value="0" />
                                    <label><input type="checkbox" id="cardioversion" value="1" name="cardioversion"/> Cardioversion </label><br>    
                                </td>
                                <td></td>
                            </tr>                                                          
                            <tr>
                                <th scope="row">Other notes</th>
                                <td>
                                <input type="text" id="electro_notes" name="electro_notes"/> 
                                </td>
                            </tr>                                                     
                        </tbody>
                    </table>
                </div>                    
                <button type="button" class="collapsible">Pacing</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> PPM </th>
                                <th scope="col"> ICD </th>
                                <th scope="col"> TPW </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label> <input type="radio" id="ppm_single" name="ppm_type_1" value="Single"/>Single</label>
                                    <label> <input type="radio" id="ppm_dual" name="ppm_type_1" value="Dual"/>Dual</label>
                                    <label> <input type="radio" id="ppm_crt_p" name="ppm_type_1" value="CRT-P"/>CRT-P</label>    
                                </td>
                                <td>
                                    <label> <input type="radio" id="icd_single" name="icd_type_1" value="Single"/>Single</label>
                                    <label> <input type="radio" id="icd_dual" name="icd_type_1" value="Dual"/>Dual</label>
                                    <label> <input type="radio" id="icd_crt_d" name="icd_type_1" value="CRT-D"/>CRT-D</label> 
                                </td>
                                <td>
                                    <label> <input type="radio" id="tpw_implant" name="tpw_type" value="Implant"/>Implant</label>
                                    <label> <input type="radio" id="tpw_explant" name="tpw_type" value="Explant"/>Explant</label>
                                </td>                                
                            </tr>  
                            <tr>
                                <td>
                                    <label> <input type="radio" id="ppm_implant" name="ppm_type_2" value="Implant"/>Implant</label><br>
                                    <label> <input type="radio" id="ppm_explant" name="ppm_type_2" value="Explant"/>Explant</label><br>
                                    <label> <input type="radio" id="ppm_gen" name="ppm_type_2" value="Generator change"/>Generator change</label><br>
                                    <label> <input type="radio" id="ppm_lead_replace" name="ppm_type_2" value="Lead replacement"/>Lead replacement</label><br>
                                    <label> <input type="radio" id="ppm_lead_repos" name="ppm_type_2" value="Lead reposition"/>Lead reposition</label><br>
                                    <label> <input type="radio" id="ppm_lead_extract" name="ppm_type_2" value="Lead extraction"/>Lead extraction</label><br>
                                    <label> <input type="radio" id="ppm_dual_upgrade" name="ppm_type_2" value="Upgrade to dual chamber"/>Upgrade to dual chamber</label><br>
                                    <label> <input type="radio" id="ppm_crt_p" name="ppm_type_2" value="CRT-P"/>Upgrade to CRT-P</label><br>
                                </td>
                                <td>
                                    <label> <input type="radio" id="icd_implant" name="icd_type_2" value="Implant"/>Implant</label><br>
                                    <label> <input type="radio" id="icd_explant" name="icd_type_2" value="Explant"/>Explant</label><br>
                                    <label> <input type="radio" id="icd_gen" name="icd_type_2" value="Generator change"/>Generator change</label><br>
                                    <label> <input type="radio" id="icd_lead_replace" name="icd_type_2" value="Lead replacement"/>Lead replacement</label><br>
                                    <label> <input type="radio" id="icd_lead_repos" name="icd_type_2" value="Lead reposition"/>Lead reposition</label><br>
                                    <label> <input type="radio" id="icd_lead_extract" name="icd_type_2" value="Lead extraction"/>Lead extraction</label><br>
                                    <label> <input type="radio" id="icd_dual_upgrade" name="icd_type_2" value="Upgrade to dual chamber"/>Upgrade to dual chamber</label><br>
                                    <label> <input type="radio" id="icd_crt_d" name="icd_type_2" value="Upgrade to CRT-D"/>Upgrade to CRT-D</label><br>
                                </td>
                                <td></td>                                
                            </tr>                                                                                                                
                        </tbody>
                    </table>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> ICM/ILR </th>
                                <th scope="col"> Antibacterial Pouch </th>
                            </tr>                              
                        </thead>
                        <tbody> 
                            <tr>
                                <td>
                                    <label> <input type="radio" id="icm_implant" name="icm_type" value="Implant"/>Implant</label>
                                    <label> <input type="radio" id="icm_explant" name="icm_type" value="Explant"/>Explant</label>   
                                </td>
                                <td>
                                    <label> <input type="radio" id="antibac_yes" name="antibac_pouch" value="Yes"/>Yes</label>
                                    <label> <input type="radio" id="antibac_no" name="antibac_pouch" value="No"/>No</label>
                                </td>                                
                            </tr>
                            <tr>
                                <th scope="row">Other notes</th>
                                <td>
                                <input type="text" id="pacing_notes" name="pacing_notes"/> 
                                </td>
                                <td></td>
                            </tr>                     
                        </tbody>
                    </table>                   
                </div>         
                <button type="button" class="collapsible">Non-Cardiac Procedures</button>     
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">IABP</th>
                                <td>
                                    <input type="hidden" name="iabp" value="0" />
                                    <label> <input type="checkbox" id="iabp_insert" name="iabp" value="1"/>Insertion of IABP</label>
                                </td>
                                <td>
                                    <label> <input type="radio" id="iabp_before" name="iabp_details" value="Before"/>Before</label>
                                    <label> <input type="radio" id="iabp_during" name="iabp_details" value="During"/>During</label>
                                    <label> <input type="radio" id="iabp_after" name="iabp_details" value="After"/>After</label> 
                                </td>                               
                            </tr>     
                            <tr>
                                <th scope="row">Renal Denervation</th>
                                <td>
                                    <input type="hidden" name="renal_denervation" value="0" />
                                    <input type="checkbox" id="renal_denerv" name="renal_denervation" value="1"/>
                                </td>
                                <td></td>                               
                            </tr>    
                            <tr>
                                <th scope="row">Pericardiocentesis</th>
                                <td>
                                    <input type="hidden" name="pericardiocentesis" value="0" />
                                    <input type="checkbox" id="pericardio" name="pericardiocentesis" value="1"/>
                                </td>
                                <td></td>                               
                            </tr>  
                            <tr>
                                <th scope="row">Insertion of Vascular Closure Device</th>
                                <td>
                                    <input type="hidden" name="insert_vasc" value="0" />
                                    <input type="checkbox" id="vasc_closure" name="insert_vasc" value="1"/>
                                </td>
                                <td></td>                               
                            </tr>                                                                                                                                                                                          
                        </tbody>
                    </table>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Vascular-Details</th>
                                <td>
                                    <input type="hidden" name="limb_vasc" value="0" />
                                    <label> <input type="checkbox" id="vasc_limb" name="limb_vasc" value="1"/>Limb</label>
                                    <input type="hidden" name="visceral_vasc" value="0" />
                                    <label> <input type="checkbox" id="vasc_visceral" name="visceral_vasc" value="1"/>Visceral</label>
                                    <input type="hidden" name="evar" value="0" />
                                    <label> <input type="checkbox" id="vasc_evar" name="evar" value="1"/>EVAR</label>
                                    <input type="hidden" name="pta" value="0" />
                                    <label> <input type="checkbox" id="vasc_pta" name="pta" value="1"/>PTA</label>
                                </td>
                                <th scope="row">Other</th>
                                <td>
                                <input type="text" id="vasc_1_notes" name="vasc_1_notes"/> 
                                </td>                                
                            </tr>     
                            <tr>
                                <th scope="row">Vascular-Details</th>
                                <td>
                                    <label> <input type="radio" id="vasc_upper" name="vasc_2" value="Upper"/>Upper</label>
                                    <label> <input type="radio" id="vasc_renal" name="vasc_2" value="Renal"/>Renal</label>
                                </td>
                                <td></td>                               
                            </tr>
                            <tr>
                                <th scope="row">Vascular-Details</th>
                                <td>
                                    <input type="hidden" name="vasc_lower" value="0" />
                                    <label> <input type="radio" id="vasc_lower" name="vasc_lower" value="1"/>Lower</label>
                                </td>
                                <th scope="row">Other</th>
                                <td>
                                <input type="text" id="vasc_3_notes" name="vasc_3_notes"/> 
                                </td>                          
                            </tr>  
                            <tr>
                                <th scope="row">Pain</th>
                                <td>
                                    <input type="hidden" name="implant_pain" value="0" />
                                    <label> <input type="radio" id="pain_implant" name="implant_pain" value="1"/>Pain-Implant</label>
                                </td>
                                <th scope="row">Pain - Other</th>
                                <td>
                                <input type="text" id="pain_notes" name="pain_notes"/>
                                </td>                          
                            </tr>  
                            <tr>
                                <th scope="row">Other Notes</th>
                                <td>
                                <input type="text" id="noncardiac_notes" name="noncardiac_notes">
                                </td>   
                            </tr>                                                                                                                                                                                                               
                        </tbody>
                    </table>                    
                </div>                        
                <button type="button" class="collapsible">Study Details</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label>Patient height (m) <input type="float" id="height" name="Height"/></label>
                                </td>
                                <td>
                                    <label>Patient weight (kgs) <input type="float" id="weight" name="Weight"/></label>
                                </td>                                
                            </tr>  
                            <tr>
                                <td>
                                    <label>Patient BMI <br> <input type="float" id="bmi" name="bmi"/></label>
                                </td>
                                <td>
                                    <label>Procedure date <br> <input type="date" id="procedure_date" name="StudyDate"/></label>
                                </td>                                
                            </tr>     
                            <tr>
                                    <th scope="row">CCT</th>
                                <td>
                                    <label> <input type="radio" id="cct_1" name="cct" value="1"/>1</label>
                                    <label> <input type="radio" id="cct_2" name="cct" value="2"/>2</label>
                                    <label> <input type="radio" id="cct_3" name="cct" value="3"/>3</label>
                                    <label> <input type="radio" id="cct_hybrid" name="cct" value="Hybrid"/>Hybrid</label>                                                                        
                                </td>                                
                            </tr>   
                            <tr>
                                <td>
                                    <label>Primary operator <input type="text" id="primary_operator" name="PrimaryOperator"/></label>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>     <label>Radiographer <br> <input type="text" id="radiographer" name="Radiographer"/></label>                                                                                                                                                                                                                                                            
                        </tbody>
                    </table>                   
                </div>  
                <button type="button" class="collapsible">Radiation</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label>DAP (Gy cm<sup>2</sup>) <br><input type="number" id="dap" name="dap"/></label>
                                </td>
                                <td>
                                    <label> SRDL <br><input type="number" id="srdl" name="srdl"/></label>
                                </td>                                                                
                            </tr>              
                            <tr>
                                <td>
                                    <label>CumulativeAir Kerma (mGy) <input type="float" id="ca_kerma" name="ca_kerma"/></label>
                                </td>                            
                                <td>
                                    <label>Fluoro time (mm:ss) <input type="float" id="fluoro_time" name="fluoro_time"/></label>
                                </td>

                            </tr>                                                                                                                                                                                                                                                     
                        </tbody>
                </table>                 
                </div>                           
                <button type="button" class="collapsible">X-Ray Application</button>
                <div class="content">
                <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Cardiac</th>
                                <td>
                                    <label><input type="number" id="cardiac_3.75" name="cardiac_3.75"/><br> 3.75 fps</label>
                                </td>
                                <td>
                                    <label><input type="number" id="cardiac_7.5" name="cardiac_7.5"/><br> 7.5 fps</label>
                                </td>                          
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <label><input type="number" id="cardiac_15" name="cardiac_15"/><br> 15 fps </label>
                                </td>     
                                <td>
                                    <label><input type="number" id="cardiac_25_30" name="cardiac_25_30"/><br> 25/30 fps</label>
                                </td> 
                            </tr>    
                            <tr>
                                <th scope="row">Vascular</th>
                                <td>
                                    <label><input type="number" id="vasc_0.5_2" name="vasc_0.5_2"/><br> 0.5-2fps</label>
                                </td>
                                <td>
                                    <label><input type="number" id="vasc_3_6" name="vasc_3_6"/><br> 3-6 fps</label>
                                </td> 
                            </tr>
                            <tr>
                                <th scope="row">Rotational</th>
                                <td>
                                    <label><input type="number" id="rotate_3" name="rotate_3"/><br> 3 dra </label>
                                </td>
                                <td>
                                    <label><input type="number" id="rotate_stent" name="rotate_stent"/><br> Stent boost</label>
                                </td> 
                            </tr> 
                            <tr>
                                <th scope="row">Single shots</th>
                                <td>
                                    <input type="hidden" name="single_shots" value="0" />
                                    <input type="checkbox" id="single_shot" name="single_shots" value="1"/>
                                </td>
                                <td>
                                </td> 
                            </tr>    
                            <tr>
                                <th scope="row">Acquisition</th>
                                <td>
                                    <label> <input type="radio" id="acq_l" name="acquisition" value="L"/> L </label>
                                    <label> <input type="radio" id="acq_m" name="acquisition" value="M"/> M </label>
                                    <label> <input type="radio" id="acq_n" name="acquisition" value="N"/> N </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Fluoro flavour</th>
                                <td>
                                    <label> <input type="radio" id="fluoro_1" name="fluoro_flavour" value="I"/> I </label>
                                    <label> <input type="radio" id="fluoro_2" name="fluoro_flavour" value="II"/> II </label>
                                    <label> <input type="radio" id="fluoro_3" name="fluoro_flavour" value="III"/> III </label>
                                </td>
                            </tr>                                                                                                                                                                                                                                                                                                                                             
                        </tbody>
                </table>                
                </div>            
                <button type="button" class="collapsible">Contrast</button>
                <div class="content">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row">Contrast Type & Qty (mLs)</th>
                                <td>
                                    <input type="text" id="contrast" name="contrast_type_qty"/>
                                </td>   
                            </tr>                                                                                                                                                                                                               
                        </tbody>
                    </table>                
                </div>     
                <button type="button" class="collapsible">Equipment</button>
                <div class="content">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row">Catheters</th>
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupC as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="catheter_1" name="catheter_1">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select>                                    
                                </td>
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupC as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="catheter_2" name="catheter_2">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select>                                
                                </td>   
                            </tr>   
                            <tr>
                                <th scope="row">Balloons</th>
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupB as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="balloon_1" name="balloon_1">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select>                                     
                                </td>  
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupB as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="balloon_2" name="balloon_2">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select> 
                                </td> 
                            </tr>
                            <tr>
                                <th scope="row">Stents</th>
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupS as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="stent_1" name="stent_1">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select>                                    
                                </td>   
                                <td>
                                    <select class="form-control">
                                        <?php 
                                            foreach($groupS as $row)
                                            { 
                                                echo '<option value="'.$row->Description.'" id="stent_2" name="stent_2">'.$row->Description.'</option>';
                                            }
                                        ?>
                                    </select>                                  
                                </td>
                            </tr>                                                                                                                                                                                                            
                        </tbody>
                    </table>                   
                </div> 
                <button type="button" class="collapsible">Access Route</button>
                <div class="content">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row">Access Route 1</th>
                                <td>
                                    <label> <input type="radio" id="brachial_access_1" name="access_route_1" value="Brachial"/> Brachial </label>
                                    <label> <input type="radio" id="radial_access_1" name="access_route_1" value="Radial"/> Radial </label>
                                    <label> <input type="radio" id="femoral_access_1" name="access_route_1" value="Femoral"/> Femoral </label>
                                </td>   
                            </tr>                                                                                                                                                                                                               
                            <tr>
                                <th scope="row">Access Route 1 - Outcome</th>
                                <td>
                                    <label> <input type="radio" id="access_1_successful" name="access_1_outcome" value="Successful"/> Successful </label>
                                    <label> <input type="radio" id="access_1_unsuccessful" name="access_1_outcome" value="Unsuccessful"/> Unsuccessful </label>
                                </td>   
                            </tr>
                            <tr>
                                <th scope="row">Access Route 2</th>
                                <td>
                                    <label> <input type="radio" id="brachial_access_2" name="access_route_2" value="Brachial"/> Brachial </label>
                                    <label> <input type="radio" id="radial_access_2" name="access_route_2" value="Radial"/> Radial </label>
                                    <label> <input type="radio" id="femoral_access_1" name="access_route_2" value="Femoral"/> Femoral </label>
                                </td>   
                            </tr>                                                                                                                                                                                                               
                            <tr>
                                <th scope="row">Access Route 2 - Outcome</th>
                                <td>
                                    <label> <input type="radio" id="access_2_successful" name="access_2_outcome" value="Successful"/> Successful </label>
                                    <label> <input type="radio" id="access_2_unsuccessful" name="access_2_outcome" value="Unsuccessful"/> Unsuccessful </label>
                                </td>   
                            </tr>
                        </tbody>
                    </table>                
                </div>
                <div class="form-group">  
                    <div id="addContainer">
                        <input type="submit" name="Add" value="Add" id="Add" class="btn btn-info" />  
                    </div>
                </div>     
            </form>              
        </div>

	</div>	
	</body>
</html>
<script>

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

   $('#weight').keyup(function(){
       var height;
       var weight;
       height = parseFloat($('#height').val());
       weight = parseFloat($('#weight').val());
       var bmi = weight / (height * height);
       $('#bmi').val(bmi.toFixed(3));
   });

   $('#height').keyup(function(){
       var height;
       var weight;
       height = parseFloat($('#height').val());
       weight = parseFloat($('#weight').val());
       var bmi = weight / (height * height);
       $('#bmi').val(bmi.toFixed(3));
   });

$(document).ready(function(){

	load_data();

	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>search/fetchStudy",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

});
</script>


  