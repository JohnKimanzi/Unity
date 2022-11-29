<div class="main-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span class="text-warning">MAIN</span>
                    </li>
                    <li class="{{ Request::is('dashboard','/') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                    </li>

                </ul>
                
                {{-- Sales and Marketing --}}
                @hasrole('sales rep')
                <ul>
                    <li class="menu-title">
                        <span class="text-warning">SALES AND MARKETING</span>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-address-book"></i> <span> Leads</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            @hasrole('admin')
                            <li>
                                <a class="{{ Request::is('lead_batches') ? 'active' : '' }}" href="{{  url('lead_batches') }}">Lead Batches</a>
                            </li>
                            @endhasrole
                
                            <li>
                                <a class="{{ Request::is('lead_list') ? 'active' : '' }}" href="{{  url('lead_list') }}">Leads</a>
                            </li>

                        </ul>
                    </li>
                    
                    
                    @hasrole('admin')
                    {{-- <li class="{{ Request::is('leads-pool') ? 'active' : '' }}">
                        <a href="{{ route('leads-pool') }}"><i class="fa fa-database"></i><span>Lead Pools</span></a>
                    </li> --}}
                    <li class="{{ Request::is('leads-pool') ? 'active' : '' }}">
                        <a href="{{ route('clients.index') }}"><i class="fa fa-database"></i><span>Active Clients</span></a>
                    </li>
                    @endhasrole
                </ul>
                @endhasrole
                {{-- /Sales and marketing --}}

                {{-- collections --}}
                @hasrole('collector')
                <ul>
                    <li class="menu-title">
                        <span class="text-warning">COLLECTIONS</span>
                    </li>
                    <li class="{{ Request::is('leads-pool') ? 'active' : '' }}">
                        <a href="{{ url('collections.index') }}"><i class="fa fa-signal"></i><span>Collection Summary</span></a>
                    </li>
                    <li class="{{ Request::is('leads-pool') ? 'active' : '' }}">
                        <a href="{{ url('collections.index') }}"><i class="fa fa-users"></i><span>Collectable Accounts</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-money"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
    
                            <li>
                                <a class="{{ Request::is('clients') ? 'active' : '' }}" href="{{ route('clients.index') }}">Clients</a>
                            </li>
    
                            <li>
                                <a class="{{ Request::is('debts') ? 'active' : '' }}" href="{{ route('debts.index') }}">Accounts</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                @endhasrole
                {{-- /Collections --}}

                {{-- <li class="{{ Request::is('docgen') ? 'active' : '' }}">
                <a href="{{ url('docgen') }}"><i class="la la-pencil"></i><span>Doc Gen</span></a>
                </li> --}}

                {{-- Admin --}}
                @hasanyrole('admin')
                <ul>
                    <li class="menu-title" >
                        <span class="text-warning">ADMIN</span>
                    </li>

                    <li class="{{ Request::is('templates') ? 'active' : '' }}">
                        <a href="{{ url('templates') }}"><i class="la la-file-o"></i><span>DocGen Templates</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-fingerprint"></i> <span> Access Control </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
    
                            <li>
                                <a class="{{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}"> Users</a>
                            </li>
    
                            <li>
                                <a class="{{ Request::is('roles') ? 'active' : '' }}" href="{{route('roles.index')}}"> Roles </a>
                            </li>
    
                            <li>
                                <a class="{{ Request::is('permissions') ? 'active' : '' }}" href="{{ route('permissions.index') }}"> Permissions </a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
    
                            <li>
                                <a class="{{ Request::is('countries') ? 'active' : '' }}" href="{{ url('countries') }}"> Operation Countries</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('teams') ? 'active' : '' }}" href="{{ url('teams') }}"> Teams</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('departments') ? 'active' : '' }}" href="{{ url('departments') }}"> Departments</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('designations') ? 'active' : '' }}" href="{{ url('designations') }}"> Designations</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('files') ? 'active' : '' }}" href="{{ url('files') }}"> File Manager</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endhasanyrole
                {{-- /Admin --}}

                {{-- HR --}}
                <ul>
                    <li class="menu-title">
                        <span class="text-warning">HR</span>
                    </li>
                    <li class="{{ Request::is('employees') ? 'active' : '' }}">
                        <a href="{{route('employees.index')}}"><i class="la la-briefcase"></i><span>Employees</span></a>
                    </li>
                    <li class="{{ Request::is('PTO') ? 'active' : '' }}">
                        <a href="{{ route('pto.index') }}"><i class="fa fa-plane-departure"></i><span>PTO</span></a>
                    </li>
                    <li class="{{ Request::is('time_tracker') ? 'active' : '' }}">
                        <a href="{{ route('time_tracker') }}"><i class="fa fa-clock"></i><span>Time Tracker</span></a>
                    </li>
                    <li class="{{ Request::is('employee_schedules') ? 'active' : '' }}">
                        <a href="{{ route('employee_schedules.index') }}"><i class="fa fa-business-time"></i><span>Employee Schedules</span></a>
                    </li>
                    {{-- <li class="{{ Request::is('time_records') ? 'active' : '' }}">
                        <a href="{{ route('time_records.index') }}"><i class="fa fa-clock"></i><span>Time Sheets</span></a>
                    </li> --}}
                    <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('employees') ? 'active' : '' }}" href="{{ url('employees') }}">Employees </a>
                            </li>
                            <li>
                                <a href="#"><span class="menu-arrow"></span>PTO Manager</a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('time_record_types') ? 'active' : '' }}" href="{{ url('time_record_types') }}">Time Record Types </a>
                                        <a class="{{ Request::is('pto_types') ? 'active' : '' }}" href="{{ url('pto_types') }}">PTO Types</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('policies') ? 'active' : '' }}">
                        <a class="{{ Request::is('policies') ? 'active' : '' }}" href="{{route('policies.index')}}"><i class="fa fa-file-pdf"></i><span>Policies</span></a>
                    </li>
                </ul>
                {{-- /HR --}}
                
                {{-- Help --}}
                <ul>
                    <hr>

                    <li class="submenu">
                        <a href="#"><i class="la la-question"></i> <span class="text-warning"> Help </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ Request::is('help') ? 'active' : '' }}" href="javascript:void(0);"> FAQ's</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('help') ? 'active' : '' }}" href="javascript:void(0);"><span> Docs</a>
                            </li> 

                            <li>
                                <a class="{{ Request::is('changelog') ? 'active' : '' }}" href="javascript:void(0);"> <span>Change Log</span>
                                    <span class="badge badge-primary ml-auto">v1.0</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                {{-- /Help --}}
            </div>
        </div>
    </div>
</div>