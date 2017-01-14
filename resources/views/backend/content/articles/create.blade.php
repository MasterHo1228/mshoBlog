@extends('backend.main.main')
@section('external_css')
    {!! editor_css() !!}
@stop
@section('page_header','添加新文章')
@section('fa_icon','fa-th-list')
@section('page_level','文章')
@section('page_here','写文章')
@section('page_content')
    <form action="{{ route('articles.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group col-sm-10 col-sm-offset-1">
            <label for="articleTitle">文章标题</label>
            <input type="text" class="form-control" id="articleTitle" name="title" placeholder="在此输入文章标题"
                   value="{{ old('title') }}" required>
        </div>
        <div class="form-group col-sm-10 col-sm-offset-1">
            <label for="articleTags">标签</label>
            <input type="text" class="form-control" id="articleTags" name="tags" placeholder="在此添加标签 多个标签用,(英文字符)隔开"
                   value="{{ old('tags') }}" required>
        </div>
        <div id="mdeditor">
            <textarea class="form-control" name="content" style="display:none;">{{ old('content') }}</textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-success">发布</button>
        <button class="btn btn-primary">保存</button>
    </form>
@stop
@section('external_scripts')
    {!! editor_js() !!}
    {!! editor_config('mdeditor') !!}

    <script>
        var tags = [
                @foreach ($tags as $tag)
            {
                tag: "{{$tag}}"
            },
            @endforeach
        ];

        $('#articleTags').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'tag',
            labelField: 'tag',
            searchField: 'tag',
            options: tags,
            create: function (input) {
                return {
                    tag: input
                }
            }
        });
    </script>
@stop