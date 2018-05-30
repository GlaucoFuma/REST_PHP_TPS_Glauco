<?php
$nomesito = "Lista esercenti";
require __DIR__ . '/parcials/header.php';
function visualizza($esercenti)
{


    $evd = -1;
    if (isset($_GET['evd'])) {
        $evd = $_GET['evd'];
    }
    ?>

    <!--Inizio listaEsercenti-->

    <style>

        @-webkit-keyframes hvr-pulse {
            25% {
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
            }
            75% {
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
            }
        }

        @keyframes hvr-pulse {
            25% {
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
            }
            75% {
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
            }
        }

        .hvr-pulse {
            display: inline-block;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-animation-name: hvr-pulse;
            animation-name: hvr-pulse;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            -webkit-animation-iteration-count: 3;
            animation-iteration-count: 3;
        }

        .demo-card-image.mdl-card {
            width: 256px;
            height: 256px;
            background: url('../../res/no_image.jpg') center / cover;
        }

        .demo-card-image > .mdl-card__actions {
            height: 52px;
            padding: 16px;
            background: rgba(0, 0, 0, 0.25);
        }

        .demo-card-image__filename {
            color: #fff;
            font-weight: 500;
        }

        .listaformat {
            margin: 16px 0 16px 16px;
        }

        .emptylist {
            font-size: 24px;
            color: rgba(0, 0, 0, 0.7);
            border: 2px solid rgb(63, 81, 181);
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            text-align: center;
            background-color: rgba(63, 81, 181, 0.2);
        }

    </style>

    <?php
    if ($esercenti == null) {
        echo '<div class="emptylist">Lista vuota!</div>';
    } else {
        foreach ($esercenti as $esercente) {
            echo '<td>';
            echo '  <a class="listaformat';
            if ($esercente['nome'] == $evd) {
                echo " hvr-pulse ";
            }
            echo '" ">
                <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-color: white" ';

            echo '
            <div class="demo-card-event mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand">
            <h7>
            Nome: '. $esercente['nome'] .' <br>
            Email: '. $esercente['email'] .' <br>
            ID: '. $esercente['id_amministratore'] .'
            </h7>
            </div>
            <div class="mdl-layout-spacer"></div>
            </div>
             ';
        }
    }
    ?>

    <!--Fine listaEsercenti-->

<?php } ?>