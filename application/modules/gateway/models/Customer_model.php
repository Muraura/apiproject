<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_model extends CI_Model
{
    public function get_customers()
    {   
        // $this->db
        return $this->db->get("customer");
    }
}