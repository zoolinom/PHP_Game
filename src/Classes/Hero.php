<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 7:56 PM
 */

namespace Game\Classes;

use Game\Weapons\Weapon;
use Game\SpecialAbilities\SpecialAbility;


class Hero extends LivingThing
{
    protected $specialAbility;

    public function __construct($name, $health, Weapon $weapon = null, $evade = false, SpecialAbility $specialAbility = null)
    {
        parent::__construct($name, $health, $weapon, $evade);
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
        echo "\r\n" . $this->name . " attacks " . $thing->getName() . "\r\n";
        $this->weapon == null ? $damage = 10 : $damage = $this->weapon->getDamage();
        if ($thing->getEvade())
        {
            echo "\r\n" . $thing->getName() . " evaded attack!\r\n";
            $thing->setEvade(false);
            return;
        }
        if ($this->nearDeath())
        {
            $specialDamage = $this->useSpecialAbility();
            if ($specialDamage > 0)
            {
                $thing->takeDamage($specialDamage);
                return;
            }
        }
        $thing->takeDamage($damage);
    }
}