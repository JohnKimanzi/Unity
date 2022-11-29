<div class="main-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                    </li>

                    
                    <li class="submenu">
                        <a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li class="{{ Request::is('chat') ? 'active' : '' }}">
                                <a href="{{ url('chat') }}">Chat</a>
                            </li>

                            <li class="submenu">
                                <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li class="{{ Request::is('voice-call') ? 'active' : '' }}">
                                        <a href="{{ url('voice-call') }}">Voice Call</a>
                                    </li>

                                    <li class="{{ Request::is('video-call') ? 'active' : '' }}">
                                        <a href="{{ url('video-call') }}">Video Call</a>
                                    </li>

                                    <li class="{{ Request::is('outgoing-call') ? 'active' : '' }}">
                                        <a href="{{ url('outgoing-call') }}">Outgoing Call</a>
                                    </li>

                                    <li class="{{ Request::is('incoming-call') ? 'active' : '' }}">
                                        <a href="{{ url('incoming-call') }}">Incoming Call</a>
                                    </li>


                                </ul>
                            </li>

                            <li>
                                <a class="{{ Request::is('events') ? 'active' : '' }}"
                                    href="{{ url('events') }}">Calendar</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('contacts') ? 'active' : '' }}"
                                    href="{{ url('contacts') }}">Contacts</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('inbox') ? 'active' : '' }}"
                                    href="{{ url('inbox') }}">Email</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('file-manager') ? 'active' : '' }}"
                                    href="javascript:void(0)">File Manager</a>
                            </li>


                        </ul>
                    </li>
                    
                    

                    {{-- <li class="{{ Request::is('clients') ? 'active' : '' }}">
                        <a href="{{ url('clients') }}"><i class="la la-users"></i> <span>Clients</span></a>
                    </li> --}}


                    <li class="submenu">
                        <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('projects') ? 'active' : '' }}"
                                    href="{{ url('projects') }}">Projects</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('tasks') ? 'active' : '' }}"
                                    href="{{ url('tasks') }}">Tasks</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('task-board') ? 'active' : '' }}"
                                    href="{{ url('task-board') }}">Task Board</a>
                            </li>


                        </ul>
                    </li>
                    
                    <!-- <li class="{{ Request::is('leads') ? 'active' : '' }}">
                        <a href="{{ url('c_leads') }}"><i class="la la-user-secret"></i><span>Leads</span></a>
                    </li> -->
                    <li class="{{ Request::is('accounts') ? 'active' : '' }}">
                        <a href="{{ url('lead_list') }}"><i class="la la-user-secret"></i><span>Accounts</span></a>
                    </li>

                    <li class="{{ Request::is('docgen') ? 'active' : '' }}">
                        <a href="{{ url('docgen') }}"><i class="la la-pencil"></i><span>Doc Gen</span></a>
                    </li>

                    

                    <!-- <li class="{{ Request::is('tickets') ? 'active' : '' }}">
                        <a href="{{ url('tickets') }}"><i class="la la-ticket"></i><span>Tickets</span></a>
                    </li> -->


                    <li class="menu-title">
                        <span>Reporting</span>
                    </li>
                
                    <li class="submenu">
                        <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            
                           
                            <li><a class="{{ Request::is('tasks-reports') ? 'active' : '' }}"
                                    href="{{ url('tasks_report') }}"> Tasks Report </a></li>
                            <li><a class="{{ Request::is('sales_report') ? 'active' : '' }}"
                                    href="{{ url('sales_report') }}"> Sales Report </a></li>
                            <li><a class="{{ Request::is('payroll_report') ? 'active' : '' }}"
                                    href="{{ url('payroll_report') }}"> Payroll Report </a></li>
                            <li><a class="{{ Request::is('daily-reports') ? 'active' : '' }}"
                                    href="{{ url('daily-reports') }}"> Daily Report </a></li>



                        </ul>
                    </li>
                    
                    
                    <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('goal-tracking') ? 'active' : '' }}"
                                    href="{{ url('goal-tracking') }}"> Goal List </a>
                            </li>

                            <li>
                                <a class="{{ Request::is('goal-type') ? 'active' : '' }}"
                                    href="{{ url('goal-type') }}"> Goal Type </a>
                            </li>


                        </ul>
                    </li>
                    
                    <li class="menu-title">
                        <span>Administration</span>
                    </li>
                    @hasanyrole('admin|team leader')
                    <li class="{{ Request::is('activities') ? 'active' : '' }}">
                        <a href="{{ url('activities') }}"><i class="la la-bell"></i><span>Activities</span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Authentication </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('goal-tracking') ? 'active' : '' }}"
                                    href="{{ url('users') }}"> Users</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('goal-type') ? 'active' : '' }}"
                                    href="{{ url('roles') }}"> Roles </a>
                            </li>

                            <li>
                                <a class="{{ Request::is('goal-type') ? 'active' : '' }}"
                                    href="{{ url('#') }}"> Permissions </a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Advanced </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('goal-tracking') ? 'active' : '' }}"
                                    href="{{ url('files') }}"> File Manager</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('goal-type') ? 'active' : '' }}"
                                    href="{{ url('#') }}"> Back up </a>
                            </li>

                            <li>
                                <a class="{{ Request::is('goal-type') ? 'active' : '' }}"
                                    href="{{ url('#') }}"> Permissions </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('settings') ? 'active' : '' }}">
                        <a href="{{ url('settings') }}"><i class="la la-cog"></i><span>Settings</span> </a>
                    </li>

                    @endhasanyrole
                    {{--<li class="submenu">
                        <a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="{{ Request::is('subscribed-companies') ? 'active' : '' }}"
                                    href="{{ url('subscribed-companies') }}">Subscribed Companies </a>
                            </li>


                        </ul>
                    </li>--}}
                    
                    
                    <li class="menu-title">
                        <span>Extras</span>
                    </li>
					<li class="{{ Request::is('policies') ? 'active' : '' }}">
                        <a href="{{ url('policies') }}"><i class="la la-file-pdf-o"></i><span>Policies</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="la la-file-text"></i> <span>Documentation</span></a>
                    </li>
					<li>
                        <a href="#"><i class="la la-file-text"></i> <span>Policies</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="la la-info"></i> <span>Change Log</span> <span
                                class="badge badge-primary ml-auto">v3.4</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
