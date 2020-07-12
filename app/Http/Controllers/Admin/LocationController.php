<?php
namespace App\Http\Controllers\Admin;

use App\Models\BlogPostLocation;
use App\Repositories\LocationRepository;
use App\Http\Requests\BlogLocationCreateRequest;
use App\Http\Requests\BlogLocationUpdateRequest;

class LocationController extends AdminController
{

    protected $locationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->locationRepository = app(LocationRepository::class);
    }

    public function index()
    {

        $paginate = $this->locationRepository->getAllWithPaginate(10);

        return view('admin.locations.index', compact('paginate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locationsList = $this->locationRepository->getForComboBox();

        return view('admin.locations.create', compact( 'locationsList' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogLocationCreateRequest $request)
    {
        $data = $request->input();



        $item = (new BlogPostLocation())->create($data);




        if($item){
            return redirect()->route('LocationsRest.admin.edit', $item->id)->with(['success' => 'Successfuly Created' ]);
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
        $item = $this->locationRepository->getEdit($id);
        $locationsList = $this->locationRepository->getForComboBox();


        return view('admin.locations.edit', compact('item', 'locationsList' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogLocationUpdateRequest $request, $id)
    {
        $item = $this->locationRepository->getEdit($id);
        if(empty($item)){
            return back()->withErrors(['msg' => "the id=[{$id}] not found"])->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if($result){
            return redirect()->route('LocationsRest.admin.edit', $item->id)->with(['success' => 'Successfuly Updated' ]);
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
        $result = BlogPostLocation::destroy($id);

        //$result = BlogPostLocation::find($id)->forceDelete();

        if($result){
            return redirect()->route('CategoryRest.admin.index')->with(['success' => 'Successfuly Deleted' ]);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }
    }

}
