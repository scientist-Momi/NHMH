<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>w3newbie HTML Email</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            Margin: 0;
            padding: 0;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f6f6f9;
            padding-bottom: 40px;
        }

        .webkit {
            max-width: 600px;
            background: #ffffff;
        }

        .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: 'Poppins', sans-serif;
            color: #4a4a4a;
        }

        a {
            background-color: #338ab3;
            color: #ffffff;
            padding: .5rem;
        }

        @media screen and (max-width: 600px) {}

        @media screen and (max-width: 400px) {}
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="webkit">
            <table class="outer" align="center">
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <!-- contains logo -->
                            <tr>
                                <td style="background-color: #338ab3;padding:10px;text-align:center;">
                                    <a href="https://mail.momiwebs.com.ng">
                                        <img src="cid:logo" width="120" alt="Logo" title="NHMH Logo">
                                    </a>
                                    <!-- <h1>Welcome</h1> -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <!-- contains logo -->
                            <tr>
                                <td style="padding:10px;text-align:left;">
                                    <p>Hello, {firstname} .</p>
                                    <p>Thanks for choosing <span style="color: #338ab3;font-weight: 600;">NEW HORIZON MATERNITY HOSPITAL</span>.</p>
                                    <p>Find below the details of transaction made on your account with us.</p>

                                    <p style="color: #338ab3;font-weight: 600;">Service Paid for: {service}</p>
                                    <p style="color: #338ab3;font-weight: 600;">Price of Service: &#8358; {service_price}</p>
                                    <p style="color: #338ab3;font-weight: 600;">Amount Deposited: &#8358; {deposit}</p>
                                    <p style="color: #338ab3;font-weight: 600;">Amount Remaining: &#8358; 0.00</p>


                                    <p>Please ensure you keep your details safely.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td style="padding:10px;text-align:center;background-color: #338ab3;color: #ffffff;">
                                    <a href="https://mail.momiwebs.com.ng">
                                        <img src="cid:logo" width="70" alt="Logo" title="NHMH Logo">
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px;text-align:center;background-color: #338ab3;color: #ffffff;">
                                    <small>New Horizon Maternity Hospital</small>
                                    <p><a href="tel:08105029113">08105029113</a> <br>D29 Lejina Estate Adamo Ikorodu, Lagos.</p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>