<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Places extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("gateway/customer_model");
        $this->load->model("gateway/gateway");
        $this->load->model("gateway/place_model");

    }
    public function index()
    {
         $places = $this->place_model->get_places();
         //print_r($places);die();
        // echo json_encode($places->result());die();
         $places_result = [];
         $count = 0;
         foreach($places->result() as $row)
         {
             $count++;
             array_push($places_result,array(
                 $row->name,
                 $row->lat,
                 $row->lng,
                 $count
            ));
         }
        //echo json_encode($places->result());die();
         $v_data['places']=json_encode($places_result);
         //echo json_encode( $v_data['places']);die();
         $data['content'] = $this->load->view("places/index", $v_data ,TRUE);
         $this->load->view('layout',$data);
    }

}
