<!-- Defines the screen for the finished game -->
<div class="content">
    <div id="jumbo" class="jumbotron text-center" >
        <h1><?php echo $result; ?></h1>
        <p>Wanna play again?</p>
        <img src="<?php echo base_url('assets/images/explosia-end.jpg'); ?>" alt="Explosia End Image"
             class="jumbo-image">
    </div>
    <!-- Restarts the game by calling the initialize_game controller -->
    <p><a href="<?php echo base_url('card_game_ctrl/initialize_game'); ?>" class="btn btn-xlarge" role="button">
            <span class="glyphicon glyphicon-fire" aria-hidden="true" style="color:red"></span> Start Game</a></p>
</div>
