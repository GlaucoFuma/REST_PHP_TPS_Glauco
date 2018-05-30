<?php

function getListaEsercenti(){
    //require della connessione
    $dbc = require __DIR__ . ' /../database/db.php';

    //query
    $query = "SELECT * FROM `amministratore`";

    $result = $dbc->query($query);

    $i = 0;
    while ($riga = $result->fetch_assoc()) {
        $riga['esercizi'] = array();
        $result_esercizi = $dbc->query("SELECT `paese` FROM `esercizio` WHERE `id_amministratore` = " . $riga['id_amministratore']);
        while ($riga_esercizi = $result_esercizi->fetch_assoc()) {
            array_push($riga['esercizi'], $riga_esercizi['paese']);
        }
        $output[$i] = $riga;
        $i += 1;
    }

    $dbc->close();

    //return del risultato
    return ($output);
}

function getDashboard(){
    $dbc = require __DIR__ . ' /../database/db.php';
    $datetime = new DateTime();
    $week = $datetime->format('W');

//imposto come intervallo le ultime due settimane

    $week_start = $week - 2;
    $datetime->setISODate(intval($datetime->format('Y')), $week_start);
    $data_start = $datetime->format('Y-m-d');

//$anni = date_diff(date_create($data_start), date_create('today'));

    $result = $dbc->query("SELECT questionario.id_questionario, questionario.nome as 'nomequestionario', amministratore.nome as 'nomeesercente' FROM questionario, amministratore WHERE questionario.id_amministratore = amministratore.id_amministratore ORDER BY questionario.id_questionario DESC;");
    if ($result) {
        $output = array();
        while ($riga = $result->fetch_assoc()) {
            $questionario['id_questionario'] = $riga['id_questionario'];
            $questionario['nome'] = $riga['nomequestionario'];
            $questionario['esercente'] = $riga['nomeesercente'];
            array_push($output, $questionario);
        }
    }
    return $output;
}

function postAggiungiEsercente(){
    $dbc = require __DIR__ . "/../database/db.php";

    $jsonObject = json_decode($_POST['esercente']);

    $email = $jsonObject->{'email'};
    $password = $jsonObject->{'password'};
    $nome = ($jsonObject->{'nome'});


    $q = ("INSERT INTO amministratore (email, password, nome, lettura, scrittura, data) VALUES ( '$email', '$password', '$nome', 1, 0, CURDATE())");
    if ($dbc->query($q) === TRUE) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $q . "<br>" . $dbc->error;
    }

    $dbc->close();
}

function postAggiungiCodiceSconto(){
    $dbc = require __DIR__ . "/../database/db.php";

    if (!empty($_POST['sconto'])) {
        $jsonObject = json_decode($_POST['sconto']);
        for($i = 0; $i < count($jsonObject); $i++) {
            $codice_sconto = $jsonObject[$i]->{'codice'};
            $valore = $jsonObject[$i]->{'valore'};
            $punti_richiesti = $jsonObject[$i]->{'punti'};

        $statement = $dbc->prepare("INSERT INTO codice_sconto (codice_sconto, valore, punti_richiesti, id_utente) VALUES (?, ?, ?, null)");
        $statement->bind_param("sii", $codice_sconto, $valore, $punti_richiesti);
            $statement->execute();

            echo "Aggiunto";
        }
        $statement->close();
    }
}

function postAggiungiImmagine(){
    if ( 0 < $_FILES['file']['error'] )
    {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else
    {
        move_uploaded_file($_FILES['file']['tmp_name'], '/var/uploads/' . $_FILES['file']['name']);
        //str replace
    }
}

?>