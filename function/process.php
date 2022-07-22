<?php

    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $surname = $_POST['surname'];
    $email = $_POST['firstname'];
    $permanentaddress = $_POST['permanentaddress'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $preferedestination = $_POST['preferedestination'];
    $citizenship = $_POST['citizenship'];
    $disability = $_POST['disability'];
    $travelwithspouse = $_POST['travelwithspouse'];
    $programinview = $_POST['programinview'];
    $country = $_POST['country'];
    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];
    $schoolname = $_POST['schoolname'];
    $mstatus = $_POST['mstatus'];
    $yearofgraduation = $_POST['yearofgraduation'];
    $certificate = $_POST['certificate'];
    $countryofstudy = $_POST['countryofstudy'];
    $intake = $_POST['intake'];
    $educationlevele = $_POST['course'];
    $tuitionbudget = $_POST['tuitionbudget'];
    $payment = $_POST['payment'];
    $undergraduate = $_POST['undergraduate'];
    $postgraduate = $_POST['postgraduate'];
    
    
    $message ="surname = ". $surname . "\r\n  firstname = " . $firstname . "\r\n permanentaddress =" . $permanentaddress . "\r\n  town = " . $town .
    "\r\n  country = " . $country . "\r\n  dob = " . $dob . "\r\n  email = " . $email . "\r\n  phone = " . $phone . "\r\n  gender = " . $gender .
    "\r\n  preferedestination = " . $preferedestination . "\r\n  citizenship = " . $citizenship . "\r\n  disability = " . $disability . 
    "\r\n  travelwithspouse = " . $travelwithspouse . "\r\n  programinview = " . $programinview"\r\n  country = " . $country . 
    "\r\n  datefrom = " . $datefrom . "\r\n  dateto = " . $dateto . "\r\n  schoolname = " . $schoolname . "\r\n  yearofgraduation = " . $yearofgraduation .
    "\r\n  certificate = " . $certificate . "\r\n  countryofstudy = " . $countryofstudy . "\r\n  intake = " . $intake . "\r\n  course = " . $course .
    "\r\n  tuitionbudget = " . $tuitionbudget . "\r\n  payment = " . $payment . "\r\n  undergraduate = " . $undergraduate .
    "\r\n  postgraduate = " . $postgraduate;
    
    $subject ="APPLICATION FORM";
    $fromname ="Great Adventure Int'l";
    $fromemail = 'testrun@greatadventureintl.com';  //if u dont have an email create one on your cpanel

    $mailto = 'rotimiariyo@gmail.com';  //the email which u want to recv this email




    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; // do what you want after sending the email
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
    
    ?>