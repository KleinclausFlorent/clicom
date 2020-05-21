
<?php

    define('USER', "root");
    define('PASSWD', "");
    define('SERVER',"localhost");
    define('BASE', "commande");

    function connect_bd(){
        $dsn = "mysql:dbname=".BASE.";host=".SERVER;
        try {
            $connexion=new PDO($dsn,USER,PASSWD);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            printf("Echec de la connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }

    function test_id()
    {
        $connexion = connect_bd();
        if (isset($_POST['login'])) {
            try {
                $sql = "SELECT PASSWORD FROM utilisateur WHERE NOM_UTIL=:id";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':id', $_POST["identifiant"]);
                $stmt->execute();
                if (password_verify($_POST["password"], $stmt->fetch()[0]) == 1) {
                    $_SESSION['id'] = $_POST["identifiant"];
                    setcookie("id", $_POST["identifiant"]);
                    header('Location: Consultation.php');
                    $stmt->closeCursor();
                } else {
                    echo('Identifiant ou mot de pass incorrecte');
                    $stmt->closeCursor();
                }
            } catch (PDOException $e){
                echo "<p id=error>Echec de l'authentification : ". $e->getMessage()."</p>";
            }

        }
    }

?>
	