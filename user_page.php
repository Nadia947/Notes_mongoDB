<!--pagina Contul meu-->
<?php
include 'config.php';
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--contul meu-->
<div class="container">
   <div class="content">
      <h1>Salut, <span style="color: rgb(26, 109, 40);"><?php echo $_SESSION['nume']; ?></span></h1>
      <p>Bine ai revenit!</p>
      <a href="logout.php" class="btn">Deconectare</a>
   </div>
</div>
<!--contul meu-->

<?php include('footer.php'); ?>