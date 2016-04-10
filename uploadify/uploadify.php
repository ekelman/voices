<?php
session_start();
include("../includes/connection.php");
include_once '../class.fileupload.php';
include("../includes/resize-class.php");
ini_set('memory_limit', '256M');

/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

if (!empty($_FILES)) {
    $uid = $_REQUEST['userid'];

    
    $file_directory = $_SERVER['DOCUMENT_ROOT'].'/images/album_image/';
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

    $feel = new FileUpload($_SERVER['DOCUMENT_ROOT']);

    $imginfo = pathinfo($_FILES['Filedata']['name']);

    $imgExt=$imginfo["extension"];
    $fileimage=date("ymdhis").rand().".".$imgExt;

    $feel->imageUpload($fileimage,$_FILES['Filedata']['tmp_name'],$file_directory,1,'thumbs',100,100);

    $thumb_path = $file_directory.'thumbs/'.$fileimage;

    if (file_exists($thumb_path)) {
	
        $sql_album="insert into ".$table_photo."(photo_id,album_id,user_id,photo_name,photo_desc,photo_upload_date)
            values('',".$alid.",".$uid.",'".$fileimage."','','".$album_upload_date."')";
        $query_album=mysql_query($sql_album);
    }

    $image_sizes = getimagesize($file_directory.''.$fileimage);
//        var_dump($image_sizes);exit;

    $_SESSION['1']['image_name'] = $fileimage;
    $_SESSION['1']['image_width'] = $image_sizes[0];
    $_SESSION['1']['image_height'] = $image_sizes[1];
    $_SESSION['1']['image_sizes'] = $image_sizes[3];

    if($image_sizes[0] > $image_sizes[1]) {
        $proportion = (float) number_format($proportion_h / $image_sizes[0],5);
    } else {
        $proportion = (float) number_format($proportion_w / $image_sizes[1],5);
    }

    echo $fileimage.";".$image_sizes[0].";".$image_sizes[1].";".$proportion;
	
	/*
	if($type == 1 and $type == 2 and $type == 3) {

		$feel->imageUpload($fileimage,$_FILES['Filedata']['tmp_name'],$file_directory,1,'thumbs',100,100);

		$thumb_path = $file_directory.'thumbs/'.$fileimage;

		if (file_exists($thumb_path)) {
			$sql_album="insert into ".$table_photo."(photo_id,album_id,user_id,photo_name,photo_desc,photo_upload_date)
				values('',".$alid.",".$uid.",'".$fileimage."','','".$album_upload_date."')";
			$query_album=mysql_query($sql_album);
		}

		$image_sizes = getimagesize($file_directory.''.$fileimage);

		$_SESSION['1']['image_name'] = $fileimage;
		$_SESSION['1']['image_width'] = $image_sizes[0];
		$_SESSION['1']['image_height'] = $image_sizes[1];
		$_SESSION['1']['image_sizes'] = $image_sizes[3];

		if($image_sizes[0] > $image_sizes[1]) {
			$proportion = (float) number_format($proportion_h / $image_sizes[0],5);
		}else{
			$proportion = (float) number_format($proportion_w / $image_sizes[1],5);
		}

		echo $fileimage.";".$image_sizes[0].";".$image_sizes[1].";".$proportion;
	} else {
	
		echo "Error: File type(BMP) not allowed";	
	}
	*/
	
	/*

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
	// } else {
	// 	echo 'Invalid file type.';
	// }
 * 
 */
}

?>