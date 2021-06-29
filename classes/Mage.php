<?php

class Mage extends Character
{
    public $shield = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->attackPoints /= 3;
        $this->magicPoints *= 3;
    }

    public function action($target) {
        $actionRand = rand(1, 100);
        if ($actionRand > 30 || $this->shield) {
            $status = $this->fireball($target);
        } else if ($actionRand <= 30 /* && !$this->shield */) {
            $status = $this->shield();
        }
        return $status;
    }

    public function shield() {
        $this->shield = true;
        $status = "$this->name active son bouclier magie !";
        return $status;
    }

    public function setLifePoints($damage) {
        if (!$this->shield) {
            $this->lifePoints -= round($damage);
            if ($this->lifePoints <= 0) {
                $this->lifePoints = 0;
            }
        }
        $this->shield = false;
        return;
    }

    public function fireball($target) {
        if ($this->magicPoints === 0) {
            $target->setLifePoints($this->attackPoints);
            $status = "$this->name n'a plus de points de magie et donne un coup de bâton à $target->name! Il reste $target->lifePoints points de vie à $target->name.";
        } else {
            $cost = rand(5, 20);
            if ($this->magicPoints < $cost) {
                $cost = $this->magicPoints;
            }
            $rand = rand(20, 30)/10;
            $damage = round($cost * $rand);
            $this->magicPoints -= $cost;
            $target->setLifePoints($damage);
            $status = "$this->name lance un boule de feu sur $target->name et lui inflige $damage points de dégats ! <br> Il reste $target->lifePoints points de vie à $target->name, et $this->magicPoints points de magie à $this->name !";
        }
        return $status;
    }
}