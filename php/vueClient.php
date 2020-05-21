<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Clients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleUser.css" id="stylesheet">
    <link rel="stylesheet" href="../css/stylerManagerClient.css">
    <script src="../js/Set-css_script.js"></script>
</head>
<body>
    <?php include("managerClient.php"); ?>
    <h1>Clients</h1>
    <p><a href="Consultation.php">Accèder aux menu</a></p>
    <div id="admin" class="admin">
        <h2 class="display-4 py-2 text-center">Tableau Clients</h2>
            <div class="container ">
                <?php afficheAll_Client(); ?>
            </div>
        <h2>Recherche Client</h2>
            <?php buildFormSeek_Client(); ?>
            <?php
                if ( (isset($_POST['Name'])) || (isset($_POST['Loc']))){
                    Seek_Client();
                }
            ?>


            <h2>Ajout Client</h2>
            <form id="Ajout" action="" method="post" id="addClient">
                <div>
                    <label for="Add_NCLI">NCLI : </label><input type="text" name="Add_NCLI" required/>
                    <label for="Add_NOM">Nom : </label><input type="text" name="Add_NOM" required/>
                    <label for="Add_Adresse">Adresse : </label><input type="text" name="Add_Adresse"required/>
                    <label for="Add_Localite">Localite : </label><input type="text" name="Add_Localite"required/>
                    <label for="Add_Cat">Catégorie : </label><input type="text" name="Add_Cat"/>
                    <label for="Add_Compte">Compte : </label><input type="text" name="Add_Compte" required/>
                    <input type="submit" value="Ajout" name="add" />
                </div>
            </form>
            <?php
                if (isset($_POST['add'])) {
                    ajout_client();
                }
            ?>

            <h2>Suppression Client</h2>
            <?php
                buildform_Delete();
            ?>
            <?php
                if (isset($_POST['Ncli'])) {
                    delete_Clients();
                }
            ?>

            <h2>Update Client</h2>
            <?php
                buildupdateform_Client();
            ?>

            <?php
            if (isset($_POST['UpdNcli'])) {
                update_Client();
            }
            ?>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>