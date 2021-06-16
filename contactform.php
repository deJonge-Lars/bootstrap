<?php
/*
 *  CONFIGURE EVERYTHING HERE ???
 */

// Where the email comes from
$from = $_POST['email'];

// Mailing to the email adress
$sendTo = 'info@larsdejonge.nl';

// Subject of the email
$subject = $_POST['subject'];

// form field names and their translations. ??
// array variable name => Text to appear in the email ??
$fields = array('name' => 'Naam', 'phone' => 'Mobiele Nummer', 'email' => 'Email', 'message' => 'Bericht'); 

// Message that will be displayed when everything worked.
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, error message will display.
$errorMessage = 'There was an error while submitting the form. Please try again later';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0); // Ok I understand this
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');
            
    $emailText = "Nieuw contactformulier is ingevuld op je portfolio website\n\n=============================\n\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}    
    header("Location: index.html");

// if requested by AJAX request return JSON response
/* if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
} */
?>