@extends('admin.admin_master')
@section('content')

    
        <!-- Start WOWSlider.com BODY section -->
{{-- <div height="40%" id="wowslider-container1">
    <div class="ws_images"><ul>
            <li><img width="100%" src="{{asset('admin/assets/data1/images/pexelsmikaelblomkvist6476267_1.jpg')}}" alt="pexels-mikael-blomkvist-6476267 (1)" title="pexels-mikael-blomkvist-6476267 (1)" id="wows1_0"/></li>
            <li><img width="100%" src="{{asset('admin/assets/data1/images/pexelsyankrukov8837760.jpg')}}" alt="pexels-yan-krukov-8837760" title="pexels-yan-krukov-8837760" id="wows1_1"/></li>
            <li><img width="100%" src="{{asset('admin/assets/data1/images/pexelsfauxels3184357.jpg')}}" alt="pexels-fauxels-3184357" title="pexels-fauxels-3184357" id="wows1_2"/></li>
            <li><img width="100%" src="{{asset('admin/assets/data1/images/pexelsgustavofring4872044.jpg')}}" alt="pexels-gustavo-fring-4872044" title="pexels-gustavo-fring-4872044" id="wows1_3"/></li>
            <li><a href="http://wowslider.net"><img width="100%" src="{{asset('admin/assets/data1/images/pexelsgustavofring7156159.jpg')}}" alt="slider" title="pexels-gustavo-fring-7156159" id="wows1_4"/></a></li>
            <li><img width="100%" src="{{asset('admin/assets/data1/images/pexelslagosfoodbankinitiative9090903.jpg')}}" alt="pexels-lagos-food-bank-initiative-9090903" title="pexels-lagos-food-bank-initiative-9090903" id="wows1_5"/></li>
        </ul></div>
        <div class="ws_bullets"><div>
            <a href="#" title="pexels-mikael-blomkvist-6476267 (1)"><span><img src="data1/tooltips/pexelsmikaelblomkvist6476267_1.jpg" alt="pexels-mikael-blomkvist-6476267 (1)"/>1</span></a>
            <a href="#" title="pexels-yan-krukov-8837760"><span><img src="data1/tooltips/pexelsyankrukov8837760.jpg" alt="pexels-yan-krukov-8837760"/>2</span></a>
            <a href="#" title="pexels-fauxels-3184357"><span><img src="data1/tooltips/pexelsfauxels3184357.jpg" alt="pexels-fauxels-3184357"/>3</span></a>
            <a href="#" title="pexels-gustavo-fring-4872044"><span><img src="data1/tooltips/pexelsgustavofring4872044.jpg" alt="pexels-gustavo-fring-4872044"/>4</span></a>
            <a href="#" title="pexels-gustavo-fring-7156159"><span><img src="data1/tooltips/pexelsgustavofring7156159.jpg" alt="pexels-gustavo-fring-7156159"/>5</span></a>
            <a href="#" title="pexels-lagos-food-bank-initiative-9090903"><span><img src="data1/tooltips/pexelslagosfoodbankinitiative9090903.jpg" alt="pexels-lagos-food-bank-initiative-9090903"/>6</span></a>
        </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript carousel</a> by WOWSlider.com v9.0</div>
    <div class="ws_shadow"></div>
    </div> --}}
  @php
      $customer = App\Models\Customer::count('id');
      $supplier = App\Models\Supplier::count('id');
      $category = App\Models\Category::count('id');
      $product = App\Models\Product::count('id');
  @endphp
<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p
                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Customers</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                            
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="counter-value" data-target="{{$customer}}">0</span>
                        </h4>
                        <a href="{{route('customer.all')}}" class="text-decoration-underline">View Customers
                            </a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-success rounded fs-3">
                            <i class="bx bx-dollar-circle text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p
                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Suppliers</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-danger fs-14 mb-0">
                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                           
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="counter-value" data-target="{{$supplier}}">0</span></h4>
                        <a href="{{route('supplier.all')}}" class="text-decoration-underline">View Suppliers</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-info rounded fs-3">
                            <i class="bx bx-shopping-bag text-info"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p
                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Categories</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                           
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="counter-value" data-target="{{$category}}">0</span>
                        </h4>
                        <a href="{{route('category.all')}}" class="text-decoration-underline">See Categories</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded fs-3">
                            <i class="bx bx-user-circle text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p
                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Products</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-muted fs-14 mb-0">
                          
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="counter-value" data-target="{{$product}}">0</span>
                        </h4>
                        <a href="{{route('product.all')}}" class="text-decoration-underline">View Products</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-primary rounded fs-3">
                            <i class="bx bx-wallet text-primary"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row-->

@endsection