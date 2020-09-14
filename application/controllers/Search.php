<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function index()
	{
		$this->load->view('search');
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		$output .= '
		<div class="table">
					<table class="table table-bordered">
						<tr>
							<th></th>
							<th>MRN</th>
							<th>Surname</th>
							<th>First Name</th>
							<th>DOB</th>
							<th>Gender</th>
						</tr> 
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td><a href="'.base_url().'main/select/'.$row->PatientID.'"> Select </a></td>
							<td>'.$row->MRN.'</td>
							<td>'.$row->LastName.'</td>
							<td>'.$row->FirstName.'</td>
							<td>'.$row->DateOfBirth.'</td>
							<td>'.$row->Gender.'</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No patients found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	function fetchStudy()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_study($query);
		$output .= '
		<div class="table">
					<table class="table table-bordered">
						<tr>
							<th>Date</th>
							<th>Operator</th>
							<th>Radiographer</th>
							<th>DAP</th>
						</tr> 
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->StudyDate.'</td>
							<td>'.$row->PrimaryOperator.'</td>
							<td>'.$row->Radiographer.'</td>
							<td>'.$row->DAP.'</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No studies found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;		
	}
	
}
