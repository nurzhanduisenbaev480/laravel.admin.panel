<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Admin\Category;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;
use MetaTag;



class CategoryController extends AdminBaseController
{
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayMenu = Category::all();
        $menu =$this->categoryRepository->buildMenu($arrayMenu);
        //dd($menu);
        MetaTag::setTags(['title'=>"Список категорий"]);
        return view('blog.admin.category.index', ['menu'=>$menu]);
    }
    public function mydel(){
        $id = $this->categoryRepository->getRequestId();
//        dd($id);
        if (!$id){
            return back()->withErrors(['msg'=>'Ошибка с ID']);
        }
        $children = $this->categoryRepository->checkChildren($id);
        if ($children){
            return back()->withErrors(['msg'=>'Возможно существует потомки']);
        }
        $parents = $this->categoryRepository->checkParentsProducts($id);
        if ($parents){
            return back()->withErrors(['msg'=>'Возможно существует потомки']);
        }
//        $delete =
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
