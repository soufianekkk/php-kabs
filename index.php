<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'includes/head.inc.html';?>
</head>
<body>
    <header>
        <?php include 'includes/header.inc.html';?>
    </header>
   
    <div class="row">

         <div class="col-3 p-5 ">
            <nav>
                <button type="button" class="btn btn-light border-dark w-100 ">Home</button>
            </nav>
        </div>
    
        <div class="col-9 p-5">
                <section>
                     <button type="button" class="btn btn-primary px-5 ">Ajouter des donées</button>
                     <form>
                         <?php include 'includes/form.inc.html';?>
                     </form>
                    
                </section>
        </div>

        

    </div>
    <footer>
        <?php include 'includes/footer.inc.html'; ?>
    </footer>
</body>
</html>