<title>{{ isset($title) ? $title : 'Panel de administración' }}</title>
<!--[if lt IE 10]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="." />
<meta name="keywords" content="">
<meta name="author" content="zkated" />

<link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{ asset('theme_admin/css/waves.min.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/font-awesome-n.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/sweetalert.css')}}">

<link rel="stylesheet" href="{{ asset('theme_admin/css/chartist.css')}}" type="text/css" media="all">

<!-- Personalizado -->
<link rel="stylesheet" href="{{ asset('theme_admin/css/custom.css')}}" type="text/css" media="all">

<!-- TABLE -->
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/table/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/table/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/table/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/table/select.dataTables.min.css')}}">

<!-- END TABLE -->
<script type="text/javascript" src="{{ asset('theme_admin/js/jquery.min.js')}}"></script> 

<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme_admin/css/widget.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">


<link rel="stylesheet" href="{{ asset('theme_admin/css/pages.css')}}" type="text/css" media="all">
<script type="text/javascript">
    var app = { 
    	base : "{{ url('')}}"
  	}; 
</script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>