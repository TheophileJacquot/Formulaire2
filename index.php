<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style.css">

    <title>Formulaire d'inscription</title>
</head>

<body>
    <div class="container">
        <div class="formulaire">

            <?php
            if (isset($_POST['name'])) {
                echo "Bienvenue ";
                echo $_POST['name'];
            }
            if (isset($_POST['email'])) {
                echo "Votre email est  ";
                echo $_POST['email'];
            }
            if (isset($_POST['password'])) {
                echo "Votre mot de passe est ";
                echo $_POST['password'];
            }
            ?>

            <h2>Sign up</h2>
            
            <form action="index.php" method="post">
            
            <div class="nom">
                <input class="name" type="text" name="name" placeholder="Name">
            </div>

            <div class="mail">
                <input class="email" type="email" name="email" required placeholder="Email">
            </div>

            <div class="mdp">
                <input class="password" type="password" name="password" required placeholder="Password">
            </div>

                <input class="button" type="submit" value="Create Account">


                <?php
                if (isset($_POST['name'], $_POST['email'], $_POST['password'],)) {
                    // On commence par récupérer les champs
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // on se connecte à la base de données
                try {
                    // il faudra sûrement changer quelques infos pour vous
                    $bdd = new PDO("mysql:host=localhost;dbname=formulaire;", "root", "root");
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

                // insérer une nouvelle ligne
                // si vous devez écrire une variable, écrivez-la précédée de deux points
                // par exemple
                $query = "INSERT INTO utilisateurs( name, email, password) VALUES(:name, :email, :password)";

                // préparation de la requête et exécution
                $q = $bdd->prepare($query);
                $q->bindParam(":name", $name);
                $q->bindParam(":email", $email);
                $q->bindParam(":password", $password);
                $q->execute();
                }
                ?>

            </form>
        </div>

    </div>
</body>

</html>