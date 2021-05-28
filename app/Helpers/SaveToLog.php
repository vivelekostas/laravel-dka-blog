<?php


namespace App\Helpers;


use App\Article;
use App\Helpers\Contracts\SaveStr;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Сохраняет данные о новой статье в лог.
 * Class SaveToLog
 * @package App\Helpers
 */
class SaveToLog implements SaveStr
{

    public static function save(Article $article, User $user)
    {
//        $obj = new self();
        $articleTitle = $article->title;
//        $articleInfo = 'Создана новая статья' . $articleTitle;
        Log::info('Создана новая статья: '.$articleTitle);
    }
}