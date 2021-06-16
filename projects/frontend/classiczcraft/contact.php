<?php
/* Zet E-mail */
$myemail  = "dejonge.lars@gmail.com";

/* Alle formulier inputs checken */
$email    = check_input($_POST['email']);
$comments = check_input($_POST['comments'], "Voer uw bericht in!");
$ip  	  = $_SERVER['REMOTE_ADDR'];
$name = check_input($_POST['name'], "Voer uw spelersnaam in!");

/* Als het e-mail adres niet aan de eisen voldoet, laat deze error zien. */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("Uw e-mailadres voldoet niet aan onze eisen.");
}

/* Opmaak het bericht dat naar $myemail gaat */
$message = "Beste Lars,

Het contact formulier is ingevuld! :

Spelers naam: $name
E-mail: $email

Het bericht:
$comments

Het bericht is verzonden vanaf het IP: $ip

Einde van het bericht.
";

/* extra header functie in mail */
$headers = "From: $name <$email>\n";

/* stuur de mail */
mail($myemail, $onderwerp, $message, $headers);

/* doorstuur naar bedankt pagina */
header('Location: index.html');
exit();

/* Functies die we gebruikt hebben */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <script type="text/javascript">
window.onload=function() {
function countdown() {
if ( typeof countdown.counter == 'undefined' ) {
    countdown.counter = 10; // initial count
    }
if(countdown.counter > 0) {
	document.getElementById('count').innerHTML = countdown.counter--;
    setTimeout(countdown, 1000);
    }
else {
    location.href = 'contact.html';
    }
}
countdown();
};
</script>
    <body>
		<center>
    		<b>Los alstublief het volgende probleem op:</b><br><br>
    		<b><?php echo $myError; ?></b><br><br>
			<a href="contact.html">Klik hier</a> om terug te gaan naar het contact formulier.<br>
            Of u kunt nog <b><span id="count"></span> seconden</b> wachten, dan word u automatisch teruggestuurd.
    	</center>
    </body>
    </html>
<?php
exit();
}
?>