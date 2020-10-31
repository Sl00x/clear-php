<?php
class Request{
    function get($key){
        return $_GET[$key];
    }
    function gets(){
        return $_GET;
    }
    function body($key){
        return $_POST[$key];
    }
    function bodies(){
        return $_POST;
    }
    function api($method, $url, $body=false, $header=false){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($body)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($body)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $body);			 					
              break;
           default:
              if ($body)
                 $url = sprintf("%s?%s", $url, http_build_query($body));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        if($header){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }

}
?>