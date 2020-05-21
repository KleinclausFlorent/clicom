<?php

include('F_Connexion.php');
include('CLIENT.php');

$client_array = array();

function afficheAll_Client(){
    $connexion = connect_bd();

    $sql="SELECT * from client";

    if(!$connexion->query($sql)){
        echo "PB d'accès aux clients";
    } else{
        echo '
												<div id="TabClient" class="table">
													<table>
													    <thead>
                                                            <tr>
                                                                <th>NCLI</th>
                                                                <th>NOM</th>
                                                                <th>ADRESSE</th>
                                                                <th>LOCALITE</th>
                                                                <th>CAT</th>
                                                                <th>COMPTE</th>
                                                            </tr>
                                                        </thead>';
        foreach ($connexion->query($sql) as $row){
            $mClient = array(
                        'Ncli' => $row['NCLI'],
                        'Nom' => $row['NOM'],
                        'Adresse' => $row['ADRESSE'],
                        'Localite' => $row['LOCALITE'],
                        'Cat' => $row['CAT'],
                        'Compte' => $row['COMPTE'],
                    );
            $client = new CLIENT;

            $client->hydrate($mClient);

            array_push($GLOBALS['client_array'],$client);
            echo '
														<tr>
															<td>' . $row['NCLI'] . '</td>
															<td>' . $row['NOM'] . '</td>
															<td>' . $row['ADRESSE'] . '</td>
															<td>' . $row['LOCALITE'] . '</td>
															<td>' . $row['CAT'] . '</td>
															<td>' . $row['COMPTE'] . '</td>
													  	</tr>';

        }
        echo '
                                                    </table>
                                                </div>';

        /*
         //Debug affiche tableau client
        foreach ($GLOBALS['client_array'] as $Client){
            //echo $Client;
            echo $Client->getNom();
        }
        */

    }
}

//Formulaire Recherche Client

function buildFormSeek_Client(){
    echo '
        <form method="post" action="" name="seekClient_form" id="SeekClient_form">
            <div id="NameSeekClient">
                    <label class="formLabel" for="SeekNameClient">Recherche Nom :</label>
                    <select id="SeekNameClient" name="Name[]" multiple >';
    foreach ($GLOBALS['client_array'] as $Client){
            $nom = $Client->getNom();
            echo '<option value='.$nom.'>'.$nom.'</option>';
    }

    echo '
                    </select>
            </div>';
    echo '
            <div id="LocSeekClient">
                    <label class="formLabel" for="SeekLocClient">Recherche Nom :</label>
                    <select id="SeekLocClient" name="Loc[]" multiple >';
    foreach ($GLOBALS['client_array'] as $Client){
            $loc = $Client->getLocalite();
            echo '<option value='.$loc.'>'.$loc.'</option>';
    }

    echo '
                    </select>
            </div>';

    echo '<div id="Fsubmit">
                    <input id="send" type="submit" value="Rechercher" >
            </div>
            </form>';
}

// Réponse formulaire de recherche

function getClientbyName($name){
    $return_array = array();
    foreach ($GLOBALS['client_array'] as $Client){
        if ($Client->getNom() == $name){
            array_push($return_array, $Client);
        }
    }
    return $return_array;
}

function getClientbyLoc($loc){
    $return_array = array();
    foreach ($GLOBALS['client_array'] as $Client){
        if ($Client->getLocalite() == $loc){
            array_push($return_array, $Client);
        }
    }
    return $return_array;
}

function Seek_Client(){
    $clientArray = array();
    if (isset($_POST['Name'])) {
        $names = $_POST['Name'];
        foreach ($names as $name){
            $newClients = getClientbyName($name);
            foreach ($newClients as $client){
                $foo = false;
                foreach ($clientArray as $arrayclient){
                    if ($arrayclient->equals($client)){
                        $foo = true;
                    }
                }
                if (!$foo){
                    array_push($clientArray,$client);
                }
            }
        }
    }
    if (isset($_POST['Loc'])) {
        $locs = $_POST['Loc'];
        foreach ($locs as $loc){
            $newClients = getClientbyLoc($loc);
            foreach ($newClients as $client){
                $foo = false;
                foreach ($clientArray as $arrayclient){
                    if ($arrayclient->equals($client)){
                        $foo = true;
                    }
                }
                if (!$foo){
                    array_push($clientArray,$client);
                }
            }
        }
    }

    if (empty($clientArray)){
        echo "Aucun client correspondant à cette recherche";
    } else{
            echo '
												<div id="TabSeekClient" class="table">
													<table>
														<tr>
															<th>NCLI</th>
															<th>NOM</th>
															<th>ADRESSE</th>
															<th>LOCALITE</th>
															<th>CAT</th>
															<th>COMPTE</th>
														</tr>';

            foreach ($clientArray as $Client){
                echo '
														<tr>
															<td>' . $Client->getNcli() . '</td>
															<td>' . $Client->getNom() . '</td>
															<td>' . $Client->getAdresse() . '</td>
															<td>' . $Client->getLocalite() . '</td>
															<td>' . $Client->getCat() . '</td>
															<td>' . $Client->getCompte() . '</td>
													  	</tr>';
            }
        echo '
                                                    </table>
                                                </div>';
    }
}


function ajout_client(){
    $connexion = connect_bd();
    if (isset($_POST['add'])) {

    $sql = "INSERT INTO Client(NCLI,NOM,ADRESSE,LOCALITE,CAT,COMPTE)VALUES(:Ncli,:Nom,:Adr,:Loc,:Cat,:cpt)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':Ncli', $_POST["Add_NCLI"]);
    $stmt->bindParam(':Nom', $_POST["Add_NOM"]);
    $stmt->bindParam(':Adr', $_POST["Add_Adresse"]);
    $stmt->bindParam(':Loc', $_POST["Add_Localite"]);
    if (!isset($_POST["Add_Cat"])){
        $cat= '';
        $stmt->bindParam(':cpt', $cat );
    } else {

        $stmt->bindParam(':Cat', $_POST["Add_Cat"]);
    }
    $stmt->bindParam(':cpt', $_POST["Add_Compte"]);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été ajouté.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de l'ajout : ". $e->getMessage()."</p>";
    }
        $stmt->closeCursor();
    }



}

function buildform_Delete(){
    echo '
        <form method="post" action="" name="DeleteClient_form" id="DeleteClient_form">
            <div id="NcliDeleteClient">
                    <label class="formLabel" for="DeleteNcliClient">Recherche Ncli :</label>
                    <select id="DeleteNcliClient" name="Ncli[]" multiple >';
    foreach ($GLOBALS['client_array'] as $Client){
        $ncli = $Client->getNcli();
        echo '<option value='.$ncli.'>'.$ncli.'</option>';
    }

    echo '
                    </select>
            </div>';

    echo '<div id="Fsubmit">
                    <input id="send" type="submit" value="Supprimer" >
            </div>
            </form>';
}


function delete_Clients(){
    if (isset($_POST["Ncli"])){
        $Ncli_array =  $_POST["Ncli"];
        foreach ($Ncli_array as $ncli){
            delete_Client($ncli);
        }
    }





}


function delete_Client($ncli){
    $connexion = connect_bd();
    $sql = "DELETE FROM CLIENT WHERE NCLI=:ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été supprimé.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la suppression : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}

function buildupdateform_Client(){
    echo '
        <form method="post" action="" name="UpdateClient_form" id="UpdateClient_form">
            <div id="NcliUpdateClient">
                    <label class="formLabel" for="UpadteNcliClient">Recherche Ncli :</label>
                    <select id="UpadteNcliClient" name="UpdNcli" required>';
    foreach ($GLOBALS['client_array'] as $Client){
        $ncli = $Client->getNcli();
        echo '<option value='.$ncli.'>'.$ncli.'</option>';
    }

    echo '
                    </select>
            </div>';
    echo '
            <div>
                    <label for="upd_NOM">Nom : </label><input type="text" name="upd_NOM"/>
                    <label for="upd_Adresse">Adresse : </label><input type="text" name="upd_Adresse"/>
                    <label for="upd_Localite">Localite : </label><input type="text" name="upd_Localite"/>
                    <label for="upd_Cat">Catégorie : </label><input type="text" name="upd_Cat"/>
                    <label for="upd_Compte">Compte : </label><input type="text" name="upd_Compte"/>
                    <input type="submit" value="Update" name="upd" />
                </div>
            </form>
    ';
}

function update_Client(){
    $ncli = $_POST['UpdNcli'];
    if ((isset($_POST['upd_NOM']))&& ($_POST['upd_NOM'] != "")){
        update_Name($ncli, $_POST['upd_NOM']);
    }
    if ((isset($_POST['upd_Adresse'])) && ($_POST['upd_Adresse'] != "")){
        update_Adresse($ncli, $_POST['upd_Adresse']);
    }
    if ((isset($_POST['upd_Localite'])) && ($_POST['upd_Localite'] != "")){
        update_Localite($ncli, $_POST['upd_Localite']);
    }
    if ((isset($_POST['upd_Cat'])) && ($_POST['upd_Cat'] != "")){
        update_Cat($ncli, $_POST['upd_Cat']);
    }
    if ((isset($_POST['upd_Compte'])) && ($_POST['upd_Compte'] != "")){
        update_Compte($ncli, $_POST['upd_Compte']);
    }
}

function update_Name($ncli, $name){
    $connexion = connect_bd();
    $sql = "UPDATE CLIENT SET NOM = :Nom WHERE NCLI = :ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    $stmt->bindParam(':Nom', $name);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été maj.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la maj : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}

function update_Adresse($ncli, $adr){
    $connexion = connect_bd();
    $sql = "UPDATE CLIENT SET ADRESSE = :adr WHERE NCLI = :ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    $stmt->bindParam(':adr', $adr);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été maj.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la maj : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}

function update_Localite($ncli, $loc){
    $connexion = connect_bd();
    $sql = "UPDATE CLIENT SET LOCALITE = :loc WHERE NCLI = :ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    $stmt->bindParam(':loc', $loc);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été maj.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la maj : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}

function update_Cat($ncli, $cat){
    $connexion = connect_bd();
    $sql = "UPDATE CLIENT SET CAT = :cat WHERE NCLI = :ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    $stmt->bindParam(':cat', $cat);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été maj.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la maj : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}

function update_Compte($ncli, $cpt){
    $connexion = connect_bd();
    $sql = "UPDATE CLIENT SET COMPTE = :cpt WHERE NCLI = :ncli";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ncli', $ncli);
    $stmt->bindParam(':cpt', $cpt);
    try {
        $stmt->execute();
        echo("<p id=goodnews>Le client a bien été maj.</p>");
    }
    catch (PDOException $e){
        echo "<p id=error>Echec de la maj : ". $e->getMessage()."</p>";
    }
    $stmt->closeCursor();
}