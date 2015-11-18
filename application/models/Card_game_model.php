<?php
require_once BASEPATH.'../application/libraries/Card.php';

/**
 * Class Card_game_model. Provides a model representation of the games current state.
 */
class Card_game_model extends CI_Model {
    private $player = 'player';
    private $cpu = 'cpu';
    private $player_deck;
    private $cpu_deck;
    private $result;

    /**
     * Card_game_model constructor. Simply loads the database used by the game.
     */
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Get function for the cards in the database.
     * @return The full set of cards available in the database
     */
    private function get_cards()
    {
        $query = $this->db->get('cards');
        return $query->result_array();
    }


    /**
     * This function creates the deck of the chosen player. Currently there is unnecessary duplicate code
     * but this is so that it can easily be refactored in the future if players are using custom decks.
     * @param $whos_deck
     */
    public function create_deck($deck_owner)
    {
        $available_cards = $this->get_cards();
        if ($deck_owner === $this->player) {
            foreach ($available_cards as $card) {
                $this->player_deck[strtoupper($card['name'])] = new Card(strtoupper($card['name']), $card['health'],
                    $card['attack'], $card['imagesrc']);
            }
        } elseif ($deck_owner === $this->cpu) {
            foreach ($available_cards as $card) {
                $this->cpu_deck[strtoupper($card['name'])] = new Card(strtoupper($card['name']), $card['health'],
                    $card['attack'], $card['imagesrc']);
            }
        }

    }

    /**
     * @param $deck_owner
     * @return The deck of either the player or the CPU
     */
    public function get_deck($deck_owner)
    {
        return $this->$deck_owner;
    }

    /**
     * @param $deck_owner
     * @param $deck
     * Sets the deck of either player
     */
    public function set_deck($deck_owner, $deck)
    {
        $this->$deck_owner = $deck;
    }

    /**
     * Calls all attack-related methods
     */
    public function attack_updates()
    {
        $this->attack_cpu();
        $this->attack_player();
        $this->check_deaths();
        $this->check_result();
    }

    /**
     * Performs attack against CPU
     * Attack-level is handicapped to compensate for CPUs poor AI
     */
    private function attack_cpu()
    {
        foreach($this->player_deck as $player_card) {
            $attacked = $_POST['select'.$player_card->get_name()];
            $this->attack_character($this->cpu_deck[$attacked], $player_card->get_attack()-1);
        }
    }

    /**
     * Performs attack against player, extremelly basic
     */
    private function attack_player()
    {
        $player_keys = array_keys($this->player_deck);
        shuffle($player_keys);
        $key_pos = 0;
        $max_key_pos = count($this->player_deck)-1;
        foreach($this->cpu_deck as $cpu_card) {
            $k = min($key_pos, $max_key_pos);
            $this->attack_character($this->player_deck[$player_keys[$k]], $cpu_card->get_attack());
            $key_pos++;
        }
    }

    /**
     * @param $character_card
     * @param $attack
     * Executes attack against specific character card with a random attack-level from zero to $attack
     */
    private function attack_character($character_card, $attack)
    {
        $character_card->increase_damage(rand(0, $attack));
    }

    /**
     * Checks whether any characters have died, and if so removes them from the deck
     */
    private function check_deaths()
    {
        foreach($this->player_deck as $player_card) {
            if($player_card->get_health() <= 0) {
                unset($this->player_deck[$player_card->get_name()]);
            }
        }
        foreach($this->cpu_deck as $cpu_card) {
            if($cpu_card->get_health() <= 0) {
                unset($this->cpu_deck[$cpu_card->get_name()]);
            }
        }
    }

    /**
     * Checks if either or both player and CPU have lost all character cards
     */
    private function check_result()
    {
        $player_chars_remaining = count($this->player_deck);
        $cpu_chars_remaining = count($this->cpu_deck);

        if($player_chars_remaining === 0 && $cpu_chars_remaining === 0) {
            $this->result = "It is a draw!";
        } else if ($player_chars_remaining === 0) {
            $this->result = "CPU wins, better practice!";
        } else if ($cpu_chars_remaining === 0) {
            $this->result = "You win, good job!";
        }
    }

    /**
     * @return The result defined in check_result
     */
    public function get_result()
    {
        return $this->result;
    }
}
