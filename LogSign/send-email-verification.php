<?php
    
    include "db.php";
        
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $row = mysqli_num_rows($result);

    if($row <= 0) {
        
        $token = md5($_POST['email']).rand(10,9999);
        mysqli_query($conn, "INSERT INTO users(f_name, l_name, email, email_verification_link ,password, contact_no) VALUES('" . $_POST['fname'] . "','" . $_POST['lname'] . "' ,'" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "','" . $_POST['contact'] . "')");
        //$link = "<p><a href='localhost/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a></p>";


        $to = $_POST['email']; 
        $from = 'plv@valture'; 
        $fromName = 'ADMIN'; 
        $subject = "Verify Your Account"; 

        $headers  = "From: " . $from. "\r\n";
        $headers .= "CC: valture@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        //$message = "<a href='localhost/Valture/LogSign/verify-redirect.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        

        $message = "
        
        <!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
        <head>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='x-apple-disable-message-reformatting'>
        <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
        <title></title>
        
            <style type='text/css'>
            @media only screen and (min-width: 620px) {
        .u-row {
            width: 600px !important;
        }
        .u-row .u-col {
            vertical-align: top;
        }

        .u-row .u-col-100 {
            width: 600px !important;
        }

        }

        @media (max-width: 620px) {
        .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
        }
        .u-row {
            width: calc(100% - 40px) !important;
        }
        .u-col {
            width: 100% !important;
        }
        .u-col > div {
            margin: 0 auto;
        }
        }
        body {
        margin: 0;
        padding: 0;
        }

        table,
        tr,
        td {
        vertical-align: top;
        border-collapse: collapse;
        }

        p {
        margin: 0;
        }

        .ie-container table,
        .mso-container table {
        table-layout: fixed;
        }

        * {
        line-height: inherit;
        }

        a[x-apple-data-detectors='true'] {
        color: inherit !important;
        text-decoration: none !important;
        }

        table, td { color: #000000; } a { color: #cca250; text-decoration: none; } @media (max-width: 480px) { #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 57% !important; } #u_content_heading_3 .v-container-padding-padding { padding: 10px 20px !important; } #u_content_heading_3 .v-font-size { font-size: 28px !important; } #u_content_image_3 .v-container-padding-padding { padding: 10px !important; } #u_content_image_3 .v-src-width { width: auto !important; } #u_content_image_3 .v-src-max-width { max-width: 80% !important; } #u_content_text_3 .v-container-padding-padding { padding: 10px 22px 26px !important; } #u_content_button_1 .v-container-padding-padding { padding: 10px 10px 30px !important; } #u_content_button_1 .v-border-radius { border-radius: 4px !important;-webkit-border-radius: 4px !important; -moz-border-radius: 4px !important; } #u_content_heading_2 .v-container-padding-padding { padding: 0px 22px 10px !important; } #u_content_heading_2 .v-font-size { font-size: 24px !important; } }
            </style>
        
        

        <!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap' rel='stylesheet' type='text/css'><!--<![endif]-->

        </head>

        <body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000'>
        <!--[if IE]><div class='ie-container'><![endif]-->
        <!--[if mso]><div class='mso-container'><![endif]-->
        <table style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%' cellpadding='0' cellspacing='0'>
        <tbody>
        <tr style='vertical-align: top'>
            <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #f9f9f9;'><![endif]-->
            

        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
        <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;'>
            <div style='border-collapse: collapse;display: table;width: 100%;background-color: transparent;'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #111114;'><![endif]-->
            
        <!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
        <div style='width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
        <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
        
        <table id='u_content_image_4' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
            
            <img align='center' border='0' src='img/image-4.png' alt='Logo' title='Logo' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 40%;max-width: 232px;' width='232' class='v-src-width v-src-max-width'/>
            
            </td>
        </tr>
        </table>

            </td>
            </tr>
        </tbody>
        </table>

        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
        </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
        </div>



        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
        <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;background-color: transparent;'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
            
        <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color: #fffefe;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
        <div style='background-color: #fffefe;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
        <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
        
        <table id='u_content_heading_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:29px 13px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <h1 class='v-font-size' style='margin: 0px; color: #000000; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 40px;'>
            <strong>WELCOME!</strong>
        </h1>

            </td>
            </tr>
        </tbody>
        </table>

        <table id='u_content_image_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:31px 10px 10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
            
            <img align='center' border='0' src='img/image-5.png' alt='Tick Icon' title='Tick Icon' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 85%;max-width: 493px;' width='493' class='v-src-width v-src-max-width'/>
            
            </td>
        </tr>
        </table>

            </td>
            </tr>
        </tbody>
        </table>

        <table id='u_content_text_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 60px 40px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div style='color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 170%;'><span style='font-size: 16px; line-height: 27.2px;'>We're excited to have you get started! First, you need to confirm your account. <strong>Click the button</strong> below to proceed.</span></p>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <table id='u_content_button_1' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px 10px 40px;font-family:'Montserrat',sans-serif;' align='left'>
        
                
        <!-- CONTAINER NG BUTTON-->


        <div align='center'>
        <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:'Montserrat',sans-serif;'><tr><td style='font-family:'Montserrat',sans-serif;' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://unlayer.com/' style='height:47px; v-text-anchor:middle; width:252px;' arcsize='8.5%' stroke='f' fillcolor='#cca250'><w:anchorlock/><center style='color:#FFFFFF;font-family:'Montserrat',sans-serif;'><![endif]-->
            <a href='localhost/Valture/LogSign/verify-redirect.php?key=".$_POST['email']."&token=".$token."'' target='_blank' class='v-border-radius' style='box-sizing: border-box;display: inline-block;font-family:'Montserrat',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #cca250; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;'>
            <span style='display:block;padding:14px 33px;line-height:120%;'><strong><span style='font-size: 16px; line-height: 19.2px;'>Confirm Your Account</span></strong></span>
            </a>
        <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
        </div>


        <!-- END CONTAINER NG BUTTON-->

            </td>
            </tr>
        </tbody>
        </table>

        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
        </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
        </div>



        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
        <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;'>
            <div style='border-collapse: collapse;display: table;width: 100%;background-color: transparent;'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #ffffff;'><![endif]-->
            
        <!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
        <div style='width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
        <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
        
        <table id='u_content_heading_2' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px 55px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <h1 class='v-font-size' style='margin: 0px; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 26px;'>
            <strong>Need anything else?</strong>
        </h1>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:12px 60px 0px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div style='color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 170%;'>Please contact us by replying to this email; we are always happy to assist!</p>
        <p style='font-size: 14px; line-height: 170%;'>&nbsp;</p>
        <p style='font-size: 14px; line-height: 170%;'>Cheers,</p>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px 0px 15px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
            
            <img align='center' border='0' src='img/image-3.png' alt=' title=' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 180px;' width='180' class='v-src-width v-src-max-width'/>
            
            </td>
        </tr>
        </table>

            </td>
            </tr>
        </tbody>
        </table>

        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
        </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
        </div>



        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
        <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;'>
            <div style='border-collapse: collapse;display: table;width: 100%;background-color: transparent;'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #111114;'><![endif]-->
            
        <!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
        <div style='width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
        <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
        
        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:32px 10px 0px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div style='color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 140%;'><span style='font-size: 18px; line-height: 25.2px;'><strong>VALTURE</strong></span></p>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div style='color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 180%;'>Pamantasan ng Lungsod ng Valenzuela<br />Valenzuela City, Philippines</p>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div align='center'>
        <div style='display: table; max-width:105px;'>
        <!--[if (mso)|(IE)]><table width='105' cellpadding='0' cellspacing='0' border='0'><tr><td style='border-collapse:collapse;' align='center'><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:105px;'><tr><![endif]-->
        
            
            <!--[if (mso)|(IE)]><td width='32' style='width:32px; padding-right: 21px;' valign='top'><![endif]-->
            <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 21px'>
            <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                <a href='https://www.facebook.com/Pamantasan-ng-Lungsod-ng-Valenzuela-Library-141283691720' title='Facebook' target='_blank'>
                <img src='img/image-2.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
                </a>
            </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            <!--[if (mso)|(IE)]><td width='32' style='width:32px; padding-right: 0px;' valign='top'><![endif]-->
            <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px'>
            <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                <a href='https://twitter.com/PLVLibrary' title='Twitter' target='_blank'>
                <img src='img/image-1.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
                </a>
            </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='82%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #9495a7;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
            <tbody>
            <tr style='vertical-align: top'>
                <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                <span>&#160;</span>
                </td>
            </tr>
            </tbody>
        </table>

            </td>
            </tr>
        </tbody>
        </table>

        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
        <tbody>
            <tr>
            <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px 10px 13px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <div style='color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 180%;'>&copy; 2021 All Rights Reserved</p>
        </div>

            </td>
            </tr>
        </tbody>
        </table>

        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
        </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
        </div>


            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
        </body>

        </html>

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
        
        
        ";




        if(mail($to, $subject, $message, $headers)) {
            echo "Check Your Email box and Click on the email verification link.".$row;
        }
        else{
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }
    mysqli_close($conn);
?>