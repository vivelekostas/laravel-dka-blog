<?php


namespace App\Helpers;


use App\Article;
use App\Helpers\Contracts\SaveStr;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Сохраняет данные о новой статье в файл.
 * Class SaveToFile
 * @package App\Helpers
 */
class SaveToFile implements SaveStr
{

    public static function save(Article $article, User $user, Request $request)
    {
        $actionOnArticle = ' опубликовал новую статью: ';

        if ($request->isMethod('put')) {
            $actionOnArticle = ' обновил статью: ';
        }

        $articleTitle = $article->title;
        $userName = $user->name;
        $articleInfoStr = 'Пользователь ' . $userName . $actionOnArticle . $articleTitle;
        Storage::prepend('ArticleLog', $articleInfoStr);
    }
}