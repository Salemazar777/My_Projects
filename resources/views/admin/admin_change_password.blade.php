@extends('admin.admin_master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Change Password</h4>  
            </div><!-- end card header -->
            <div class="card-body">
             <form method="POST" action="{{route('update.password')}}" >
                @csrf
              <div class="live-preview">            
                    <div class=" col-md-12">
                    <label for="oldpassword" class="form-label">Old Password</label>
                 <input type="password" name="oldpassword" placeholder="Enter Old Passsword" class="form-control" id="oldpassword">
                        @error('oldpassword')
                          <p style="color: red;">  {{$message}} </p>
                        @enderror
                </div>
            <div class=" col-md-12">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="password" name="newpasssword" placeholder="Enter New Password" class="form-control" id="newpassword">
                    @error('newpassword')
                     <p style="color: red;">  {{$message}} </p>
                    @enderror
                </div>
            <div class=" col-md-12">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" placeholder="Enter Comfirm Password" class="form-control" id="confirmpassword">
            </div>
                @error('confirmpassword')
                  <p style="color: red;">  {{$message}} </p>
                @enderror
            </div><br/>
            <input value="Change Password" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Change Password">
        </form>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

@endsection