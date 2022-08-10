@extends('admin.admin_master')

@section('content')


<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn-close float-end fs-11" aria-label="Close"></button>
                <h6 class="card-title mb-0">Employee Card</h6>
            </div>
            <div class="card-body p-4 text-center">
                <div class="mx-auto avatar-xl mb-3">
                    <img src="{{(!empty($adminData->image))? url('image/'.$adminData->image): url('image/noimage/noimage.jpg')}}" alt="" class="img-fluid rounded">
                </div>
                <h5 class="card-title mb-1">{{$adminData->name}}</h5>
                <p class="text-muted mb-0">{{$adminData->email}}</p>
            </div>
            <a href="{{route('edit.profile')}}" class="btn btn-success btn-animation waves-effect waves-light" data-text="Edit Profile"><span>Edit Profile</span></a>
            <div class="card-footer text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-secondary"><i class="ri-facebook-fill"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-success"><i class="ri-whatsapp-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-primary"><i class="ri-linkedin-fill"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-danger"><i class="ri-slack-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- end col --> 
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn-close float-end fs-11" aria-label="Close"></button>
                <h6 class="card-title mb-0">Employee Card</h6>
            </div>
            <div class="card-body p-4 text-center">
                <div class="mx-auto avatar-md mb-3">
                    <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid rounded-circle">
                </div>
                <h5 class="card-title mb-1">Amelie Townsend</h5>
                <p class="text-muted mb-0">Project Manager</p>
            </div>
            <div class="card-footer text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-secondary"><i class="ri-facebook-fill"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-success"><i class="ri-whatsapp-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-primary"><i class="ri-linkedin-fill"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="lh-1 align-middle link-danger"><i class="ri-slack-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- end col --> 
   
</div>

   
@endsection