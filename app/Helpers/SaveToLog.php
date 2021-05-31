<?php


namespace App\Helpers;


use App\Article;
use App\Helpers\Contracts\SaveStr;
use App\User;
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
        $articleTitle = $article->title;
        $userName = $user->name;
        Log::info('Пользователь ' . $userName .' опубликовал новую статью: '.$articleTitle);
    }
}