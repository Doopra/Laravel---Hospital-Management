<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->


    @include('admin.css')

    <style>
        label{
           display: inline-block;
           width: 200px;
        }
    </style>
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


            <div class="container" align="center" style="padding-top: 100px">

                @if (session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"> X </button>
                {{session()->get('message')}}
            </div>

            @endif


                <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label >Doctor Name</label>
                        <input type="text" style="color: black" name="name" placeholder="Your Name" required>
                    </div>



                    <div style="padding: 15px;">
                        <label >Phone Number</label>
                        <input type="number" style="color: black" name="phone" placeholder="Your Number" required>
                    </div>

                    <div style="padding: 15px;">
                        <label >Your Speciality</label>
                        <select name="speciality" id="" style="color:black; width:200px;" required>
                            <option >----Select-----</option>
                            <option value="skin"> Skin Doctor</option>
                            <option value="heart"> Heart Doctor</option>
                            <option value="eye"> Eye Doctor</option>
                            <option value="nose"> Nose Doctor</option>
                        </select>

                    </div>

                    <div style="padding: 15px;">
                        <label >Room Number</label>
                        <input type="text" style="color: black" name="room" placeholder="Write the room number" required>
                    </div>

                    <div style="padding: 15px;">
                        <label >Doctor Image</label>
                        <input type="file" style="color: black" name="file"  required>
                    </div>

                    <div style="padding: 15px;">
                        <input type="submit" name="submit" class="btn btn-success" id="">
                    </div>

                </form>

            </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
