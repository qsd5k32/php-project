<div class="container p-4">


    <section class="team-section text-center my-5">


        <h2 class="h1-responsive font-weight-bold my-5">Our amazing team</h2>

        <p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>


        <div class="row mb-4 text-center">
            <?php

            $bio = new Biographie();
            $bio->showBio();
            while($info = $bio->stmt->fetch(PDO::FETCH_ASSOC)){
                ?>

                <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <div class="avatar mx-auto">
                        <img src="<?= $info['photo'] ?>" style="width: 200px;height:200px;" class="rounded-circle z-depth-1" alt="Sample avatar">
                    </div>
                    <h5 class="font-weight-bold mt-4 mb-3"><?= $info['name'] ?></h5>
                    <p class="grey-text"><?= $info['text'] ?></p>
                    <hr>
                </div>

                <?php
            }
            ?>

        </div>



    </section>


</div>