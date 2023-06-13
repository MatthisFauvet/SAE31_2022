<?=validation_errors(); ?>

<?php
echo "<h1> Intitulé : ".$sondage['titre']."</h1>";
echo "<h1> Createur : ".$sondage['createur']."</h1>";
echo "<h1> Lieu : ".$sondage['lieu']."</h1>";
echo "<h1> Descriptif : ".$sondage['descriptif']."</h1>";

foreach($data as $date){
    echo "<h2>  - ".$data.";<br></h2>";
}
?>