<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $message = htmlspecialchars($_POST["message"]);

    $destinataire = "l.song@ecole-ipssi.net";

    $contenu = "Nouveau message depuis votre portfolio\n\n";
    $contenu .= "Nom : $nom\n";
    $contenu .= "Email : $email\n\n";
    $contenu .= "Message :\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($destinataire, $sujet, $contenu, $headers)) {
        echo "<script>
                alert('Votre message a bien été envoyé !');
                window.location.href='index.html';
              </script>";
    } else {
        echo "<script>
                alert('Une erreur est survenue lors de l’envoi.');
                history.back();
              </script>";
    }

} else {
    header("Location: index.html");
    exit();
}

?>