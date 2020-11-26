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
        display: flex;
        justify-content: space-between;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
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

    .button-box {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }

    #role-header {
        background-color: blue;
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
            <!-- Update patient details -->
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
                            <label>Gender</label>
                                <input type="text" id="Gender" value="<?php echo $row->Gender ?>" name="Gender" class="form-control" />
                                <span class="text-danger"><?php echo form_error("Gender"); ?></span> 
        
                        </div>
            
                        <div class="button-box">
                            <div class="form-group">  
                                <input type="hidden" name="hidden_id" value="<?php echo $row->PatientID; ?>" />  
                                <input type="submit" name="Update" value="Update" class="btn btn-info" />
                            </div>      

                            <div class="form-group">  
                                <input type="hidden" name="hidden_id2" value="<?php echo $row->PatientID; ?>" />  
                                <input type="submit" name="Delete" value="Delete" class="btn btn-info" />
                            </div>   
                        </div>     
            <?php       
                    }  
                } 
                ?>
                </form>
            </div>
            <div id="container2">
                <!-- Display table of existing studies for corresponding patient -->
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
                <button type="button" class="collapsible" id="role-header">Radiographer Entry <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-down-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                </svg></button>
                    <div class="content">
                        <?php echo validation_errors(); ?> 
                        <form method="post" action="<?php echo base_url()?>main/r/<?php echo $patient;?>">
                            <?php $id = $this->uri->segment(3); ?>
                            <!-- Coronary diagnostic details tab -->
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
                                            <th scope="row">Grafts (Non-Pedicled)</th>
                                            <td>
                                                <input type="hidden" name="non-pedicled_graft" value="0" />
                                                <label> <input type="checkbox" id="non-pedicled_graft" name="non-pedicled_graft" value="1"/>SVG/Radial/Free LIMA/RIMA</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Pedicled Graft </th> <br>
                                            <td>
                                                <input type="hidden" name="pedicled_LIMA" value="0" />
                                                <label> <input type="checkbox" id="lima" name="pedicled_LIMA" value="1"/>LIMA</label>
                                                <input type="hidden" name="pedicled_RIMA" value="0" />
                                                <label> <input type="checkbox" id="rima" name="pedicled_RIMA" value="1"/>RIMA</label>
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
                            <!-- Interventional cardiology tab -->
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
                            <!-- Structural details tab -->
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
                            <!-- Other cardiac procedures tab -->
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
                            <!-- Electrophysiology procedure tab -->
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
                            <!-- Pacing tab -->                  
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
                            <!-- Non-cardiac details tab -->
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
                            <!-- Study details tab -->                        
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
                                                <label>Patient height (m) <br><input type="float" id="height" name="Height"/></label>
                                            </td>
                                            <td>
                                                <label>Patient weight (kgs) <br><input type="float" id="weight" name="Weight"/></label>
                                            </td>                                
                                        </tr>  
                                        <tr>
                                            <td>
                                                <label>Patient BMI <br><input type="float" id="bmi" name="bmi"/></label>
                                            </td>
                                            <td>
                                                <label>Procedure date <br><input type="date" id="procedure_date" name="StudyDate"/></label>
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
                                                <label>Primary operator <br><input type="text" id="primary_operator" name="PrimaryOperator"/></label>
                                            </td>
                                            <td>
                                                <label>Study Type <br><input type="text" id="study_type" name="StudyType"/></label>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <td>
                                                <label>Radiographer <br><input type="text" id="radiographer" name="Radiographer"/></label>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>                                                                                                                                                                                                                                                             
                                    </tbody>
                                </table>                   
                            </div>  
                            <!-- Radiation tab -->
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
                                                <label>DAP (Gy cm<sup>2</sup>) <br><input type="float" id="dap" name="dap"/></label>
                                            </td>
                                            <td>
                                                <input type="hidden" name="srdl" value="0" />
                                                <label> > SRDL <br><input type="checkbox" id="srdl" name="srdl" value="1"/></label>
                                            </td>                                                                
                                        </tr>              
                                        <tr>
                                            <td>
                                                <label>CumulativeAir Kerma (mGy) <input type="float" id="ca_kerma" name="ca_kerma"/></label>
                                            </td>                            
                                            <td>
                                                <label>Fluoro time (mm.ss) <input type="float" id="fluoro_time" name="fluoro_time"/></label>
                                            </td>
                                        </tr>                                                                                                                                                                                                                                                     
                                    </tbody>
                                </table>                 
                            </div>    
                            <!-- X-ray application tab -->                       
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
                                                <label><input type="number" id="cardiac_3" name="cardiac_3"/><br> 3.75 fps</label>
                                            </td>
                                            <td>
                                                <label><input type="number" id="cardiac_7" name="cardiac_7"/><br> 7.5 fps</label>
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
                                                <label><input type="number" id="vasc_2" name="vasc_2"/><br> 0.5-2fps</label>
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
                            <!-- Contrast details tab -->  
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
                            <!-- Equipment details tab -->
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
                                                <select class="form-control" name="catheter_1" id="catheter_1">
                                                    <?php 
                                                        foreach($groupC as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select>                                    
                                            </td>
                                            <td>
                                                <select class="form-control" name="catheter_2" id="catheter_2">
                                                    <?php 
                                                        foreach($groupC as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select>                                
                                            </td>   
                                        </tr>   
                                        <tr>
                                            <th scope="row">Balloons</th>
                                            <td>
                                                <select class="form-control" name="balloon_1" id="balloon_1">
                                                    <?php 
                                                        foreach($groupB as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select>                                     
                                            </td>  
                                            <td>
                                                <select class="form-control" name="balloon_2" id="balloon_2">
                                                    <?php 
                                                        foreach($groupB as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select> 
                                            </td> 
                                        </tr>
                                        <tr>
                                            <th scope="row">Stents</th>
                                            <td>
                                                <select class="form-control" name="stent_1" id="stent_1">
                                                    <?php 
                                                        foreach($groupS as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select>                                    
                                            </td>   
                                            <td>
                                                <select class="form-control" name="stent_2" id="stent_2">
                                                    <?php 
                                                        foreach($groupS as $row)
                                                        { 
                                                            echo '<option value="'.$row->Description.'">'.$row->Description.'</option>';
                                                        }
                                                    ?>
                                                </select>                                  
                                            </td>
                                        </tr>                                                                                                                                                                                                            
                                    </tbody>
                                </table>                   
                            </div> 
                            <!-- Access route tab -->
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
                                    <input type="submit" name="AddRadiographer" value="Add Radiographer Entry" id="AddRadiographer" class="btn btn-info" />  
                                </div>
                            </div>
                        </form>
                    </div>
                <button type="button" class="collapsible" id="role-header">VMP Entry <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-down-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                </svg></button>
                    <div class="content"> 
                        <form method="post" action="<?php echo base_url()?>main/vmp/<?php echo $patient;?>">
                        <!-- VMP risk and previous interventions tab -->
                        <button type="button" class="collapsible">Risk Factors and Previous Interventions</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Diabetes</th>
                                            <td>    
                                                <input type="hidden" name="diabetes" value="0" />
                                                <input type="checkbox" id="diabetes" name="diabetes" value="1"/>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <th scope="row">Diabetes Management Method</th>
                                            <td>
                                                <label><input type="radio" id="diabetes_oral" value="Oral" name="diabetes_management"> Oral </label>
                                                <label><input type="radio" id="diabetes_insulin" value="Insulin" name="diabetes_management"> Insulin </label>
                                                <label><input type="radio" id="diabetes_diet" value="Diet" name="diabetes_management"> Diet </label>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <th scope="row">Peripheral Vascular Disease</th>
                                            <td>
                                                <input type="hidden" name="pvd" value="0">
                                                <input type="checkbox" id="pvd" name="pvd" value="1">
                                            </td>   
                                        </tr>
                                        <tr>
                                            <th scope="row">Previous CABG</th>
                                            <td>
                                                <input type="hidden" name="prev_cabg" value="0">
                                                <input type="checkbox" id="cabg" name="prev_cabg" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">If applicable, when was the previous CABG?</th>
                                            <td>
                                                <input type="date" id="cabg_date" name="cabg_date">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Previous PCI</th>
                                            <td>
                                                <input type="hidden" name="prev_pci" value="0">
                                                <input type="checkbox" id="pci" name="prev_pci" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">If applicable, when was the previous PCI?</th>
                                            <td>
                                                <input type="date" id="pci_date" name="pci_date">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div> 
                            <!-- VMP pre-procedural renal status tab -->
                            <button type="button" class="collapsible">Pre-Procedural Renal Status</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Last Pre-Procedure Creatinine</th>
                                            <td>    
                                                <input type="date" id="pre-procedure_creatinine" name="pre-procedure_creatinine"/>
                                            </td>
                                            <td>
                                                <label><input type="radio" id="no_creatinine" name="no_creatinine" value="Creatinine not available"> Creatinine not available </label>
                                            </td> 
                                        </tr> 
                                    </tbody>
                                </table>                          
                            </div>   
                            <!-- VMP LV function tab -->
                            <button type="button" class="collapsible">LV Function</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">LV test performed</th>
                                            <td>    
                                                <input type="hidden" name="lv_test" value="0">
                                                <input type="checkbox" id="lv_test" name="lv_test" value="1">                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">If applicable, date of LV test</th>
                                            <td>
                                                <input type="date" id="lv_test_date" name="lv_test_date">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">LV Test</th>
                                            <td>
                                                <label><input type="radio" id="lv_test_echocardiogram" name="lv_test_type" value="Echocardiogram"> Echocardiogram </label>
                                                <label><input type="radio" id="lv_test_angiography" name="lv_test_type" value="Angiography"> Angiography </label>
                                                <label><input type="radio" id="lv_test_mri" name="lv_test_type" value="MRI"> MRI </label>
                                                <label><input type="radio" id="lv_test_mps" name="lv_test_type" value="MPS"> MPS </label>
                                                <label><input type="radio" id="lv_test_na" name="lv_test_type" value="Not stated/inadequately described"> Not stated/inadequately described </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">EF Result</th>
                                            <td>
                                                <label><input type="number" name="ef_result" id="ef_result"> %</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">EF Result</th>
                                            <td>
                                                <label><input type="radio" id="lv_derived" name="ef_type" value="Derived"> Derived </label>
                                                <label><input type="radio" id="lv_estimated" name="ef_type" value="Estimated"> Estimated </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Estimated eGFR</th>
                                            <td>
                                                <input type="float" id="estimated_egfr" name="estimated_egfr">
                                            </td>
                                        </tr>
                                        <tr> 
                                            <th scope="row">Estimated eGFR</th>
                                            <td>
                                                <label><input type="radio" id="cockcroft-gault" name="estimated_egfr_details" value="Cockcroft-Gault"> Cockcroft-Gault </label>
                                                <label><input type="radio" id="egfr_imported" name="estimated_egfr_details" value="Imported"> Imported </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div>
                            <!-- VMP clinical presentation tab -->
                            <button type="button" class="collapsible">Clinical Presentation</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Cardiogenic Shock</th>
                                            <td>    
                                                <input type="hidden" name="cardiogenic_shock" value="0">
                                                <input type="checkbox" id="cardiogenic_shock" name="cardiogenic_shock" value="1">
                                            </td>
                                        </tr> 
                                        <tr>
                                            <th scope="row">OOHA</th>
                                            <td>
                                                <input type="hidden" name="ooha" value="0">
                                                <input type="checkbox" id="ooha" name="ooha" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pre-Procedural Intubation</th>
                                            <td>
                                                <input type="hidden" name="pre-procedural_intubation" value="0">
                                                <input type="checkbox" id="pre-procedural_intubation" name="pre-procedural_intubation" value="1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div> 
                            <!-- VMP PCI indication tab -->
                            <button type="button" class="collapsible">PCI Indication</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>    
                                                <label><input type="radio" id="angina_symptoms" name="pci_indication" value="Angina or equivalent symptoms"> Angina/angina equivalent symptoms </label>
                                                <label><input type="radio" id="pci_nstemi_<7days" name="pci_indication" value="PCI for NSTEMI < 7 days"> PCI for NSTEMI < 7 days </label>
                                                <label><input type="radio" id="pci_unstable_angina_<7days" name="pci_indication" value="PCI for unstable angina < 7 days"> PCI for unstable angina < 7 days </label>
                                                <label><input type="radio" id="pci_recent_acs_7-30days" name="pci_indication" value="PCI for recent ACS 7-30 days"> PCI for recent ACS 7-30 days </label>
                                                <label><input type="radio" id="primary_pci_stemi_<12hours" name="pci_indication" value="Primary PCI for STEMI < 12 hours"> Primary PCI for STEMI < 12 hours </label>
                                                <label><input type="radio" id="primary_pci_stemi_12-24hours" name="pci_indication" value="Primary PCI for STEMI 12-24 hours"> Primary PCI for STEMI 12-24 hours </label>
                                            </td>
                                            <td>
                                                <label><input type="radio" id="pci_stemi_<24hours_unstable_lysis" name="pci_indication" value="Rescue PCI for STEMI < 24 hours unstable following lysis"> Rescue PCI for STEMI < 24 hours unstable following lysis </label>                                            
                                                <label><input type="radio" id="rescue_pci_stemi_<24hours_stable_lysis" name="pci_indication" value="Rescue PCI for STEMI < 24 hours stable following lysis"> Rescue PCI for STEMI < 24 hours stable following lysis </label>
                                                <label><input type="radio" id="pci_stemi_1-7days_no_prior_lysis" name="pci_indication" value="PCI for STEMI 1-7 days no prior lysis"> PCI for STEMI 1-7 days no prior lysis </label>
                                                <label><input type="radio" id="pci_stemi_1-7days_following_lysis" name="pci_indication" value="PCI for STEMI 1-7 days following lysis"> PCI for STEMI 1-7 days following lysis </label>
                                                <label><input type="radio" id="pci_cardiac_arrest_cardiogenic_shock_no_stemi" name="pci_indication" value="PCI for cardiac arrest/cardiogenic shock (without evidence of STEMI)"> PCI for cardiac arrest/cardiogenic shock (without evidence of STEMI) </label>
                                                <label><input type="radio" id="no_angina_or_equivalent_symptoms" name="pci_indication" value="No angina/angina equivalent symptoms"> No angina/angina equivalent symptoms </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div> 
                            <!-- VMP clinical symptoms tab -->
                            <button type="button" class="collapsible">Clinical Symptoms</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Acute Coronary Syndrome</th>
                                            <td>
                                                <input type="hidden" name="acs" value="0">
                                                <input type="checkbox" id="acs" name="acs" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Type of ACS</th>
                                            <td>
                                                <label><input type="radio" id="acs_stemi" name="acs_type" value="STEMI"> STEMI </label>
                                                <label><input type="radio" id="acs_nstemi" name="acs_type" value="NSTEMI"> NSTEMI </label>
                                                <label><input type="radio" id="acs_ua" name="acs_type" value="UA"> UA </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Presentation</th>
                                            <td>
                                                <label><input type="radio" id="pres_stemi" name="acs_presentation" value="QAS"> QAS </label>
                                                <label><input type="radio" id="acs_nstemi" name="acs_presentation" value="IHT"> IHT </label>
                                                <label><input type="radio" id="acs_ua" name="acs_presentation" value="Self presenter"> Self presenter </label>
                                                <label><input type="radio" id="acs_ua" name="acs_presentation" value="Admitted pt"> Admitted pt </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">If QAS or IHT presentation...</th>
                                            <td>
                                                <input type="hidden" name="pre-hospital_notification" value="0">
                                                <label>Pre-hospital notification <input type="checkbox" id="pre-hospital_notification" name="pre-hospital_notification" value="1"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">System Onset</th>
                                            <td>
                                                <label>Date <input type="date" id="system_onset_date" name="system_onset_date"></label>
                                                <label>Time (hh.mm) <input type="float" name="system_onset_time" name="system_onset_time"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1st Medical Contact</th>
                                            <td>
                                                <label>Date <input type="date" id="1st_medical_contact_date" name="1st_medical_contact_date"></label>
                                                <label>Time (hh.mm) <input type="float" name="1st_medical contact_time" name="1st_medical_contact_time"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1st Diagnostic ECG</th>
                                            <td>
                                                <label>Date <input type="date" id="1st_diagnostic_ecg_date" name="1st_diagnostic_ecg_date"></label>
                                                <label>Time (hh.mm) <input type="float" name="1st_diagnostic_ecg_time" name="1st_diagnostic_ecg_time"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1st Device Time</th>
                                            <td>
                                                <label>Time (hh.mm) <input type="float" name="1st_device_time" name="1st_device_time"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div> 
                            <!-- VMP mechanical/ventilation support tab -->
                            <button type="button" class="collapsible">Mechanical/Ventilation Support</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Intubation required</th>
                                            <td>    
                                                <input type="hidden" name="intubation_required" value="0">
                                                <input type="checkbox" id="intubation_required" name="intubation_required" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mechanical circulatory support</th>
                                            <td>    
                                                <input type="hidden" name="mechanical_circulatory_required" value="0">
                                                <input type="checkbox" id="mechanical_circulatory_required" name="mechanical_circulatory_required" value="1">
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>                          
                            </div>
                            <!-- VMP interventional details tab -->
                            <button type="button" class="collapsible">Intervention Details</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Lesion Location (L1) </th>
                                            <td>    
                                                <label>L1  <input type="number" name="lesion1_location" id="lesion1_location"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L1 - Outcome</th>
                                            <td>
                                                <input type="hidden" name="intervention1_outcome" value="0">
                                                <input type="checkbox" id="intervention1_outcome" name="intervention1_outcome" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L1 - Instent Restenosis</th>
                                            <td>
                                                <input type="hidden" name="intervention1_instent_restenosis" value="0">
                                                <input type="checkbox" id="intervention1_instent_restenosis" name="intervention1_instent_restenosis" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L1 - Stent Thrombosis</th>
                                            <td>
                                                <input type="hidden" name="intervention1_stent_thrombosis" value="0">
                                                <input type="checkbox" id="intervention1_stent_thrombosis" name="intervention1_stent_thrombosis" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lesion Location (L2) </th>
                                            <td>    
                                                <label>L1  <input type="number" name="lesion2_location" id="lesion2_location"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L2 - Outcome</th>
                                            <td>
                                                <input type="hidden" name="intervention2_outcome" value="0">
                                                <input type="checkbox" id="intervention2_outcome" name="intervention2_outcome" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L2 - Instent Restenosis</th>
                                            <td>
                                                <input type="hidden" name="intervention2_instent_restenosis" value="0">
                                                <input type="checkbox" id="intervention2_instent_restenosis" name="intervention2_instent_restenosis" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L2 - Stent Thrombosis</th>
                                            <td>
                                                <input type="hidden" name="intervention2_stent_thrombosis" value="0">
                                                <input type="checkbox" id="intervention2_stent_thrombosis" name="intervention2_stent_thrombosis" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lesion Location (L3) </th>
                                            <td>    
                                                <label>L1  <input type="number" name="lesion3_location" id="lesion3_location"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L3 - Outcome</th>
                                            <td>
                                                <input type="hidden" name="intervention3_outcome" value="0">
                                                <input type="checkbox" id="intervention3_outcome" name="intervention3_outcome" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L3 - Instent Restenosis</th>
                                            <td>
                                                <input type="hidden" name="intervention3_instent_restenosis" value="0">
                                                <input type="checkbox" id="intervention3_instent_restenosis" name="intervention3_instent_restenosis" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L3 - Stent Thrombosis</th>
                                            <td>
                                                <input type="hidden" name="intervention3_stent_thrombosis" value="0">
                                                <input type="checkbox" id="intervention3_stent_thrombosis" name="intervention3_stent_thrombosis" value="1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </div>
                            <!-- VMP in-lab complications tab -->
                            <button type="button" class="collapsible">In-Lab Complications</button>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                        </tr>
                                            <td>
                                                <input type="hidden" name="complication_status" value="0">
                                                <label> Any complications? <input type="checkbox" id="complication_status" name="complication_status" value="1"></label>
                                            </td>
                                            <td>    
                                                <input type="hidden" name="dissection" value="0">
                                                <label><input type="checkbox" id="dissection" name="dissection" value="1"> Dissection </label>
                                                <input type="hidden" name="periprocedural_mi" value="0">
                                                <label><input type="checkbox" id="periprocedural_mi" name="periprocedural_mi" value="1"> Periprocedural MI </label>
                                                <input type="hidden" name="major_bleeding" value="0">
                                                <label><input type="checkbox" id="major_bleeding" name="major_bleeding" value="1"> Major Bleeding Event </label>
                                                <input type="hidden" name="tamponade" value="0">
                                                <label><input type="checkbox" id="tamponade" name="tamponade" value="1"> Tamponade </label>
                                                <input type="hidden" name="other_complication" value="0">
                                                <label><input type="checkbox" id="other_complication" name="other_complication" value="1"> Other <input type="text" id="other_complication_text" name="other_complication_text"/> </label>
                                            </td>
                                            <td>    
                                                <input type="hidden" name="perforation" value="0">
                                                <label><input type="checkbox" id="perforation" name="perforation" value="1"> Perforation </label>
                                                <input type="hidden" name="death" value="0">
                                                <label><input type="checkbox" id="death" name="death" value="1"> Death </label>
                                                <input type="hidden" name="life_threatening_arrhythmia" value="0">
                                                <label><input type="checkbox" id="life_threatening_arrhythmia" name="life_threatening_arrhythmia" value="1"> Life threatening arrhythmia </label>
                                                <input type="hidden" name="pnemothorax" value="0">
                                                <label><input type="checkbox" id="pnemothorax" name="pnemothorax" value="1"> Pnemothorax </label>
                                            </td>
                                            <td>
                                                <input type="hidden" name="cva_stroke" value="0">
                                                <label><input type="checkbox" id="cva_stroke" name="cva_stroke" value="1"> CVA/Stroke </label>
                                                <input type="hidden" name="unplanned_cabg" value="0">
                                                <label><input type="checkbox" id="unplanned_cabg" name="unplanned_cabg" value="1"> Unplanned CABG </label>
                                                <input type="hidden" name="haemotoma_10cm" value="0">
                                                <label><input type="checkbox" id="haemotoma_10cm" name="haemotoma_10cm" value="1"> Haematoma > 10cm </label>
                                                <input type="hidden" name="pseudoanerysm" value="0">
                                                <label><input type="checkbox" id="pseudoanerysm" name="pseudoanerysm" value="1"> Pseudoanerysm </label>
                                            </td>
                                            <td>
                                                <input type="hidden" name="valve_damage" value="0">
                                                <label><input type="checkbox" id="valve_damage" name="valve_damage" value="1"> Valve Damage </label>
                                                <input type="hidden" name="contrast_reaction_intervention" value="0">
                                                <label><input type="checkbox" id="contrast_reaction_intervention" name="contrast_reaction_intervention" value="1"> Contrast reaction requiring intervention </label>
                                                <input type="hidden" name="unplanned_device_implant" value="0">
                                                <label><input type="checkbox" id="unplanned_device_implant" name="unplanned_device_implant" value="1"> Unplanned device implant due to procedural conduction system damage </label>
                                                <input type="hidden" name="failure_deploy_implant_pacing_lead" value="0">
                                                <label><input type="checkbox" id="failure_deploy_implant_pacing_lead" name="failure_deploy_implant_pacing_lead" value="1"> Failure to deploy/implant pacing lead </label>
                                            </td>
                                    </tbody>
                                </table>                          
                            </div>                                                        
                            <div class="form-group">  
                                <div id="addContainer">
                                    <input type="submit" name="AddVMP" value="Add VMP Entry" id="AddVMP" class="btn btn-info" />  
                                </div>
                            </div>
                        </form>
                    </div>   
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
			url:"<?php echo base_url(); ?>main/fetchStudy/<?php echo $id; ?>",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

});
</script>


  