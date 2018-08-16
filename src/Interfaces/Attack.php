<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zoki
 * Date: 8/17/2018
 * Time: 12:06 AM
 */

namespace Game\Interfaces;

use Game\Classes\LivingThing;


interface Attack
{
    public function attack(LivingThing $thing);
}