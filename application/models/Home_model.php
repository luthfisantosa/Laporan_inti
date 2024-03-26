<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model{
	private $table = 'tbl_data';
	private $table_laporan = 'tbl_jenis_laporan';

	public function getLastNo()
    {
        $this->db->select_max('no');
		$query = $this->db->get('tbl_data');
		if($query->num_rows() > 0){
			$no = $query->last_row()->no;
		}
		$no += 1;
        return $no;
    }

    function getLastId(){
        $this->db->select_max('no');
		$query = $this->db->get('tbl_data');
		if($query->num_rows() > 0){
			$no = $query->last_row()->no;
		}
        return $no;
    }

    public function getLastRow(){
    	$this->db->from('tbl_data');
    	$this->db->order_by('no','desc');
    	$this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAll($table)
    {
    	$this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllWhere($col, $tbl, $col_where, $where)
    {
        $this->db->select($col);
        $this->db->from($tbl);
        $this->db->where($col_where,$where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllDistinct($table, $column){
    	$this->db->select($column);
    	$this->db->distinct();
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getData($col, $tbl, $col_where, $where)
    {
    	$this->db->select($col);
	    $this->db->from($tbl);
	    $this->db->where($col_where,$where);
	    $query = $this->db->get()->row();
	    if(isset($query)){
	    	return $query->$col;
	    }
	    return "";
    }

    public function getById($where)
    {
    	$this->db->select('*');
	    $this->db->from('tbl_data');
	    $this->db->where('no',$where);
	    return $this->db->get()->result();
    }

    public function getRow($tbl, $where)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('no',$where);
        return $this->db->get()->result();
    }

    public function getJoin($select, $tbl1, $tbl2, $join)
    {
        $this->db->select($select);
        $this->db->from($tbl1);
        $this->db->join($tbl2, 'tbl_user.nama = tbl_data.kepala_uptd');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function getKepala()
    {
    	$this->db->select('nama');
    	$this->db->from('tbl_user');
    	$this->db->where('posisi', 'KEPALA UPTD');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($array)
    {
    	$table = $this->table;
		return $this->db->insert($this->table, $array);    	
    }

    public function update($array,$id)
    {
    	$table = $this->table;
    	return $this->db->update($this->table, $array, array('no' => $id));
    }


}