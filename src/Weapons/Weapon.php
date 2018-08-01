<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 8:00 PM
 */

namespace Game\Weapons;

use Game\Upgrades\Upgrade;


class Weapon
{
    protected $type;
    protected $damage;
    protected $upgrades = [];

    public function __construct($type, $damage)
    {
        $this->type = $type;
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        $damage = $this->damage;
        foreach ($this->upgrades as $upgrade)
        {
            $damage += $upgrade->getDamage();
            //echo "\r\nUpgraded damage: " . $damage;
        }
        return $damage;
    }

    public function addUpgrade(Upgrade $upgrade)
    {
        $this->upgrades[] = $upgrade;
    }

    /**
     * @return array
     */
    public function getUpgrades(): array
    {
        return $this->upgrades;
    }
}