<?php


namespace App\Helpers;


use App\Article;
use App\Helpers\Contracts\SaveStr;
use App\User;
use Illuminate\Support\Facades\Storage;

/**
 * Сохраняет данные о новой статье в файл.
 * Class SaveToFile
 * @package App\Helpers
 */
class SaveToFile implements SaveStr
{

    public static function save(Article $article, User $user)
    {
        $articleTitleStr = $article->title;
        $articleInfoStr = 'Создана новая статья: ' . $articleTitleStr;
        Storage::prepend('ArticleLog', $articleInfoStr);
    }
}