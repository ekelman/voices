<?php
require_once('paypal.class.php');  // include the class file

$p = new paypal_class;             // initiate an instance of the class
$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
//$p->paypal_url = 'https://www.sandbox.paypal.com/us/cgi-bin/webscr';   // Have a paypal accopunt
//$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url

$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':      // Process and order...
    
		$p->add_field('cmd','_xclick');
		$p->add_field('business', 'STEVE.NETSMARTZ@GMAIL.COM');
		
		$p->add_field('return', $this_script.'?action=success');
		$p->add_field('cancel_return', $this_script.'?action=cancel');
		$p->add_field('notify_url', $this_script.'?action=ipn');
		$p->add_field('item_name'," NLL Subscription(".$mem_description.")");
		$p->add_field('item_number', $mem_item);
	   $p->add_field('amount','1.00');
      $p->add_field('first_name','nidhi');
      $p->add_field('last_name', 'jain');
	   $p->add_field('member_name', 'nidhinidhi');
      $p->add_field('address1','#es45,dhfsjkhf,chd');
      //$p->add_field('address2', $_POST[txtAddtwo]);
	  
	  $p->add_field('country_code','India');
	  $p->add_field('city','chandigarh');
      $p->add_field('state','UT');
      $p->add_field('zip','160018');
     
      $p->add_field('email', 'nidhi@sebiz.net');
	  if($_POST[cc_type]=='VISA')
	  {
	  		$cc_type=='V';
	   }
	   if($_POST[cc_type]=='MASTERCARD')
	  {
	  		$cc_type=='M';
	   }
	   if($_POST[cc_type]=='DISCOVER')
	  {
	  		$cc_type=='D';
	   }
	   if($_POST[cc_type]=='AMEX')
	  {
	  		$cc_type=='A';
	   }
	  
	  $p->add_field('credit_card_type','V');
	  $p->add_field('cc_number', '4222222222222222');
	  $p->add_field('expdate_month','12');
	  $p->add_field('expdate_year', '12');
	  
	  $now=time();
	  $regTime=strftime("%Y-%m-%d",$now);
	  $p->add_field('subscr_date',$regTime);
	  $p->add_field('txn_type', 'subscr_signup');
	
	  $p->validate_ipn();
      //$p->submit_paypal_post(); // submit the fields to paypal
 //    $p->dump_fields();      // for debugging, output a table of all the fields
      break;
      
   case 'success':      // Order was successful...
   if($_SESSION['UserTypeForTopNavigation']=="seeker"){
   header("location:index.php?stage=seeker&mode=OnPaymentSuccess");
   }
    break;
      
   case 'cancel':       // Order was canceled...

      // The order was canceled before being completed.
 		 if($_SESSION['UserTypeForTopNavigation']=="seeker"){
   header("location:index.php?stage=seeker&mode=OnPaymentCancelation");
   }
      break;
      
   case 'ipn':          // Paypal is calling page for IPN validation...
   
      // It's important to remember that paypal calling this script.  There
      // is no output here.  This is where you validate the IPN data and if it's
      // valid, update your database to signify that the user has payed.  If
      // you try and use an echo or printf function here it's not going to do you
      // a bit of good.  This is on the "backend".  That is why, by default, the
      // class logs all IPN data to a text file.
      
      if ($p->validate_ipn()) {
          
         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.
  
         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.
  
         // For this example, we'll just email ourselves ALL the data.
		 
		 
		 	$notifyfor='Payment recieved';
		 
         $subject = 'Instant Payment Notification for-'.$notifyfor;
         $to = 'sukhjitk@sebiz.net';    //  your email
         $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";
         
         foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
         @mail($to, $subject, $body);
		 
		}
	  break;
 }     



?>