<?php
$nomesito = 'Benvenuto';
require __DIR__ . '/parcials/header.php';
?>
<style>

        .demo-card-wide > .mdl-card__title {
    color: #fff;
    background-color: rgb(63, 81, 181);
        }

        .demo-card-wide.mdl-card {
    width: 512px;
            margin: auto;
            margin-top: 0;
        }

        .dashboard {
    display: flex;
    margin: 10% auto;
}

        .demo-list-two {
    width: auto;
    margin: 0;
    padding: 0;
}

        .mdl-button {
    color: white;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-size: 18px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0;
            cursor: pointer;
            text-align: center;
            line-height: 36px;
        }

        .mdl-list__item-avatar, .mdl-list__item-avatar.material-icons {
    height: 40px;
            width: 40px;
            box-sizing: border-box;
            border-radius: 0;
            background-color: transparent;
            font-size: 40px;
            color: grey;
        }

        .mdl-card__supporting-text {
    color: rgba(0, 0, 0, .54);
    font-size: 1rem;
            line-height: 18px;
            overflow: hidden;
            padding: 16px 0;
            width: auto;
        }

        .mdl-list__item {
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: .04em;
            line-height: 1;
            min-height: 48px;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: nowrap;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            padding: 16px 32px;
            cursor: default;
            color: rgba(0, 0, 0, .87);
            overflow: hidden;
        }

        li.questlist:hover {
    background-color: rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .emptylist {
    margin: 16px;
            font-size: large;
        }

    </style>

<h1> Benvenuto su MySmartOpinion Web </h1>
<h6> Verrai reindirizzato su apertamente dashboard fra pochi secondi...</h6>
<h6>Se non funzionano clicca <a href="/dashboard" style="color: #000;"> qui </a> </h6>
<meta http-equiv="REFRESH" content="3; url=/dashboard">
