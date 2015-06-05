<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Input
 *
 * @author wawan.setiawan
 */
class MY_Input extends CI_Input {
    public function __construct() {
        parent::__construct();
    }
    
    //Overide ip_address() with your own function
    function ip_address() {
        //Obtain the IP address however you'd like, you may want to do additional validation, etc..
        $correct_ip_address = $_SERVER['REMOTE_ADDR'];  
        return $correct_ip_address;
    }
}
