<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class FrontPageComposer
{

    public function compose(View $view)
    {
        $frontCategories = cache()->remember('frontCategories', 3600, function () {
            return Category::whereNull('parent_id')
                ->with('childCategories.childCategories')
                ->get();
        });

        $view->with('frontCategories', $frontCategories);
    }
}
