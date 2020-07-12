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
                    <div class="panel-title">{{__("Add Category")}}</div>
                    <div class="panel-body panel-index">
                        <form action="{{route('LocationsRest.admin.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Name")}}</label>
                                <input type="text" value="" placeholder="{{__("Category name")}}" name="title" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>{{__("Slug")}}</label>
                                <input type="text" value="" placeholder="{{__("Slug")}}" name="slug" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{__("Parent")}}</label>
                                <div class="">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">No Parent</option>
                                        @foreach($locationsList[0] as $locationOption)
                                            <option value="{{$locationOption->id}}">
                                                {{$locationOption->id_title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{__("map_lat")}}</label>
                                <input type="text" value="" placeholder="{{__("map_lat")}}" name="map_lat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>{{__("map_lng")}}</label>
                                <input type="text" value="" placeholder="{{__("map_lng")}}" name="map_lng" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>{{__("map_zoom")}}</label>
                                <input type="text" value="" placeholder="{{__("Map zoom")}}" name="map_zoom" class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="control-label">{{__("Description")}}</label>

                                <textarea class="form-control" name="description" class="" cols="30" rows="10"></textarea>
                            </div>


                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Add new")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
