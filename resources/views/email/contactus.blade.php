<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    @if(isset($p_id) && $p_id != null)
    @php 
        $title = 'Book A Trip';
        $contactfor = $package_name; 
    @endphp
    @elseif(isset($h_id) && $h_id != null)
    @php 
        $title = 'Hotel Availability'; 
        $contactfor = $hotel_name;
    @endphp
    @elseif(isset($v_id) && $v_id != null)
    @php 
        $title = 'Visa Enquiry'; 
        $contactfor = $visa_name;
    @endphp
    @else
    @php 
        $title = 'Contact Us';
        $contactfor = 'Enquiry'; 
    @endphp
    @endif
    <h2>{{ $title }}</h2>
    <p>Dear Admin,</p>
    <p>A new user has just registered to your website. Here are the details,</p>
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
            <th><strong>Contact For: </strong></th>
            <td>{{ $contactfor }}</td>
        </tr>
        <tr>
            <th><strong>Message: </strong></th>
            <td>{{$msg??''}}</td>
        </tr>
    </table>
    <p>Thank You!</p>
</body>
</html>