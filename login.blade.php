<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>中信联盟-登录页</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="./static/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./static/css/font-icon/iconfont.css">
    <link rel="stylesheet" href="./static/css/indexcss.css">
    <link rel="stylesheet" href="./static/css/index.css">
    <script src="./static/js/jquery/jquery.min.js"></script>
    <script src="./static/js/layer.js"></script>



</head>

<body class="hold-transition login-page-bg">
<div class="login-box">

    <div class="login-box-body" style="padding-top: 2.8em;padding-bottom:8%">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <form>
                    <div class="form-group has-feedback" style="margin-bottom: 45px;margin-top: -35px;">
                        <span class="text-center" style="font-size:20px;color:#2B3251">账号登录</span>
                    </div>
                    <div class="form-group has-feedback" style="margin-bottom: 20px;position: relative;">
                        <div class="position_ab">
                            <img src="{{STATICS_PATH_IMG}}/peo.png" alt="">
                        </div>
                        <input type="text" class="form-control login-box-css" id="userName" placeholder="请输入用户名称">

                    </div>
                    <div class="form-group has-feedback" style="margin-bottom: 20px;">
                        <div  class="position_ab">
                            <img src="{{STATICS_PATH_IMG}}/lock.png" alt="">
                        </div>
                        <input type="password" class="form-control login-box-css" id="password" placeholder="请输入登录密码">

                    </div>
                    <div>
                        <button type="button" class="btn login-primary btn-block btn-flat js-login-button">登录</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
        </div>


    </div>
</div>
<script type="text/javascript">
$(".js-login-button").click(function () {
    var userName=$("#userName").val();
    var password=$("#password").val();

    if (!userName){
        layer.msg('用户名不能为空');
        return;
    }
    if (!password){
        layer.msg('密码不能为空');
        return;
    }
	_This = $(this);
    $.ajax({
        type: 'POST',
        url: '/ajax/MemberAjax/login',
        data: {userName:userName,password:password},
        dataType: 'json',
        success: function (data)
        {
            if (data.code==200){
                window.location.href=data.url;
            }else {
                layer.msg('用户名或密码错误');
            }
        },
        error: function ()
        {
        	layer.msg('用户名或密码错误');
        }
    });
});

$(document).keyup(function(event){
    if(event.keyCode ==13){
        $(".js-login-button").trigger("click");
    }
});
</script>
</body>

</html>