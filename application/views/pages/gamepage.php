<!-- Defines the screen for the active game -->
<div class="content">
    <form action="<?php echo site_url('card_game_ctrl/attack'); ?>" method="post" name="gamepageform">
        <!-- This row displays the CPU cards and their current status -->
        <div class="row">

            <?php $k=1; foreach ($cpu_deck as $cpu_card): ?>
                <div class="col-md-4">
                    <h3><?php echo $cpu_card->get_name(); ?></h3>
                    <!--Styles should NOT be here, this is a temp bugfix for system not recognizing class styles-->
                    <img src="<?php echo site_url($cpu_card->get_imagesrc()); ?>" alt="Card Image"
                         style="max-width: 200px;">
                    <br>
                    <?php echo 'HP: '.$cpu_card->get_health().'/'.$cpu_card->get_max_health(); ?>
                    <br>
                </div>
            <?php $k++; endforeach; ?>

        </div>

        <!-- This row seperates the card and displays the "VS" -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><h1>VS</h1></div>
            <div class="col-md-4"></div>
        </div>

        <!-- This row displays the player cards and their current status, as well as the buttons for choosing
        opponent to attack -->
        <div class="row">

            <?php foreach ($player_deck as $player_card): ?>
                <div class="col-md-4">
                    <h3><?php echo $player_card->get_name(); ?></h3>
                    <!--Styles should NOT be here, this is a temp bugfix for system not recognizing class styles-->
                    <img src="<?php echo site_url($player_card->get_imagesrc()); ?>" alt="Card Image"
                         style="max-width: 200px;">
                    <br>
                    <?php echo 'HP: '.$player_card->get_health().'/'.$player_card->get_max_health(); ?>
                    <br>

                    <br>Attack:
                    <!--The various selects are saved with the names like "selectMOTRADO", this is how they are
                    later retrieved-->
                    <select class="selectpicker" name="select<?php echo $player_card->get_name(); ?>">
                        <?php foreach ($cpu_deck as $cpu_card): ?>
                            <option><?php echo $cpu_card->get_name(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            <?php endforeach; ?>

        </div>
        <br>
        <p><input type="submit" name="submit" value="Attack" class="btn btn-xlarge" role="button"></p>
    </form>
</div>
