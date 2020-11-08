<!DOCTYPE html>
<html lang="en">
<head>
     <title>Enquiry Email</title>
</head>
<body>
    <table>
        <tr><td>Dear Noor Alam Khan</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Enquiry Details are as below:</td></tr>
        <tr><td><strong>Name:</strong> {!! $data->name !!}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><strong>Email:</strong> {!! $data->email !!}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><strong>Sbuject:</strong>{!! $data->subject !!}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><strong>Message:</strong>{!! $data->comment !!}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><strong>Thanks & Regards <strong></td></tr>
        <tr><td><strong>Noor alam khan Portfolio<strong></td></tr>

    </table>
</body>
</html>
