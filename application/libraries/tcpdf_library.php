<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
        require '/tcpdf/tcpdf.php';
            
    

    class tcpdf_library extends TCPDF
    {
        public function __construct()
        {
            parent::__construct();
        }
    }