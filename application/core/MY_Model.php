<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author setiawan
 */
class MY_Model extends CI_Model {
    
    //add new record
    function add($tbl, $data) {
        return $this->db->insert($tbl, $data);
    }
    
    //add new record detail
    function add_detail($tbl, $data) {
        return $this->db->insert_batch($tbl, $data);
    }

    //update record
    function update($tbl, $field, $id,$data) {
        $this->db->where($field, $id);
        return $this->db->update($tbl,$data);
    } 
    
    
    //delete record
    function delete($tbl, $field, $id) {
        $this->db->where($field,$id);
        $sql=  $this->db->delete($tbl);
        return $sql;
    }
    
    //get all
    function get_all($tbl) {
        return $this->db->get($tbl);
    }


    //get by id
    function get_id($tbl, $filed, $id) {
        $this->db->where($filed,$id);
        $sql=  $this->db->get($tbl);
        return $sql->result();
    }
    
    //get max id
    function get_max_id($tbl, $field, $id) {
        $sql=$this->db->query("SELECT MAX( ".$field." ) AS ".$field." FROM ".$tbl." WHERE ".$field." LIKE  '".$id."%'");
        return $sql->result();
    }
    
    //check record exists
    function check_record_exists($tbl, $field, $id) {
        $this->db->where($field, $id);
        $sql=  $this->db->get($tbl);
        return $sql->num_rows();
    }
}
