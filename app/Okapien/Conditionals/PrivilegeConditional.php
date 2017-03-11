<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 27/01-2017
 */
namespace App\Okapien\Conditionals;
use App\Exceptions\InvalidArgumentCountException;
use App\Exceptions\UnknownCommandException;
use App\Okapien\StringFunctions\StringFunctionable;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Support\Facades\App;


class PrivilegeConditional implements Conditionable{
    
    const NUM_PARAM = 2;

    protected $stringFunctionable;

    /**
     * Privilege constructor.
     * @param $stringFunctionable
     */
    public function __construct(StringFunctionable $stringFunctionable)
    {
        $this->stringFunctionable = $stringFunctionable;
    }


    public function check(array $constraints){
        foreach($constraints as $type => $rules){
            if($this->stringFunctionable->evaluate($type)){
                if($this->handleRuleGroup($rules)){
                    return true;
                }
            }
        }
        return false;

    }

    private function handleRuleGroup($lines){

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
            if(!$this->stringFunctionable->evaluate($rule)){
                return false;
            }
        }
        foreach($any as $rule){
            if($this->stringFunctionable->evaluate($rule)){
                return true;
            }
        }
        if(empty($any)){
            return true;
        }
        return false;
    }



}