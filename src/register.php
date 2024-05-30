<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Créér un compte</h1>

    <form action="index.php" method="post">
        <label for="name">Prénom</label>
        <input type="text" placeholder="Prénom" id="name" name="name" required><br><br>
        
        <label for="nom">Nom</label>
        <input type="text" placeholder="Nom" id="nom" name="nom" required><br><br>

        <label for="username">Nom d'utilisateur</label>
        <input type="text" placeholder="Saisir un nom d'utilisateur" id="username" name="utilisateur" required><br><br>
        
        <label for="mail_contact">E-mail</label>
        <input type="email" placeholder="Entrez votre e-mail" id="mail_contact" name="mail_contact" required><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre Mot de passe" id="password" name="password" required>&ensp;&ensp;
        <input type="submit" value="Se connecter" name="login">
    </form>

        <a href="index.php">Retour</a>

</body>
</html>
