<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            {{-- <h4>{{auth()->user()->name}}</h4> --}}
            <li class="nav-item">
                <a href="{{ route('backend.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">
                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                        <li class="nav-item">
                            <a href="{{ route('backend.permissions.index') }}" class="nav-link {{ request()->is('backend.permissions') || request()->is('backend.permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li class="nav-item">
                            <a href="{{route('backend.roles.index')}}" class="nav-link {{ request()->is('backend.roles') || request()->is('backend.roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase nav-icon"></i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{route('backend.users.index')}}" class="nav-link {{ request()->is('backend.users') || request()->is('backend.users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user nav-icon"></i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('student_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon"></i>

                        {{-- <i class="fas fa-desktop nav-icon"></i> --}}

                    Student
                </a>
                <ul class="nav-dropdown-items">
                    @can('student_access')
                    <li class="nav-item">
                        <a href="{{route('backend.students.index')}}" class="nav-link {{ request()->is('backend.students') || request()->is('backend.students/') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            View All
                        </a>
                    </li>
                    @endcan

                    @can('student_create')
                    <li class="nav-item">
                        <a href="{{route('backend.students.create')}}" class="nav-link {{ request()->is('backend.students/create') || request()->is('backend.students/create/*') ? 'active' : '' }}">

                            <i class="fas fa-plus-circle nav-icon"></i>

                            </i>
                            Add New
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('teacher_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon"></i>
                        {{-- <i class="fa-solid fa-person-chalkboard nav-icon"></i> --}}

                        {{-- <i class="fas fa-desktop nav-icon"></i> --}}

                    Teacher
                </a>
                <ul class="nav-dropdown-items">
                    @can('teacher_access')
                    <li class="nav-item">
                        <a href="{{route('backend.teachers.index')}}" class="nav-link {{ request()->is('backend.teachers') || request()->is('backend.teachers/') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            View All
                        </a>
                    </li>
                    @endcan
                    @can('teacher_create')
                    <li class="nav-item">
                        <a href="{{route('backend.teachers.create')}}" class="nav-link {{ request()->is('backend.teachers/create') || request()->is('backend.teachers/create/*') ? 'active' : '' }}">

                            <i class="fas fa-plus-circle nav-icon"></i>

                            </i>
                            Add New
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('class_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    {{-- <i class="fa-fw fas fa-users nav-icon"> --}}

                        <i class="fas fa-desktop nav-icon"></i>

                    Class List
                </a>
                <ul class="nav-dropdown-items">
                    @can('class_access')
                    <li class="nav-item">
                        <a href="{{route('backend.studentclasses.index')}}" class="nav-link {{ request()->is('backend.studentclasses') || request()->is('backend.studentclasses/') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            View All
                        </a>
                    </li>
                    @endcan
                    @can('class_create')
                    <li class="nav-item">
                        <a href="{{route('backend.studentclasses.create')}}" class="nav-link {{ request()->is('backend.studentclasses/create') || request()->is('backend.studentclasses/create/*') ? 'active' : '' }}">

                            <i class="fas fa-plus-circle nav-icon"></i>

                            </i>
                            Add New
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('notice_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    {{-- <i class="fa-fw fas fa-users nav-icon"> --}}

                        <i class="fas fa-desktop nav-icon"></i>

                    Notice
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{route('backend.notices.index')}}" class="nav-link {{ request()->is('backend/notices') || request()->is('backend/notices/*') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Notice List
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.categories.index')}}" class="nav-link {{ request()->is('backend/categories') || request()->is('backend/categories/*') ? "active" : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Notice Category
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('expense_management_access')
            <li class="nav-item nav-dropdown {{ request()->is("backend/expense-categories*") ? "show" : "" }} {{ request()->is("backend/income-categories*") ? "show" : "" }} {{ request()->is("backend/expenses*") ? "show" : "" }} {{ request()->is("backend/incomes*") ? "show" : "" }} {{ request()->is("backend/expense-reports*") ? "show" : "" }}">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-money-bill nav-icon"></i>
                    {{ trans('cruds.expenseManagement.title_short') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('expense_category_access')
                        <li class="nav-item">
                            <a href="{{ route("backend.expense-categories.index") }}" class="nav-link {{ request()->is("backend/expense-categories") || request()->is("backend/expense-categories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list nav-icon"></i>
                                {{ trans('cruds.expenseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_category_access')
                        <li class="nav-item">
                            <a href="{{ route("backend.income-categories.index") }}" class="nav-link {{ request()->is("backend/income-categories") || request()->is("backend/income-categories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list nav-icon"></i>
                                {{ trans('cruds.incomeCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="nav-item">
                            <a href="{{ route("backend.expenses.index") }}" class="nav-link {{ request()->is("backend/expenses") || request()->is("backend/expenses/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right nav-icon"></i>
                                {{ trans('cruds.expense.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_access')
                        <li class="nav-item">
                            <a href="{{ route("backend.incomes.index") }}" class="nav-link {{ request()->is("backend/incomes") || request()->is("backend/incomes/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right nav-icon"></i>
                                {{ trans('cruds.income.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_report_access')
                        <li class="nav-item">
                            <a href="{{ route("backend.expense-reports.index") }}" class="nav-link {{ request()->is("backend/expense-reports") || request()->is("backend/expense-reports/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-chart-line nav-icon">

                                </i>
                                {{ trans('cruds.expenseReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('site_configuration_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    {{-- <i class="fa-fw fas fa-users nav-icon"> --}}

                        <i class="fas fa-desktop nav-icon"></i>

                    Site Configurations
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a href="{{route('backend.mainSliders.index')}}" class="nav-link {{ request()->is('backend/mainSliders') || request()->is('backend/mainSliders/*') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Slider Image
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.front-page.index')}}" class="nav-link {{ request()->is('backend/front-page') || request()->is('backend/front-page/*') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Front Page
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.institution_details.index')}}" class="nav-link {{ request()->is('backend/institution_details') || request()->is('backend/institution_details/*') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Institutional Details
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.feature_box.index')}}" class="nav-link {{ request()->is('backend/feature_box') || request()->is('backend/feature_box/*') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            Feature Box
                        </a>
                    </li>
                </ul>
            </li>
            @endcan





            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
