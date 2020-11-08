<!DOCTYPE html>
<html lang="en">
<head>
        <title>Forgot Password Email</title>
        <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}" crossorigin="anonymous">
</head>
<body>
    <table>
        <tr><td>Dear {{$username ?? ""}}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Please click on below link to activate your account:</td></tr>
        <tr><td>Email: {{$email}}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><p>To Reset Your Password <br/>
            <a class="btn btn-primary btn-lg" href="{{route('admin.recover.password',$code ?? "sdf")}}">Click here</a></p></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thanks & Regards, </td></tr>
        <tr><td><p class="text-info">CopyRight&copy;right by noor alam khan</p></td></tr>

    </table>
</body>
</html>

