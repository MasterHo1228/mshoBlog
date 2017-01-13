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
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newTagDialog">添加标签
                    </button>
                    <br/>
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
                                    <button class="btn btn-xs btn-primary btnEdit" data-value="{{ $tag->id }}">编辑
                                    </button>
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

    <div class="modal fade" id="newTagDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">添加标签</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tagName">标签名称</label>
                        <input type="text" class="form-control" id="tagName" name="tagName" placeholder="标签名称">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-success pull-right" id="btnAddTag">添加</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="editTagDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">编辑标签</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editTagName">标签名称</label>
                        <input type="text" class="form-control" id="editTagName" name="editTagName" placeholder="标签名称">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-success pull-right" id="btnUpdateTag">添加</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-default fade" id="alertDeleteDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">删除标签</h4>
                </div>
                <div class="modal-body">
                    <p>确定要删除标签吗？删除标签后将无法恢复标签数据</p>
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
        var editID = '';
        $(function () {
            $("#articlesList").DataTable({
                paging: false,
                lengthChange: false,
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

            $("#btnAddTag").click(function () {
                var tagName = $("#tagName").val();
                $("#btnCloseDialog").data('action', '');
                if (tagName != '') {
                    $.ajax({
                        url: "{{ url('/backyard/tags') }}",
                        type: 'post',
                        data: {
                            _token: TOKEN,
                            name: tagName
                        },
                        dataType: 'json',
                        success: function (data) {
                            $("#newTagDialog").modal('hide');
                            if (data.response == 'true') {
                                $("#msgDialogMain").empty().text('添加成功！');
                                $("#tagName").val('');
                                $("#btnCloseDialog").data('action', 'reload');
                            } else {
                                $("#msgDialogMain").empty().text('添加失败！');
                            }
                            $("#msgDialog").modal('show');
                        },
                        error: function (data) {
                            console.log(data);
                            var errors = data.responseJSON;
                            var errorsHtml = '';
                            $.each(errors, function (key, value) {
                                errorsHtml += '<ul>';
                                errorsHtml += '<li>' + value[0] + '</li>';
                                errorsHtml += '</ul>';
                            });
                            $("#msgDialogMain").empty().html(errorsHtml);
                            $("#msgDialog").modal('show');
                        }
                    })
                } else {
                    $("#msgDialogMain").empty().text('请输入标签名称！');
                }
            });

            $(".btnEdit").click(function () {
                editID = $(this).data('value');
                if (editID != '') {
                    $.getJSON("{{ url('/backyard/tags') }}" + "/" + editID + "/info", function (data) {
                        $("#editTagName").empty().val(data.name);
                    });
                    $("#editTagDialog").modal('show');
                } else {
                    $("#msgDialogMain").empty().text('系统错误！');
                    $("#msgDialog").modal('show');
                }
            });

            $("#btnUpdateTag").click(function () {
                var tagID = editID;
                var tagName = $("#editTagName").val();
                $("#btnCloseDialog").data('action', '');
                if (tagID != '' && tagName != '') {
                    $.ajax({
                        url: "{{ url('/backyard/tags') }}" + "/" + tagID,
                        type: 'post',
                        data: {
                            _method: 'PATCH',
                            _token: TOKEN,
                            name: tagName
                        },
                        dataType: 'json',
                        success: function (data) {
                            $("#editTagDialog").modal('hide');
                            if (data.response == 'true') {
                                $("#msgDialogMain").empty().text('修改成功！');
                                $("#editTagName").val('');
                                $("#btnCloseDialog").data('action', 'reload');
                            } else {
                                $("#msgDialogMain").empty().text('修改失败！');
                            }
                            $("#msgDialog").modal('show');
                        },
                        error: function (data) {
                            console.log(data);
                            var errors = data.responseJSON;
                            var errorsHtml = '';
                            $.each(errors, function (key, value) {
                                errorsHtml += '<ul>';
                                errorsHtml += '<li>' + value[0] + '</li>';
                                errorsHtml += '</ul>';
                            });
                            $("#msgDialogMain").empty().html(errorsHtml);
                            $("#msgDialog").modal('show');
                        }
                    })
                } else {
                    $("#msgDialogMain").empty().text('请输入标签名称！');
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