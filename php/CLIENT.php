<?php


class CLIENT
{
    private $Ncli;

    private $Nom;

    private $Adresse;

    private $Localite;

    private $Cat;

    private $Compte;

    //getters
    public function getNcli(){
        return $this->Ncli;
    }
    public function getNom(){
        return $this->Nom;
    }
    public function getAdresse(){
        return $this->Adresse;
    }
    public function getLocalite(){
        return $this->Localite;
    }
    public function getCat(){
        return $this->Cat;
    }
    public function getCompte(){
        return $this->Compte;
    }

    //setters
    public function setNcli($num){
        $this->Ncli =$num;
    }
    public function setNom($nom){
        $this->Nom = $nom;
    }
    public function setAdresse($Adresse){
        $this->Adresse = $Adresse;
    }
    public function setLocalite( $Loc){
        $this->Localite = $Loc;
    }
    public function setCat( $cat){
        $this->Cat = $cat;
    }
    public function setCompte($cpt){
        $this->Compte=$cpt;
    }


    //Fonction d'affichage client
    public function __toString()
    {
        return 'client: Nclient='.$this->getNcli().', Nom='.$this->getNom().' ,
                        Adresse='.$this->getAdresse().', Localité='.$this->getLocalite().' ,
                        Cat='.$this->getCat().', compte='.$this->getCompte();

    }

    //fonction de comparaison
    public function equals(CLIENT $CLIENT){
        return ($this->getNcli() == $CLIENT->getNcli());
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /*
    //COnstructeur
    public function __construct($num, $nom, $adr, $loc, $cat, $cpt)
    {
        $this->Ncli = (string)$num;
        $this->Nom = (string)$nom;
        $this->Adresse = (string)$adr;
        $this->Localite = (string)$loc;
        $this->Cat = (string)$cat;
        $this->Compte = (int)$cpt;
    }

    //Destructeur
    public function __destruct()
    {
    }
    */

}