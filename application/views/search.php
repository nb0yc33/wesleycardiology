<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home</title>
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

    .btn-info, .btn-info:hover, .btn-info:active, .btn-info:visited, .btn-info:focus {
        background-color: #685aa3 !important;
        border-color: #685aa3;
    }
	
	#container1{
		background: #E0DEDE;
		padding: 1em 1em 1em 1em;
		border: 2px solid lightgray;
		border-radius: 10px;
	}

	#container2{
		background: #E0DEDE;
		padding: 1em 1em 1em 1em;
		border: 2px solid lightgray;
		border-radius: 10px;
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
			<h4 align="center">Search Patient <small class="text-muted"> Search by MRN, Surname, First Name, Middle Name or DOB </small> </h4>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
			<div style="clear:both">
			</div>
		<br />
		<br />
		<br />
		<br />
		
		<div id="container2">
			<h4 align="left">Add Patient</h4>
			<?php echo validation_errors(); ?> 
      		<form method="post" action="<?php echo base_url()?>main/form_validation">  
           				<div class="form-group">  
                			<label>MRN</label>  
                			<input type="number" name="MRN" class="form-control" /> 
           				</div>				    
           				<div class="form-group">  
                			<label>Surname</label>  
                			<input type="text" name="LastName" class="form-control" />  
  
           				</div>				   
           				<div class="form-group">  
                			<label>First Name</label>  
                			<input type="text" name="FirstName" class="form-control" />    
           				</div> 
           				<div class="form-group">  
                			<label>Middle Name</label>  
                			<input type="text" name="MiddleName" class="form-control" />    
           				</div> 
						<div class="form-group">
						   <label>DOB</label>  
                			<input type="date" name="DateOfBirth" class="form-control" />    
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
						   <br>
                			<input type="submit" name="Save" value="Save" class="btn btn-info" />  
           				</div>
			 </form>
		</div>

	</div>	
	</body>
</html>


<script>
$(document).ready(function(){


	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>search/fetch",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
	});
});
</script>