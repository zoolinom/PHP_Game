<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 7:59 PM
 */

namespace Game\SpecialAbilities;


class SpecialAbility
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}