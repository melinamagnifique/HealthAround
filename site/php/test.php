






<?php

session_start();


//Code de Jean T
// 1. Récupérer les données brutes
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G10A");
    $data = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G10A'); 
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    //echo "Raw Data:<br />";
    //echo("$data");

    $bdd = new PDO('mysql:host=localhost;dbname=healtharound;charset=utf8', 'root', '');
    $stmt = $bdd->query('DELETE FROM montant');
    $stmt -> execute();

// 2. Les mettres sous forme de tableau (1 ligne = 1 trame d'un capteur)
    $data_tab = str_split($data,33);
    //echo "<br /><br />Tabular Data:<br />";
    for($i=0, $size=count($data_tab)-1;$i<$size;$i++){
        "\ntrame $i: " . changeFormat($data_tab[$i]."<br>");
    }

    $bdd = new PDO('mysql:host=localhost;dbname=healtharound;charset=utf8', 'root', '');
    $stmt = $bdd->query('SELECT id, mesure, date FROM montant');
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<table style="width: 100%;">';
    echo '<tr><th style="background-color: gray;">ID</th><th style="background-color: gray;">Mesure</th><th style="background-color: light gray;">Date</th></tr>';
    
    foreach ($data as $row) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['mesure'] . '</td>';
      echo '<td>' . $row['date'] . '</td>';
      echo '</tr>';
    }
    
    echo '</table>';


// 3. Décoder 1 trame
    // Rappel du format (sans les espaces): T OOOO R C NN VVVV AAAA XX YYYY MM DD HH mm ss
    // T : type de trame, a priori toujours 1 ?
    // OOOO : num ro de l'objet, ie num ro de la carte qui a envoy  les donn es (1 carte peut avoir plusieurs capteurs) -> utiliser la fonction hexdec(OOOO)
    // R : type de requ te (ne sert à rien)
    // C : type de capteur - les types sont d finis dans le document d' lectronique eg 1 = distance mod le 1, 2 = distance mod l  2, 3 = humidit ...
    //     Attention, la valeur est donn e en ASCII, qu'il faut le convertir en Hexa... si j'ai 
    //bien compris on peut faire avec bin2hex(D)-30
    // NN : num ro du capteur (sur une carte, pour un type de capteur donn , le num ro doit  tre unique)
    // VVVV : la valeur remont e -> utiliser la fonction hexdec(VVVV)
    // AAAA : num ro de la trame (ne sert pas a priori, car on a un timestamp)
    // XX : un checksum (ne sert pas)
    // YYYY MM DD HH mm ss : timestamp
    

    function changeFormat ($dataRow) {
        $trame = $dataRow;
        //echo("<br /><br />$trame<br/>");
        // décodage avec des substring
        $trame_type = substr($trame,0,1);
        $object_num =  hexdec(substr($trame,1,4));
        //affichage en décimal
        //echo("$object_num $object_num ...<br />");
        
        // décodage avec sscanf
        // tout en chaine de caracteres
        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        //echo("test1");
        //echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec</br/>");
    
        // en typant les données (à vérifier avec Gilles...)
        //list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4x%1s%1s%2x%4x%4s%2s%4d%2d%2d%2d%2d%2d");

        //echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec");
        
        $infos = "type: $t, objet: $o, requête: $r, type de capteur: $c, numéro de capteur: $n, mesure: " . hexdec($v) .
        ", date: $day/$month/$year, $hour:$min:$sec <br>";
        $bdd = new PDO('mysql:host=localhost;dbname=healtharound;charset=utf8', 'root', '');
        

        $sql = "SELECT COUNT(*) AS nb_ACT FROM montant";
        $result = $bdd->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $nb_ACT = $row['nb_ACT'];
        
        // Récupération des données du formulaire
        $mesure=" $v[1]$v[2].$v[3]";
        $dateString = "$year:$month:$day $hour:$min:$sec";
        $timestamp = strtotime($dateString);
        $dateFormatted = date("Y-m-d H:i:s", $timestamp);
        $sql = "INSERT INTO montant (mesure, date) VALUES (?, ?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$mesure, $dateFormatted]);
        //$nb_ACT,".hexdec($v).",$day/$month/$year/$hour:$min:$sec
        //$stmt->bindParam(':name', $name);
        
        // Exécution de la requête
        
    
        // Préparation de la requête SQL
        //return $infos;

}
?>