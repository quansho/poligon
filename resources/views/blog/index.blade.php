@extends('layouts.app')



@section('content')



    <div class="container">
        <div class="row">

    @foreach ($paginate as $row)


                <div class="col-md-4">
                    <div class="blog-card blog-card-blog">
                        <div class="blog-card-image">
                            <a href="{{route('PostGuest.show', $row->slug)}}"> <img class="img" src="https://picsum.photos/id/1084/536/354?grayscale"> </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="blog-table">
                            <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i>{{$row->category->title}}</h6>
                            <h4 class="blog-card-caption">
                                <a href="{{route('PostGuest.show', $row->slug)}}">{{$row->title}}</a>
                            </h4>
                            <p class="blog-card-description">{{$row->excerpt}}</p>
                            <div class="ftr">
                                <div class="author">
                                    <a href="#"> <img src="https://picsum.photos/id/1005/5760/3840" alt="..." class="avatar img-raised"> <span>Admin </span> </a>
                                </div>
                                <div class="stats"> <i class="far fa-clock"></i> 10 min </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        {{ $paginate->links() }}
    </div>



@endsection


@push('scripts')



@endpush

