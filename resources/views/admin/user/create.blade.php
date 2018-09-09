@include('admin.layout.header')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>添加用户</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="form_basic.html#">选项1</a>
                </li>
                <li><a href="form_basic.html#">选项2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal" method="POST" action="/admin/users">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="请输入用户名" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="请输入密码" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                     <button class="btn btn-primary">保存信息</button>
                    <a href="/admin/users/" class="btn btn-info">取消返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
@include('admin.layout.footer')