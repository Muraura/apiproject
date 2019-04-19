<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Place_model extends CI_Model
{
    public function save_places()
    {   

        if($this->db->insert_batch("place",$data))
        {
            return TRUE;
        }
        // $this->db
        return FALSE;
    }
    public function get_places()
    {
         return $this->db->get("place");

    }
}