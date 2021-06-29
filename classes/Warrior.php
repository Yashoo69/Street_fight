<?php

class Warrior extends Character
{
    public function action($target) {
        if ($target->lifePoints > 25) {
            return $this->sword($target);
        } else {
            return $this->execution($target); 
        }
    }


    public function __construct($name) {
        parent::__construct($name);
        $this->lifePoints += 25;
    }
    
    public function sword($target) {
        $rand = rand(10, 25);
        $damage = $rand; 
        $target->setLifePoints($damage);
        $status = "$this->name attaque $target->name avec son épée, et lui inflige $damage! Il reste $target->lifePoints points de vie à $target->name.";
        return $status;    
    }

    public function execution($target) {
        $rand = rand(25, 35);
        $damage = $rand; 
        $target->setLifePoints($damage);
        $status = "$this->name lance une execution sur $target->name et lui inflige $damage points de dégats ! Il reste $target->lifePoints points de vie à $target->name.";
        return $status; 
    
    }

}



 
