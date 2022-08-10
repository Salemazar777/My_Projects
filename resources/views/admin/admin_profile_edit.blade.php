@extends('admin.admin_master')
@section('content')
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Profile</h4>  
            </div><!-- end card header -->
            <div class="card-body">
             <form method="POST" action="{{route('update.profile')}}" enctype="multipart/form-data">
                @csrf
              <div class="live-preview">            
                    <div class=" col-md-12">
                    <label for="basiInput" class="form-label">Name</label>
                 <input type="text" value="{{$editData->name}}" name="name" placeholder="Enter Name" class="form-control" id="basiInput">
            </div>
            <div class=" col-md-12">
                    <label for="basiInput" class="form-label">Email</label>
                    <input type="email" value="{{$editData->email}}" name="email" placeholder="Enter Email" class="form-control" id="basiInput">
            </div>
            <div class="col-md-12" style="margin: 20px 0px;">
                <div class="input-group">
                    <label class="input-group-text" for="image">Upload</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>
              <div style="margin-bottom:20px;" class="mt-4 mt-md-0 ">
                  <img class="rounded  avatar-xl" id="showimage" alt="200x200" src="{{asset('admin/assets/images/users/avatar-4.jpg')}}" data-holder-rendered="true">
              </div>
           
            <input type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Update Profile">
             
        </form>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection