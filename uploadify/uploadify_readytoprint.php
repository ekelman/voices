<?php
session_start();
include("../includes/connection.php");
include_once '../class.fileupload.php';
include("../includes/resize-class.php");
ini_set('memory_limit', '256M');

if (!empty($_FILES)) {
    $uid = $_REQUEST['userid'];

    
    $file_directory = $_SERVER['DOCUMENT_ROOT'].'/pdf_files/';
    /*
    $table_photo=TABLE_ALBUM_PHOTO;
    $album_upload_date=DATETIME;
    
    if($_REQUEST['size'] == '6 (tall) x 6 (wide)') {
        $proportion_h = 669;
        $proportion_w = 664;
    }else{
        $proportion_h = 554;
        $proportion_w = 449;
    }

    $sql = "SELECT * FROM custom_album_master WHERE user_id=".$uid." AND album_name = 'MSC Album for Admin'";
    $qry=mysql_query($sql);
    $rows = mysql_num_rows($qry);
    if(!$rows) {
        $sql="INSERT INTO custom_album_master (album_name, user_id) values ('MSC Album for Admin',".$uid.")";
        $quer=mysql_query($sql);
        $alid = mysql_insert_id();
    }else{
        $alb_obj = mysql_fetch_object($qry);
        $alid = $alb_obj->album_id;
    }
	*/
    
    ////////////////
    /*
    $feel = new FileUpload($_SERVER['DOCUMENT_ROOT']);

    $imginfo = pathinfo($_FILES['Filedata']['name']);

    $imgExt=$imginfo["extension"];
    $fileimage=date("ymdhis").rand().".".$imgExt;

    $feel->imageUpload($fileimage,$_FILES['Filedata']['tmp_name'],$file_directory,1,'thumbs',100,100);
	*/
    
    
	
	$pdf_name = 'PREFORMATTED-'.$uid.time().'.pdf';
	$uploadfile = $file_directory.$pdf_name;
	/*
	echo "<pre>";
	print_r($_FILES);
	die();
	*/
	if(!copy($_FILES['Filedata']['tmp_name'], $uploadfile)) {
		
		echo 'error!12312';
		exit;
	} else {
		
	    echo $pdf_name;	
	    exit;
	}
}
?>