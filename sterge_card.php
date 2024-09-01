<!--pagina de stergere pentru De facut-->
<?php
include 'config.php';

if(isset($_POST['submit']))
{
    //$result = "DELETE FROM note WHERE id=$id"; //stergem notita cu id-ul specific
    //mysqli_query($conn, $result);

    //luam data care trebuie sa se stearga
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $result = $note->deleteOne(['_id' => $id]);

    header('location:de_facut.php'); //revenim la pagina anterioara

}
?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--stergere-->
<div class="container">
  <div class="content">
    <form action="" method="post">
        <h3 style="color: grey;">Sigur vrei sa stergi notita?</h3>
        <div style="margin-top: 50px;">
            <a href="de_facut.php" class="btn">Nu</a>
            <input type="submit" name="submit" value="Da" class="btn" style="width: 90px;">
        </div>
    </form>
   </div>
</div>
<!--stergere-->

<?php include('footer.php'); ?>