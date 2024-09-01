<!--pagina de avans pentru In progres-->
<?php
include 'config.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);

if(count($_POST)>0) {

    //mysqli_query($conn,"UPDATE note set tip=4 WHERE id='" . $_GET['id'] . "'"); //modificam tipul notitei in 4
    
    $note->updateOne(
        ['_id' => $id],  //un array asociativ cu condiția de căutare, care specifică notița cu id-ul
        ['$set' => ['tip' => 4]] //un array asociativ cu modificările ce trebuie făcute în documentul găsit
      );
      //modificam tipul notitei in 4
    
    header('location:in_progres.php'); //ne intoarcem la pagina
    }
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--avans la terminat-->
<form action="" method="post">
    <div class="container">
        <div class="content">
            
            <h3 style="color: grey;">Sigur ai terminat?</h3>
            <div style="margin-top: 50px;">
                <input type="submit" name="submit" value="Da" class="btn">
                <a href="in_progres.php" class="btn">Nu</a>
            </div>
        </div>
    </div>
</form>
<!--avans la terminat-->

<?php include('footer.php'); ?>