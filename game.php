<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 7/30/2018
 * Time: 8:27 PM
 */

use Game\Classes\Hero;
use Game\Weapons\Weapon;
use Game\Weapons\Axe;
use Game\SpecialAbilities\SpecialAbilityDamageX2;
use Game\SpecialAbilities\SpecialAbilityEvade;
use Game\Upgrades\Upgrade;


$hero = new Hero("Elsa", 200, new Weapon("Bastard Sword", 40), false,
    new SpecialAbilityDamageX2());
$hero->seeStats();

$axe = new Axe("Axe", 30);
$upgrade = new Upgrade("stone", 5);
//$axe->addUpgrade($upgrade);
//var_dump($axe->getDamage());
$hero2 = new Hero("Mark", 200, $axe, false, new SpecialAbilityEvade());
$hero2->getWeapon()->addUpgrade($upgrade);
$hero2->seeStats();

//$hero->takeDamage(60);

while (!$hero->isDead() and !$hero2->isDead()) {
    $hero->attack($hero2);
    if ($hero2->isDead())
        break;
    $hero2->attack($hero);
}