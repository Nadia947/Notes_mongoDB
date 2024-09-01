<!--pagina de adaugare notite pentru Insemnari-->
<?php
include 'config.php';

if(isset($_POST['submit'])){

    $denumire = $_POST['denumire'];
    $continut = $_POST['continut'];
    $id_utilizator=$_SESSION['id'];
 
          //$insert = "INSERT INTO note(denumire, continut, tip, utilizator) VALUES('$denumire', '$continut', '1', '$id_utilizator')";
          //mysqli_query($conn, $insert);

          //cream un array care contine informatiile inregistrarii
          $data = array( 
            "denumire" => $denumire,
            "continut" => $continut,
            "tip" => 1,
            "utilizator" => $id_utilizator
            );
            //inseram informatiile in MongoDB, colectia utilizatori
            $inserare = $note->insertOne($data);

          header('location:insemnari.php'); //revenim la pagina anterioara
}
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--adaugare-->
   <div class="form-container" style="background: white;">
    <form action="" method="post">
      <input type="text" name="denumire" required placeholder="Denumire">
      <textarea type="textarea" name="continut" required placeholder="Scrie..." style="height: 400px;"></textarea>
      <input type="submit" name="submit" value="OK" class="form-btn">
    </form>
   </div>
<!--adaugare-->

<?php include('footer.php'); ?>