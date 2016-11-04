<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class logprocessor{
    function process ( $args=array() )
    {
        if (empty($args)){
           echo "No Log file";die();  
        }
           
        $warnings=0;
        $error=0;
        foreach($args as $val){
            $file = fopen($val, "r");
    while(!feof($file))
    {
        // send the current file part to the browser
        echo  fread($file);
        // flush the content to the browser
        
    }
           
            
            
        }
    }
}