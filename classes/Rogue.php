<?php

class Rogue extends Character
{
    public function action($target) {
        if ($target->lifePoints > 30) {
            return $this->garrot($target);
        } else {
            return $this->embuscade($target); 
        }
    }
    
    public function embuscade($target) {
        $cost = rand(10, 30)/10; 
        $rand = rand(10, 25);
        $damage = round($rand * $cost); 
        $target->setLifePoints($damage);
        $status = "$this->name lance Embuscade sur $target->name et lui inflige $damage! Il reste $target->lifePoints points de vie à $target->name.";
        return $status;    
    }

    public function garrot($target) {
        $rand = rand(25, 40);
        $damage = $rand; 
        $target->setLifePoints($damage);
        $status = "$this->name lance un garrot sur $target->name et lui inflige $damage points de dégats ! Il reste $target->lifePoints points de vie à $target->name.";
        return $status; 
    
    }

    public function __construct($name) {
        parent::__construct($name);
        $this->magicPoints *= 2;
    }

}



 