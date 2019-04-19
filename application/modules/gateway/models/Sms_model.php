<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Sms_model extends CI_Model
{
    public function save_message($data)
    {   

        if($this->db->insert_batch("sms",$data))
        {
            return TRUE;
        }
        // $this->db
        return FALSE;
    }

    public function get_all_messages()
    {
        // var_dump($table);die();

        $this->db->select("*");
        $this->db->from("sms");
        return $this->db->get();

    }
    public function save_places($data)
    {   

        if($this->db->insert_batch("place",$data))
        {
            return TRUE;
        }
        // $this->db
        return FALSE;
    }
}