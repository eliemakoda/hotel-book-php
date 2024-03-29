<?php
class App{
    public $host=  "localhost";
    public $database= "hotel"; //nom de votre base de données ici
    public $password= "";  // votre mot de passe utilisateur ici
    public $user= "root"; //votre nom d'utilisateur 
    public $lien_connexion;
    //connexion à la base de données
    public function __construct()
    {
        $this->connecter();
    }
    public function connecter()
    {
        $this->lien_connexion =  new PDO("mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8",$this->user,$this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        if(!$this->lien_connexion)
        {
            echo "erreur de connexion à la base de données";
        }
    }
    public function SelectionnerTout($requete)
    {
        $ligne= $this->lien_connexion->query($requete);
        $ligne->execute();
        $resultat= $ligne->fetchAll(PDO::FETCH_OBJ);
        if($resultat)
        {
            return $resultat;
        }else{
            return false ;
        }
    }
//lecture d'un élément de la base de données
    public function SelectionnerUn($requete)
    {
        $ligne= $this->lien_connexion->query($requete);
        $ligne->execute();
        $resultat= $ligne->fetch(PDO::FETCH_OBJ);
        if($resultat)
        {
            return $resultat;
        }else{
            return false ;
        }
    }
    public function inserer($requete, $tableau_donnee,$destination)
    {
        
            $insert= $this->lien_connexion->prepare($requete);
            $insert->execute($tableau_donnee);
            header("location: ".$destination."");
        
    } 

    //supprimer les éléments de la base de données
    public function supprimer($requete,$destination)
    {
            $sup= $this->lien_connexion->query($requete);
            $sup->execute();
            header("location: ".$destination."");
    } 

    public function maj($req,$destination)
    {
        $ligne= $this->lien_connexion->prepare($req);
        $ligne->execute();  
        header("location: ".$destination."");

    }
    public function se_connecter_admin($requete, $tableau_donnee,$destination){
        $tab=["email"=>$tableau_donnee["email"]];
        $connection_user=  $this->lien_connexion->prepare($requete);
        $connection_user->execute($tab);
        $resultat= $connection_user->fetch(PDO::FETCH_ASSOC);
        if($connection_user->rowCount()>0)
        {
            if(password_verify($tableau_donnee['password'],$resultat['password']))
            { 
                // id_client`, `nom_client`, `email_client`, `password`, `telephone`, `sexe`, `date_ajout
                //début des sessions
                session_start();
                $_SESSION['email_admin']= $resultat['email_admin'];
                $_SESSION['nom_admin']= $resultat['nom_admin'];
                $_SESSION['id_admin']= $resultat['id_admin'];
                $_SESSION['tel_admin']= $resultat['telephone'];
                $_SESSION['sexe']= $resultat['sexe'];
                $_SESSION['date_ajout']= $resultat['date_ajout'];
                header("location: ".$destination."");
            }else {
                echo "mauvais mot de passe";
            }
        }else{
            echo "aucune adresse mail correspondante";
        }
    }
    public function se_connecter_client($requete, $tableau_donnee,$destination){
        $tab=["email"=>$tableau_donnee["email"]];
        $connection_user=  $this->lien_connexion->prepare($requete);
        $connection_user->execute($tab);
        $resultat= $connection_user->fetch(PDO::FETCH_ASSOC);
        if($connection_user->rowCount()>0)
        {
            if(password_verify($tableau_donnee['password'],$resultat['password']))
            { 
                // id_client`, `nom_client`, `email_client`, `password`, `telephone`, `sexe`, `date_ajout
                //début des sessions
                session_start();
                $_SESSION['email_client']= $resultat['email_client'];
                $_SESSION['nom_client']= $resultat['nom_client'];
                $_SESSION['id_client']= $resultat['id_client'];
                $_SESSION['tel_client']= $resultat['telephone'];
                $_SESSION['sexe']= $resultat['sexe'];
                $_SESSION['date_ajout']= $resultat['date_ajout'];
                header("location: ".$destination."");
            }else {
                echo "mauvais mot de passe";
            }
        }else{
            echo "aucune adresse mail correspondante";
        }
    }
    public function debut_session()
    {
        session_start();
    }
    public function maj2($req)
    {
        $ligne= $this->lien_connexion->prepare($req);
        $ligne->execute();  
        // header("location: ".$destination."");

    }
}
?>
