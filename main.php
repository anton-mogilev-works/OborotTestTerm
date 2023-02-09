#!/usr/bin/env php
<?php
require_once('Classes.php');

use Oborot\FruitPicker;

// Создаем сборщика фркутов
$fruitPicker = new FruitPicker();

//Приобретаем деревья
$fruitPicker->GetTrees(10, TreeType::APPLE);
$fruitPicker->GetTrees(15, TreeType::PEAR);

$fruitPicker->SeedFreeTreesInGarden();

$fruitPicker->WaitHarvest();
$fruitPicker->GetHarvest();

$fruitPicker->GetStatus();

?>
