<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="bootstrap.min.css">
<?php
if (isset($_POST['btn_upload'])) {
  echo '<pre>';
  var_dump($_POST);
  var_dump($_FILES);
  echo '</pre>';

  move_uploaded_file($_FILES['profil']['tmp_name'], 'hasil_upload.jpg');
  echo "
  <div class='block_foto'>
    <img src='Universal Logo 3.jpg' alt='LOGO' class='foto rounded-circle' />
    <p>JONATAN</p>
  </div>
  <div class='alert alert-success'>Upload success</div>";
  exit;
}
?>

<style>
  .btn-block {
    width: 100%
  }
</style>

<div class="container">
  <h1>Upload File</h1>


  Syrat upload file :
  <ul>
    <li>HTML Form dengan method=post</li>
    <li>HTML Form dengan enctype=multipart/form-data</li>
    <li>input type = file</li>
    <li>input type = file with accept = ekstension</li>
  </ul>

  <form method=post enctype=multipart/form-data>
    <div class="form-group">
      <label for="profil">profil kamu:</label>
      <input class="form-control mt-1" type="file" name="profil" id="profil" accept=".jpg,.jpeg">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block mt-2" name=btn_upload>upload</button>
    </div>

  </form>
</div>