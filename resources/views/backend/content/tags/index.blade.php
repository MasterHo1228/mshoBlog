@extends('backend.main.main')

@section('page_header','标签管理')
@section('fa_icon','fa-tags')
@section('page_level','标签')
@section('page_here','标签管理')
@section('page_content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="articlesList" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>标签名</th>
                            <th>文章数量</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->count }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-primary">编辑</a>
                                    <button class="btn btn-xs btn-danger btnDelele" data-toggle="modal"
                                            data-target="#alertDeleteDialog" data-value="{{ $tag->id }}">删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="modal modal-default fade" id="alertDeleteDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">删除标签</h4>
                </div>
                <div class="modal-body">
                    <p>确定要删除标签吗？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteTag">确定</button>
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
        var del_id = '';
        $(function () {
            $("#articlesList").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                order: [[2, "desc"]],
                aoColumns: [
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

            $(".btnDelele").click(function () {
                del_id = $(this).data('value');
            });

            $("#confirmDeleteTag").click(function () {
                if (del_id != '') {
                    $.ajax({
                        url: "{{ url('/backyard/tags') }}/" + del_id,
                        type: 'post',
                        data: {_method: 'delete', _token: TOKEN},
                        success: function (data) {
                            $("#alertDeleteDialog").modal('hide');
                            if (data.response == 'true') {
                                $("#msgDialogMain").empty().text('删除成功！');
                                $("#btnCloseDialog").data('action', 'reload');
                            } else if (data.response == 'false') {
                                $("#msgDialogMain").empty().text('删除失败！');
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