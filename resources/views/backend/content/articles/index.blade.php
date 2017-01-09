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
                    <table id="articlesList" class="table table-bordered table-striped">
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
                                    <button class="btn btn-xs btn-success btnPreview" data-value="{{ $article->id }}">
                                        预览
                                    </button>
                                    <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-xs btn-primary">编辑</a>
                                    <button class="btn btn-xs btn-danger btnDelele" data-toggle="modal"
                                            data-target="#alertDeleteDialog" data-value="{{ $article->id }}">删除
                                    </button>
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

    <div class="modal fade" id="articlePreviewDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">文章预览</h4>
                </div>
                <div class="modal-body" id="previewArticleContent">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-danger fade" id="alertDeleteDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">删除文章</h4>
                </div>
                <div class="modal-body">
                    <p>确定要删除文章吗？删除文章后将无法恢复。</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-outline" id="confirmDeleteArticle"
                            data-token="{{ csrf_token() }}">确定
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="msgDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body" id="msgDialogMain">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" id="btnCloseDialog">关闭</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop
@section('external_scripts')
    <script>
        var del_id = '';
        $(function () {
            $("#articlesList").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                order: [[3, "desc"]],
                aoColumns: [
                    null,
                    null,
                    null,
                    null,
                    {"bSortable": false}
                ],
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

            $(".btnPreview").click(function () {
                var show_id = $(this).attr('data-value');
                if (show_id != '') {
                    $.ajax({
                        url: "{{ url('/backyard/articles') }}/" + show_id,
                        type: 'get',
                        dataType: 'json',
                        success: function (response) {
                            $("#previewArticleContent").empty().html(response.data);
                            $("#articlePreviewDialog").modal('show');
                        }
                    })
                }
            });

            $(".btnDelele").click(function () {
//                del_id = $(this).attr('data-value');
                del_id = $(this).data('value');
            });

            $("#confirmDeleteArticle").click(function () {
                if (del_id != '') {
                    var token = $(this).data('token');
                    $.ajax({
                        url: "{{ url('/backyard/articles') }}/" + del_id,
                        type: 'post',
                        data: {_method: 'delete', _token: token},
                        success: function (data) {
                            if (data.response == 'true') {
                                $("#alertDeleteDialog").modal('hide');
                                $("#msgDialogMain").empty().text('删除成功！');
                                $("#btnCloseDialog").data('action','reload');

                                $("#msgDialog").modal('show');
                            }
                        }
                    });
                }
            });

            $("#btnCloseDialog").click(function () {
                $("#msgDialog").modal('hide');

                switch ($(this).data('action')){
                    case 'reload':window.location.reload();break;
                }
            })
        });
    </script>
@stop