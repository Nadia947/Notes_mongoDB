<!--pagina de avansare pentru De facut-->
<?php
include 'config.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);

if(count($_POST)>0) {

    //mysqli_query($conn,"UPDATE note set tip=3 WHERE id='" . $_GET['id'] . "'"); 
    
    $note->updateOne(
        ['_id' => $id],  //un array asociativ cu condiția de căutare, care specifică notița cu id-ul
        ['$set' => ['tip' => 3]] //un array asociativ cu modificările ce trebuie făcute în documentul găsit
      );
      //modificam tipul notitei in 3

    header('location:de_facut.php'); //ne intoarcem la pagina
    }
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--avanseaza la in progres-->
<form action="" method="post">
    <div class="container">
        <div class="content">
            
            <h3 style="color: grey;">Sigur vrei sa avansezi?</h3>
            <div style="margin-top: 50px;">
                <input type="submit" name="submit" value="Da" class="btn">
                <a href="de_facut.php" class="btn">Inapoi</a>
            </div>
        </div>
    </div>
</form>
<!--avanseaza la in progres-->

<?php include('footer.php'); ?>