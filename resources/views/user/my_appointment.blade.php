<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 @include('user.header')

 @if (session()->has('message'))

    <div class="alert alert-success" style="text-align: center">
        <button type="button" class="close" data-dismiss="alert"> X </button>
        {{session()->get('message')}}
    </div>

    @endif

    <div style="padding: 70px">
        <table align="center">
            <tr style="background-color: black; color: white; ">
                <th style="padding:10px; font-size:20px;">S/N</th>
                <th style="padding:10px; font-size:20px;">Doctor Name</th>
                <th style="padding:10px; font-size:20px;">Date</th>
                <th style="padding:10px; font-size:20px;">Message</th>
                <th style="padding:10px; font-size:20px;">Status</th>
                <th style="padding:10px; font-size:20px;">Cancel Appointment</th>
            </tr>


            @foreach ($appoint as $appoint )
                <tr style="background-color: black; color:white; " align="center">
                    <td style="padding:10px; font-size:15px;">{{$appoint->id}}</td>
                    <td style="padding:10px; font-size:15px;">{{$appoint->name}}</td>
                    <td style="padding:10px; font-size:15px;">{{$appoint->date}}</td>
                    <td style="padding:10px; font-size:15px;">{{$appoint->message}}</td>
                    <td style="padding:10px; font-size:15px;">{{$appoint->status}}</td>

                    <td> <a  class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{url('cancel_appoint', $appoint->id)}}">Cancel</a> </td>
                </tr>
            @endforeach

        </table>
    </div>





















 @include('user.footer')

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>
