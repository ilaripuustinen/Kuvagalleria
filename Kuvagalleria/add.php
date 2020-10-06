<?php require_once 'inc/top.php';?>

<form action="save.php" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="file">Tiedosto</label>
    <input type="file" class="form-control" id="file" name="file">
    <button class="btn btn-primary">Lataa</button>
</div>
</form>

<?php require_once 'inc/bottom.php';?>