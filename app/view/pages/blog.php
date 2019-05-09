<?php
requireAll([
    CONFIG."ConnectDb",
    LIBS ."Blogger",
    LIBS ."pagination",

]);
$pagination = new Pagination();
$blogger = new Blogger();
$pages = $pagination->pagesNumber($blogger->countPosts(),10);
$postId = $_GET['id'] ?? false;
$postId = intval($postId);
if(!$postId):
    ?>

    <div class="container p-4 mt-5">

        <!-- Section: Blog v.3 -->
        <section class="my-5">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5">Blog</h2>
            <!-- Section description -->
            <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <?php
        $pg = $_GET['pg'] ?? 1;
        $pg = intval($pg);
        if (!is_int($pg)) header('Location: 404.php');
        $blogger->showPosts($pagination->limit((int)$pg, 10));
        while ($post = $blogger->stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-7 col-xl-8">

                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong><?= $post['title']?></strong></h3>
                    <!-- Excerpt -->
                    <p class="dark-grey-text"><?= strip_tags(substr($post['content'],0,200))."..."?></p>
                    <!-- Post data -->
                    <p class="grey-text"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= substr($post['date'],0,11) ?></p>
                    <!-- Read more button -->
                    <a class="btn btn-primary btn-md" href="?id=<?= $post['id']?>">Read more</a>

                </div>

            </div>
            <hr class="my-5">
            <?php
        }

        ?>
        </section>
        <!-- Section: Blog v.3 -->
    </div>

    <nav aria-label="pagination example" class="m-auto" style="width:fit-content">
        <ul class="pagination pagination-lg">
            <!--Arrow left-->
            <li class="page-item">
                <a class="page-link" href="?pg=<?= $pagination->previousPage($pg) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php foreach (range(1, $pages) as $page): ?>
                <li class="page-item"><a class="page-link" href="?pg=<?= $page ?>"><?= $page ?></a></li>
            <?php endforeach; ?>


            <li class="page-item">
                <a class="page-link" href="?pg=<?= $pagination->nextPage($pg,$pages) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

<?php
else:
    $post = $blogger->showPost($postId);
    if(!$post){
        header("Location:404");
        exit();
    }
    ?>
    <div class="container p-4 mt-4">

        <!-- Section: Blog v.4 -->
        <section class="my-5">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12">

                    <!-- Card -->
                    <div class="card card-cascade wider reverse">

                        <!-- Card content -->
                        <div class="card-body text-center">

                            <!-- Title -->
                            <h2 class="font-weight-bold"><a><?= $post['title'] ?></a></h2>
                            <!-- Data -->
                            <p><a><i class="fa fa-clock-o" aria-hidden="true"></i> <?= substr($post['date'],0,11) ?></p>

                        </div>
                        <!-- Card content -->

                    </div>
                    <!-- Card -->

                    <!-- Excerpt -->
                    <div class="mt-5">

                        <?= $post['content'] ?>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="mb-5 mt-4">

        </section>
        <!-- Section: Blog v.4 -->

    </div>


<?php endif; ?>

