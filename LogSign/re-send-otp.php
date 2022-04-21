<?php
    
    session_start();

    $_SESSION['code'] = "";
    $rndno = rand(100000, 999999);
    $_SESSION['code'] = $rndno;

    if ($_POST['action'] == 'call_this') {

        if ($_SESSION['state'] == 'number') {

            require('/xampp/htdocs/Valture/php-rest-api-master/autoload.php');

            $number = $_SESSION['number'];
            $trim_number = str_replace("0","+63", $number);
            $contact_no = (int)$trim_number;

            $messageBird = new \MessageBird\Client('LPoNhsP6lSfVpbnl4r2CyG9Uq'); // Set your own API access key here.

            $Message             = new \MessageBird\Objects\Message();
            $Message->originator = 'VALTURE';
            $Message->recipients = array($contact_no);
            $Message->body       = 'DO NOT SHARE THIS CODE TO ANYONE! THIS IS YOUR CODE '.$rndno;

            try {
                $messageResult = $messageBird->messages->create($Message);
                //var_dump($messageResult);
                echo "".$rndno."";
            } catch (\MessageBird\Exceptions\AuthenticateException $e) {
                // That means that your accessKey is unknown
                echo '404';
            } catch (\MessageBird\Exceptions\BalanceException $e) {
                // That means that you are out of credits, so do something about it.
                echo '500';
            } catch (\Exception $e) {
                echo $e->getMessage();
            
            }

        } else {
            echo "sendemail";
        }
    }


?>