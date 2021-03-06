@extends('frontend.layouts.default')
@section('title',$article->title)

@section('content')
    <div class="container">
        <div class="section section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-center">{{ $article->title }}</h2>
                    <h6 class="text-center">
                        <b>
                            作者:<a href="{{ route('frontend.users.profile',$article->user->id) }}">{{ $article->user->name }}</a>&nbsp;&nbsp;&nbsp;
                            更新时间:{{ $article->updated_at }}
                        </b><br/>
                        <b>阅读次数:{{ $article->read_count }}&nbsp;&nbsp;&nbsp;
                            标签:
                            @foreach($article->tags as $tag)
                                <a href="{{ route('frontend.tags.articles',$tag->id) }}">{{ $tag->name }}</a>
                            @endforeach
                        </b>
                    </h6>
                    <p class="description">{!! $article_content !!}</p>
                    <hr>
                    <h6 class="text-center">
                        发布日期:{{ $article->created_at }}
                    </h6>

                    @include('frontend.articles._disqus_comments')
                </div>
            </div>
        </div>
    </div>
@stop