<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">

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


                <form action="{{url('sendemail',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label >Greeting</label>
                        <input type="text" style="color: black" name="greeting" placeholder="Your Name" required>
                    </div>



                    <div style="padding: 15px;">
                        <label >Body</label>
                        <textarea id="w3review" name="body" rows="4" cols="50" style="color:black" required> </textarea>

                    </div>



                    <div style="padding: 15px;">
                        <label >Action Text</label>
                        <input type="text" style="color: black" name="actiontext" placeholder="Write the action text" required>
                    </div>

                    <div style="padding: 15px;">
                        <label >Action Url</label>
                        <input type="text" style="color: black" name="actionurl" placeholder="Write the url" required>
                    </div>

                    <div style="padding: 15px;">
                        <label >End Part</label>
                        <input type="text" style="color: black" name="endpart" placeholder=" " required>
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
