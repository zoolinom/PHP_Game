<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 8:00 PM
 */

namespace Game\Weapons;


class Axe extends Weapon
{
    protected $additionalDamage = 5;

    public function getDamage($base = false)
    {
        if ($base)
            return parent::getDamage($base);
        return parent::getDamage($base) + $this->additionalDamage;
    }

    /**
     * @return int
     */
    public function getAdditionalDamage(): int
    {
        return $this->additionalDamage;
    }

}