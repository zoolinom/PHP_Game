<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 7:55 PM
 */

namespace Game\Classes;

use Game\Weapons\Axe;
use Game\Weapons\Weapon;
use Game\Armours\Armour;
use Game\Interfaces\Attack;


class LivingThing implements Attack
{
    protected $name;
    protected $health;
    protected $maxhp;
    protected $weapon;
    protected $armour;
    protected $evade;

    public function __construct($name, $health, Weapon $weapon = null, Armour $armour = null, $evade = false)
    {
        $this->name = $name;
        $this->health = $health;
        $this->maxhp = $health;
        $this->weapon = $weapon;
        $this->armour = $armour;
        $this->evade = $evade;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    /**
     * @return null
     */
    public function getArmour()
    {
        return $this->armour;
    }

    /**
     * @param bool $evade
     */
    public function setEvade(bool $evade): void
    {
        $this->evade = $evade;
    }

    public function getEvade()
    {
        return $this->evade;
    }

    public function seeStats()
    {
        echo "================\r\nName: " . $this->name . "\r\n";
        echo 'Health: ' . $this->health  . "\r\n";
        $this->getEvade() ? $text = "yes" : $text = "no";
        echo "Evade: " . $text . "\r\n";
        if ($this->weapon != null)
        {
            $text = "\r\n\tType: " . $this->weapon->getType() . "\r\n\t" .
                "Damage: " . "(" . $this->weapon->getDamage(true) . ") " . $this->weapon->getDamage();
            $className = $this->weapon->getClassName();
            echo "Class name: " . $className;
            $res = $this->weapon instanceof $className;
            var_dump($res);
            /*
             * if ($this->weapon instanceof $className)
             * This is not working good
             * TODO Examine this!!!!
             */
            $bracketOpen = False;
            $upgDamage = $this->weapon->getUpgradesDamages();
            if ($this->weapon instanceof Axe)
            {
                $text .= " (additional damage: " . $this->weapon->getAdditionalDamage();
                $text .= ",";
                $bracketOpen = True;
            } else {
                if ($upgDamage != '') {
                    $text .= " (";
                    $bracketOpen = True;
                }
            }
            if ($upgDamage != '') {
                $text .= " upgraded damage: ";
                $text .= $upgDamage;
            }
            if ($bracketOpen)
                $text .= ")";
        } else {
            $text = 'No weapon';
        }
        echo "Weapon: " . $text  . "\r\n";

        $this->armour == null ? $text = 'No armour' : $text = "\r\n\tType: " . $this->armour->getType() . "\r\n\t" .
            "Defense: " . $this->armour->getDefense();
        echo "Armour: " . $text . "\r\n";

    }

    public function isDead()
    {
        if ($this->health <= 0)
        {
            return true;
        }

        return false;
    }

    public function nearDeath()
    {
        if ($this->health <= $this->maxhp * 60 / 100)
        {
            return true;
        }

        return false;
    }

    public function takeDamage($amount)
    {
        $this->health -= $amount;
        echo "\r\n" . $this->name . " current health: " . $this->health . "\r\n";
        if ($this->isDead())
        {
            echo $this->name . " is dead!";
        }
    }

    public function attack(LivingThing $thing)
    {
        echo "\r\n" . $this->name . " attacks " . $thing->getName() . "\r\n";
        //$this->weapon == null ? $damage = 10 : $damage = $this->weapon->getDamage();
        $damage = $this->weapon->getDamage() ?? 10;
        $thing->takeDamage($damage);
    }

}