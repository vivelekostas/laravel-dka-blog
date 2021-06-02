<?php


namespace App\Helpers\Contracts;


use App\Article;
use App\User;
use Illuminate\Http\Request;

/**
 * Interface SaveStr
 * @package App\Helpers\Contracts
 */
interface SaveStr
{
     public static function save(Article $article, User $user, Request $request);
}