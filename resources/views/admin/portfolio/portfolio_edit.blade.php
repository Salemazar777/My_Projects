

@extends('admin.admin_master')

@section('content')
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Portfolio Edit Page</h4>  
            </div><!-- end card header -->
            <div class="card-body">
             <form method="POST" action="{{route('update.portfolio')}}" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="id" value="{{$portfolio->id}}"  />
              <div class="live-preview">            
                    <div class=" col-md-12">
                    <label for="title" class="form-label">Portfolio Name</label>
                 <input type="text" value="{{$portfolio->portfolio_name}}" name="portfolio_name" class="form-control" id="title">
                 @error('portfolio_name')
                     <p style="color: red">{{$message}}</p>
                 @enderror
            </div>
            <div class=" col-md-12">
                    <label for="short_title" class="form-label">Portfolio Title</label>
                    <input type="text" value="{{$portfolio->portfolio_title}}" name="portfolio_title" class="form-control" id="short_title">
                @error('portfolio_title')
                     <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class=" col-md-12">
                <label for="video_url" class="form-label">Portfolio Description </label>
                <textarea  id="elm1"  name="portfolio_description" class="form-control" rows="5">{{$portfolio->portfolio_description}}</textarea><br/>
                @error('portfolio_description')
                  <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-12" style="margin: 20px 0px;">
                <div class="input-group">
                    <label class="input-group-text" for="image">Portfolio Image</label>
                    <input type="file" name="portfolio_image" class="form-control" id="image">
                </div>
                @error('portfolio_image')
                   <p style="color: red">{{$message}}</p>
                @enderror
            </div>
              <div style="margin-bottom:20px;" class="mt-4 mt-md-0 ">
                  <img class="rounded  avatar-xl" id="showimage" alt="200x200" src="{{asset('image/portfolio/'.$portfolio->portfolio_image)}}" data-holder-rendered="true">
              </div>
           
            <input type="submit" value="Insert Portfolio Data" class="btn btn-success btn-animation waves-effect waves-light" data-text="Insert Portfolio Data">
             
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