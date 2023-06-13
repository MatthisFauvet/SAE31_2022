<?=validation_errors(); ?>
<?php
    echo "<h1>".$array[0][0]['titre']."</h1>";
    echo "<h6>".$array[0][0]['descriptif']."</h6>";
    $cetteCle=$this->input->get('cle');
    echo "<a href=\"../reponses/rep?cle=".$cetteCle."<button type=\"button\">Répondre au sondage</button></a>";
    print_r('<br/>');
    print_r('<br/>');
    print_r('<br/>');
    
    foreach ($array[1] as $date){
        echo $date['date']." -> ".$date['votes'];
        print_r('<br/>');
    }


    $nomprecedent="";
    $prenomprecedent="";
    foreach($array[2] as $data){
        if ($prenomprecedent!=$data['Prenom'] or $nomprecedent!=$data['Nom']){
            print_r('<br/>');
            print_r('<br/>');
            print_r('<br/>');
            print_r('<br/>');
            echo "<u>".$data['Nom']." ".$data['Prenom']."</u>";
            $prenomprecedent=$data['Prenom'];
            $nomprecedent=$data['Nom'];
        }
        print_r('<br/>');
        print_r($data['dates']);
    }
?>
<br/><br/><br/><br/><br/><br/>
<div class='grid'>
    <?=anchor("/sondage/fermeture?cle=".$cetteCle,"Clore le sondage",['role'=>'button'])?>
    <?=anchor("/sondage/ouverture?cle=".$cetteCle,"Rouvrir le sondage",['role'=>'button'])?>
</div>
<br/>
<div class='grid'>
    <?=anchor('/consulter/profil',"Retourner au profil",['role'=>'button'])?>
</div>