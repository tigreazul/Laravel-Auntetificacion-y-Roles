
<!DOCTYPE html>
<html lang="es">
<head>
    @include('admin.includes.head')
    <script>
		var local = {
			base: "{{ url('/') }}"
		} 
	</script>
</head>
<body>

<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            @include('admin.includes.nav')
        </nav>

        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="p-fixed users-main">
                    <div class="user-box">
                        @include('admin.includes.users')
                    </div>
                </div>
            </div>
        </div>


        <div class="showChat_inner">
            @include('admin.includes.chat')
        </div>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        @include('admin.includes.menu')
                    </div>
                </nav>

                <div class="pcoded-content">
                    @yield('content')
                </div>

                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer')
</body>
</html>