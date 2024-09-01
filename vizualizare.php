<!--pagina de vizualizare notita-->
<?php
include 'config.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);

    //$result = mysqli_query($conn,"SELECT * FROM note WHERE id=$id");
    //$row= mysqli_fetch_array($result);

    $data = array( 
        "_id" => $id
        );
  
    $cauta = $note->findOne($data);

    $tip=$cauta['tip'];
    
if(count($_POST)>0) {
    if($tip==1){
    header('location:insemnari.php'); //revenim la pagina anterioara
    }
    if($tip==2){
        header('location:de_facut.php'); //revenim la pagina anterioara
    }
    if($tip==3){
        header('location:in_progres.php'); //revenim la pagina anterioara
    }
    }

?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--modificare-->
   <div class="form-container" style="background: white;">
    <form action="" method="post">
        <h1 style="padding: 10px; text-align:left; padding-top: 20px;"><?php echo $cauta['denumire'] ?></h1>
        <pre style="height: 350px; padding:10px; text-align:left; padding-top:10px;"><?php echo $cauta['continut'] ?></pre>
      <input type="submit" name="submit" value="Inapoi" class="form-btn">
    </form>
   </div>
<!--modificare-->

<?php include('footer.php'); ?>