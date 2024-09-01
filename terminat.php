<!--pagina Terminat-->
<?php
include 'config.php';

$id_util=$_SESSION['id'];
//$sql="SELECT note.id, note.denumire, note.continut FROM note WHERE note.utilizator=$id_util AND note.tip=4 "; 
//$result= mysqli_query($conn,$sql);



$data = array( 
   "tip" => 4,
   "utilizator" => $id_util
   );
$cauta_insemnari = $note->find($data);
//selectam din tabela note id-ul, denumirea si continutul
//selectam doar notele pentru utilizatorul cu id-ul din sesiunea curenta ce au tipul 4
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<?php
$count = iterator_count($cauta_insemnari);
if($count > 0){ //daca s-au gasit notite conform specificatiilor

?>

<!--numarul notelor terminate-->
<div class="container">
   <div class="content">
      <h1>Terminate: <?php echo $count ?></h1>
   </div>
</div>
<!--numarul notelor terminate-->

<?php
}else{ //daca nu s-au gasit
?>

<!--mesaj-->
<div class="notite" style="padding: 20px;">
    <div class="wrap">
      <div class="container">
         <div class="content">
            <h3 style="color: lightgrey;">Inca nu ai terminat nimic</h3>
         </div>
      </div>
    </div>
</div>
<!--mesaj-->

<?php    
}
?>

<?php include('footer.php'); ?>