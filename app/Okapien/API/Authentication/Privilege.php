<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 27/01-2017
 */
namespace App\Okapien\API\Authentication;
use App\Exceptions\InvalidArgumentCountException;
use App\Exceptions\UnknownCommandException;
use Illuminate\Support\Facades\Auth;



class Privilege{
    
    
    const NUM_PARAM = 2;


    public static function check($constraints){

        //Check if user it logged in at all
        if(Auth::user() == null){
            return false;
        }
        foreach($constraints as $type => $rules){
            if(static::isType($type)){
                if(static::handleRuleGroup($rules)){
                    return true;
                }

            }
        }
        return false;

    }

    public static function teacher(){
        return Auth::user()->isType('Teacher');
    }
    public static function student(){
        return Auth::user()->isType('Student');
    }
    public static function isType($type){
        return Auth::user()->isType($type);
    }

    private static function handleRuleGroup($lines){

        $required = [];
        $any = [];


        foreach($lines as $line){
            $params = explode('|', $line);
            $num_param = count($params);

            if($num_param != static::NUM_PARAM){
                throw new InvalidArgumentCountException('Check the number of arguments given to privilege check.');
            }

            if(isset($params[1]) && $params[1] == 'any'){
                $any[] = $params[0];
            }elseif(!isset($params[1]) || $params[1] == 'require'){
                $required[] = $params[0];
            }else{
                throw new UnknownCommandException('Could not resolve options.');
            }
        }

        foreach($required as $rule){
            if(!static::evaluateRule($rule)){
                return false;
            }
        }
        foreach($any as $rule){
            if(static::evaluateRule($rule)){
                return true;
            }
        }
        if(empty($any)){
            return true;
        }
        return false;
    }
    private static function argsCheck($args, $count){
        if ($args != $count) {
            throw new InvalidArgumentCountException;
        }
    }
    private static function evaluateRule($rule){
        $param = explode(':', $rule);
        $num_param = count($param)-1;
        switch ($param[0]) {
            case 'teaches':
                static::argsCheck($num_param, 1);
                return Auth::user()->userable->teachesStudent((int)$param[1]);
            case 'self':
                static::argsCheck($num_param, 1);
                return (Auth::user()->userable->id == $param[1]);
            default:
                throw new UnknownCommandException;
                break;
        }
    }


}