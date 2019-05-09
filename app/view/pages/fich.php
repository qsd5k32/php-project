<div class="container pt-5">
    <div class="row mt-5 mb-5 text-center">
        <?php
        require_once LIBS."Fiche.php";
        $Fiche = new Fiche();
        $Fiche->showFiches();
        while($info = $Fiche->stmt->fetch(PDO::FETCH_ASSOC)){
            ?>

            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card">
                    <h3 class="card-header primary-color white-text"><?=$info['name']?></h3>
                    <div class="card-body">
                        <p class="card-text"><?=$info['text']?></p>
                        <a class="btn btn-primary" href="<?=$info['url']?>">Download <i class="fa fa-download fa-lg"></i></a>
                    </div>
                </div>
            </div>

        <?php }?>

    </div>

</div>