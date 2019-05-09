<div class="container p-4">
    <h1 class="text-center mt-5">Evenemets</h1>
    <div class="row mb-4 mt-2">

<?php

$event = new Events();
$album = $_GET['album'] ?? 0;
if (!$album):
    $event->fetchEvents();
    while ($ev = $event->stmt->fetch(PDO::FETCH_ASSOC)){
        $event->fetchImages($ev['album']);
        $img = $event->stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
       <div class="col-12 col-md-6 col-lg-4 col-xl-4">
           <!-- Card -->
           <div class="card">

               <!-- Card image -->
               <div class="view overlay">
                   <img class="card-img-top" src="<?= $img['image'] ?>" alt="Card image cap">
                   <a href="?album=<?= $ev['album']?>">
                       <div class="mask rgba-white-slight"></div>
                   </a>
               </div>

               <!-- Button -->
               <a class="btn-floating btn-action ml-auto mr-4 blue" href="?album=<?= $ev['album']?>"><i class="fa fa-chevron-right pl-1"></i></a>

               <!-- Card content -->
               <div class="card-body">

                   <!-- Title -->
                   <h4 class="card-title"><?= $ev['album'] ?></h4>
                   <hr>
                   <!-- Text -->
                   <p class="card-text"><?= $ev['text'] ?></p>

               </div>

               <!-- Card footer -->
               <div class="rounded-bottom blue lighten-1 text-center pt-3">
                       <p class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i><?= substr($ev['date'],0,11) ?></p>
               </div>

           </div>
           <!-- Card -->
       </div>

<?php }

else:
?>
        <div id="mdb-lightbox-ui"></div>
        <div class="mdb-lightbox">
<?php
    $event->fetchImages($album);
while ($img = $event->stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
    <figure class="col-16 col-md-2 col-lg-4 col-xl-4">
        <a href="<?= $img['image']?>" data-size="1600x1067" >
            <img src="<?= $img['image']?>" class="img-fluid z-depth-1" style="height: 300px">
        </a>
    </figure>

    <?php
}
endif;
?>
        </div>
    </div>

    </div>

