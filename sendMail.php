<?php
require("assets/sendgridMail/sendgrid-php.php");
//It will work only on php version 5.6 (works on epizy server)
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
//$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
$sendgrid = new \SendGrid("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");
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>