<?php

class Item{

 //INSERT
    public static function insertUser($nom,$prenom,$mel,$adresse,$tel,$mdp){
        $db = new Database();
        $mdp= md5($mdp);
        $sth=$db->prepare('INSERT INTO Utilisateurs (nom,prenom,mel,adresse,tel,mdp) VALUES (:nom,:prenom,:mel,:adresse,:tel,:mdp)');
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':mel',$mel);
        $sth->bindParam(':adresse',$adresse);
        $sth->bindParam(':tel',$tel);
        $sth->bindParam(':mdp',$mdp);
        $test = $sth->execute();
    }
     
    public static function insertRando($nom,$date,$lieu,$Nbmin,$dateE){
        $db = new Database();
        $sth=$db->prepare('INSERT INTO Randonnee (nom,date,lieu,Nbmin,dateE,Nbpart) VALUES (:nom,:date,:lieu,:Nbmin,:dateE,:Nbpart)');
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':date',$date);
        $sth->bindParam(':lieu',$lieu);
        $sth->bindParam(':Nbmin',$Nbmin);
        $sth->bindParam(':dateE',$dateE);
        $sth->bindParam(':Nbpart',$Nbpart);
        $test = $sth->execute();
    }

 //IDENTIFICATION
    public static function identification($mel,$mdp){
        $db = new Database();
        $resultat = 0;
        $mdp = md5($mdp);
        $sql= "SELECT * FROM Utilisateurs WHERE mel='$mel' AND mdp='$mdp'";
        foreach($db->query($sql) as $ligne){
            $list=array(
                "Nom"=>$ligne["nom"],
                "Prenom"=>$ligne["prenom"],
                "Mail"=>$ligne["mel"],
                "Adresse"=>$ligne["adresse"],
                "Tel"=>$ligne["tel"],
                "MDP"=>$ligne["mdp"]
            );
            $resultat++;
            print_r($list);
            echo "<br/>";
        }
        if ($resultat==0){
            echo ("Erreur");
        }
    }
 //PARTICIPATION
    public static function participer($nom){
        $db = new Database();
        $sql= "UPDATE Randonnee SET Nbpart = Nbpart + 1 WHERE nom ='$nom'";
        $db->query($sql);
    }
}
?> 