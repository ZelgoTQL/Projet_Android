<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 require 'Item.php';
 require 'Reponse.php';
 require 'Database.php';
 
 if($_GET['valider']=="start"){
     Item::insertUser($_POST['nom'],$_POST['prenom'],$_POST['mel'],$_POST['adresse'],$_POST['tel'],$_POST['mdp']);
 }
 
 if($_GET['valider']=="go"){
     Item::insertRando($_POST['nom'],$_POST['date'],$_POST['lieu'],$_POST['Nbmin'],$_POST['dateE']);
 }
 
 if($_GET['valider']=="rep"){
     Reponse::recupUser();
 }
 
 if($_GET['valider']=="rep2"){
     Reponse::recupRando();
 }
 
 if($_GET['valider']=="ident"){
     Item::identification($_POST['mel'],$_POST['mdp']);
 }
 
 if($_GET['valider']=="part"){
     Item::participer($_POST['nom']);
 }
 ?>
 
 <h1>Création d'un compte utilisateur</h1>
 <form method="post" action="user.php?valider=start">
         <label>Nom : <input type="text" name="nom"/></label><br/>
         <label>Prenom : <input type="text" name="prenom"/></label><br/>
         <label>Mail : <input type="email" name="mel"/></label><br/>
         <label>Adresse : <input type="text" name="adresse"/></label><br/>
         <label>Telephone : <input type="text" name="tel"/></label><br/>
         <label>Mot de Passe : <input type="texte" name ="mdp"/></label><br/></br/>
         
         <input type="submit" value="Valider"/>
 </form>
 
 <h1>Création d'une randonée</h1>
 <form method="post" action="user.php?valider=go">
     <label>Nom :</label><input type="text" name="nom"/><br/>
     <label>Date :</label> <input type="date" name="date"/><br/>
     <label>Lieu :</label> <input type="text" name="lieu"/><br/>
     <label>Nb de participants minimum :</label> <input type="text" name="Nbmin"/><br/>
     <label>Date d'echeance :</label> <input type="date" name="dateE"/><br/>
     <label>Nb de participants :</label> <input type="text" name="Nbpart" value=0><br/>
     
     <input type="submit" value="Valider"/>
 </form>
 
 <h1>Identification</h1>
 <form method="post" action="user.php?valider=ident">
     <input type="email" name="mel" placeholder="Mail"/><br/>
     <input type="text" name="mdp" placeholder="Mot de Passe"/><br/>
     
     <input type="submit" value="Connection"/>
 </form>
 
 <h1>Participer à une randonnée</h1>
 <form method="post" action="user.php?valider=part">
     <input type="text" name="nom" placeholder="Nom Rando"/><br/>
     
     <input type="submit" value="Participer"/>
 </form>
 
 <h1>Récupérer Utilisateurs</h1>
 <form method="post" action="user.php?valider=rep">
     <input type="submit" value="Recuperer"/>
 </form>
 
 <h1>Récupérer Rando</h1>
 <form method="post" action="user.php?valider=rep2">
     <input type="submit" value="Recuperer"/>
 </form>
