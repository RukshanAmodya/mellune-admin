<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{!! Session::get('app_name', 'Mellune') !!}</title>
    <link rel='shortcut icon' type='image/png' href="{{ asset('asset/img/Mellune-Logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <link href="{{ asset('asset/cdncss/quill.css') }}" rel="stylesheet" /> 
    <link href="{{ asset('asset/cdncss/iziToast.css') }}" rel="stylesheet" /> 
    <link href="{{ asset('asset/cdncss/select2.css') }}" rel="stylesheet" /> 
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="loader-bg">
    <div class="mellune-preloader">
        <div class="preloader-spinner"></div>
        <img src="{{ asset('asset/img/Mellune-Logo.png') }}" alt="Mellune" class="preloader-logo">
    </div>
</div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="navbar-left-area d-flex align-items-center">
                    <ul class="navbar-nav mr-2">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn modern-toggle-btn">
                                <i data-feather="menu"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Modern Search Bar -->
                    <div class="navbar-search-wrapper">
                        <input type="text" class="navbar-search-input" placeholder="Search wallpaper, category..." />
                        <span class="navbar-search-icon">
                            <i data-feather="search"></i>
                        </span>
                    </div>
                </div>

                <ul class="navbar-nav navbar-right align-items-center">
                    <!-- Live Server Status Indicator (Replacing WhatsApp Phone Number) -->
                    <li class="nav-item d-none d-md-block mr-2">
                        <div class="server-status-pill">
                            <span class="status-pulse-dot"></span>
                            <span class="status-label">Server Active</span>
                            <span class="status-badge-text">v1.0.0</span>
                        </div>
                    </li>

                    <!-- Notification Bell -->
                    <li class="nav-item mr-2">
                        <a href="{{ route('notification') }}" class="nav-icon-circle-btn" title="Notifications">
                            <i data-feather="bell"></i>
                            <span class="notification-indicator"></span>
                        </a>
                    </li>

                    <!-- Language Selector Pill -->
                    <li class="nav-item mr-3 d-none d-sm-block">
                        <div class="lang-selector-pill">
                            <i data-feather="globe"></i>
                            <span>EN</span>
                            <i data-feather="chevron-down" class="chevron-sm"></i>
                        </div>
                    </li>

                    <!-- User Profile Dropdown Pill -->
                    @php
                        $rawUserName = session('user_name', 'Admin');
                        $userInitials = strtoupper(substr($rawUserName, 0, 2));
                        $userRole = session('user_type') == 1 ? 'Super Admin' : 'Administrator';
                    @endphp
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user modern-user-pill">
                            <div class="user-avatar-initials">{{ $userInitials }}</div>
                            <div class="user-info-text d-none d-md-flex">
                                <span class="user-name-display">{{ $rawUserName }}</span>
                                <span class="user-role-display">{{ $userRole }}</span>
                            </div>
                            <i data-feather="chevron-down" class="chevron-user-sm d-none d-md-inline-block"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown modern-user-dropdown">
                            <div class="dropdown-header">
                                <h6>{{ $rawUserName }}</h6>
                                <small class="text-muted">{{ $userRole }}</small>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('setting') }}" class="dropdown-item has-icon">
                                <i data-feather="settings"></i> System Settings
                            </a>
                            <a href="{{ route('wallpaper') }}" class="dropdown-item has-icon">
                                <i data-feather="image"></i> Manage Wallpapers
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                                <i data-feather="log-out"></i> Log Out
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <!-- Brand Header -->
                    <div class="sidebar-brand">
                        <a href="{{ route('index') }}" class="sidebar-brand-link">
                            <img src="{{ asset('asset/img/Mellune-Logo.png') }}" alt="Mellune" class="brand-logo-img">
                            <div class="brand-text-wrap">
                                <span class="brand-title">Mellune<span class="brand-dot">.</span></span>
                                <span class="brand-subtitle">Live Wallpaper Panel</span>
                            </div>
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('asset/img/Mellune-Logo.png') }}" alt="Mellune" class="brand-logo-sm">
                        </a>
                    </div>
                   
                    <ul class="sidebar-menu">
                        <!-- OVERVIEW -->
                        <li class="menu-category-header">OVERVIEW</li>
                        <li class="sideBarli indexSideA">
                            <a href="{{ route('index') }}" class="nav-link">
                                <i data-feather="grid"></i>
                                <span>{{ __('dashboard') }}</span>
                            </a>
                        </li>

                        <!-- CONTENT & MEDIA -->
                        <li class="menu-category-header">CONTENT & MEDIA</li>
                        <li class="sideBarli categorySideA">
                            <a href="{{ route('categories') }}" class="nav-link">
                                <i data-feather="folder"></i>
                                <span>{{ __('category') }}</span>
                            </a>
                        </li>
                        <li class="sideBarli wallpaperSideA">
                            <a href="{{ route('wallpaper') }}" class="nav-link">
                                <i data-feather="image"></i>
                                <span>{{ __('wallpaper') }}</span>
                            </a>
                        </li>

                        <!-- ENGAGEMENT & MONETIZATION -->
                        <li class="menu-category-header">GROWTH & MONETIZATION</li>
                        <li class="sideBarli notificationSideA">
                            <a href="{{ route('notification') }}" class="nav-link">
                                <i data-feather="send"></i>
                                <span>{{ __('notification') }}</span>
                            </a>
                        </li>
                        <li class="sideBarli subscriptionSideA">
                            <a href="{{ route('subscription') }}" class="nav-link">
                                <i data-feather="credit-card"></i>
                                <span>{{ __('subscription') }}</span>
                            </a>
                        </li>
                        <li class="sideBarli admobSideA">
                            <a href="{{ route('admob') }}" class="nav-link">
                                <i data-feather="dollar-sign"></i>
                                <span>{{ __('admob') }}</span>
                            </a>
                        </li>

                        <!-- SYSTEM & SUPPORT -->
                        <li class="menu-category-header">ADMIN & SUPPORT</li>
                        <li class="sideBarli settingSideA">
                            <a href="{{ route('setting') }}" class="nav-link">
                                <i data-feather="sliders"></i>
                                <span>{{ __('setting') }}</span>
                            </a>
                        </li>
                        <li class="sideBarli privacySideA">
                            <a href="{{ route('viewPrivacy') }}" class="nav-link">
                                <i data-feather="shield"></i>
                                <span>{{ __('privacyPolicy') }}</span>
                            </a>
                        </li>
                        <li class="sideBarli termsSideA">
                            <a href="{{ route('viewTerms') }}" class="nav-link">
                                <i data-feather="file-text"></i>
                                <span>{{ __('termsOfUse') }}</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Sidebar Footer Logout -->
                    <div class="sidebar-logout-wrap">
                        <a href="{{ route('logout') }}" class="sidebar-logout-btn">
                            <i data-feather="log-out"></i>
                            <span>Log Out</span>
                        </a>
                    </div>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
                <form action="">
                    <input type="hidden" id="user_type" value="{{ session('user_type') }}">
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="{{ asset('asset/cdnjs/quill.js') }}"></script>
    
    <script src="{{ asset('asset/cdnjs/iziToast.min.js') }}"></script>
    <script src="{{ asset('asset/cdnjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('asset/script/env.js') }}"></script> 
    <script src="{{ asset('asset/js/app.min.js ') }}"></script>
    <script src="{{ asset('asset/bundles/datatables/datatables.min.js ') }}"></script>
    <script src="{{ asset('asset/bundles/jquery-ui/jquery-ui.min.js ') }}"></script>
    <script src="{{ asset('asset/js/scripts.js') }}"></script> 
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('asset/cdnjs/select2.js') }}"></script>
    <script src="{{ asset('asset/script/app.js') }}"></script> 
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
    <script src="{{ asset('asset/bundles/summernote/summernote-bs4.js ') }}"></script> -->

    <!-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    </script> -->

    
    

    <script>

        // var toolbarOptions = [
        // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        // ['bold', 'italic', 'underline', 'link', 'strike'],
        // [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        // // [{ 'color': [ "#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff",
        // // "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff",
        // // "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff",
        // // "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2",
        // // "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"] }],
        // // [{ 'background': [ "#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff",
        // // "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff",
        // // "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff",
        // // "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2",
        // // "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"] }],
        // // [{ 'align': [] }],
        // ];

        // var quill = new Quill('#editor', {
        // modules: {
        //     toolbar: toolbarOptions
        // },
        // theme: 'snow'
        // });

        // var quill2 = new Quill('#editEditor', {
        // modules: {
        //     toolbar: toolbarOptions
        // },
        // theme: 'snow'
        // });
    </script>


    @yield('header') 
</body>

</html>