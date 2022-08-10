<div class="app-menu navbar-menu">
<!-- LOGO -->
<div class="navbar-brand-box">
<!-- Dark Logo-->
<a href="index.html" class="logo logo-dark">
<span class="logo-sm">
    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
    <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="17">
</span>
</a>
<!-- Light Logo-->
<a href="index.html" class="logo logo-light">
<span class="logo-sm">
    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
    <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="17">
</span>
</a>
<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
id="vertical-hover">
<i class="ri-record-circle-line"></i>
</button>
</div>

<div id="scrollbar">
<div class="container-fluid">

<div id="two-column-menu">
</div>
<ul class="navbar-nav" id="navbar-nav">
   
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarDashboards" role="button"
            aria-expanded="false" aria-controls="sidebarDashboards">
            <a href="/" class="nav-link" data-key="t-analytics"> <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span></a>
        </a>
    </li> <!-- end Dashboard Menu -->
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarApps">
            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Manage Suppliers</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarApps">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('supplier.all')}}" class="nav-link" data-key="t-calendar">All Supplier</a>
                </li>
    
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarLayouts">
            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Manage Customers</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarLayouts">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('customer.all')}}" class="nav-link"
                        data-key="t-horizontal">All Customers</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('credit.customer')}}" class="nav-link"
                        data-key="t-horizontal">Credit Customers</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('paid.customer')}}" class="nav-link"
                        data-key="t-horizontal">Paid Customers</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customer.wise.report')}}" class="nav-link"
                        data-key="t-horizontal">Customers Wise Report</a>
                </li>                          
            </ul>
        </div>
    </li> <!-- end Dashboard Menu -->

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarPages">
            <i class="ri-pages-line"></i> <span data-key="t-pages">Manage Units</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarPages">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('unit.all')}}" class="nav-link" data-key="t-starter"> All Unit </a>
                </li>    
            </ul>
        </div>
    </li>
   
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarUI">
            <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Manage Category</span>
        </a>
        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('category.all')}}" class="nav-link" data-key="t-alerts">All Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarAdvanceUI">
            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Manage Product</span>
    
        </a>
        <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('product.all')}}" class="nav-link" data-key="t-sweet-alerts">All Product</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarForms">
            <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Purchase</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarForms">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('purchase.all')}}" class="nav-link" data-key="t-basic-elements">All Purchase</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('purchase.pending')}}" class="nav-link" data-key="t-form-select">Approval Purchase </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('daily.purchase.report')}}" class="nav-link" data-key="t-form-select">Daily Purchase Report</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarTables">
            <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Manage Invoice</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarTables">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('invoice.all')}}" class="nav-link" data-key="t-basic-tables">All Invoice</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('invoice.pending.list')}}" class="nav-link" data-key="t-grid-js">Approval Invoice</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('print.invoice.list')}}" class="nav-link" data-key="t-grid-js">Print Invoice List</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('daily.invoice.report')}}" class="nav-link" data-key="t-grid-js">Daily Invoice Report</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarCharts">
            <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Manage Stock</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarCharts">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('stock.report')}}" class="nav-link" data-key="t-chartjs">Stock Report</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('stock.supplier.wise')}}" class="nav-link" data-key="t-echarts">Supplier / Product Wise</a>
                </li>
            </ul>
        </div>
    </li>

</ul>
</div>
<!-- Sidebar -->
</div>
</div>