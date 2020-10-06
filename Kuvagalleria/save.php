<?php
include "lib/ImageResize.php";
use \Gumlet\ImageResize;
?>

<?php require_once "inc/top.php"; ?>

<?php
if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
   if ($_FILES["file"]["size"] > 0) {
      $type = $_FILES["file"]["type"];
      if ($type === "image/png" || $type === "image/jpg" || $type === "image/jpeg") {
         $file = basename($_FILES["file"]["name"]);
         $folder = "uploads/";
         if (move_uploaded_file($_FILES["file"]["tmp_name"], "$folder$file")) {
            try {
               $image = new ImageResize("$folder$file");
               $image -> resizeToWidth(150);
               $image -> save($folder . "thumbs/" . $file);
               print "<p>Kuva on tallennettu palvelimelle!</p>";
            } catch (Exception $ex) {
               print "<p>Kuvan tallennuksessa tapahtui virhe!" . $ex -> getMessage() . "</p>";
            }
         } else {
            print "<p>Kuvan tallennuksessa tapahtui virhe!</p>";
         }
      } else {
         print "<p>Voit ladata vain png- ja jpg-kuvia!</p>";
      }
   } else {
      print "<p>Tiedoston koko on 0!</p>";
   }
} else {
   print "<p>Virhe kuvan lataamisessa! Virhekoodi: " . $_FILES["file"]["error"] . "</p>";
   // virhekoodit selityksineen: https://www.php.net/manual/en/features.file-upload.errors.php
}
?>

<a href="index.php">Selaa kuvia</a>

<?php require_once "inc/bottom.php"; ?>