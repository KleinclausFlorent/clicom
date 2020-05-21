<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Clients</title>
    <link rel="stylesheet" href="../css/styleUser.css" id="stylesheet">
    <script src="../js/Set-css_script.js"></script>
</head>
<body>
    <?php include("managerClient.php"); ?>
    <h1>Clients</h1>
    <p><a href="Consultation.php">Accèder aux menu</a></p>
    <div id="admin" class="admin">
        <h2>Tableau Clients</h2>
            <?php afficheAll_Client(); ?>

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
</body>