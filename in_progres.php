<!--pagina In progres-->
<?php
include 'config.php';

$id_util=$_SESSION['id'];
//$sql="SELECT note.id, note.denumire, note.continut FROM note WHERE note.utilizator=$id_util AND note.tip=3 "; 
//luam din tabel notitele utilizatorului cu id-ul din sesiunea curenta a caror tip e 3
//$result= mysqli_query($conn,$sql);

//luam din tabel notitele utilizatorului cu id-ul din sesiunea curenta a caror tip e 3
$data = array( 
    "tip" => 3,
    "utilizator" => $id_util
    );

$total_insemnari = $note->find($data);     
$cauta_insemnari = $note->find($data);
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<div class="notite" style="padding: 20px;">
    <div class="wrap">

        <?php
        $count = iterator_count($total_insemnari);
        if($count > 0){ //daca s-au gasit notite conform specificatiilor
        foreach($cauta_insemnari as $rezultat) //le afisam pe toate
        {
                $string=substr((string) $rezultat['continut'], 0, 237); //luam doar o parte din continut pentru afisare
        ?>

            <div class="card">
                <div style="padding: 15px;">
                    <h4><?php echo (string) $rezultat['denumire']?></h4>
                </div>
                <div class="corp">
                    <a href="vizualizare.php?id=<?php echo (string) $rezultat['_id']?>" style="color:black"><p><?php echo $string;?> ...</p></a>
                </div>
                <div style="padding: 10px;">
                    <a href="avans1.php?id=<?php echo (string) $rezultat['_id']?>" class="avans">Avans</a>
                </div>
            </div>
            
            <?php
        }
        }else{ //daca nu s-au gasit
        ?>

        <div class="container">
            <div class="content">
            <h3 style="color: lightgrey;">Inca nu ai nimic in progres</h3>
            </div>
        </div>

        <?php    
        }
        ?>

    </div>
</div>

<?php include('footer.php'); ?>