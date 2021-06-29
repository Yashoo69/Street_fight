<?php

abstract class Character
{
    public $name;
    protected $lifePoints = 150;
    public $attackPoints = 21;
    public $magicPoints = 50;
    public $puissancePoints = 100;

    public function __construct($name) {
        $this->name = $name;
    }

    // Getter : récupérer un attribut
    public function getLifePoints() {
        return $this->lifePoints;
    }

    // Setter : modifier un attribut
    public function setLifePoints($damage) {
        $this->lifePoints -= round($damage);
        if ($this->lifePoints <= 0) {
            $this->lifePoints = 0;
        }
        return;
    }

    public function isAlive() {
        if ($this->lifePoints > 0) {
            return true;
        } else {
            return false;
        }
    }
}