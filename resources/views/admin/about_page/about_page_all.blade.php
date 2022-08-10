@extends('admin.admin_master')

@section('content')
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">About Page</h4>  
            </div><!-- end card header -->
            <div class="card-body">
             <form method="POST" action="{{route('update.about')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$aboutpage->id}}" />
              <div class="live-preview">            
                    <div class=" col-md-12">
                    <label for="title" class="form-label">Title</label>
                 <input type="text" value="{{$aboutpage->title}}" name="title" class="form-control" id="title">
            </div>
            <div class=" col-md-12">
                    <label for="short_title" class="form-label">Short Title</label>
                    <input type="text" value="{{$aboutpage->short_title}}" name="short_title" class="form-control" id="short_title">
            </div>
            <div class=" col-md-12">
                <label for="video_url" class="form-label">Short Description </label>
                <textarea required="" id="elm1"  name="short_description" class="form-control" rows="5">{{$aboutpage->short_description}}</textarea>
                
            </div>
            <div class=" col-md-12">
                <label for="elm1" class="form-label">Long Description </label>
                <textarea required id="elm1"  name="long_description" class="form-control" rows="5">{{$aboutpage->long_description}}</textarea>
                
            </div>
            <div class="col-md-12" style="margin: 20px 0px;">
                <div class="input-group">
                    <label class="input-group-text" for="image">About Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>
              <div style="margin-bottom:20px;" class="mt-4 mt-md-0 ">
                  <img class="rounded  avatar-xl" id="showimage" alt="200x200" src="{{(!empty($aboutpage->about_image))? url('image/aboutpage/'.$aboutpage->about_image): url('image/noimage/noimage.jpg')}}" data-holder-rendered="true">
              </div>
           
            <input type="submit" value="Update About Page" class="btn btn-success btn-animation waves-effect waves-light" data-text="Update About Page">
             
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