<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/connexionCSS.css">
    <link rel="stylesheet" href="../css/styleUser.css">
    <script src="../js/C_script.js"></script>

</head>
<body>
    <?php include('init.php'); ?>
    <!-- Formulaire de connexion -->
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="display-4 py-2 text-truncate">Connexion</h1>
                        <div class="px-2">
                            <form id="login" action="" method="POST" class="justify-content-center">
                                <div class="form-group">
                                    <label for="identifiant" class="sr-only">Identifiant : </label>
                                    <input type="text" class="form-control" name="identifiant"  id="identifiant" placeholder="Identifiant" required />
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Mot de passe : </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="mot de passe" required />
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg" value="login" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('F_Connexion.php');
        if (isset($_POST['login'])) {
            test_id();
        }
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

