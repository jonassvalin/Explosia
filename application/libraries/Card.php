<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Card provides a class representation for a game card
 */
class Card {
    private $name;
    private $max_health;
    private $attack;
    private $damage;
    private $imagesrc;

    /**
     * Card constructor.
     * @param $name of the character
     * @param $health of the character initially
     * @param $attack power of the character
     */
    public function __construct($name, $health, $attack, $imagesrc)
    {
        $this->name = $name;
        $this->max_health = $health;
        $this->attack = $attack;
        $this->imagesrc = $imagesrc;
        $this->damage = 0;
    }

    /**
     * @return name
     * Gets the name of the character
     */
    public function get_name() {
        return $this->name;
    }

    /**
     * @return max_health
     * Gets the maximum or starting health of the character
     */
    public function get_max_health() {
        return $this->max_health;
    }

    /**
     * @return current_health
     * Gets the current health of the character
     */
    public function get_health() {
        return $this->max_health - $this->damage;
    }

    /**
     * @return attack power
     * Gets the attack power of the character
     */
    public function get_attack() {
        return $this->attack;
    }

    /**
     * @return imagesrc
     * Gets the image source location for the character card
     */
    public function get_imagesrc() {
        return $this->imagesrc;
    }

    /**
     * @param $attack_score dealt by the opposing players character
     * Reduces the health of the character based on the attack score.
     */
    public function increase_damage($damage)
    {
        $this->damage = $this->damage + $damage;
    }
}
