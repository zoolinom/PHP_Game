<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/1/2018
 * Time: 8:36 PM
 */

namespace Game\SpecialAbilities;


class SpecialAbilityEvade extends SpecialAbility
{
    public function __construct($type = "evade")
    {
        parent::__construct($type);
    }
}