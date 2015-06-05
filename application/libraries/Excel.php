<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Excel
 *
 * @author SETIAWAN
 */

require_once APPPATH."/third_party/PHPExcel/PHPExcel.php";
require_once APPPATH."/third_party/PHPExcel/PHPExcel/IOFactory.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}
