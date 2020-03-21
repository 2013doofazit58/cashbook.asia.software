<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Admin Dashboard</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
     />
     <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
     <meta name="msapplication-tap-highlight" content="no">
     <link rel="stylesheet"  href="{{ asset('dashboard/font/flaticon.css') }}">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('dashboard/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
     <link href="{{ asset('dashboard/style.css') }}" rel="stylesheet">
     <link href="{{ asset('dashboard/customstyle.css') }}" rel="stylesheet">

</head>
<body>

 <div id="app">
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('admin.header')
        <div class="app-main">
          @include('admin.sidebar')
                <div class="app-main__outer ">
                  <div class="app-main__inner px-2 pb-3">
                        <admin-content></admin-content>
                  </div>
                  @include('admin.footer')
               </div>
         </div>
      </div>
  </div>

@include('admin.headerbar')

 <script src="{{ asset('js/app.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/icon-change.js') }}"></script>
 <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/main.js') }}"></script>

</body>
</html>
