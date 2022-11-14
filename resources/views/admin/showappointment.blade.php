<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->


    @include('admin.css')
     </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">



            <div align="center" style="padding: 100px;">
                @if (session()->has('message'))

                <div class="alert alert-success" style="text-align: center">
                    <button type="button" class="close" data-dismiss="alert"> X </button>
                    {{session()->get('message')}}
                </div>

                @endif
                <table >
                    <tr style="background-color: black">
                        <th style="padding: 15px;">Customer Name</th>
                        <th style="padding: 15px;">Email</th>
                        <th style="padding: 15px;">Phone</th>
                        <th style="padding: 15px;">Doctor Name</th>
                        <th style="padding: 15px;">Date</th>
                        <th style="padding: 15px;">Message</th>
                        <th style="padding: 15px;">Status</th>
                        <th style="padding: 15px;">Approve</th>
                        <th style="padding: 15px;">Canceled</th>
                        <th style="padding: 15px;">Send Mail</th>
                    </tr>

                    @foreach ($data as $data)

                    <tr align="center" style="background-color: skyblue;">
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->doctor}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->message}}</td>
                        <td>{{$data->status}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('approved',$data->id)}}">Approve</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('canceled',$data->id)}}"> Cancel</a>
                        </td>

                        <td>
                            <a class="btn btn-primary" href="{{url('emailview',$data->id)}}"> Send Mail</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
