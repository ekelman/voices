<?php
session_start();
ini_set('memory_limit', '256M');
include_once("../global.conf.php");                                            
global $_CONF;
// load all the global paramaters
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
	
	$affiliate_id = $_REQUEST['affiliate_id'];
	
	$file_directory = $_CONF['UploadDoc'];
	$pdf_name = 'article_document_'.$affiliate_id.time().'.pdf';
	$uploadfile = $file_directory.$pdf_name;
	
	if(!copy($_FILES['Filedata']['tmp_name'], $uploadfile)) {
		
		echo "error";
		exit();
	} else {
		
		echo $pdf_name;
		exit();
	}
} else {
	echo "error";
	exit();
}
?>