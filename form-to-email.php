<?php
$name = $_POST['nom'];
$prenom= $_POST['prenom'];
$email_visiteur = $_POST['email'];
$message = $_POST['message'];

$email_from = 'form@epsi-grenoble.fr';
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user".$name."\n"."Here is the message:\n".$message;

$to = "w.turner@mailoo.org";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email_visiteur \r\n";
mail($to,$email_subject,$email_body,$headers);
?>