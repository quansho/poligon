@extends('layouts.app')



@section('content')


    <section class="article">

        <div class="blog-single-head">

            <div class="blog-single-head-text">

            </div>
        </div>

        <div class="single-blog">
            <div class="col-12 blog-box-main">
                <div class="article-content">




                </div>

                <h3>Comments:</h3>
                <div style="margin-bottom:50px;" v-if="user">
                    <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="commentBox" ></textarea>
                    <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Save Comment</button>
                </div>
                <div v-else>
                    <h4>You must be logged in to submit a comment!</h4> <a href="/login">Login Now</a>
                </div>



                <div class="media" style="margin-top:20px;" v-for="comment in comments">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="http://placeimg.com/80/80" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">@{{comment.user.name}} said...</h4>
                        <p>
                            @{{comment.body}}
                        </p>
                        <span style="color: #aaa;">on @{{comment.created_at}}</span>
                    </div>
                </div>

            </div>

        </div>

    </section>


@endsection

@section('scripts')
    <script>
            const app = new Vue({
                el:'#app',
                data: {
                    comments: {},
                    commentBox: '',
                    post: {!! $post->toJson() !!},
                    user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
                },
                mounted(){
                  this.getComments();
                  this.listen();
                },
                methods: {
                    getComments(){
                        axios.get(`/api/posts/${this.post.id}/comments`)
                        .then((response)=>{
                            this.comments = response.data
                        }).catch(function (error) {
                            console.log(error)
                        });
                    },
                    postComment(){
                        axios.post(`/api/posts/${this.post.id}/comment`, {
                            api_token: this.user.api_token,
                            body: this.commentBox,
                        }).then((response)=>{
                            this.comments.unshift(response.data);
                            this.commentBox = ''
                        }).catch(function (error) {
                            debugger
                            console.log(error)
                        });
                    },
                    listen()
                    {
                        console.log('init listenserv');
                        Echo.channel('post.'+this.post.id)
                            .listen('NewComment', (comment)=>{
                                this.comments.unshift(comment);
                            })
                    }
                }
            });



    </script>

@endsection


