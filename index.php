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
               <a href="index.php"
                    type="button" class="btn btn-light border-dark btn-block  ">Home
               </a>

               <?php
                if(!empty($_SESSION)) {
                   include 'includes/ul.inc.html';
                   $table=$_SESSION['table'];
               }?>

            </nav> 
            <section class=" col-sm-9 my-2">
                
                <?php 
                    if(isset($_GET ["add"]))  {
                        include 'includes/form.inc.html';
                    }
            
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
                    
                    elseif(isset($_GET['del'])){
                        unset($_SESSION['table']);
                        echo "<h1>Les données ont bien été supprimées</h1>";
                    }
                    
                    elseif(isset($_GET['debugging'])){
                        echo "<h2>Débogage</h2> <br> <p> ===> Lecture du tableau à l'aide de la fonction print_r()";
                        
                        print "<pre>";
                        print_r($table);
                        print "</pre>";
                    }

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
                    elseif (isset($_GET['boucle'])) {
                        echo "<h2>Boucle</h2> <br> <p> ===> Lecture du tableau à l'aide d'une boucle foreach</p> ";
                        
                        foreach ($table as $key => $valeur) {
                            $i=0;
                            echo 'à la ligne n°' . $i++ . " " .  'correspond la clé "' . " " .  $key . " " . '" et contient "' . " " . $valeur . '"<br>';
                        }

                    }
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