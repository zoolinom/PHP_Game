<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 7:57 PM
 */

namespace Game\Upgrades;


class Upgrade
{
    protected $type;
    protected $damage;

    public function __construct($type, $damage = 0)
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
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }
}