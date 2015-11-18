<!-- Defines the screen for the introduction-->
<div class="content">
    <div id="jumbo" class="jumbotron text-center" >
        <h1>Explosia</h1>
        <p>A card-based action/strategy game, developed by Jonas Svalin.</p>
        <img src="<?php echo base_url('assets/images/explosia-main.jpg'); ?>" alt="<?php echo base_url('/assets/images/explosia-main.jpg'); ?>"
             class="jumbo-image">
    </div>
    <!-- Starts a new game by calling the initialize game controller-->
    <p><a href="<?php echo base_url('card_game_ctrl/initialize_game'); ?>" class="btn btn-xlarge" role="button">
            <span class="glyphicon glyphicon-fire" aria-hidden="true" style="color:red"></span> Start Game</a></p>
</div>
