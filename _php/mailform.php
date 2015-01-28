<?php

$name = stripslashes($_POST['naam'])."\r\n";
$message = stripslashes($_POST['message'])."\r\n";
$email = stripslashes($_POST['email'])."\r\n";
$adres = stripslashes($_POST['adres'])."\r\n";
$check = stripslashes($_POST['check'])."\r\n"; // must be empty

$subject = "Lannoo Paper Products Online";
$host = "info@lannoopaperproducts.be";

$body = <<<EOD

$message\r\n
Name: $name
Email: $email
Adress: $adres

EOD;

$headers = "From: $email\r\n";

if(isset($_POST['url']) && $_POST['url'] == ''){
     // then send the form to your email
	$mail_status = mail($host, $subject, $body, $headers);
} 





if ($mail_status) { ?>
    <script language="javascript" type="text/javascript">
        alert('Thank you for your email, we have received your message and will reply within the next few days.');
        window.location = 'http://www.lannoopaperproducts.be';
    </script>
<?php
}
else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed, please try again or email info@lannoopaperproducts.be');
        window.location = 'http://www.lannoopaperproducts.be';
    </script>
<?php
}
?>