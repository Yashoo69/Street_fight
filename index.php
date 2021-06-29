<?php 

spl_autoload_register(function ($class_name) {
    require 'classes/' . $class_name . '.php';
});

$character1 = new Warrior('Tork');
$character2 = new Mage('Sienna');
$character3 = new Rogue('midnyte');
$character4 = new Priest('Syrinx')

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="./js/script.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
</head>
<body>
    
    <main>
        <div class="title"><h1> Black Temple - Dungeon </h1></div>
           <?php while ($character2->isAlive() && $character4->isAlive()): ?>
            <div>
               <p id="player1"><?= $character2->action($character4); ?></p>
                <?php $status = "$character2->name a gagné !"?>
                    

                <?php if ($character4->isAlive()): ?>
                   <p id="player2"><?= $character4->action($character2); ?></p>
                   <?php $status = "$character4->name a gagné !"; ?>  
                <?php endif ?>

            </div>

            <?php endwhile ?>
            

            <div class="result">
                <?= $status; ?>
            </div>

    
    </main>
</body>
</html>

