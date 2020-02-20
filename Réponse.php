<?php

class Reponse{

 //RECUP
    public static function recupUser(){
        $db = new Database();
        foreach($db->query('SELECT * FROM Utilisateurs') as $ligne){
            $list=array(
                "Nom"=>$ligne["nom"],
                "Prenom"=>$ligne["prenom"],
                "Adresse"=>$ligne["adresse"],
                "Tel"=>$ligne["tel"],
                "MDP"=>$ligne["mdp"]
            );
            print_r($list);
            echo "<br/>";
        }
    }
    
    public static function recupRando(){
     $db = new Database();
     foreach($db->query('SELECT * FROM Randonnee') as $ligne){
        $list=array(
            "ID"=>$ligne["id"],
            "Nom"=>$ligne["nom"],
            "Date"=>$ligne["date"],
            "Lieu"=>$ligne["lieu"],
            "Nbmin"=>$ligne["Nbmin"],
            "Echeance"=>$ligne["dateE"],
            "Nbpart"=>$ligne["Nbpart"]
        );
        print_r($list);
        echo "<br/>";
    }
    }
}
?> 
