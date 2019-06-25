<div class="pcoded-inner-navbar main-menu">

    @php
        $principal = Request::segment(1)
    @endphp


    <div class="pcoded-navigation-label">Navigation {{ \Views::segment(1) }} </div>
    <ul class="pcoded-item pcoded-left-item">
        @foreach(\Views::menu() as $menu)
            @if(!is_array($menu['interno']) || empty($menu['interno']) )
                <li class="">
                    <a href="{{ $menu['link'] }}" {{ $menu['externo'] == '1' ? 'target="_blank"':''  }} class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            {!! $menu['icono'] !!}
                        </span>
                        <span class="pcoded-mtext">{{ $menu['modulo'] }}</span>
                    </a>
                </li>
            @else
                <!-- \Views::segment() == $menu['vista'] ? 'pcoded-trigger':''; dashboard  -->
                <li class="pcoded-hasmenu  {{ \Views::segment() == $menu['vista'] ? 'active pcoded-trigger':'' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">{!! $menu['icono'] !!}</span>
                        <span class="pcoded-mtext">{{ $menu['modulo'] }}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        @foreach($menu['interno'] as $interno)
                            @if(!is_array($interno['submenu']) || empty($interno['submenu']) )
                                <li class="{{ \Views::segment(1) == $interno['ruta'] ? 'active':'' }}">
                                    <a href="{{ $interno['ruta'] }}" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">{{ $interno['cabecera'] }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="">
                                    <a href="{{ $interno['ruta'] }}" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">{{ $interno['cabecera'] }}</span>
                                        <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        
                    </ul>
                </li>

                <!-- <li class="treeview">
                    <a href="javascript:void(0)">{{ $menu['icono'] }}<span> {{ $menu['modulo'] }}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach($menu['interno'] as $interno) : ?>
                            @if(!is_array($interno['submenu']) || empty($interno['submenu']) )
                                <li class="">
                                    <a href="{{ $interno['ruta'] }}"><i class="fa fa-circle-o"></i>{{ $interno['cabecera'] }}</a>
                                </li>
                            @else
                                <li class="treeview">
                                    <a href="javascript:void(0)">{{ $interno['icono'] }} <span>{{ $interno['cabecera'] }}</span>
                                        <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu ">
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li> -->
            @endif
        @endforeach

        <!-- <li class="pcoded-hasmenu active pcoded-trigger">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="active">
                    <a href="index.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Default</span>
                    </a>
                </li>
                <li class="">
                    <a href="dashboard-crm.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">CRM</span>
                    </a>
                </li>
                <li class="">
                    <a href="dashboard-analytics.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Analytics</span>
                        <span class="pcoded-badge label label-info ">NEW</span>
                    </a>
                </li>
            </ul>
        </li>
        -->
    </ul>
    <!-- <div class="pcoded-navigation-label">UI Element</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-box"></i>
                </span>
                <span class="pcoded-mtext">Basic</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="">
                    <a href="alert.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Alert</span>
                    </a>
                </li>
                <li class="">
                    <a href="breadcrumb.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Breadcrumbs</span>
                    </a>
                </li>
                <li class="">
                    <a href="button.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Button</span>
                    </a>
                </li>
                <li class="">
                    <a href="box-shadow.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Box-Shadow</span>
                    </a>
                </li>
                <li class="">
                    <a href="accordion.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Accordion</span>
                    </a>
                </li>
                <li class="">
                    <a href="generic-class.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Generic Class</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="tabs.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Tabs</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="color.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Color</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="label-badge.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Label Badge</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="progress-bar.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Progress Bar</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="list.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="tooltip.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Tooltip And Popover</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="typography.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Typography</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="other.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Other</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                <i class="feather icon-gitlab"></i>
                </span>
                <span class="pcoded-mtext">Advance</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="draggable.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Draggable</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="modal.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Modal</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="notification.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Notifications</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="rating.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Rating</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="range-slider.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Range Slider</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="slider.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Slider</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="syntax-highlighter.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Syntax Highlighter</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="tour.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Tour</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="treeview.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Tree View</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="nestable.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Nestable</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="toolbar.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Toolbar</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                <i class="feather icon-package"></i>
                </span>
                <span class="pcoded-mtext">Extra</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="session-timeout.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Session Timeout</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="session-idle-timeout.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Session Idle Timeout</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="offline.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Offline</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class=" ">
            <a href="animation.html" class="waves-effect waves-dark">
            <span class="pcoded-micon">
            <i class="feather icon-aperture rotate-refresh"></i>
            </span>
            <span class="pcoded-mtext">Animations</span>
            </a>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                <i class="feather icon-command"></i>
                </span>
                <span class="pcoded-mtext">Icons</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="icon-font-awesome.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Font Awesome</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="icon-themify.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Themify</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="icon-simple-line.html" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Simple Line Icon</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    -->
</div>