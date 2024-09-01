<!--pagina Insemnari-->
<?php
include 'config.php';

$id=$_SESSION['id'];

//luam din tabel notitele utilizatorului cu id-ul din sesiunea curenta a caror tip e 1
$data = array( 
    "tip" => 1,
    "utilizator" => $id
    );

$total_insemnari = $note->find($data);   
$cauta_insemnari = $note->find($data);
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<div class="notite" style="padding: 20px;">
    <a href="add_note.php" class="adaugare">Adauga nota</a>
    <div class="wrap">

        <?php
        $count = iterator_count($total_insemnari);
        if($count > 0){ //daca s-au gasit notite conform specificatiilor
        foreach($cauta_insemnari as $rezultat) //le afisam pe toate
        {
                $string=substr((string) $rezultat['continut'], 0, 237); //luam doar o parte din continut pentru afisare 
        ?>

            <div class="card">
                <form action="update_note.php" method="get">
                <div style="padding: 15px;">
                    <h4><?php echo (string) $rezultat['denumire'];?></h4>
                </div>
                <div class="corp" style="padding:5px">
                    <a href="vizualizare.php?id=<?php echo (string) $rezultat['_id'];?>" style="color:black"><p><?php echo $string;?> ...</p></a>
                </div>
                <div style="padding: 10px;">
                    <a href="update_note.php?id=<?php echo (string) $rezultat['_id']?>" class="modifica">Modifica</a>
                    <a href="sterge_nota.php?id=<?php echo (string) $rezultat['_id']?>" class="sterge">Sterge</a>
                </div>
                </form>
            </div>

        <?php
        }
        }else{ //daca nu s-au gasit
        ?>

        <div class="container">
            <div class="content">
            <h3 style="color: lightgrey;">Inca nu ai creat o nota</h3>
            </div>
        </div>

        <?php    
        }
        ?>

    </div>
</div>

<?php include('footer.php'); ?>