<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPostCategory;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Repositories\BlogCategoryRepository;


class CategoryController extends AdminController
{
    protected $blogCategoryRepository;

    public function __construct(){
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$paginate = BlogPostCategory::paginate(10);

        $paginate = $this->blogCategoryRepository->getAllWithPaginate(10);

        return view('admin.categories.index', compact('paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('admin.categories.create', compact( 'categoryList' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogCategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();



        $item = (new BlogPostCategory())->create($data);

        $item->save();



        if($item){
            return redirect()->route('CategoryRest.admin.edit', $item->id)->with(['success' => 'Successfuly Created' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
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

        $item = $this->blogCategoryRepository->getEdit($id);
        $categoryList = $this->blogCategoryRepository->getForComboBox();


        return view('admin.categories.edit', compact('item', 'categoryList' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)){
            return back()->withErrors(['msg' => "the id=[{$id}] not found"])->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if($result){
            return redirect()->route('CategoryRest.admin.edit', $item->id)->with(['success' => 'Successfuly Updated' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = BlogPostCategory::destroy($id);

        //$result = BlogPostCategory::find($id)->forceDelete();

        if($result){
            return redirect()->route('CategoryRest.admin.index')->with(['success' => 'Successfuly Deleted' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
    }
}
