<!--pagina de modificare pentru De facut-->
<?php
include 'config.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);

if(count($_POST)>0) {
    //mysqli_query($conn,"UPDATE note set denumire='" . $_POST['denumire'] . "', continut='" . $_POST['continut'] . "' WHERE id='" . $_GET['id'] . "'");

    $denumire = $_POST['denumire'];
    $continut = $_POST['continut'];

    $note->updateOne(
      ['_id' => $id],  //un array asociativ cu condiția de căutare, care specifică notița cu id-ul
      ['$set' => ['denumire' => $denumire, 'continut' => $continut]] //un array asociativ cu modificările ce trebuie făcute în documentul găsit
    );

    header('location:de_facut.php'); //revenim la pagina anterioara
    }
   
    //$result = mysqli_query($conn,"SELECT * FROM note WHERE id=$id");
    //$row= mysqli_fetch_array($result);

    $data = array( 
      "_id" => $id
      );

  $cauta = $note->findOne($data);
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<!--modificare-->
   <div class="form-container" style="background: white;">
    <form action="" method="post">
      <input type="text" name="denumire" required value="<?php echo $cauta['denumire'] ?>">
      <textarea type="textarea" name="continut" required placeholder="Scrie..." style="height: 400px;"><?php echo $cauta['continut'] ?></textarea>
      <input type="submit" name="submit" value="OK" class="form-btn">
    </form>
   </div>
<!--modificare-->

<?php include('footer.php'); ?>