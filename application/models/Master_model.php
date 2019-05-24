<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master_model extends CI_Model{
    function manualQuery($q)
		{
			return $this->db->query($q)->result();
		}
    function insertData($table,$data){
		$res = $this->db->insert($table,$data);
		return $res;
        }
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
}