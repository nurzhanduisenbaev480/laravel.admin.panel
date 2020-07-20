<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public static function getCountOrders(){
        $count = DB::table('orders')
                ->where('status', '0')
                ->get()
                ->count();
        return $count;
    }
    public static function getCountUsers(){
        $users = DB::table('users')
            ->get()
            ->count();
        return $users;
    }
    public static function getCountProducts(){
        $products = DB::table('products')
            ->get()
            ->count();
        return $products;
    }
    public static function getCountCategories(){
        $categories = DB::table('categories')
            ->get()
            ->count();
        return $categories;
    }
}
