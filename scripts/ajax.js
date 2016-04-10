String.prototype.trim = function() {
// Strip leading and trailing white-space
return this.replace(/^\s*|\s*$/g, "");
}

String.prototype.normalize_space = function() {
// Replace repeated spaces, newlines and tabs with a single space
return this.replace(/^\s*|\s(?=\s)|\s*$/g, "");
}

var xmlHttp

function createRequestObject(){
	var request_o; //declare the variable to hold the object.
	var browser = navigator.appName; //find the browser name
	if(browser == "Microsoft Internet Explorer"){
		/* Create the object using MSIE's method */
		request_o = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		/* Create the object using other browser's method */
		request_o = new XMLHttpRequest();
	}
	return request_o; //return the object
}


function getReferralCalculation1()
{
	form1 = document.editJob;
	sal2 = form1.sal2.value;
	bonus_comm = form1.bonus_comm.value;
	getAnnualCompensation1(bonus_comm);

}


function getReferralCalculation()
{
	form1 = document.createJob;
	sal2 = form1.sal2.value;
	bonus_comm = form1.bonus_comm.value;
	
	getAnnCompensation(bonus_comm);
	
	/*else if(bonus_comm != "")
	{
		getAnnCompensation(bonus_comm);
	}*/
	
}



function displayRecalculation() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	response= xmlHttp.responseText
		
	strA = response.split(",");
	var sDescription = strA[0].trim();
	sDescription = sDescription.normalize_space();
	var sDescription1 = strA[1].trim();
	sDescription1 = sDescription1.normalize_space();
	var sDescription2 = strA[2].trim();
	sDescription2 = sDescription2.normalize_space();
	
	bohire_fee = sDescription1-sDescription2;
	document.getElementById('ann_compensation').value = round(sDescription); 
	document.getElementById('sal1').value = round(sDescription1); 
	document.getElementById('ref_reward').value = round(sDescription2); 
	document.getElementById('bohire_fee').value = round(bohire_fee);
	
} 
} 





function getPostingFee(str)
{
	form1 = document.createJob;
	ann_compensation = form1.ann_compensation.value;
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
if(ann_compensation == "")
{
	ann_compensation = form1.sal2.value;
}
var url="index.php?stage=job&mode=getPostingFee"
url=url+"&id="+str+"&comp="+ann_compensation
	
xmlHttp.onreadystatechange=displayPostingFee
	//alert(url);
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function displayPostingFee() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	response= xmlHttp.responseText
	strA = response.split(",");
	var sDescription = strA[0].trim();
	sDescription = sDescription.normalize_space();
	var sDescription1 = strA[1].trim();
	sDescription1 = round(sDescription1.normalize_space());

		bohire_fee = round(sDescription)-round(sDescription1);
		document.getElementById('posting_fee1').value = round(sDescription);
	document.getElementById('sal1').value = round(sDescription); 
	document.getElementById('ref_reward').value = round(sDescription1);
	document.getElementById('bohire_fee').value = round(bohire_fee); 
	//document.getElementById("result").innerHTML = response
} 
} 

function getEditPostingFee(str)
{
	form1 = document.editJob;
	ann_compensation = form1.ann_compensation.value;
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
if(ann_compensation == "")
{
	ann_compensation = form1.sal2.value;
}
var url="index.php?stage=job&mode=getEditPostingFee"
url=url+"&id="+str+"&comp="+ann_compensation
//url=url+"&sid="+Math.random()
//alert(url);
xmlHttp.onreadystatechange=displayEditPostingFee
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function displayEditPostingFee() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	response= xmlHttp.responseText
	strA = response.split(",");
	var sDescription = strA[0].trim();
	sDescription = sDescription.normalize_space();
	var sDescription1 = strA[1].trim();
	sDescription1 = sDescription1.normalize_space();
	bohire_fee = round(sDescription)-round(sDescription1);
	
	document.getElementById('posting_fee1').value = round(sDescription); 
	document.getElementById('sal1').value = round(sDescription); 
	document.getElementById('ref_reward').value = round(sDescription1);
	document.getElementById('bohire_fee').value = round(bohire_fee); 
	//document.getElementById("result").innerHTML = response
} 
} //ef

function updateStatus(str,candId,direction,sort1)
{
	form1 = document.frmViewApplicants;
	jobId = form1.job_id.value;
	xmlHttp=createRequestObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="index.php?stage=employer&mode=UpdateStatus"
	url=url+"&id="+str+"&candId="+candId+"&jid="+jobId+"&direction="+direction+"&sort="+sort1
	xmlHttp.onreadystatechange=displayUpdateStatus
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
}//ef

function displayUpdateStatus()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		response= xmlHttp.responseText 
		document.getElementById("result").innerHTML = response
	} 
}//ef

/////////////////////////
function declineComments(str,candId,direction,sort1)
{
	form1 = document.frmViewApplicants;
	jobId = form1.job_id.value;
	xmlHttp=createRequestObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	
	var url="index.php?stage=employer&mode=SubmitComments"
	url=url+"&id="+str+"&candId="+candId+"&jid="+jobId+"&direction="+direction+"&sort="+sort1
	
	xmlHttp.onreadystatechange=displaydeclineComments
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function displaydeclineComments()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		response= xmlHttp.responseText 
		document.getElementById("result").innerHTML = response
	} 
}//ef
/////////////////////////
function declineCommentsNew(str,candId,jobId)
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	
	var url="index.php?stage=employer&mode=SubmitCommentsNew"
	url=url+"&id="+str+"&candId="+candId+"&jid="+jobId
	
	xmlHttp.onreadystatechange = displaydeclineCommentsNew
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function displaydeclineCommentsNew()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		response= xmlHttp.responseText 
		document.getElementById("result").innerHTML = response
	} 
}//ef

/*function getAnnualCompensation(str)
{
	 alert(hi);
	
	form1 = document.createJob;
	if( form1.sal2.value != '')
	{
	 heighest_sal = form1.sal2.value;
	}else{
	 heighest_sal = form1.sal.value;
	}
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="index.php?stage=job&mode=getAnnualCompensation"
url=url+"&bonus="+str+"&sal="+heighest_sal
//url=url+"&sid="+Math.random()
alert(url);
xmlHttp.onreadystatechange=displayAnnualCompensation
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}*/

function getAnnualCompensation1(str)
{
	
	form1 = document.editJob;
	
	
	 heighest_sal = form1.sal2.value;
	
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="index.php?stage=job&mode=getAnnualCompensation1"
url=url+"&bonus="+str+"&sal="+heighest_sal
//url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=displayAnnualCompensation1
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}


function displayAnnualCompensation1() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	response= xmlHttp.responseText;
	var sDescription = response.trim();
	sDescription = sDescription.normalize_space();
	sDescription = round(sDescription);
	if(sDescription == 0)
	{
		sDescription = "";
	}
		document.getElementById("ann_compensation").value = sDescription;
	//document.getElementById("result1").innerHTML = response
} 
} 

function getAnnCompensation(str)
{
	
form1 = document.createJob;

	
		
		 heighest_sal = form1.sal2.value;
		
		xmlHttp=createRequestObject()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		} 
		var url="index.php?stage=job&mode=getAnnualCompensation"
		url=url+"&bonus="+str+"&sal="+heighest_sal
			
		//url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=displayAnnualCompensation
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)

}

function displayAnnualCompensation() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	str= xmlHttp.responseText 
	var sDescription = str.trim();
	sDescription = sDescription.normalize_space();
	sDescription = round(sDescription);
	if(sDescription == 0)
	{
		sDescription = "";
	}
	document.getElementById("ann_compensation").value = sDescription;
} 
} 



//get referral reward from posting fee
function getReferralReward(str)
{
	
form1 = document.createJob;

	
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="index.php?stage=job&mode=getReferralReward"
url=url+"&posting_fee="+str
	
//url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=displayReferralReward
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function displayReferralReward() 
{ 
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		response= xmlHttp.responseText 
		response= xmlHttp.responseText
		strA = response.split(",");
		var successful_hire = strA[0].trim();
		successful_hire = successful_hire.normalize_space();
		var sDescription = strA[1].trim();
		sDescription = round(sDescription.normalize_space());

		bohire_fee = successful_hire-sDescription;
		document.getElementById("posting_fee").value = round(successful_hire)
		document.getElementById("reff_reward").value = round(sDescription)
		
		document.getElementById("bohire_fee1").value = round(bohire_fee)
		document.getElementById("successful_hire").value = round(successful_hire)
	} 
} 

function getRefReward(str)
{
	
form1 = document.editJob;

	
	xmlHttp=createRequestObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="index.php?stage=job&mode=getReferralReward"
url=url+"&posting_fee="+str
	
//url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=displayRefReward
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function displayRefReward() 
{ 
//form1 = document.editJob;
//posting_fee = form1.posting_fee.value;
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		response= xmlHttp.responseText 
			response= xmlHttp.responseText
			strA = response.split(",");
			var successful_hire = strA[0].trim();
			successful_hire = successful_hire.normalize_space();
			var sDescription = strA[1].trim();
			sDescription = round(sDescription.normalize_space());

			bohire_fee = successful_hire-sDescription;
			document.getElementById("posting_fee").value = round(successful_hire)
			document.getElementById("reff_reward").value = round(sDescription)
			
			document.getElementById("bohire_fee1").value = round(bohire_fee)
			document.getElementById("successful_hire").value = round(successful_hire)
	} 
} 

function round(number,X) {
// rounds number to X decimal places, defaults to 2
    X = (!X ? 0 : X);

    return Math.round(number*Math.pow(10,X))/Math.pow(10,X);
}
/*
Functions added for New Bohire service - Resume database 
*/
var no_comp;
function addNewComp()
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	
	form1 		=	document.forms['frmSaveExperienceInfo'];
	noOfCompany =	form1.elements['no_of_company'];
	
	noOfCompanyValue = noOfCompany.value;
	//add new row to enter new company table
	addRow(noOfCompanyValue);
	
	no_comp = noOfCompanyValue;
	var url="index.php?stage=jobseeker&mode=createNewCompany&no_comp="+noOfCompanyValue;
	
	xmlHttp.onreadystatechange = displayNewCompany;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function displayNewCompany()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		comp_curr =	parseInt(no_comp); 	
		no_comp_next = parseInt(no_comp) + 1;
		no_comp_previous = parseInt(no_comp) - 1;
		
		response= xmlHttp.responseText;
		form1 		=	document.forms['frmSaveExperienceInfo'];
		noOfCompany =	form1.elements['no_of_company'];
		
		noOfCompany.value = no_comp_next;
		document.getElementById("company"+no_comp).innerHTML = '<table width="663" border="0" cellspacing="0" cellpadding="0"><tr><td width="339" class="arial12b000000">Company '+comp_curr+'</td><td width="30" align="right"><img src="images/img_down.gif" width="16" height="16" alt="" /></td><td width="68" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="moveDownCompany(\''+comp_curr+'\',\''+no_comp_next+'\')">Move Down</a></td><td width="27" align="right"><img src="images/img_moveup.gif" width="16" height="16" alt="" /></td><td width="55" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="moveUpCompany(\''+comp_curr+'\',\''+no_comp_previous+'\')">Move Up</a></td><td width="40" align="right"><img src="images/img_remove.gif" width="16" height="16" alt="" /></td><td width="105" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="clearAll(\''+comp_curr+'\')">Remove Company</a></td></tr></table>';
		document.getElementById("new_comp"+String(no_comp_next)).innerHTML = response;
	} 
}//ef
//Function to add new row in the table
function addRow(col_id) {
	col_id = parseInt(col_id) + 1;
	col_id = "new_comp" + String(col_id); 
	var table = document.getElementById('dyn_table');

	try {
		var rowCount = table.rows.length;

		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			if(row.cells[0].childNodes[0])
				var chkbox = row.cells[0].childNodes[0];
				if(chkbox.alt == "Add Company") {
				rowCount = i;
			}
		}
	} catch(e) {
		alert(e);
	}

	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	cell1.setAttribute("id",col_id); 
	cell1.setAttribute("align","left"); 
	cell1.setAttribute("valign","middle"); 
}//ef

var no_school;
function addNewSchool()
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	
	form1 		=	document.forms['frmSaveSchoolInfo'];
	noOfSchool	=	form1.elements['no_of_school'];
	document.getElementById("btn_add_school").style.display = "none";
	
	noOfSchoolValue = noOfSchool.value;
	//add new row to enter new company table
	addRowSchool(noOfSchoolValue);
	
	no_school = noOfSchoolValue;
	
	var url="index.php?stage=jobseeker&mode=createNewSchool&no_school="+noOfSchoolValue;
	
	xmlHttp.onreadystatechange = displayNewSchool;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function displayNewSchool()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		school_curr =	parseInt(no_school); 	
		no_school_next = parseInt(no_school) + 1;
		no_school_previous = parseInt(no_school) - 1;
		
		response= xmlHttp.responseText;
		form1 		=	document.forms['frmSaveSchoolInfo'];
		noOfSchool =	form1.elements['no_of_school'];
		
		noOfSchool.value = no_school_next;
		document.getElementById("school"+no_school).innerHTML = '<table width="663" border="0" cellspacing="0" cellpadding="0"><tr><td width="369" class="arial12b000000">Company '+school_curr+'</td><td width="30" align="right"><img src="images/img_down.gif" width="16" height="16" alt="" /></td><td width="68" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="moveDownSchool(\''+school_curr+'\',\''+no_school_next+'\')">Move Down</a></td><td width="27" align="right"><img src="images/img_moveup.gif" width="16" height="16" alt="" /></td><td width="55" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="moveUpSchool(\''+school_curr+'\',\''+no_school_previous+'\')">Move Up</a></td><td width="25" align="right"><img src="images/img_remove.gif" width="16" height="16" alt="" /></td><td width="90" align="right"><a href="javascript:void(0)" class="arial11BU004e7f" onclick="clearAll(\''+school_curr+'\')">Remove School</a></td></tr></table>';
		document.getElementById("new_school"+String(no_school_next)).innerHTML = response;
		
		//release the add school buttun
		document.getElementById("btn_add_school").style.display = "";
	} 
}//ef
//Function to add new row in the table for school
function addRowSchool(col_id) {
	col_id = parseInt(col_id) + 1;
	col_id = "new_school" + String(col_id); 
	var table = document.getElementById('dyn_table');
	//alert("--"+col_id);
	try {
		var rowCount = table.rows.length;

		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			if(row.cells[0].childNodes[0])
				var chkbox = row.cells[0].childNodes[0];
				if(chkbox.alt == "Add School") {
				rowCount = i;
			}
		}
	} catch(e) {
		alert(e);
	}

	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	cell1.setAttribute("id",col_id); 
	cell1.setAttribute("align","left"); 
	cell1.setAttribute("valign","middle");
	//cell1.innerText = "updating content";
	//cell1.innerText = item1
}//ef

var col_id_global;
function addNewLanguage()
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	
	form1 		=	document.forms['frmSaveSkillInfo'];
	noOfLanguage	=	form1.elements['no_of_language'];
	
	no_language = parseInt(noOfLanguage.value) + 1;
	noOfLanguage.value = no_language;
	col_id_global = "new_language"+String(no_language);
	
	addRowLanguage();
	
	var url="index.php?stage=jobseeker&mode=createNewLanguage&no_language="+no_language;
	xmlHttp.onreadystatechange = displayNewLanguage;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function displayNewLanguage()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		col_id = col_id_global;
		response= xmlHttp.responseText;
		document.getElementById(col_id).innerHTML = response;
	} 
}//ef

//Function to add new row in the table for Language
function addRowLanguage() {
	col_id = col_id_global;
	var table = document.getElementById('dyn_table');
	var lastRow = table.rows.length;

	var row = table.insertRow(lastRow);
	  
	var cell1 = row.insertCell(0);
	cell1.setAttribute("id",col_id); 
	cell1.setAttribute("width","100%"); 
}//ef

function saveThisCandidate(candidate_id)
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	
	var url="index.php?stage=employer&mode=SaveThisCandidate&candidate_id="+candidate_id;
	xmlHttp.onreadystatechange = displayAlertAndSetMessage;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}//ef

function displayAlertAndSetMessage()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		response = xmlHttp.responseText;
		response = response.trim();
		if(response == "alreadysaved") {
			alert("You have already saved this candidate.");
		} else if(response == "saved") {
			alert("You have successfully saved this candidate.");
			window.location.reload();
		}
	} 
}//ef
/* function to delete candidate from saved candidate list*/
function deleteThisCandidate(candidate_id)
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	
	var url="index.php?stage=employer&mode=deleteThisCandidate&candidate_id="+candidate_id;
	xmlHttp.onreadystatechange = displayAlertAfterDelete;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}//ef

function displayAlertAfterDelete()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		response = xmlHttp.responseText;
		response = response.trim();
		if(response == "deleted") {
			alert("Candidate has been successfully removed from the My Saved Candidates list.");
			window.location.reload();
		}
		//else if(response == "saved") {
			//alert("You have successfully saved this candidate.")
		//}
	} 
}//ef


/* function to delete candidate from saved candidate list*/
function deleteThisCandidateComplete(candidate_id)
{
	xmlHttp=createRequestObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	} 
	r = confirm("Are you sure to delete this candidate from pending and history requests list.");
	if(r == true) {
		var url="index.php?stage=employer&mode=deleteThisCandidateComplete&candidate_id="+candidate_id;
		xmlHttp.onreadystatechange = displayAlertAfterDeleteComplete;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	} else {
		return;
	}
}//ef

function displayAlertAfterDeleteComplete()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState=="complete") { 
		response = xmlHttp.responseText;
		response = response.trim();
		
		if(response == "deleted") {
			alert("Candidate has been successfully removed from the pending and history requests list.");
			window.opener.location.reload();
			window.close();
		}
	} 
}//ef

