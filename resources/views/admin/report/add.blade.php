@extends('admin.base')

@section('content')
    <div class="layui-card">

        @include('admin.breadcrumb')

        <div class="layui-card-body">
            <form class="layui-form" action="@if(isset($id)){{ route('admin::report.update', ['id' => $id]) }}@else{{ route('admin::report.save') }}@endif" method="post">
                @if(isset($id)) {{ method_field('PUT') }} @endif
                <div class="layui-form-item">
                    <label class="layui-form-label">报告编号</label>
                    <div class="layui-input-block">
                        <input type="text" name="report_id" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $model->report_id ?? ''  }}">
                    </div>
                </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">委托方</label>
                        <div class="layui-input-block">
                            <input type="text" name="client_name" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $model->client_name ?? ''  }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">委托方地址</label>
                        <div class="layui-input-block">
                            <input type="text" name="client_address" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $model->client_address ?? ''  }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">样品名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="sample_name" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $model->sample_name ?? ''  }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">型号规格</label>
                        <div class="layui-input-block">
                            <input type="text" name="model_spec" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{ $model->model_spec ?? ''  }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">接收日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="receive_date" required class="layui-input" id="ID-laydate-demo" placeholder="yyyy-MM-dd"  value="{{ $model->receive_date ?? ''  }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">检测日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="test_date" required class="layui-input" id="ID-laydate-demo" placeholder="yyyy-MM-dd"  value="{{ $model->test_date ?? ''  }}">

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">报告日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="report_date" required class="layui-input" id="ID-laydate-demo" placeholder="yyyy-MM-dd"  value="{{ $model->report_date ?? ''  }}">

                        </div>
                    </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formAdminUser" id="submitBtn">提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var form = layui.form;

        //监听提交
        form.on('submit(formAdminUser)', function(data){
            window.form_submit = $('#submitBtn');
            form_submit.prop('disabled', true);
            $.ajax({
                url: data.form.action,
                data: data.field,
                success: function (result) {
                    if (result.code !== 0) {
                        form_submit.prop('disabled', false);
                        layer.msg(result.msg, {shift: 6});
                        return false;
                    }
                    layer.msg(result.msg, {icon: 1}, function () {
                        if (result.reload) {
                            location.reload();
                        }
                        if (result.redirect) {
                            location.href = '{!! url()->previous() !!}';
                        }
                    });
                }
            });

            return false;
        });
    </script>

    <script src="//unpkg.com/layui@2.9.18/dist/layui.js"></script>
    <script>
        layui.use(function(){
            var laydate = layui.laydate;
            // 渲染
            laydate.render({
                elem: '#ID-laydate-demo'
            });


        });
    </script>
@endsection
