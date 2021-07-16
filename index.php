<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'includes/head.inc.html';?>
</head>
<body>
    <header>
        <?php include 'includes/header.inc.html';?>
    </header>
    <div class="container">

        <div class="row">

        
            <nav class="col-sm-3 my-2">
               <a href="index.php"type="button" class="btn btn-light border-dark btn-block  ">Home</a> 

                <?php
                //Vérifier si la session n'est pas vide  pour affichage du ul
                if(!empty($_SESSION)) {
                   include 'includes/ul.inc.html';
                   $table=$_SESSION['table'];
               }?>

            </nav> 
            <section class=" col-sm-9 my-2">
                
                <?php 
                //Vérifier si il y'a add dans url et include formulaire
                    if(isset($_GET ["add"]))  {
                        include 'includes/form.inc.html';
                    }
                //Déclarations de variable et placement dans tableau 
                    elseif (isset($_POST["envoyer"])) {
                      $prénom= $_POST["Prenom"] ;
                      $nom= $_POST["Nom"];
                      $age= $_POST["Age"];
                      $taille= $_POST["taille"];
                      $situations=$_POST["situations"];
                      $table = array(
                          "Prénom" => $prénom,
                          "Nom"=> $nom,
                          "age"=> $age,
                          "taille"=> $taille,
                          "situations"=> $situations,

                      );
                      $_SESSION['table']=$table;

                      echo "<h1>Données sauvegardées</h1>" ;
                    }
                    //Vérifie si il y'a del sur url alors suprrimé session
                    elseif(isset($_GET['del'])){
                        unset($_SESSION['table']);
                        echo "<h1>Les données ont bien été supprimées</h1>";
                    }
                    //Vérifie si il y'a debugging sur url alors afficher contenue du tableau 
                    elseif(isset($_GET['debugging'])){
                        echo "<h2>Débogage</h2> <br> <p> ===> Lecture du tableau à l'aide de la fonction print_r()";
                        
                        print "<pre>";
                        print_r($table);
                        print "</pre>";
                    }

                    //Vérifie si il y'a concatenation sur url alors affiche les differente options
                    elseif (isset($_GET['concatenation'])) {
                        echo "<h2>Concatenation</h2> <br> <p> ===> Construction d'une phrase avec le contenu du tableau :";
                        echo "<h3>" .$table['Prénom']. " " .$table['Nom']. "</h3>";

                        echo "<p>" . " " . $table['age'] . " " . "ans," . " " . "je mesure" ." " . $table['taille'] . "m" . " " . "et je sui en formation chez simplon". "</p>";
                        
                        echo " <br> <p> ===> Construction d'une phrase après MAJ du tableau :";

                        echo "<h3>" .$table['Prénom']. " " .strtoupper($table['Nom']). "</h3>";

                        echo "<p>" . " " . $table['age'] . " " . "ans," . " " . "je mesure" ." " . $table['taille'] . "m" . " " . "et je sui en formation chez simplon". "</p>";

                        echo " <br> <p> ===> Affichage d'une virgule à la place du point pour la taille :";
                        $table['taille']= str_replace(".",",", $table['taille']);

                        echo "<h3>" .$table['Prénom']. " " .strtoupper($table['Nom']). "</h3>";

                        echo "<p>" . " " . $table['age'] . " " . "ans," . " " . "je mesure" ." " . $table['taille'] . "m" . " " . "et je sui en formation chez simplon". "</p>";

                    }
                    //Créer une boucle avec le forech
                    elseif (isset($_GET['boucle'])) {
                        echo "<h2>Boucle</h2> <br> <p> ===> Lecture du tableau à l'aide d'une boucle foreach</p> ";
                        
                        foreach ($table as $key => $valeur) {
                            $i=0;
                            echo 'à la ligne n°' . $i++ . " " .  'correspond la clé "' . " " .  $key . " " . '" et contient "' . " " . $valeur . '"<br>';
                        }

                    }
                    //Inserer le foreach dans une fonctions read table (déclarer et appeler a fonction)
                    elseif (isset($_GET['function'])) {
                        echo "<h2>Fonction</h2> <br> <p> ===> J'utilise ma fonction readTable() </p> ";
                       
                        function readTable($table){

                       
                    foreach ($table as $key => $valeur) {
                            $i=0;
                            echo 'à la ligne n°' . $i++ . " " .  'correspond la clé "' . " " .  $key . " " . '" et contient "' . " " . $valeur . '"<br>';
                        }
                    }
                    readTable($table);

                    }
                    //Sinon afficher bouton ajouter des donner 
                    else{
                        echo '<a href="index.php?add">

                        <button type="button"  class="btn btn-primary  ">Ajouter des données</button>
                        </a>';
                    } 
                    ?>

                </section>
        </div>
    </div>
    <footer>
        <?php include 'includes/footer.inc.html'; ?>
    </footer>
</body>
</html>