<?php

class cors {

    public function __construct()
    {
        $allowed_domains = array(
            'http://localhost',
            'http://localhost:8000'
        );
        
        if(in_array($_SERVER['HTTP_ORIGIN'], $allowed_domains)){
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, OPTIONS, DELETE");
        }
        
    }

}
