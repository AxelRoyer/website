<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Axel ROYER</title>
        <link rel="stylesheet" href="./style/CV.css" />
    </head>
    <body>
        <header>
            <div id="center">
                <h1><a href="./index.html">Axel ROYER</a></h1>               
                <nav>
                    <ul>
                        <li>
                            <a href="./index.html">Home</a>
                        </li>
                        <li>
                            <a href="./cv.html">Profile</a>
                        </li>
                        <li>
                            <a href="./projects.html">Projects</a>
                        </li>
                        <li>
                            <a href="./contact.php">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="contact">

<?php
//first time on this page (no message send)

if($_POST['submit'] !== '1'){
    echo "
            <p>Get in touch !</p>
            <form method='post' action='contact.php' id='contact-form'>
                <input name='submit' type='hidden' value='1'/>
                <input name='name' type='text' placeholder='Name'/>
                <input name='email' type='text' placeholder='Email'/>
                <input name='subject' type='text' placeholder='subject'/>                
                <textarea name='mail_text' rows='8' placeholder='Message' requierd></textarea>
                <p>
                    <label><input type='radio' name='mail_bot' value='oui' checked='checked' /> I'm a robot</label>
                    <label><input type='radio' name='mail_bot' value='non' />Hell no, I'm human!</label>
                </p>
                <button id='send'>Send</button>
            </form>
        </section>";
}
else{
    if ($_POST['mail_bot'] === "non"){
        $destinataire = 'aroyerb@gmail.com';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sujet = $_POST['subject'];
        $message = $_POST['mail_text'];
        $messageToSend = "Nom : ".$name."\r\nEmail : ".$email."\r\nMessage : ".$message;
        mail($destinataire, $sujet, $messageToSend);
        echo "<p>Email send!</p><p>I will contact you shortly !</p>";
    }
    else {
        echo "
            <p>Get in touch !</p>
            <form method='post' action='contact.php' id='contact-form'>
                <input name='submit' type='hidden' value='1'/>";?>
                <input name='name' type='text' placeholder='Name' value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>"/>
                <input name='email' type='text' placeholder='Email'value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>"/>
                <input name='subject' type='text' placeholder='subject' value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : '';?>"/>              
                <textarea name='mail_text' rows='8' placeholder='Message' requierd><?php echo isset($_POST['mail_text']) ? $_POST['mail_text'] : '';?></textarea>
        <?php
        echo"        
                <p>Are you really a robot ? I don't like robots :(</p>
                <p>
                    <label><input type='radio' name='mail_bot' value='oui' checked='checked' /> I'm a robot</label>
                    <label><input type='radio' name='mail_bot' value='non' />Hell no, I'm human!</label>
                </p>
                <button id='send'>Send</button>
            </form>
        </section>";
    }
}
?>
    </body>
</html>