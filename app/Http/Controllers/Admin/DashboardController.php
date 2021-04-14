<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * В свою вьюшку экшен отдаёт данные по статистике блога
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5), //скоуп по последним 5 категориям
            'articles' => Article::lastArticles(5),      //скоуп по последним 5 статьям
            'count_categories' => Category::count(),     //общее число всех категорий
            'count_articles' => Article::count(),        //общее число всех материалов
        ]);
    }
}
