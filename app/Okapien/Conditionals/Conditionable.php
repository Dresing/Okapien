<?php

namespace App\Okapien\Conditionals;


interface Conditionable{
    public function check(array $constraints);
}