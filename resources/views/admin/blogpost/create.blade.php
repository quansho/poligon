@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ooo no!</strong>
                @foreach($errors->all() as $errTxt)
                    <li>{{$errTxt}}</li>
                @endforeach
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
                    <div class="panel-title">{{__("Add Post")}}</div>
                    <div class="panel-body panel-index">
                        <form id="create-form" action="{{route('PostRest.admin.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Name")}}</label>
                                <input type="text" value="{{old('title')}}" placeholder="{{__("Post name")}}" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__("Content")}}</label>
                                <textarea name="content_raw" hidden></textarea>
                                <textarea id="content-editor" name="content-editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>{{__("Slug")}}</label>
                                <input type="text" value="{{old('slug')}}" placeholder="{{__("Slug")}}" name="slug" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{__("Category")}}</label>
                                <div class="">
                                    <select class="form-control" name="category_id">
                                        <option value="0">No Parent</option>
                                        @foreach($categoryList[0] as $categoryOption)
                                            <option value="{{$categoryOption->id}}">
                                                {{$categoryOption->id_title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{__("Location")}}</label>
                                <div class="">
                                    <select class="form-control" name="location_id">
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
                                <label class="control-label">{{__("Excerpt")}}</label>
                                <textarea class="form-control" name="excerpt" class="" cols="30" rows="10">{{old('excerpt')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{__("Published")}}</label>
                                <input type="checkbox" value="1" name="is_published">
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

@push('custom-scripts')
    <script>

        tinymce.init(editor_config);


        $('#create-form').submit(function() {
            let new_content = tinymce.get('content-editor').getContent();
            $('textarea[name=content_raw]').val(new_content);
            return true;
        });
    </script>


    @endpush
