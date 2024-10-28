<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p style="background-color: red">test</p>
    <span> المرسل <del>{{$name->section}}</del></span>

    <a class="btn btn-success" href="{{$url}}">التحقق</a>

    <span>شكرا لاستخدامك فاتورتك</span>
</body>
</html>
