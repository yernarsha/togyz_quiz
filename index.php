<?php

require('lib.php');

echonl("Welcome to the Togyz Kumalak Quiz!");
echonl("");

$pdo = new PDO('sqlite:quiz.sqlite');
$stm = $pdo->query('SELECT * from fragen');
$rows = $stm->fetchAll(PDO::FETCH_NUM);
$i = $correct = 0;

foreach ($rows as $row) {
    $i++;
    echonl($i . '. ' . $row[1] . ':');
    echonl('1. ' .  $row[3]);
    echonl('2. ' .  $row[4]);
    echonl('3. ' .  $row[5]);
    echonl('4. ' .  $row[6]);

    $ans = readline();
    if ($ans == 0) {
        $i--;
        break;
    }

    if ($ans == $row[2]) {
        $correct++;
        echonl("Правильно!");
    } else {
        echonl("Неверно...");
    }
    echonl($correct . ' / ' . $i . PHP_EOL);
}

echonl(PHP_EOL . 'Итог: ' . $correct . ' из ' . $i);
