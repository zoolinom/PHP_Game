<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/3/2018
 * Time: 12:32 AM
 */

namespace Game\Armours;


class Armour
{
    protected $type;
    protected $defense;

    public function __construct($type, $defense)
    {
        $this->type = $type;
        $this->defense = $defense;
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
    public function getDefense()
    {
        return $this->defense;
    }

}