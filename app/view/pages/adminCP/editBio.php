<div class="row mb-4 text-center">
    <?php
    require_once LIBS."Biographie.php";
    $bio = new Biographie();
    $bio->showBio();
    while($info = $bio->stmt->fetch(PDO::FETCH_ASSOC)){
        ?>


        <!-- Grid column -->
        <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
            <div class="view overlay avatar">
                <img src="<?= $info['photo'] ?>" style="height:200px;" class=" z-depth-1 img-fluid w-100" alt="Sample avatar">
                <div class="mask flex-center waves-effect waves-light rgba-teal-strong "style="height:200px;">
                    <a class="white-text" href="?page=editBio&rid=<?= $info['id'] ?>"><i class="fa fa-times fa-lg"></i></a>
                </div>
            </div>
            <h5 class="font-weight-bold mt-4 mb-3"><?= $info['name'] ?></h5>
            <p class="grey-text"><?= $info['text'] ?></p>
            <hr>
        </div>

    <?php }?>

</div>
