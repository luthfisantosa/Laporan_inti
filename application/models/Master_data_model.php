<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MAster_data_model extends CI_Model{
	private $table = 'tbl_data';
	private $table_laporan = 'tbl_jenis_laporan';

	

	public function getAll($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getData($table, $column, $where)
    {
        $this->db->from($table);
        $this->db->where($column, $where);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
	    {
	        $row = $query->row_array();
	        return $row;
	    }
        
    }

    public function getLastId($id,$table){
        $this->db->select_max($id);
		$query = $this->db->get($table);
		if($query->num_rows() > 0){
			$id = $query->last_row()->$id;
		}
        return $id;
    }

    public function save($table, $array)
    {
    	$table_laporan = $this->table_laporan;
		return $this->db->insert($table, $array);    	
    }

    public function update($table,$array,$collumn,$id)
    {
    	return $this->db->update($table, $array, array($collumn => $id));
    }

}