@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Ooo no!</strong> {{$errors->first() }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Wow!</strong>  {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


        <div class="row">
            <div class="col-md-12 ">
                <div class="panel">
                    <div class="panel-title">{{__("Edit Category")}} <b>{{$item->title}}</b> </div>
                    <div class="panel-body panel-index">
                        <form action="{{route('CategoryRest.admin.update', $item->id )}}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>{{__("Name")}}</label>
                                <input type="text" value="{{$item->title}}" placeholder="{{__("Category name")}}" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>{{__("Slug")}}</label>
                                <input type="text" value="{{$item->slug}}" placeholder="{{__("Slug")}}" name="slug" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{__("Parent")}}</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">No Parent</option>
                                        @foreach($categoryList[0] as $categoryOption)
                                            <option value="{{$categoryOption->id}}" @if($categoryOption->id == $item->parent_id) selected @endif>
                                                {{$categoryOption->id_title}}
                                            </option>
                                            @endforeach

                                    </select>

                            </div>


                            <div class="form-group">
                                <label class="control-label">{{__("Description")}}</label>

                                    <textarea class="form-control" name="description" class="" cols="30" rows="10">{{$item->description}}</textarea>
                                </div>


                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Update")}}</button>
                            </div>
                        </form>
                        <form action="{{route('CategoryRest.admin.destroy', $item->id )}}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <button class="btn btn-warning" type="submit">{{__("Delete")}}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
