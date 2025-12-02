<!DOCTYPE html>
<html>
<head>
<title>Thank You</title>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <h2>Thank You for Choosing Us</h2>
    <p>Dear {{$name??''}},</p>
    <p>Thanks again for submit your details:</p>
    <table >
        <tr>
            <th><strong>Name: </strong></th>
            <td>{{$name??''}}</td>
        </tr>
        <tr>
            <th><strong>Phone: </strong></th>
            <td>{{$phone??''}}</td>
        </tr>
        <tr>
            <th><strong>Email: </strong></th>
            <td>{{$email??''}}</td>
        </tr>
        <tr>
            <th><strong>Message: </strong></th>
            <td>{{$msg??''}}</td>
        </tr>
    </table>
    <table>
        <tfoot>
                <tr>
                    <td style="text-align: center;background-color: #f1f1f1;padding:15px;font-family: 'Lato', sans-serif;"><p>
                        <b>Reach us at</b><br> info@admiretourism.com </p>
                        <ul style="display:inline-block;list-style:none;text-align: center; margin: 0px; padding: 0px;"></ul>
                    </td>
                </tr>
        </tfoot>
    </table>
   
</body>
</html>