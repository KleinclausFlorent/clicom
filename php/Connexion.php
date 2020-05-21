<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Kleinclaus Connexion</title>
    <link rel="stylesheet" href="../css/styleUser.css">
    <script src="../js/C_script.js"></script>

</head>
<body>
    <?php include('init.php'); ?>
    <!-- Formulaire de connexion -->
    <div id="corps">
        <h1>Portail de connexion</h1>
        <form id="login" action="" method="POST">
            <div>
                <p>
                    <label for="identifiant">Identifiant : </label>
                    <input type="text" name="identifiant"  id="identifiant" required />
                </p>
                <p>
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password" required />
                </p>
                <p><input type="submit" value="login" name="login" /></p>
            </div>
        </form>
    </div>
    <?php include('F_Connexion.php');
        if (isset($_POST['login'])) {
            test_id();
        }
    ?>
</body>
</html>

