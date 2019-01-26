<?php $url = url()->current();?>
<div class="main-menu">
    <div class="main-menu-header">
        @if(Auth::user()->image)
            <img class="img-40" src="{{asset('/images/backend_images/users/small/'.Auth::user()->image)}}" alt="Theme-Logo" />
        @endif
        <div class="user-details">
            <span>{{ Auth::user()->name }}</span>
            <span id="more-details">
                @if(Auth::user()->user_type_id == 1)
                    Admin
                @else
                    Staff
                @endif        
                <i class="ti-angle-down"></i></span>
        </div>
    </div>
    <div class="main-menu-content">
        <ul class="main-navigation">
            <li class="more-details">
                <a href="{{url('/admin/usp')}}"><i class="ti-user"></i>View Profile</a>
                <a href="{{url('/admin/settings')}}"><i class="ti-settings"></i>Settings</a>
                <a href="{{url('/logout')}}"><i class="ti-layout-sidebar-left"></i>Logout</a>
            </li>
            <!-- dashboard menu -->
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>Dashboard</span>
            </li>
            <li <?php if(preg_match("/dashboard/i", $url)):?> class="nav-item single-item has-class" <?php endif;?> class="nav-item single-item">
                <a href="{{url('/admin/dashboard')}}">
                    <i class="ti-home"></i>
                    <span data-i18n="nav.submit-issue.main">Dashboard</span>
                </a>
            </li>
            <!-- dashboard menu -->
            <!-- pos menu -->
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>POS</span>
            </li>
            <li <?php if(preg_match("/pos/i", $url)):?> class="nav-item single-item has-class" <?php endif;?> class="nav-item single-item">
                <a href="{{url('/admin/pos')}}">
                    <i class="ti-shopping-cart-full"></i>
                    <span data-i18n="nav.submit-issue.main">Point of Sale ( POS )</span>
                </a>
            </li>
            <li <?php if(preg_match("/invoice/i", $url)):?> class="nav-item single-item has-class" <?php endif;?> class="nav-item single-item">
                <a href="{{url('/admin/invoice_list')}}">
                    <i class="ti-files"></i>
                    <span data-i18n="nav.submit-issue.main">Invoices</span>
                </a>
            </li>
            <li <?php if(preg_match("/customer/i", $url)):?> class="nav-item single-item has-class" <?php endif;?> class="nav-item single-item">
                <a href="{{url('/admin/customer')}}">
                    <i class="icofont icofont-ui-user-group"></i>
                    <span data-i18n="nav.submit-issue.main">Customers</span>
                </a>
            </li>
            <!-- pos menu -->
            <!-- medicine menu -->
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>Medicine</span>
            </li>
            <li class="nav-item">
                <a  href="#!">
                    <i class="icofont icofont-first-aid-alt"></i>
                    <span data-i18n="nav.navigate.main">Medicine</span>
                </a>
                <ul <?php if(preg_match("/medicin/i", $url)):?> style="display: block;" <?php endif;?> class="tree-1">
                    <li><a <?php if(preg_match("/view_medicines/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/view_medicines')}}" data-i18n="nav.navigate.navbar-inverse">Medicine List</a></li>
                    <li><a <?php if(preg_match("/add_medicine/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/add_medicine')}}" data-i18n="nav.navigate.navbar-with-elements">Add Medicine</a></li>
                </ul>
            </li>
            <!-- medicine menu -->
            <!-- medicine category menu -->
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-pencil-alt"></i>
                    <span data-i18n="nav.navigate.main">Medicine Category</span>
                </a>
                <ul <?php if(preg_match("/categor/i", $url)):?> style="display: block;" <?php endif;?> class="tree-1">
                    <li><a <?php if(preg_match("/view_categories/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/view_categories')}}" data-i18n="nav.navigate.navbar-inverse">Category List</a></li>
                    <li><a <?php if(preg_match("/add_category/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/add_category')}}" data-i18n="nav.navigate.navbar-with-elements">Add Category</a></li>
                </ul>
            </li>
            <!-- medicine category menu -->
            <!-- expense menu -->
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>Expenses</span>
            </li>
            <li class="nav-item">
                <a  href="#!">
                    <i class="icofont icofont-cur-dollar"></i>
                    <span data-i18n="nav.navigate.main">Expenses</span>
                </a>
                <ul <?php if(preg_match("/expens/i", $url)):?> style="display: block;" <?php endif;?> class="tree-1">
                    <li><a <?php if(preg_match("/view_expenses/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/view_expenses')}}" data-i18n="nav.navigate.navbar-inverse">Expenses List</a></li>
                    <li><a <?php if(preg_match("/add_expense/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/add_expense')}}" data-i18n="nav.navigate.navbar-with-elements">Add Expense</a></li>
                </ul>
            </li>
            <!-- expense menu -->
            <!-- expense category menu -->
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-pencil-alt"></i>
                    <span data-i18n="nav.navigate.main">Expense Category</span>
                </a>
                <ul <?php if(preg_match("/cats/i", $url)):?> style="display: block;" <?php endif;?> class="tree-1">
                    <li><a <?php if(preg_match("/view_cats/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/view_cats')}}" data-i18n="nav.navigate.navbar-inverse">Expense Category List</a></li>
                    <li><a <?php if(preg_match("/add_cats/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/add_cats')}}" data-i18n="nav.navigate.navbar-with-elements">Add Expense Category</a></li>
                </ul>
            </li>
            <!-- medicine category menu -->
            <!-- Staff menu -->
            @can('isAdmin')
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>Users</span>
            </li>
            <li class="nav-item">
                <a href="#!">
                    <i class="icofont icofont-ui-user-group"></i>
                    <span data-i18n="nav.navigate.main">Users</span>
                </a>
                <ul <?php if(preg_match("/user/i", $url)):?> style="display: block;" <?php endif;?> class="tree-1">
                    <li><a <?php if(preg_match("/view_users/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/view_users')}}" data-i18n="nav.navigate.navbar-inverse">User List</a></li>
                    <li><a <?php if(preg_match("/add_user/i", $url)):?> class="active-class" <?php endif;?> href="{{url('admin/add_user')}}" data-i18n="nav.navigate.navbar-with-elements">Add User</a></li>
                </ul>
            </li>
            @endcan    
            <!-- Staff menu -->
            <!-- user profile menu-->
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>User</span>
            </li>
            <li <?php if(preg_match("/usp/i", $url)):?> class="nav-item single-item has-class" <?php endif;?> class="nav-item single-item">
                <a href="{{url('/admin/usp')}}">
                    <i class="ti-user"></i>
                    <span data-i18n="nav.submit-issue.main">Profile</span>
                </a>
            </li>
            <!-- user profile menu-->
        </ul>
    </div>
</div>