<div class="row mb-4">
<?php
require_once LIBS . "Events.php";
$event = new Events();
$album = $_GET['album'] ?? 0;
if (!$album):
$event->fetchEvents();
while ($ev = $event->stmt->fetch(PDO::FETCH_ASSOC)){
    ?>

    <div class="col-4 mb-4">
        <div class="card card-cascade">

            <!-- Card image -->
            <div class="view gradient-card-header blue-gradient">

                <!-- Title -->
                <h2 class="card-header-title mb-3"><?= $ev['album'] ?></h2>

            </div>

            <!-- Card content -->
            <div class="card-body text-center">

                <!-- Text -->
                <p class="card-text"><?= $ev['text']?></p>

                <hr>

                <!-- Twitter -->
                <a class="btn btn-primary" href="?page=editEvent&album=<?= $ev['album'] ?>">Edit</a>
                <a class="btn btn-primary" href="?page=editEvent&erid=<?= $ev['album'] ?>">remove</a>

            </div>

        </div>
    </div>

    <?php
}
else:
$event->fetchImages($album);
?>
    <div class="col-12">
        <form class="md-form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="file-field col-8">
                    <div class="btn btn-blue btn-sm float-left">
                        <span>Choose files</span>
                        <input type="file" name="files[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>

                </div>
                <div class="md-form text-center col-4 mt-0" >
                    <input type="submit" value="add" name="add" class="btn btn-blue btn-sm">
                </div>
            </div>

        </form>
    </div>
<?php
while ($img = $event->stmt2->fetch(PDO::FETCH_ASSOC)){

?>
    <div class="col-3">
        <div class="view overlay zoom">
            <img src="<?= $img['image'] ?>" class="img-fluid" alt="event image">
            <div class="mask flex-center waves-effect waves-light rgba-teal-strong">
                <a class="white-text" href="?page=editEvent&album=<?= $album ?>&rid=<?= $img['image'] ?>"><i class="fa fa-times fa-lg"></i></a>
            </div>
        </div>
    </div>
<?php
}

endif;
?>

