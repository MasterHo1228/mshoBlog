@extends('backend.main.main')

@section('page_header','文章管理')
@section('fa_icon','fa-th-list')
@section('page_level','文章')
@section('page_here','文章管理')
@section('page_content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="articleList" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>阅读数</th>
                            <th>种类</th>
                            <th>发布日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles_list as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->read_count }}</td>
                                <td>{{ $article->type }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-success">预览</a>
                                    <a href="#" class="btn btn-xs btn-primary">编辑</a>
                                    <a href="#" class="btn btn-xs btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>标题</th>
                            <th>阅读数</th>
                            <th>种类</th>
                            <th>发布日期</th>
                            <th>操作</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
@section('external_scripts')
    <script>
        $(function () {
            $("#articleList").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                retrieve: true,
                responsive: true,
                sPaginationType: "full_numbers",
                oLanguage: {
                    sLengthMenu: "每页显示 _MENU_ 条记录",
                    sInfo: "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                    sInfoEmpty: "没有数据",
                    sInfoFiltered: "(从 _MAX_ 条数据中检索)",
                    sZeroRecords: "没有检索到数据",
                    sSearch: "搜索:",
                    oPaginate: {
                        sFirst: "首页",
                        sPrevious: "前一页",
                        sNext: "后一页",
                        sLast: "尾页"
                    }
                }
            });
        });
    </script>
@stop