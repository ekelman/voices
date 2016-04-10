<?
include ('class.ezpdf.php');
//Setup some consts that will be used in creating the receipt for the donor
$fontSize = 24;
$pageHeight = 72*10.5; //72 pix per inch X 11 inches - 1/2" margin
$pageWidth = 72*8; //72 pix per inch X 8.5 inches - 1/2" margin


//
//Create a new PDF
	$pdf = new Cezpdf();
	$pdf->selectFont('fonts/Helvetica.afm');

		$height = 800;
		$y = $pdf->y - $height;
		
		$img = ImageCreatefromjpeg("images/img_invoice_for_bohire.jpg");
		$pdf->addImage($img, 30, 500,550,300);
		
		
		$pdf->ezSetDy(-50);
		
		$pdf->addTextWrap(36,$pdf->y, 150, $fontSize-16, "Sandy,");
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(36,$pdf->y , 150, $fontSize-16, "Netsmartz LLC,");
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(36,$pdf->y, 150, $fontSize-16, "570 Willowbrook Office Park,");
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(36,$pdf->y, 150, $fontSize-16, "Rochester, New York 14450.");
		
		$pdf->ezSetDy(+35);

		$pdf->addTextWrap(289,$pdf->y, 150, $fontSize-16, "373 Front Street West, #1803.");
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(289,$pdf->y, 150, $fontSize-16, "Toronto, Ontario.");
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(289,$pdf->y, 150, $fontSize-16, "M5V 3R7.");

		$pdf->ezSetDy(+34);
		$pdf->addTextWrap(460, $pdf->y, 150, $fontSize-15, "4");
		$pdf->ezText("", $fontSize-7);		
		$pdf->addTextWrap(460, $pdf->y, 150, $fontSize-15, "25, Oct 2007");
		
		$pdf->ezSetDy(-80);
		$pdf->ezText("", $fontSize-15);		
		$pdf->addTextWrap(60,$pdf->y, 150, $fontSize-15, "G-64537");
		$pdf->addTextWrap(150,$pdf->y, 150, $fontSize-15, "1");
		$pdf->addTextWrap(220,$pdf->y, 150, $fontSize-15, "ABC Test");
		$pdf->addTextWrap(435,$pdf->y, 150, $fontSize-15, "$220.00");
		$pdf->addTextWrap(520,$pdf->y, 150, $fontSize-15, "$1.32");

		$pdf->ezSetDy(-105);
		$pdf->ezText("", $fontSize-13);		
		$pdf->addTextWrap(445,$pdf->y, 150, $fontSize-15, "$1.32");
		$pdf->ezText("", $fontSize-7);		
		$pdf->addTextWrap(445,$pdf->y, 150, $fontSize-15, "$221.32");


		$pdfcode = $pdf->output();
		$fp=fopen("new_pdf.pdf",'w+');
		fwrite($fp,$pdfcode);
		fclose($fp);
		$pdf->ezStream();



?>