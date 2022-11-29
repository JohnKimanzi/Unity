<?php header("Content-type: mark_design/css; charset: UT-8");?>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ Session::token() }}"> 
<meta name="_token" content="{{csrf_token()}}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>{{isset($title) ? $title : "".config('app.name')}}</title>
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"> --}}
{{-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"> --}}
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/unity_favicon.png')}}">
{{-- <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet"> --}}

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"> </script> -->

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

<!-- Lineawesome CSS -->
<link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">

	<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">

<!-- Calendar CSS -->
<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}">

<!-- Tagsinput CSS -->
<link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

<!-- Datatable CSS -->
{{-- <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<!-- Chart CSS -->
<link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">

<!-- Summernote CSS -->
<link rel="stylesheet" href="{{asset('plugins/summernote/dist/summernote-bs4.css')}}">

{{-- Fullcalendar --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />


<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">

{{-- custom --}}
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
<!-- jQuery -->
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
	
{{-- Alex --}}
<!-- chat CSS -->
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
<!-- Mark design CSS -->
<link rel="stylesheet" href="{{asset('css/mark_design.css')}}">

{{-- <link rel="stylesheet" href="{{asset('css/account_profile.css')}}"> --}}





