<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 7:56 PM
 */

namespace Game\Classes;

use Game\Interfaces\Attack;
use Game\Weapons\Weapon;
use Game\Armours\Armour;
use Game\SpecialAbilities\SpecialAbility;


class Hero extends LivingThing implements Attack
{
    protected $specialAbility;

    public function __construct($name, $health, Weapon $weapon = null, Armour $armour = null,
                                $evade = false, SpecialAbility $specialAbility = null)
    {
        parent::__construct($name, $health, $weapon, $armour, $evade);
        $this->specialAbility = $specialAbility;
    }

    public function useSpecialAbility()
    {
        if ($this->specialAbility != null)
        {
            $num = rand(0, 10);
            echo $num;
            if ($num > 5)
            {
                if ($this->specialAbility->getType() == "damagex2")
                    return $this->weapon->getDamage() * 2;
                if ($this->specialAbility->getType() == "evade")
                {
                    $this->evade = true;
                    return 0;
                }
            }
            else
            {
                return 0;
            }
        }
    }

    public function attack(LivingThing $thing)
    {
        $defense = 0;
        echo "\r\n" . $this->name . " attacks " . $thing->getName() . "\r\n";
        $this->weapon == null ? $damage = 10 : $damage = $this->weapon->getDamage();
        if ($thing->getEvade())
        {
            echo "\r\n" . $thing->getName() . " evaded attack!\r\n";
            $thing->setEvade(false);
            return;
        }
        if ($thing->armour != null)
        {
            $defense = $thing->armour->getDefense();
        }
        if ($this->nearDeath())
        {
            $specialDamage = $this->useSpecialAbility();
            if ($specialDamage > 0)
            {
                echo "\r\nAttack power: " . $specialDamage . " - " . $defense . " (defense)";
                $specialDamage -= $defense;
                if ($specialDamage < 0)
                    $specialDamage = 0;
                echo " = " . $specialDamage;
                $thing->takeDamage($specialDamage);
                return;
            }
        }
        echo "\r\nAttack power: " . $damage . " - " . $defense . " (defense)";
        $damage -= $defense;
        if ($damage < 0)
            $damage = 0;
        echo " = " . $damage;
        $thing->takeDamage($damage);
    }
}