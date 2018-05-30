<?php 
//-----------------------------------------Functions to define method behavior---------------------------------//
function get($uri){
    $headers = apache_request_headers();
    switch ($uri) {
        case '/':
        index();
        break;
        case '/qualcosa':
            getQualcosa($headers);

            break;
        case '/listaEsercenti':
            get_ListaEsercenti($headers);

            break;
        case '/segnalaBug':
            get_segnalaBug($headers);
            break;
        case '/dashboard':
            get_dashboard($headers);
            break;
        case '/aggiungiCodiceSconto':
            get_aggiungicodiceSconto($headers);
            break;
        case '/aggiungiEsercente':
            get_aggiungiEsercente($headers);
            break;
        case '/login':
            get_login($headers);
            break;
        default:
        notFound();
        break;
    }
}

function post($uri){
    $headers = apache_request_headers();
    switch ($uri) {
        case '/qualcosa':
            postQualcosa();
            break;
        case '/segnalaBug':
            post_segnalaBug();
            break;
        case '/login':
            post_login();
            break;
        case '/aggiungiEsercente':
            post_aggiungiEsercente();
            break;
        case '/aggiungiCodiceSconto':
            post_aggiungiCodiceSconto();
            break;
        case'/aggiungiImmagine':
            post_aggiungiImmagine();
            break;
        
        default:
        notFound();
        break;
    }
}

function notFound(){
    http_response_code(404);
    echo "<h1> ERROR 404: <br>Page not Found :( </h1> ";
}

function badRequest(){
    http_response_code(400);
    echo "Method not implemented";
}

//-----------------------------------------Functions to get the work done---------------------------------//

function index(){
        require __DIR__ . '/../view/index.php';
}




function get_ListaEsercenti($headers){
    require __DIR__ . '/../model/object.php';
    $r = getListaEsercenti();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/listaEsercenti.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function get_segnalaBug($headers){
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/segnalaBug.php';
    } else {
        echo 'ERRORE';
    }
}

function get_dashboard($headers){
    require __DIR__ . '/../model/object.php';
    $r = getDashboard();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/dashboard.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function get_aggiungicodiceSconto($headers){
    require __DIR__ . '/../model/object.php';
    $r = getDashboard();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/aggiungiCodiceSconto.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function get_aggiungiEsercente($headers){
    if(strpos($headers["Accept"], 'html') !== false) {
        require __DIR__ . '/../view/aggiungiEsercente.php';
    }
}

function get_login($headers){
    if(strpos($headers["Accept"], 'html') !== false) {
        require __DIR__ . '/../view/login.php';
    }
}

function postQualcosa(){
    var_dump($_POST);
    //Qui faccio qualcosa con il coso del post
    echo "<br/>ho fatto la post\n";
}
function post_aggiungiEsercente(){
    require __DIR__ . '/../model/object.php';
    postaggiungiEsercente();
}

function post_aggiungiCodiceSconto(){
    require __DIR__ . '/../model/object.php';
    postAggiungiCodiceSconto();
}


function post_login(){
    echo'ti sei loggato';
}

function post_aggiungiImmagine(){
    require __DIR__ . '/../model/object.php';
        postAggiungiImmagine();
}



?>