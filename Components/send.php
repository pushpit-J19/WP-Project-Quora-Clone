<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>

    <style>
        * {
            box-sizing: border-box;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input[type=text], input[type=email], select, textarea {
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type=submit] {
            transition: ease-in 0.1s;
            padding: 10px;
            color: Black;
            font-weight: bold;
            cursor: pointer;
            transition: ease-in-out 0.1s;
            width: 30%;
        }

        input[type=submit]:hover {
            transition: ease-in-out 0.1s;
            cursor: pointer;
            background-color: cyan;
        }

    </style>

</head>
<body>
<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p id="alert" style="font-size: 18px">If you liked our website, leave us a message! (Or Just Say Hi ;))</p>
  </div>
  <div class="row">
      <form action="send.php" method="POST">
        <label for="s_name">Name</label>
        <input type="text" id="s_name" name="s_name" placeholder="Your Name..">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email..">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Subject..">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit" id="send" name="send">
      </form>
  </div>
  </div>

  <?php

    $sender_name = '';
    $sender_email = '';
    $sender_subject = '';
    $sender_message = '';

    if(isset($_POST['send'])){
        $sender_name = $_POST['s_name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];
    
        
    require '../PHPMailer/PHPMailerAutoload.php';
    require 'credentials.php';
    
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL_SENDER;                 // SMTP username
    $mail->Password = PASSWORD_SENDER;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL_SENDER, $sender_name);
    $mail->addAddress(EMAILID, $sender_name);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo(EMAIL_SENDER, 'Quora Clone Contact');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $sender_subject;
    $mail->Body    = '<div style="background-color:cyan; padding:10px">'.$sender_message.'</div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo '<script>alert("Message could not be sent.");</script>';
    } else {
        echo '<script>document.querySelector("#alert").innerHTML="Message has been sent, Have a good day!";</script>';
    }
    //header('location:login.php');
}
   ?>

</body>
</html>