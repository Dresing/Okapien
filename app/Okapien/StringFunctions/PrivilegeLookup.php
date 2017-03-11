<?php

namespace App\Okapien\StringFunctions;

use App\Exceptions\UnknownCommandException;
use App\Okapien\StringFunctions\StringFunctionable;
use Illuminate\Support\Facades\Auth;

class PrivilegeLookup extends StringFunctionable
{

    /**
     * @param $func
     * @param $args
     * @return bool
     * @throws UnknownCommandException
     */
    public function lookup($func, $args)
    {
        switch ($func) {
            case 'teacher':
                return Auth::user()->isType('Teacher');
            case 'student':
                return Auth::user()->isType('Student');
            case 'teaches':
                return Auth::user()->userable->teachesStudent((int)$args[0]);
            case 'self':
                return (Auth::user()->userable->id == $args[0]);
            default:
                throw new UnknownCommandException;
                break;
        }
    }
}