<?php

    session_start();

    $rndno = rand(100000, 999999);
    $_SESSION['code'] = $rndno;

    if ($_POST['contactNumber'] != "") {
        
        require('/xampp/htdocs/Valture/php-rest-api-master/autoload.php');

        $number = $_POST['contactNumber'];
        $trim_number = str_replace("0","+63", $number);
        $contact_no = (int)$trim_number;

        $messageBird = new \MessageBird\Client('eO4wvIBVmRTB1Smf7vmnM5MUo'); // Set your own API access key here.

        $Message             = new \MessageBird\Objects\Message();
        $Message->originator = 'VALTURE';
        $Message->recipients = array($contact_no);
        $Message->body       = 'DO NOT SHARE THIS CODE TO ANYONE! THIS IS YOUR CODE '.$rndno;

        try {
            $messageResult = $messageBird->messages->create($Message);
            //var_dump($messageResult);
            echo "200";
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            // That means that your accessKey is unknown
            echo '404';
        } catch (\MessageBird\Exceptions\BalanceException $e) {
            // That means that you are out of credits, so do something about it.
            echo '500';
        } catch (\Exception $e) {
            echo $e->getMessage();
         
        } 

        /* function itexmo($rndno) {

            $number = "+639100161643";//$_POST['contactNumber'];
            $trim_number = str_replace("0","+63", $number);
            $contact_no = (int)$trim_number;
            $message = "Hi! You have requested an reset code for your account, DO NOT SHARE THIS CODE TO ANYONE! THIS IS YOUR RESET CODE " . $rndno . "";
            $apicode = "ST-JOSHU129516_PFMPY";
            $passwd = '!)&i47{8c{';
            //$url = "https://www.itexmo.com/php_api/api.php";
            //$sender = "VALTURE";
            
            
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch); 
            
            $param = array(
                'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($itexmo),
                ),
            );
                
            $context = stream_context_create($param);
            return file_get_contents($url, false, $context); */
    
            //echo "200";
            

        //} 
        
        //$stats = $_GET['https://www.itexmo.com/php_api/serverstatus.php'];
        //$result = itexmo($rndno);
        //echo "" . $rndno . " result: " . $result . " Stats: " . $stats;

        
      
    } else {
        
        $to = $_SESSION['email']; 
        $from = 'plv@valture'; 
        $fromName = 'ADMIN'; 
        $subject = "Verify Your Account"; 

        $headers  = "From: " . $from. "\r\n";
        $headers .= "CC: valture@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
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
        
          .u-row .u-col-18 {
            width: 108px !important;
          }
        
          .u-row .u-col-18p34 {
            width: 110.04px !important;
          }
        
          .u-row .u-col-63p66 {
            width: 381.96px !important;
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
        
        table, td { color: #000000; } a { color: #cca250; text-decoration: none; } @media (max-width: 480px) { #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 57% !important; } #u_content_image_3 .v-container-padding-padding { padding: 46px 10px 10px !important; } #u_content_image_3 .v-src-width { width: auto !important; } #u_content_image_3 .v-src-max-width { max-width: 90% !important; } #u_content_heading_3 .v-container-padding-padding { padding: 10px 20px !important; } #u_content_heading_3 .v-font-size { font-size: 28px !important; } #u_content_text_3 .v-container-padding-padding { padding: 10px 22px 26px !important; } #u_content_text_7 .v-container-padding-padding { padding: 10px 22px 26px !important; } #u_content_heading_2 .v-container-padding-padding { padding: 22px 22px 10px !important; } #u_content_heading_2 .v-font-size { font-size: 24px !important; } #u_content_image_5 .v-src-width { width: auto !important; } #u_content_image_5 .v-src-max-width { max-width: 45% !important; } }
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
              
              <img align='center' border='0' src='images/image-4.png' alt='Logo' title='Logo' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 290px;' width='290' class='v-src-width v-src-max-width'/>
              
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
          
        <table id='u_content_image_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:55px 10px 10px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
          <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
              
              <img align='center' border='0' src='images/image-3.png' alt='Tick Icon' title='Tick Icon' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 90%;max-width: 522px;' width='522' class='v-src-width v-src-max-width'/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id='u_content_heading_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px 55px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <h1 class='v-font-size' style='margin: 0px; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 33px;'>
            <strong>Hello there,</strong>
          </h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id='u_content_text_3' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 60px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <div style='color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 170%;'>Here's your confirmation code to complete the process.</p>
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
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;'>
            <div style='border-collapse: collapse;display: table;width: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #ffffff;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='108' style='width: 108px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-18' style='max-width: 320px;min-width: 108px;display: table-cell;vertical-align: top;'>
          <div style='width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
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
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='380' style='background-color: #cca250;width: 380px;padding: 20px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-63p66' style='max-width: 320px;min-width: 382px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #cca250;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='padding: 20px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
         
            
        
        
        
        
        
        
        
        <!-- START OF CONTAINER NG OTP CODES-->
        
        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Montserrat',sans-serif;' align='left'>
          
                
        
          <!-- START OF H1 CLASS NG CODES -->
        
          <h1 class='v-font-size' style='margin: 0px; color: #ffffff; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 50px;'>
            <strong> '". $rndno ."'</strong>
          </h1>
        
          <!-- END OF H1 CLASS NG CODES -->
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <!-- END OF CONTAINER NG OTP CODES-->
        
        
        
        
        
        
        
        
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='110' style='width: 110px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-18p34' style='max-width: 320px;min-width: 110px;display: table-cell;vertical-align: top;'>
          <div style='width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
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
          
        <table id='u_content_text_7' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 60px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <div style='color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 170%;'><span style='font-size: 14px; line-height: 23.8px;'><span style='color: #e03e2d; font-size: 16px; line-height: 27.2px;'><em><strong>This code is only valid for 3 minutes!</strong></em></span></span></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id='u_content_heading_2' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 55px 10px;font-family:'Montserrat',sans-serif;' align='left'>
                
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
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px 60px;font-family:'Montserrat',sans-serif;' align='left'>
                
          <div style='color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;'>
            <p style='font-size: 14px; line-height: 170%;'>Please contact us by replying to this email; we are always happy to assist!</p>
        <p style='font-size: 14px; line-height: 170%;'>&nbsp;</p>
        <p style='font-size: 14px; line-height: 170%;'>Cheers,</p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id='u_content_image_5' style='font-family:'Montserrat',sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px 10px 20px;font-family:'Montserrat',sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
          <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
              
              <img align='center' border='0' src='images/image-5.png' alt=' title=' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 32%;max-width: 185.6px;' width='185.6' class='v-src-width v-src-max-width'/>
              
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
            <p style='font-size: 14px; line-height: 180%;'>Pamantasan ng Lungsod ng Valenzuela</p>
        <p style='font-size: 14px; line-height: 180%;'>Valenzuela City, Philippines</p>
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
                  <img src='images/image-1.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
                </a>
              </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            <!--[if (mso)|(IE)]><td width='32' style='width:32px; padding-right: 0px;' valign='top'><![endif]-->
            <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px'>
              <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                <a href='https://twitter.com/PLVLibrary' title='Twitter' target='_blank'>
                  <img src='images/image-2.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
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
            echo "200";
        }
        else{
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }
        

?>