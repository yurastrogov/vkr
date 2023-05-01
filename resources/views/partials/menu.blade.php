<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('menuadmin_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/workdays*") ? "c-show" : "" }} {{ request()->is("admin/medicpositions*") ? "c-show" : "" }} {{ request()->is("admin/shedules*") ? "c-show" : "" }} {{ request()->is("admin/paramedics*") ? "c-show" : "" }} {{ request()->is("admin/insurances*") ? "c-show" : "" }} {{ request()->is("admin/mkbs*") ? "c-show" : "" }} {{ request()->is("admin/lpus*") ? "c-show" : "" }} {{ request()->is("admin/contragents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.menuadmin.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('workday_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.workdays.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/workdays") || request()->is("admin/workdays/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-table c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workday.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('medicposition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.medicpositions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/medicpositions") || request()->is("admin/medicpositions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.medicposition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shedule_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shedules.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shedules") || request()->is("admin/shedules/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shedule.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('paramedic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.paramedics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/paramedics") || request()->is("admin/paramedics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paramedic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('insurance_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.insurances.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/insurances") || request()->is("admin/insurances/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-medical c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.insurance.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mkb_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mkbs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mkbs") || request()->is("admin/mkbs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mkb.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lpu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lpus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lpus") || request()->is("admin/lpus/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hospital-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lpu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contragent_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contragents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contragents") || request()->is("admin/contragents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contragent.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('menuregistrator_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/registration-new-visits*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.menuregistrator.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('registration_new_visit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.registration-new-visits.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/registration-new-visits") || request()->is("admin/registration-new-visits/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.registrationNewVisit.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('menudoctor_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/doctorvisits*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-diagnoses c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.menudoctor.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('doctorvisit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.doctorvisits.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/doctorvisits") || request()->is("admin/doctorvisits/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.doctorvisit.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>