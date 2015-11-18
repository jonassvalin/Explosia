<!-- Defines the header for the application -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Explosia</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href=<?php echo base_url('assets/styles/explosiastyles.css'); ?>


    </head>
    <body>

    <div id="top-navbar" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <a href=<?php echo base_url('card_game_ctrl'); ?> class="navbar-brand">Explosia</a>

            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul id="navbar-links" class="nav navbar-nav navbar-right">
                    <li><a href=<?php echo base_url('card_game_ctrl'); ?>>Play</a></li>

                    <li><a href=<?php echo base_url('card_game_ctrl/instructions'); ?>>Instructions</a></li>

                    <li><a href=<?php echo base_url('card_game_ctrl/about'); ?>>About</a></li>
                </ul>
            </div>
        </div>
    </div>
