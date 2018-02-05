<?php
/**
 * Created by PhpStorm.
 * User: longdhb
 * Date: 4/24/2017
 * Time: 3:32 PM
 */

namespace App\Http\Controllers\Frontend;


use Illuminate\Routing\Controller;
use libs\models\CategoryModel;
use libs\models\MetaModel;
use libs\models\PostModel;
use libs\models\ProductCategoryModel;
use libs\models\ProductModel;

class SiteMapController extends Controller
{
    public function index()
    {
        $sitemap = \App::make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);
        if (!$sitemap->isCached()) {
            $sitemap->add(route('Ft_Home_Index'), date('d-m-y H:i:s'), '1.0', 'daily');
            $products = MetaModel::getAllWithType(ProductModel::class);
            if ($products) {
                foreach ($products as $product) {
                    $sitemap->add($product->link, $product->updated, 0.8, 'monthly');
                }
            }
            $productCategories = MetaModel::getAllWithType(ProductCategoryModel::class);
            if ($productCategories) {
                foreach ($productCategories as $productCategory) {
                    $sitemap->add($productCategory->link, $productCategory->updated, 0.8, 'monthly');
                }
            }
            $categories = MetaModel::getAllWithType(CategoryModel::class);
            if ($categories) {
                foreach ($categories as $category) {
                    $sitemap->add($category->link, $category->created, 0.5, 'monthly');
                }
            }
            $posts = MetaModel::getAllWithType(PostModel::class);
            if ($posts) {
                foreach ($posts as $post) {
                    $sitemap->add($post->link, $post->updated, 0.8, 'daily');
                }
            }
        }
        return $sitemap->render('xml');
    }
}