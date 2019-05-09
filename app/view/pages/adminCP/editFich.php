<div class="row mb-4 text-center">
    <?php
    require_once LIBS."Fiche.php";
    $Fiche = new Fiche();
    $Fiche->showFiches();
    while($info = $Fiche->stmt->fetch(PDO::FETCH_ASSOC)){
        ?>

        <div class="col-4">
            <div class="card">
                <h3 class="card-header primary-color white-text"><?=$info['name']?></h3>
                <div class="card-body">
                    <p class="card-text"><?=$info['text']?></p>
                    <a class="btn btn-primary" href="?page=editFich&rid=<?=$info['id']?>">Remove</a>
                </div>
            </div>
        </div>

    <?php }?>

</div>
