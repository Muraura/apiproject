<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Sms extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("gateway/place_model");
        $this->load->model("gateway/customer_model");
        $this->load->model("gateway/gateway");
        $this->load->model("gateway/sms_model");
       

    }
    public function index()
    {
        $query = $this->sms_model->get_all_messages();
        $v_data['query'] = $query;
        $data['content'] = $this->load->view("sms/index", $v_data ,TRUE);
         //echo json_encode($query->result());die();
        $this->load->view('layout',$data);
    }
   
    
    public function send_sms()
    {
        //form validation
        $this->form_validation->set_rules("message","Message","required");
        //retrieve customers
      if($this->form_validation->run()){
        $message =$this->input->post("message");
        $customers=$this->customer_model->get_customers();
        $response = $this->gateway->send_sms($customers,$message);
        //var_dump($response);die();
        //save to database
        if($response !=FALSE)
        {
            $this->sms_model->save_message($response);
        }
       // var_dump($response);die();
    }else
    {
        $validation_errors= validation_errors();
        if(!empty($validation_errors))
        {
            $this->session->set_flashdata("error_message",
            $validation_errors);
        }
    }
        //send sms
        redirect("sms");
    }
    public function save_places()
    {
        $result = json_decode($this->gateway->fetch_places());
        //var_dump($result );die();
        $response =$result->response;
        $data=[];
        foreach($response->venues as $row)
        {
             array_push($data,array(
            "id" => $row->id,
            "name"=>$row->name,
            //"location"=>(isset($row->location->address))?$row->location->address :NULL,
            "lat"=>(isset($row->location->lat))?$row->location->lat :NULL,
            "lng"=>(isset($row->location->lng))?$row->location->lng :NULL,
        ));
    }
        $this->sms_model->save_places($data);
    }
}

