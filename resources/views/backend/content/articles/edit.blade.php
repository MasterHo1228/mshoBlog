@extends('backend.main.main')
@section('external_css')
    {!! editor_css() !!}
@stop
@section('page_header','编辑文章')
@section('fa_icon','fa-edit')
@section('page_level','文章')
@section('page_here','编辑文章')
@section('page_content')
    <form action="{{ route('articles.update',$article->id) }}" method="post" role="form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group col-sm-10 col-sm-offset-1">
            <label for="articleTitle">文章标题</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="在此输入文章标题"
                   value="{{ $article->title }}" required>
        </div>
        <div class="form-group col-sm-10 col-sm-offset-1">
            <label for="articleTitle">类型</label>
            {{--<select class="form-control" id="articleType" name="type">--}}
            {{--@foreach ($types as $type)--}}
            {{--<option value="{{ $type->id }}"--}}
            {{--@if($article->type == $type->id)--}}
            {{--selected--}}
            {{--@endif>{{ $type->name }}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
        </div>
        <div id="mdeditor">
            <textarea class="form-control" name="content" style="display:none;">{{ $article->content }}</textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-success">发布</button>
        <button class="btn btn-primary">保存</button>
    </form>
@stop
@section('external_scripts')
    {!! editor_js() !!}
    {!! editor_config('mdeditor') !!}
@stop