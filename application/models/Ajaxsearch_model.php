<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("patients");
		if($query != '')
		{
			$this->db->like('MRN', $query);
			$this->db->or_like('LastName', $query);
			$this->db->or_like('MiddleName', $query);
			$this->db->or_like('FirstName', $query);
			$this->db->or_like('DateOfBirth', $query);
		}
		$this->db->order_by('PatientID', 'DESC');
		return $this->db->get();
	}

	function fetch_study($id)
	{
		$this->db->select("*");
		$this->db->from("StudyR");
		$this->db->where('PatientID', $id);
		$this->db->order_by('StudyID', 'DESC');
		return $this->db->get();
	}

}

?>