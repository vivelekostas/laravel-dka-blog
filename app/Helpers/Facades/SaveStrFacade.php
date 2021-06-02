<?php


namespace App\Helpers\Facades;


use Illuminate\Support\Facades\Facade;

class SaveStrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'savestr';
    }
}