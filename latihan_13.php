<link rel='stylesheet' href='style.css' />
<link rel='stylesheet' href='bootstrap.min.css' />
<h1>File Exist Check</h1>
<div class='block_foto'>
  <img src='Universal Logo 3.jpg' alt='LOGO' class='foto rounded-circle' />
  <p>JONATAN</p>
</div>
<?php
$file = 'foto.jpg';
echo '$file = ' . $file;

$ada = file_exists($file) ? 'ada' : 'tidak ada';
echo "<br>Status: $ada";
echo "<hr>";

$file = 'data.csv';
echo '$file = ' . $file;

$ada = file_exists($file) ? 'ada' : 'tidak ada';
echo "<br>Status: $ada";
?>