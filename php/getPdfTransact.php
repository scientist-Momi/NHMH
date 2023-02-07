<?php

session_start();
include_once "db_connector.php";

$patient_id = stripslashes($_GET['patid']);

$sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient_id' ");
$sql_array = mysqli_fetch_assoc($sql);

$firstname = $sql_array['firstname'];
$lastname = $sql_array['lastname'];

$sql1 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db where patient_id = '$patient_id' ");
$sql1array = mysqli_fetch_array($sql1);
$deposits = $sql1array['deposits'];


$sql2 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db where patient_id = '$patient_id' ");
$sql2array = mysqli_fetch_array($sql2);
$debts = $sql2array['debts'];


// store data inside array
$sql3 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where patient_id = '$patient_id' order by date_of_transaction desc ");

// $sql2_array = mysqli_fetch_assoc($sql2);
$output = "";
if (mysqli_num_rows($sql3) > 0) {

    while ($result3 = mysqli_fetch_assoc($sql3)) {
        // insert output
        $output .= '
                    <tr>
                        <td width="110" align="center">
                            ' . $result3['id'] . '
                        </td>
                        <td width="140" align="center">
                            ' . $result3['payment_for'] . '
                        </td>
                        <td width="110" align="center">
                            &#8358;' . number_format($result3['deposited_amount'], 2) . '
                        </td>
                        <td width="120" align="center">
                            &#8358;' . number_format($result3['remaining_amount'], 2) . '
                        </td>
                        <td  width="140" align="center">
                        ' . $result3['date_of_transaction'] . '
                        </td>
                    </tr>
        ';
    }
} else {
    // insert output
    $output .= ' 
                    <tr>
                        <td width="100%" align="center">No transaction history.</td>
                    </tr>
                    ';
}



// PDF CONVERTER
// PDF CONVERTER
//=====================================================================

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF-main/tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        $this->setTextColor(0, 191, 255);
        // Page number
        $this->Cell(0, 10, 'NEW HORIZON MATERNITY HOSPITAL      ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        // $this->Cell(0, 10, 'NEW HORIZON MATERNITY HOSPITAL', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('NEW HORIZON MATERNITY HOSPITAL');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// $imageFile = K_PATH_IMAGES . 'logo3.jpg';

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'NEW HORIZON MATERNITY HOSPITAL', "Accounting Department\nwww.mail.momiwebs.com.ng", array(0, 191, 255));


// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 8);

// add a page
$pdf->AddPage();

$html = '
<h1>Hello, ' . $firstname . '</h1>
    <table border="1" cellpadding="5" cellspacing="2" style="color:#990000;font-size: 9pt;">
        <tr >
            <td width="280" align="left">
              PATIENT ID: ' . $patient_id . '
            </td>
        </tr>        
        <tr>
            <td width="280" align="left">
              PATIENT NAME: ' . $firstname . ' ' . $lastname . '
            </td>
        </tr>        
        <tr>
            <td width="280" align="left">
                TOTAL DEPOSIT: &#8358;' . number_format($deposits, 2) . '
            </td>
        </tr>        
        <tr>
            <td width="280" align="left">
                TOTAL DEBT: &#8358;' . number_format($debts, 2) . '
            </td>
        </tr>        
    </table>

<p>Below is your account statement with NHMH.</p>
    <table border="1" cellpadding="3" cellspacing="2">
        <tr>
            <td width="110" align="center">
                TRANSACTION ID
            </td>
            <td width="140" align="center">
                SERVICE
            </td>
            <td width="110" align="center">
                AMOUNT PAID
            </td>
            <td width="120" align="center">
                AMOUNT REMAINING
            </td>
            <td  width="140" align="center">
                DATE OF TRANSACTION
            </td>
        </tr>
        
            ' . $output . '
        
    </table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$id = "PAT" . $patient_id . md5(rand());
$pdfname = $id . ".pdf";
//Close and output PDF document
$pdf->Output($pdfname, 'I');
// $pdf_string = $pdf->Output($pdfname, 'I');
// $pdf_string = $pdf->Output();
// $pdf->Output(__DIR__ . $pdfname, 'F');
// header('location: ../accountant-dash.php');
// echo "<script> window.close()</script>";
// file_put_contents('../receipts/' . $pdfname, $pdf_string);
// file_put_contents($pdfname, $pdf_string);
