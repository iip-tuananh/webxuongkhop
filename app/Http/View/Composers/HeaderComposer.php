<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Service;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $services = Service::query()->where('status', 1)->latest()->get();
        $categoriesProduct = Category::query()->with('childs')
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get();
        $serviceCategories = PostCategory::query()->with('childs')
            ->where('type', PostCategory::TYPE_SERVICE)
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get();
        $cartItems = \Cart::getContent();
        $totalPriceCart = \Cart::getTotal();

        $view->with(['config' => $config, 'cartItems' => $cartItems, 'serviceCategories' => $serviceCategories, 'totalPriceCart' => $totalPriceCart , 'categoriesProduct' => $categoriesProduct
        ]);
    }
}
