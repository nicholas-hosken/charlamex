<?php // Initialize variables to null.
$name =""; // Sender Name
$email =""; // Sender's email ID
$purpose =""; // Subject of mail
$message =""; // Sender's Message
$nameError ="";
$emailError ="";
$purposeError ="";
$messageError ="";
$successMessage =""; // On submittingform below function will execute.
if(isset($_POST['submit'])) { // Checking null values in message.
if (empty($_POST["name"])){
$nameError = "Name is required";
}
else
 {
$name = test_input($_POST["name"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameError = "Only letters and white space allowed";
}
} // Checking null values inthe message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values inmessage.
if (empty($_POST["purpose"]))
{
$purposeError = "Purpose is required";
}
else
{
$purpose = test_input($_POST["purpose"]);
} // Checking null values inmessage.
if (empty($_POST["message"]))
{
$messageError = "Message is required";
}
else
 {
$message = test_input($_POST["message"]);
} // Checking null values inthe message.
if( !($name=='') && !($email=='') && !($purpose=='') &&!($message=='') )
{ // Checking valid email.
if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{
$header= $name."<". $email .">";
$headers = "FormGet.com"; /* Let's prepare the message for the e-mail */
$msg = "Hello! $name Thank you...! For Contacting Us.
Name: $name
E-mail: $email
Purpose: $purpose
Message: $message
This is a Contact Confirmation mail. We Will contact You as soon as possible.";
$msg1 = " $name Contacted Us. Hereis some information about $name.
Name: $name
E-mail: $email
Purpose: $purpose
Message: $message "; /* Send the message using mail() function */
if(mail($email, $headers, $msg ) && mail("nicholas.hosken@yahoo.com", $header, $msg1 ))
{
$successMessage = "Message sent successfully.......";
}
}
else
{ $emailError = "Invalid Email";
 }
 }
} // Function for filtering input values.
function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>
