<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Administración Banco de Sangre</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/table-responsive.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>



      @include('layout.topbar')
      @include('layout.sidebar')
      @yield('content')





    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js')  }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>

    <!--script for this page-->
      @yield('scripts')
      <script>
          var url = window.location;
          $('div ul li.tech a[href="' + url.href + '"]').addClass('active');
          $('ul li a[href="' + url.href + '"]').parent().addClass('active').parent()
                  .parent('.sub-menu').find("a[href='javascript:;']").first().addClass('active');
      </script>
  <script>
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>


  </body>


</html>
