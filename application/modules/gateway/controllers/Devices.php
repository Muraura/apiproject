<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Devices extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("gateway/gateway");
    }

    public function index()
    {
         $devices = $this->gateway->fetch_devices();
         $devices_result = [];
         $count = 0;
         foreach($devices->children() as $item)
          { 
            if($item->device = $item->device )
            {
                $count++;
                array_push($devices_result,array
                (
                     $item->device ,
                     $item->status,
                ));
            }
          }
      
       
       $devices = $this->gateway->fetch_devices();
       print_r( $devices);
       $data['content'] = $this->load->view("devices/index", $devices,TRUE);
       $this->load->view('layout',$data);
}

}