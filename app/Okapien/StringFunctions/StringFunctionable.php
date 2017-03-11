<?php namespace App\Okapien\StringFunctions;

/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/2/2017
 * Time: 10:06 AM
 */

abstract class StringFunctionable
{
    //Seperator between function name and arguments
    protected $seperator = ':';

    /**
     * Takes a string of format:  func:arg1:arg2...
     * It then evaluates the function either true or false based
     * on some implementation of lookup
     * @param $rule
     * @return boolean
     */
    public function evaluate($rule){

        //Split function name and args into array
        $elem = explode($this->seperator, $rule);

        return $this->lookup(array_shift($elem), $elem);
    }

    /**
     * Takes a function name as string and an array of arguments.
     * The function name should be used as a key to look up som expression
     * which evalutes either true or false.
     * @param $func
     * @param $args
     * @return bool
     */
    abstract public function lookup($func, $args);
}