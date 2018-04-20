<?php

namespace App\Validators;

use Fuel\Validation\Validator as FuelValidator;
use PDC\Request;
use Fuel\Validation\RuleProvider\FromArray;

class Validator
{


    public static function make(Request $pdcRequest, $data = [])
    {
        $v = new FuelValidator;

        $generator = new FromArray;
        $generator->setData($data)->populateValidator($v);

        $validation = static::validate($v, $data);

        dd($validation->isValid());
    }

    protected static function validate(FuelValidator $v, $data)
    {
        return $v->run($data);
    }
}