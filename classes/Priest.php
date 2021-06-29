<?php 

class Priest extends Character
{
    public $maxLife;

    public function __construct($name) {
        parent::__construct($name);
        $this->maxLife = $this->lifePoints;
    }

    public function action($target) {
        $rand = rand(1, 100);
        if ($rand == 1 && $this->lifePoints != $this->maxLife) {
            $status = $this->fullRecovery();
        } else if ($rand < 29 && $this->lifePoints != $this->maxLife) {
            $status = $this->heal();
        } else {
            $status = $this->attack($target);
        }
        return $status;
    }

    public function fullRecovery() {
        $this->lifePoints = $this->maxLife;
        $status = "$this->name se soigne avec la magie et retrouve tous ses points de vie !";
        return $status;
    }

    public function heal() {
        $this->lifePoints += 25;
        if ($this->lifePoints > 100) {
            $this->lifePoints = 100;
        }
        $status = "$this->name se soigne avec la magie, il lui reste maintenant $this->lifePoints points de vie !";
        return $status;
    }

    public function attack($target) {
        $damage = rand(20, 35); 
        $target->setLifePoints($damage);
        $status = "$this->name attaque $target->name avec son sceptre! Il reste $target->lifePoints points de vie à $target->name.";
        return $status;    
    }
}