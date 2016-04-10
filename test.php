<?php
	
	require_once("global.conf.php");
	
	//don't timeout!
	set_time_limit(5*60);

	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    

	//connection details
	$oModel 	= new Model();
			
	// Pull certain elements
	/*
	if(isset($_REQUEST["file"])&&!empty($_REQUEST["file"]))	
		$xmlFileName = "./statenet/".$_REQUEST["file"];	
	else	
		$xmlFileName = "./statenet/".date('Ymd')."_US.xml";

	if(!file_exists($xmlFileName ))
	{
		die("XML file missing at location ".$xmlFileName);		
	}
	else
	{
		mail("paras.shah@netsmartz.net","Cron update bills","support@ourvoicesforhchange.us".$xmlFileName);
	}
	*/
	
	
	
	$completeurl = "http://open.nysenate.gov/legislation/api/xml/search/cellular/1/20";
	$xml = simplexml_load_file($completeurl);
	
	echo "<pre>";print_r($xml);
	$tracks = $xml->recenttracks->track;
 
	for ($i = 0; $i < 3; $i++) {
		$nowplaying = $tracks[$i]->attributes()->nowplaying;
		$trackname = $tracks[$i]->name;
		$artist = $tracks[$i]->artist;
		$url = $tracks[$i]->url;
		$date = $tracks[$i]->date;
		$img = $tracks[$i]->children();
		$img = $img->image[0];
	 
		echo "<a href='" . $url . "' target='TOP'>";
	 
		if ($nowplaying == "true") {
			echo "Now playing: ";
		}
	 
	
	}
	

?>