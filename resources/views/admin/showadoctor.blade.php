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
                        <th style="padding: 15px;">Doctor Name</th>
                        <th style="padding: 15px;">Phone</th>
                        <th style="padding: 15px;">Speciality</th>
                        <th style="padding: 15px;">Room No.</th>
                        <th style="padding: 15px;">Image</th>
                        <th style="padding: 15px;">Action</th>
                        <th style="padding: 15px;">Update</th>

                    </tr>

                    @foreach ($data as $data)

                    <tr align="center" style="background-color: skyblue;">
                        <td>{{$data->name}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->speciality}}</td>
                        <td>{{$data->room}}</td>
                        <td> <img style="width: 100px; height:100px; object-fit:cover" src="doctorimage/{{$data->image}}" alt=""> </td>

                        <td>
                            <a onclick="return confirm('Are you sure to delete this?')" href="{{url('deletedoctor',$data->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                        <td>
                            <a href="{{url('updatedoctor',$data->id)}}" class="btn btn-primary">Update</a>
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
