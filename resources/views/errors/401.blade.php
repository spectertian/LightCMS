<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>访问异常 - {{ config('app.name') }}</title>
    <meta name="keywords" content="二维码">
    <meta name="description" content="二维码">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/public/vendor/layui-v2.4.5/css/layui.css" media="all">
    <style>
        .tc{text-align:center}
        .error_500{padding:80px 0;}
        .error_500 p{font-size:24px;margin:50px 0;color: #FF5722}
        .error_500 .btn{width:160px;line-height:54px;font-size:22px;margin:0 auto;border-radius:5px;color: #FF5722}
    </style>
</head>
<body>
<div class="layui-container">
    <div class="error_500 tc">
        <p>{{ $exception->getMessage() }}</p>
        <a href="/" class="btn">返回首页</a> @if(\Auth::guard('admin')->check()) <a href="{{ route('admin::logout') }}" class="btn" style="margin-left: 20px">退出登录</a> @endif
    </div>
</div>
</body>
</html>