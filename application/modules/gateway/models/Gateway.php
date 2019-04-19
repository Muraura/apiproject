<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Gateway extends CI_model
{
    var $username;
    var $api_key;
    var $client_id;
    var $client_secret;
    public function __construct()
    {
        parent::__construct();
        $this->username= "sandbox";
        $this->api_key="7ac209eae39aaf9049b2e2fbcbae7c697629f85d046efcf6c9ce2830300f5b01";
        $this->client_id= "1SLJ3QRQUCECGN0U2NT5PHO1IPBVPXPXURJCIXTEU52OXE3W";
        $this->client_secret="0YD3QC0G3GZDWQ3ZOSZFNYXIJ3EJBYLXUU5OZYAZLEZUK13L";
    }
    public function send_sms($recepients,$message)
    {
       $recepients_string="";
       $count=0;
       $total_recepients= $recepients->num_rows();
       if($total_recepients > 0){
        foreach($recepients->result() as $r){
            $count++;
            if($count == $total_recepients)
            {
                $recepients_string .=$r->customer_phone;
            }else{
                $recepients_string.=$r->customer_phone.",";
            }
        }
        //create form encoede url data
        $request_data = "username=".$this->username."&to=".$recepients_string."&message=".$message;
        // echo $request_data; die();
         $ch = curl_init("https://api.sandbox.africastalking.com/version1/messaging");
        //2.define method
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_POST,1);
              //3.set data body to be sent
        curl_setopt($ch,CURLOPT_POSTFIELDS,$request_data);
        //4.Allow response to be received
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        //5.set headers determined by api your calling
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
          'apiKey :'.$this->api_key,
          'Content-Type: application/x-www-form-urlencoded',
          'Accept: application/json'
        ));
        //6.Execute the web service
        $result = curl_exec($ch);
        curl_close($ch);
        if($result != FALSE)
        {
            $result_decoded = json_decode($result);
            //var_dump($result_decoded); die();
            if($result_decoded != NULL)
            {
              $message_data = $result_decoded->SMSMessageData;
              $this->session->set_flashdata("success_message",$message_data->Message);
              $recepients = $message_data->Recipients;
              return  json_decode(json_encode($recepients),TRUE);
            }
            else
            {
                $this->session->set_flashdata("error_message", $result);
            }
        }
        else
        {
            $this->session->set_flashdata("error_message","unable to send sms try again");
        }
        
    }
}

public function fetch_places()
    {
        $ch = curl_init("https://api.foursquare.com/v2/venues/search?client_id=".$this->client_id."&client_secret=". $this->client_secret."&v=20180323&limit=10&ll=-1.2682643,36.8111214");//pass endpoint as parameter
        //4. alloww response tonbe received
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // 5. set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json'
        ));
        $result = curl_exec($ch);
        //7.close connection
        curl_close($ch);
        return $result;
    }
public function fetch_devices()
{
    $url="https://169.239.171.7:8090/api/table.xml?content=sensor&username=alvaro&password=Wadpass2&count=10000";
    print_r($url);die();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents
    $data = curl_exec($ch); // execute curl request
    curl_close($ch);
    $xml = simplexml_load_string($data);
    $response=simplexml_load_string($response);
    $json = json_encode($response);
    $youtube= json_decode($json, true);
    return $xml;
 }

} 
