@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Ecommerce</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard')?'active':''}}">
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{($prefix == '/brand')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>

            <li class="treeview {{($prefix == '/category')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
                    <li><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>
                    <li><a href="{{route('all.sub_subcategory')}}"><i class="ti-more"></i>All Sub-SubCategory</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.product')}}"><i class="ti-more"></i>All Products</a></li>
                    <li><a href="invoice.html"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Content</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Utilities</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                    <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="edit-2"></i>
                    <span>Icons</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
                    <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="inbox"></i>
                    <span>Forms</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
                    <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="server"></i>
                    <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
                    <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
                    <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="map"></i>
                    <span>Map</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
                    <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="alert-triangle"></i>
                    <span>Authentication</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
                    <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
