<?php
requireAll([

    LIBS ."Blogger",
    LIBS ."pagination"

]);
$pagination = new Pagination();
$blogger = new Blogger();
$pages = $pagination->pagesNumber($blogger->countPosts(),10);
$postId = $_GET['id'] ?? false;
$postId = intval($postId);
if(!$postId):
    ?>

    <div class="list-group">
        <a href="#" class="list-group-item active">
            Titles
        </a>
        <?php
        $pg = $_GET['pg'] ?? 1;
        $pg = intval($pg);
        if (!is_int($pg)) header('Location: 404.php');
        $blogger->showPosts($pagination->limit((int)$pg, 10));
        while ($post = $blogger->stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <a href="?page=removePost&id=<?= $post['id'] ?>"
               class="list-group-item list-group-item-action waves-effect"><?= $post['title'] ?><i class="fa fa-times float-right fa-2x" aria-hidden="true"></i></a>
            <?php
        }

        ?>
    </div>

    <nav aria-label="pagination example">
        <ul class="pagination pagination-lg">
            <!--Arrow left-->
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php foreach (range(1, $pages) as $page): ?>
                <li class="page-item"><a class="page-link" href="?page=removePost&pg=<?= $page ?>"><?= $page ?></a></li>
            <?php endforeach; ?>


            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

<?php
endif; ?>

