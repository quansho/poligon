<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\BlogPostAfterCreateJob;
use App\Models\BlogPost;
use App\Repositories\PostRepository;
use App\Repositories\LocationRepository;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;

class PostController extends AdminController
{
    private $postRepository;
    private $locationRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = app(PostRepository::class);
        $this->locationRepository = app(LocationRepository::class);
        $this->categoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginate = $this->postRepository->getAllWithPaginate(10);

        return view('admin.blogpost.index', compact('paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $locationsList = $this->locationRepository->getForComboBox();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('admin.blogpost.create', compact( 'locationsList', 'categoryList' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogPostCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();


        $item = (new BlogPost())->create($data);



        if($item){

            $job = new BlogPostAfterCreateJob($item);
            $this->dispatch($job);

            return redirect()->route('PostRest.admin.edit', $item->id)->with(['success' => 'Successfuly Created' ]);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->postRepository->getEdit($id);
        $locationsList = $this->locationRepository->getForComboBox();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('admin.blogpost.edit', compact('item', 'locationsList', 'categoryList' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogPostUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->postRepository->getEdit($id);
        if(empty($item)){
            return back()->withErrors(['msg' => "the id=[{$id}] not found"])->withInput();
        }

        $data = $request->all();


        $result = $item->update($data);

        if($result){
            return redirect()->route('PostRest.admin.edit', $item->id)->with(['success' => 'Successfuly Updated' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BlogPost::destroy($id);

        //$result = blogpost::find($id)->forceDelete();

        if($result){
            return redirect()->route('PostRest.admin.index')->with(['success' => 'Successfuly Deleted' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
    }
}
