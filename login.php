<!--pagina de logare-->
<?php
include 'config.php';

if(isset($_POST['submit'])){   //la apasarea butonului submit

   $nume = $_POST['nume'];
   $parola = $_POST['parola'];

      $data = array( 
      "nume" => $nume,
      "parola" => $parola
      );

      //cautam informatiile in MongoDB, colectia utilizatori
      $cauta = $utilizatori->findOne($data);

   if($cauta){

      //cream variabilele de sesiune
      $_SESSION['nume'] = $cauta['nume'];
      $_SESSION['id'] = (string) $cauta['_id'];
      //trecem la pagina de utilizator
      header('location:user_page.php'); 
     exit();
   }else{
      $error[] = 'Nume sau parola incorecta!';
   }

};
?>

<?php include('header.php'); ?>

<!--autentificare-->
<div class="form-container">
   <form action="" method="post">
      <h3>Autentificare</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="nume" required placeholder="Introdu numele">
      <input type="password" name="parola" required placeholder="Introdu parola">
      <input type="submit" name="submit" value="OK" class="form-btn">
      <p>nu ai cont? <a href="register.php">Inregistreaza-te</a></p>
      <br>
      <img src="img_mongo.jpg" alt="" style="width: 95px;">
   </form>
</div>
<!--autentificare-->

<?php include('footer.php'); ?>