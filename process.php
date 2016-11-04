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
        $sn=0;
           
        
        foreach($args as $val){
            
            //$names=file($val);
            $path=realpath($val);
            
            $file = fopen($path, "r");
    while(!feof($file))
    {
       
        $toreadlines=explode("\n",fread($file,filesize($path)));
        
        
        foreach($toreadlines as $line){
            $op[$sn]['warnings']=0;
         $op[$sn]['errors']=0;
         $op[$sn]['date']="";
            
            
            
            if($line=="")
             continue;
            $dates=explode(" ",$line);
            $op[$sn]['date']=$dates[0];
            
          
             if (strpos($line, "[warning]") !== false) {
            
                $op[$sn]['warnings']++;
        }
          elseif (strpos($line, "[error]") !== false) {
            
                $op[$sn]['errors']++;
        }
        $sn++;
       
       
}
unset($op[$sn]);
       
        
    }
    
    
     
   
         
   $gn=0;
    //var_dump($op);die();
    foreach($op as $valq){
        $dates1[]=$valq['date'];
       
    }
   // var_dump($dates1);die();
    $sn1=0;
    $dates1 = array_values(array_unique($dates1));
    //var_dump($dates1);die();
      //catch this
    foreach ($dates1 as $sep){
        $final[$sn1]['warnings']=0;
         $final[$sn1]['errors']=0;
         $final[$sn1]['date']="";
            foreach($op as $val){

            if($val['date']==$sep){
                $final[$sn1]['warnings']+=$val['warnings'];
                 $final[$sn1]['errors']+=$val['errors'];
                  $final[$sn1]['date']=$sep;
            }
            


        }
        $sn1++;
    }
     
    
     
   
           
            
            
        }
        var_dump($final);
    }
}

unset($argv[0]);
//var_dump($argv);
//die();
$obj = new logprocessor();
    echo $obj->process($argv);

