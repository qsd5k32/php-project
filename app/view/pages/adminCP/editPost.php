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
            <a href="?page=editPost&id=<?= $post['id'] ?>"
               class="list-group-item list-group-item-action waves-effect"><?= $post['title'] ?><i class="fa fa-pencil-square-o float-right fa-2x" aria-hidden="true"></i></a>
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
                <li class="page-item"><a class="page-link" href="?page=editPost&pg=<?= $page ?>"><?= $page ?></a></li>
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
else:
$post = $blogger->showPost($postId);
?>
<form method="post">
    <p class="h4 text-center mb-4">Update Post</p>

    <!-- Material input text -->
    <div class="md-form">
        <i class="fa fa-flag prefix"></i>
        <input type="text" name="title" value="<?= $post['title'] ?>" id="materialFormContactNameEx" class="form-control">
        <label for="materialFormContactNameEx">Post Title</label>
    </div>

    <textarea name="content" id="editor" ><?= $post['content'] ?></textarea>
    <div class="text-center mt-4">
        <input class="btn btn-outline-secondary" name="update" type="submit" value="Update">
    </div>
</form>
<!-- Material form contact -->
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>

<?php endif; ?>

