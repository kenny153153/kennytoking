<?php
include 'connection.php';
if(isset($_POST["clientname"])){
    ob_start();
    include ('mpdf60/mpdf.php');
    extract($_POST);
    
    
     //Category=============================
    $sql = "SELECT * from hd_category where category_id=$category";
    $category = $conn->query($sql);
    $cat_row = $category->fetch_object();
    $category_body1=$cat_row->category_body1;
    $category_body2=$cat_row->category_body2;
    $notself=$cat_row->notself;
    $strategy=$cat_row->strategy;
    $category_name=$cat_row->category_name;
    //echo $category_name;exit;
    
    //Authority=============================
    $auth_sql = "SELECT * from  hd_authority where authority_id=$authority";
    $authority = $conn->query($auth_sql);
    $auth_row = $authority->fetch_object();
    $authority_name=$auth_row->authority_name;
    $authority_body1=$auth_row->authority_body1;
    $authority_body2=$auth_row->authority_body2;
    
    //Defination============================
    $def_sql = "SELECT * from  hd_definition where definition_id=$definition";
    $definition = $conn->query($def_sql);
    $def_row = $definition->fetch_object();
    $definition_name=$def_row->definition_name;
    
    
    //Cross================================
    $cross_sql = "SELECT * from  hd_cross where  cross_id=$cross";
    $cross = $conn->query($cross_sql);
    $cross_row = $cross->fetch_object();
    $cross_name=$cross_row->cross_name;
    $cross_body1=$cross_row->cross_body1;
    $cross_body2=$cross_row->cross_body2;
    
    //profile=============================
    $profile_sql = "SELECT * from  hd_profile where profile_id=$profile";
    $profile = $conn->query($profile_sql);
    $profile_row = $profile->fetch_object();
    $profile_name=$profile_row->profile_name;
    $profile_body1=$profile_row->profile_body1;
    $profile_body2=$profile_row->profile_body2;
    $profile_body3=$profile_row->profile_body3;
    
    
    //background=============================
    if(!empty($background)){
    $background_sql = "SELECT * from  hd_background where background_id=$background";
    $background = $conn->query($background_sql);
    $background_row = $background->fetch_object();
    $background_body=$background_row->background_body;
    }else{
        $background_body='';
    }
 
    
    //center==============================
           if(!empty($gate)){
    $center=implode(",",$center);
    $center_sql = "SELECT * from  hd_center where center_id IN($center)";
    $center = $conn->query($center_sql);
    $center_names=array();
    while ($center_row = $center->fetch_object()) {
        $center_names[]=$center_row->center_name;
    }
    $center_names=implode(" , ",$center_names);
           }else{
              $center_names=''; 
           }
    //channel==============================
    // $channel_sql = "SELECT * from  hd_channel where channel_id=$channel";
    // $channel = $conn->query($channel_sql);
    // $channel_row = $channel->fetch_object();
    // $channel_body1=$channel->channel_body1;    
    // $channel_body2=$channel->channel_body2;    
    
    
        if(!empty($channel)){
    $channel=implode(",",$channel);
   $channel_sql= "SELECT * from  hd_channel where channel_id IN($channel)";
   $channel_obj = $conn->query($channel_sql);
    $channel_names=array();
    while ($channel_row = $channel_obj->fetch_object()) {
        $channel_names[]=$channel_row->channel_body1.'<br/><br/>'.$channel_row->channel_body2;
    }
    $channel_body=implode("<br/><br/>\n",$channel_names);
       }else{
           $channel_body='';
       }
       
    
    //gate==============================
       if(!empty($gate)){
    $gate=implode(",",$gate);
    $gate_sql= "SELECT * from  hd_gates where gate_id IN($gate)";
    $gate_obj = $conn->query($gate_sql);
    $gate_names=array();
    while ($gate_row = $gate_obj->fetch_object()) {
        $gate_names[]=$gate_row->gate_body;
    }
    $gate_body=implode("<br/><br/>\n",$gate_names);
       }else{
           $gate_body='';
       }
    //money==============================
    if(!empty($money)){
    $money=implode(",",$money);
    $money_sql= "SELECT * from  hd_money where money_id IN($money)";   
    $money_obj = $conn->query($money_sql);
    $money_names=array();
    while ($money_row = $money_obj->fetch_object()) {
        $money_names[]=$money_row->money_body;
    }
    $money_body=implode("<br/><br/>\n",$money_names); 
    }else{
        $money_body='';
    }
    include "template.php";
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf = new mPDF('utf-8','A4',0,'', 0, 0, 0, 0, 0, 0);

    $mpdf->WriteHTML($html);

    //call watermark content aand image

    $mpdf->showWatermarkText = true;
    $mpdf->watermarkTextAlpha = 0.1;

    //$mpdf->autoScriptToLang = true;
    $mpdf->autoLangToFont = true;
    $mpdf->allow_charset_conversion = false;

    $mpdf->SetDisplayMode('fullpage');
    //save the file put which location you need folder/filname

    $mpdf->Output("Report.pdf", 'D');
    //out put in browser below output function
    $mpdf->Output();
}
else{
    header("Location: index.php");
}