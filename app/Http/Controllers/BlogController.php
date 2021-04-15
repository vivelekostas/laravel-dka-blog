<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

/**
 * Кон-лер для юзеров (не админка). Отвечает за вывод статей по категориям - category
 * (список категорий - это меню) и отображение конкретной статьи - article.
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(12),
        ]);
    }

    public function article($slug)
    {
        return view('blog.article', [
           'article' => Article::where('slug', $slug)->first()
        ]);
    }
}
