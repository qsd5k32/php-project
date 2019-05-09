<form class="md-form" method="post" enctype="multipart/form-data">
    <h2>Upload events files</h2>
    <div class="md-form">
        <i class="fa fa-files-o prefix"></i>
        <input type="text" name="album" id="inputIconEx1" class="form-control">
        <label for="inputIconEx1">Album name</label>
    </div>
    <div class="file-field mt-2">
        <div class="btn btn-primary btn-sm float-left">
            <span>Choose files</span>
            <input type="file" name="files[]" multiple>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload one or more files">
        </div>

    </div>
    <div class="md-form">
        <i class="fa fa-pencil prefix"></i>
        <textarea type="text" name="text" id="text" class="form-control md-textarea" rows="3"></textarea>
        <label for="text">text</label>
    </div>
    <div class="md-form text-center" >
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </div>
</form>
