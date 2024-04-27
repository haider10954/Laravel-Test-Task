<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-uppercase">Main</li>


                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('companies.index') }}">
                        <i class="dripicons-retweet"></i>
                        <span> Companies </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employees.index') }}">
                        <i class="dripicons-code"></i>
                        <span> Employee </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
