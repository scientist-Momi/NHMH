<?php
session_start();

include_once "db_connector.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$price = stripslashes($_SESSION['servicePrice']);
$patient = stripslashes($_SESSION['patient']);
$deposit = stripslashes($_SESSION['deposit']);
$modeofPay = stripslashes($_SESSION['modeofPay']);
$planChoice = stripslashes($_SESSION['planChoice']);
$service = stripslashes($_SESSION['service']);
// $datetopay = stripslashes($_SESSION['datetopay']);
// $amounttopay = stripslashes($_SESSION['amounttopay']);

// echo $datetopay . $planChoice;


$array2 = $_SESSION['array2'];

$interval = $_SESSION['interval'];

$moneytoPay = $_SESSION['moneytopay'];

$moneytoPay1 = floor($moneytoPay);



$remains = $_SESSION['remains'];

$today = date("Y-m-d");

$pay_status = "Not paid";

$firstday = $today;

$trans_id = rand(time(), 1000);


// get patient fullname
$sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient' ");

$sql_array = mysqli_fetch_assoc($sql);
$fullname = $sql_array['firstname'] . $sql_array['lastname'];

$fname = $sql_array['firstname'];
$email = $sql_array['email'];


$user_id = stripslashes($_SESSION['staff_uid']);
$sql2 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql2) > 0) {
    $staff = mysqli_fetch_assoc($sql2);

    $accountant = $staff['firstname'];

    $month = date('F', strtotime($today));


    $sql3 = mysqli_query($conn, "insert into nhmh_patient_accounts_db (patient_id,transaction_id,fullname,payment_for,amount_to_pay,deposited_amount,remaining_amount,installment_plan,mode_of_payment,date_of_transaction,month_of_transaction,accountant_in_charge) values('$patient', '$trans_id', '$fullname', '$service', '$price', '$deposit', '$remains', '$planChoice', '$modeofPay', '$today', '$month', '$accountant') ");

    if ($sql3) {

        for ($i = 1; $i <= $planChoice; $i++) {

            $firstday = date('Y-m-d', strtotime('+' . $interval . 'days', strtotime($firstday)));

            $sql1 = mysqli_query($conn, "insert into nhmh_patients_payment_plans_db (patient_id,transaction_id,amount_to_pay,date_to_pay,payment_status) values ('$patient', '$trans_id', '$moneytoPay1', '$firstday', '$pay_status')");
        }

        if ($sql1) {
            $sql4 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where transaction_id = '$trans_id' ");
            $sql4_array = mysqli_fetch_assoc($sql4);
            $service_paid_for = $sql4_array['payment_for'];
            $amount_she_paid = $sql4_array['deposited_amount'];

            $her_debt = $sql4_array['remaining_amount'];
            $installment = $sql4_array['installment_plan'];

            $sql5 = mysqli_query($conn, "select * from nhmh_patients_payment_plans_db where transaction_id = '$trans_id' ");

            $output = "";
            while ($result5 = mysqli_fetch_assoc($sql5)) {
                $output .= '
                            <tr>
                                <td width="110" align="center">
                                    ' . $result5['plan_id'] . '
                                </td>
                                <td width="110" align="center">
                                    ' . $result5['transaction_id'] . '
                                </td>
                                <td width="110" align="center">
                                    &#8358;' . number_format($result5['amount_to_pay'], 2) . '
                                </td>
                                <td width="120" align="center">
                                    ' . $result5['date_to_pay'] . '
                                </td>
                                <td  width="140" align="center">
                                ' . $result5['date_created'] . '
                                </td>
                            </tr>
                        ';
            }

            //==================================================================
            //RECEIPT IN PDF
            //=================================================================

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

            // create some HTML content
            $html = '
                    <h1>Hello, ' . $fname . '</h1>
                        <table border="1" cellpadding="5" cellspacing="2" style="color:#990000;font-size: 9pt;">
                            <tr >
                                <td width="280" align="left">
                                PATIENT ID: ' . $patient . '
                                </td>
                            </tr>        
                            <tr>
                                <td width="280" align="left">
                                PATIENT NAME: ' . $fname . ' ' . $sql_array['lastname'] . '
                                </td>
                            </tr>        
                            <tr>
                                <td width="280" align="left">
                                SERVICE PAID FOR: ' . $service_paid_for . '
                                </td>
                            </tr>        
                            <tr>
                                <td width="280" align="left">
                                    AMOUNT PAID: &#8358;' . number_format($amount_she_paid, 2) . '
                                </td>
                            </tr>        
                            <tr>
                                <td width="280" align="left">
                                    AMOUNT REMAINING: &#8358;' . number_format($her_debt, 2) . '
                                </td>
                            </tr>        
                            <tr>
                                <td width="280" align="left">
                                    PAYMENT PLAN CHOOSED: ' . $installment . '
                                </td>
                            </tr>        
                        </table>

                    <p>Below is your account statement with NHMH.</p>
                        <table border="1" cellpadding="3" cellspacing="2">
                            <tr>
                                <td width="110" align="center">
                                    PLAN ID
                                </td>
                                <td width="110" align="center">
                                    TRANSACTION ID
                                </td>
                                <td width="110" align="center">
                                    AMOUNT TO PAY
                                </td>
                                <td width="120" align="center">
                                    DATE TO PAY
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
            $id = "PAT" . $patient . md5(rand());
            $pdfname = $id . ".pdf";
            //Close and output PDF document
            // $pdf->Output($pdfname, 'D');
            // $pdf_string = $pdf->Output($pdfname, 'D');
            $pdf->Output(__DIR__ . '/' . $pdfname, 'F');

            // $pdf_string = $pdf->Output();
            // file_put_contents($pdfname, $pdf_string);

            echo "Successful";









            //====================================================================
            //EMAIL SENDING
            //====================================================================

            // try {
            //     // run program to send mail with details to patient.
            //     $mail = new PHPMailer(true);

            //     //$mail->SMTPDebug = 2;
            //     $mail->isSMTP();
            //     $mail->Host = "momiwebs.com.ng";
            //     $mail->SMTPAuth = false;
            //     $mail->Username = 'admin@momiwebs.com.ng';
            //     $mail->Password = 'z5sU.KuJrXT9';
            //     $mail->SMTPSecure = 'ssl';
            //     $mail->Port = 465;

            //     $mail->setFrom('admin@momiwebs.com.ng', 'New Horizon Maternity Hospital');

            //     $mail->addAddress($email);

            //     $mail->isHTML(true);

            // $mail->AddAttachment(__DIR__ . '/' . $pdfname);

            //     $mail->Subject = "New Horizon Maternity Hospital- Payment Receipt.";

            //     $mail->Headers = array(
            //         "MIME-Version" => "1.0",
            //         "Content-Type" => "text/html;charset=UTF-8"
            //     );

            //     $mail->Body = file_get_contents("../email_temp/payment_receipt.php");

            //     $mail->AddEmbeddedImage('../img_resource/logo3.jpg', 'logo');

            //     $swap_var = array(
            //         "{service}" => "$service",
            //         "{deposit}" => "$deposit",
            //         "{service_price}" => "$price",
            //         "{plan_choice}" => "$planChoice",
            //         "{amt_remain}" => "$remains",
            //         "{payment}" => "$array2",
            //         "{firstname}" => "$fname"
            //     );

            //     foreach (array_keys($swap_var) as $key) {
            //         if (strlen($key) > 2 && trim($key) != "") {
            //             $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
            //         }
            //     }

            //     $mail->send();

            // unlink(__DIR__ . '/' . $pdfname);

            //     echo "Successful";
            // } catch (Exception $e) {
            //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // }
        } else {
            echo "error";
        }
    } else {
        echo "error adding to transactions";
    }
} else {
    echo "Can't get Accountant details";
}
