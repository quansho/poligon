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
            <h1 class="title-bar">{{__("categories")}}</h1>
        </div>



            <div class="col-md-12">


                <a href="{{route('CategoryRest.admin.create')}}" class="btn btn-primary">{{__("Add new")}}</a>
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
                                    <th class="slug d-none d-md-block">{{__("Slug")}}</th>
                                    <th class="parent">{{__("Parent")}}</th>
                                    <th class="date d-none d-md-block" >{{__("Updated At")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( $paginate != null)


                                    @foreach ($paginate as $row)

                                    <tr>
                                        <td >
                                            {{$row->id}}
                                        </td>

                                        <td>
                                            <a href="{{ route('CategoryRest.admin.edit', $row->id)  }}">{{$row->title}}</a>
                                        </td>

                                        <td><span>{{$row->slug}}</span></td>

                                        <td><a href="@if($row->parent_id != 0) {{ route('CategoryRest.admin.edit', $row->parent_id)  }} @endif"><span>{{ $row->parentTitle}}</span></a></td>

                                        <td><span>{{($row->updated_at)}}</span></td>
                                    </tr>

                                    @endforeach


                                @else
                                    <tr>
                                        <td colspan="5">{{__("No data")}}</td>
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
