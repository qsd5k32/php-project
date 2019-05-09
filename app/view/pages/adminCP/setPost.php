<!-- Material form contact -->
<form method="post">
    <p class="h4 text-center mb-4">Submit Post</p>

    <!-- Material input text -->
    <div class="md-form">
        <i class="fa fa-flag prefix"></i>
        <input type="text" name="title" id="materialFormContactNameEx" class="form-control">
        <label for="materialFormContactNameEx">Post Title</label>
    </div>

    <textarea name="content" id="editor"></textarea>
    <div class="text-center mt-4">
        <input class="btn btn-outline-secondary" name="submit" type="submit" value="POST">
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