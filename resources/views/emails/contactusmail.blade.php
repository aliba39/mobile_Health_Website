<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

@component('mail::message')
<h1>Message Sent Confirmation</h1>

<p>Your message has been sent, we will reply soon.</p>

<h1>Message:</h1>
</head>

<body>
<table>
    <tr>
        <td><h2>Name</h2></td>
        <td>{{$name}}</td>
    </tr>
    <tr>
        <td><h2>Email</h2></td>
        <td>{{$email}}</td>
    </tr>
    <tr>
        <td><h2>Subject</h2></td>
        <td>{{$subject}}</td>
    </tr>
    <tr>
        <td><h2>Message</h2></td>
        <td>{{$message}}</td>
    </tr>
</table>


@component('mail::button', ['url' => '/'])
    Return to Home Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

</body>
</html>
