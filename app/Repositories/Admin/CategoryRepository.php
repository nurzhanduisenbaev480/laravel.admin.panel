<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\Category as Model;
use Menu as LavMenu;
class CategoryRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();

    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function buildMenu($arr){
        $mBuilder = LavMenu::make('MyNav', function ($m) use($arr){
            foreach ($arr as $item) {
                if ($item->parent_id == 0){
                    $m->add($item->title, $item->id)->id($item->id);
                }else{
                    if ($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, $item->id)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
    public function checkChildren($id){
        $children = $this->startConditions()
             ->where('parent_id', $id)
             ->count();
        return $children;
    }
    public function checkParentsProducts($id){
        $parents = \DB::table('products')
            ->where('category_id', $id)
            ->count();
        return $parents;
    }
}
