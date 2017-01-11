@extends('backend.main.main')

@section('page_header','回收站')
@section('fa_icon','fa-trash-o')
@section('page_level','文章')
@section('page_here','回收站')
@section('page_content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="articlesList" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>作者</th>
                            <th>发布日期</th>
                            <th>删除日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->deleted_at }}</td>
                                <td>
                                    <button class="btn btn-xs btn-success btnRestore" data-value="{{ $article->id }}">
                                        恢复
                                    </button>
                                    <button class="btn btn-xs btn-danger btnDestroy" data-toggle="modal"
                                            data-target="#alertDestroyDialog" data-value="{{ $article->id }}">彻底删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>标题</th>
                            <th>作者</th>
                            <th>发布日期</th>
                            <th>删除日期</th>
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

    <div class="modal modal-danger fade" id="alertDestroyDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">彻底删除文章</h4>
                </div>
                <div class="modal-body">
                    <p>确定要删除文章吗？删除文章后将无法恢复。</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-outline" id="confirmDestroyArticle">确定</button>
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
        const TOKEN = "{{ csrf_token() }}";
        var destroyID = '';
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

            $(".btnRestore").click(function () {
                var restoreID = $(this).data('value');
                if (restoreID != '') {
                    $.ajax({
                        url: "{{ url('/backyard/articles') }}/" + restoreID + "/restore",
                        type: 'post',
                        data: {_token: TOKEN},
                        success: function (data) {
                            if (data.response == 'true') {
                                $("#msgDialogMain").empty().text('恢复文章成功！');
                                $("#btnCloseDialog").data('action', 'reload');
                            } else if (data.response == 'false') {
                                $("#msgDialogMain").empty().text('恢复文章失败！');
                                $("#btnCloseDialog").data('action', '');
                            }

                            $("#msgDialog").modal('show');
                        }
                    });
                }
            });

            $(".btnDestroy").click(function () {
                destroyID = $(this).data('value');
            });

            $("#confirmDestroyArticle").click(function () {
                if (destroyID != '') {
                    $.ajax({
                        url: "{{ url('/backyard/articles') }}/" + destroyID + "/destroy",
                        type: 'post',
                        data: {_token: TOKEN},
                        success: function (data) {
                            $("#alertDestroyDialog").modal('hide');
                            if (data.response == 'true') {
                                $("#msgDialogMain").empty().text('彻底删除成功！');
                                $("#btnCloseDialog").data('action', 'reload');
                            } else if (data.response == 'false') {
                                $("#msgDialogMain").empty().text('彻底删除失败！');
                                $("#btnCloseDialog").data('action', '');
                            }

                            $("#msgDialog").modal('show');
                        }
                    });
                }
            });

            $("#btnCloseDialog").click(function () {
                $("#msgDialog").modal('hide');

                switch ($(this).data('action')) {
                    case 'reload':
                        window.location.reload();
                        break;
                }
            })
        });
    </script>
@stop