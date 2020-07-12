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

        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("blog")}}</h1>
        </div>



        <div class="col-md-12">


            <a href="{{route('PostRest.admin.create')}}" class="btn btn-primary">{{__("Add new")}}</a>
            <div class="filter-div d-flex justify-content-between ">
                <div class="col-left">
                </div>

            </div>
            <div class="panel">
                <div class="panel-body">
                    <form action="" class="bravo-form-item">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{("#")}}</th>
                                <th>{{__("Name")}}</th>
                                <th >{{__("Slug")}}</th>
                                <th >{{__("Category")}}</th>
                                <th >{{__("Location")}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if( $paginate != null)


                                @foreach ($paginate as $row)

                                    <tr>
                                        <td >{{$row->id}}</td>

                                        <td><a href="{{ route('PostRest.admin.edit', $row->id)  }}">{{$row->title}}</a></td>

                                        <td><span>{{$row->slug}}</span></td>

                                        <td><span>{{$row->category->title}}</span></td>

                                        <td><span>{{($row->location->title)}}</span></td>
                                    </tr>

                                @endforeach


                            @else
                                <tr>
                                    <td colspan="4">{{__("No data")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        {{ $paginate->links() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
