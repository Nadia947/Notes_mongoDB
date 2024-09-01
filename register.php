<!--pagina de inregistrare-->
<?php
include 'config.php';

if(isset($_POST['submit'])){

   $nume = $_POST['nume'];
   $parola = $_POST['parola'];

   //cream un array care contine informatiile inregistrarii
   $data = array( 
      "nume" => $nume,
      "parola" => $parola,
      "poza" => "nu_are"
      );

   //cautam informatiile in MongoDB, colectia utilizatori
   $cauta = $utilizatori->findOne($data);

   if($cauta){ //daca s-a gasit un utilizator cu acelasi nume si parola

      $error[] = 'Utilizatorul exista deja!';

   }else{
         //inseram informatiile in MongoDB, colectia utilizatori
         $insert1 = $utilizatori->insertOne($data);
         header('location:login.php'); //trecem la pagina de autentificare   
   }
}
?>

<?php include('header.php'); ?>

<!--inregistrare-->
<div class="form-container">
   <form action="" method="post">
      <h3>Inregistrare</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="nume" required placeholder="Introdu numele tau">
      <input type="password" name="parola" required placeholder="Introdu o parola">
      <input type="submit" name="submit" value="OK" class="form-btn">
      <p>Ai deja un cont? <a href="login.php">Autentifica-te</a></p>
      <br>
      <img src="img_mongo.jpg" alt="" style="width: 95px;">
   </form>
</div>
<!--inregistrare-->

<?php include('footer.php'); ?>