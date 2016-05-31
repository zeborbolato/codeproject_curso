<?php
/**
 * Created by PhpStorm.
 * User: Gideao
 * Date: 22/05/2016
 * Time: 09:15
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];

}