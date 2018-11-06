<?php

    // Get the form fields, removes html tags and whitespace.
    $nome = strip_tags(trim($_POST["nome"]));
    $nome = str_replace(array("\r","\n"),array(" "," "),$nome);
    $sobrenome = strip_tags(trim($_POST["sobrenome"]));
    $sobrenome = str_replace(array("\r","\n"),array(" "," "),$sobrenome);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $ddd = strip_tags(trim($_POST["ddd"]));
    $ddd = str_replace(array("\r","\n"),array(" "," "),$ddd);
    $telefone = strip_tags(trim($_POST["telefone"]));
    $telefone = str_replace(array("\r","\n"),array(" "," "),$telefone);
    // Check the data.
    if (empty($nome) OR empty($sobrenome) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.jonascampelo.com/index.php?success=-1#contato");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "marcosalmeidapro@gmail.com";

    // Set the email subject.
    $subject = "SOLICITAÇÃO de Reunião $nome $sobrenome";

    // Build the email content.
    $email_content = "Nome: $nome\n";
    $email_content .= "Sobrenome: $sobrenome\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Telefone:\n($ddd) $telefone";

    // Build the email headers.
    $email_headers = "DE: $nome <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://www.jonascampelo.com/index.php?success=1#contato");

?>