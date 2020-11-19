<?php

    $mysqli_connection = new MySQLi('localhost', 'root', '', 'pressmanagement');
   
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Nihal Printers');
$pdf->SetSubject('No 35, Mihidu Mawatha, Kurunegala');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData("http://localhost/mit/NihalPrinters/images/logo.png", PDF_HEADER_LOGO_WIDTH, "test", PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
$id = $_GET['id'];


$sql="SELECT orders.o_id,orders.product, orders.size, orders.quantity ,Payment.unitPrice , Payment.otherCharge,Payment.otherChargeDes,Payment.total_cost FROM orders INNER JOIN Payment ON orders.o_id= Payment.order_ID WHERE orders.o_id='".$id."'";
$result= $mysqli_connection-> query($sql);
$row= $result-> fetch_assoc();
extract($row);
$mysqli_connection-> close();
$amount=$quantity * $unitPrice;
$date=date("Y/m/d");


// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        align: center;
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 20pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
    }
    td {
        border: 2px solid black;
        text-align:center;
        height: 40px; 
    }

</style>
<table width="100%">
    <thead>
      <tr>
        <th rowspan="3" width="40%"><img src="images/logo.png"/></th>
        <th></th>
        <th colspan="2"><h1>Nihal Printers</h1></th>
        <th></th>
      </tr>
      </thead>
      <tr>
        <th></th>
        <th colspan="2"></th>
        <th colspan="2"><h4>No 35, Mihidu Mawatha, Kurunegala<br>
        037-3456754</h4></th>
      </tr>
</table><br><br><br><br>

      <p><h4>
      Order ID: $o_id <br><br>
      Date : $date</h4>

<br><br><br><br><br><br>
<h1 class="title">Reciept</i></h1>
<br><br><br><br>

<p class="first">
	<table id="myTable">
      <thead>
          <tr>
            <td>Description</td>
            <td>Quantity</td>
            <td>Unit Price</td>
            <td>Amount</td>
          </tr>
      </thead>
      <tbody>
        <tr>
        <td>$product ($size)</td>
        <td>$quantity</td>
        <td>$unitPrice</td>
        <td>$amount</td>
      </tr>
      <tr>
        <td>$otherChargeDes</td>
        <td colspan="2"></td>
        <td>$otherCharge</td>
      </tr>
      <tr>
        <td colspan="3">Total Cost</td>
        <td>$total_cost</td>
      </tr>
      </tbody>

    </table>

</p>
      


EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
//$pdf->AddPage();

$html = '
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+