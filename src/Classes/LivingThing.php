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


class LivingThing
{
    protected $name;
    protected $health;
    protected $maxhp;
    protected $weapon;
    protected $evade;

    public function __construct($name, $health, Weapon $weapon = null, $evade = false)
    {
        $this->name = $name;
        $this->health = $health;
        $this->maxhp = $health;
        $this->weapon = $weapon;
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
        $this->weapon == null ? $text = 'No weapon' : $text = "\r\n\tType: " . $this->weapon->getType() . "\r\n\t" .
            "Damage: " . "(" . $this->weapon->getDamage(true) . ") " . $this->weapon->getDamage();
        if ($this->weapon instanceof Axe)
        {
            $text .= " (additional damage: " . $this->weapon->getAdditionalDamage();
            $text .= ",";
        } else {
            $text .= " (";
        }
        $text .= " upgraded damage: ";
        $text .= $this->weapon->getUpgradesDamages();
        $text .= ")";
        echo "Weapon: " . $text  . "\r\n";

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
        $this->weapon == null ? $damage = 10 : $damage = $this->weapon->getDamage();
        $thing->takeDamage($damage);
    }

}