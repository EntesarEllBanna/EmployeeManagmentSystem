
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/Bootstrap/favicon.ico">

    <title>@yield("title")</title>

    <!-- Bootstrap core CSS -->
    <link href="/Bootstrap/css/bootstrap.mincolor2.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/Bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/Bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/Bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      @yield("css")
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li>
              
               <a class=" dropdown dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>EmployeeManagmentSystem</strong><span class="caret"></span>
           
              <ul class="dropdown-menu">
                   
                <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
<!--                <li><a href="/accounteq/searchpaging"> Search Paging</a></li>-->
          </ul>
            </a>
              
              </li>
            <li ><a href="/sticky">Home</a></li>
            <li><a href="/sticky/about">About</a></li>
            <li><a href="/sticky/contact">Contact</a></li>
<!--            <li><a href="/sticky/sendtoview">Send To View</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">manager <span class="caret"></span></a>
              <ul class="dropdown-menu">
                   
                <li><a href="/accounteq/search"> Search</a></li>
                <li><a href="/accounteq/searchpaging"> Search Paging</a></li>
                <li><a href="/accounteq/searchpagingadv"> Search Paging (Advanced)</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
      
    <div class="container">
      <div class="page-header">
        <h1>@yield("title")</h1>
      </div>
      @include("_msg")
      @yield("content")
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; Eng. Entesar ElBanna</p>
      </div>
    </footer>
    
    <div class="modal fade" id="Confirm" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to continue?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger">Yes, sure</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/Bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/Bootstrap/js/ie10-viewport-bug-workaround.js"></script>
      <script>
          $(function(){
              //$("#Confirm").modal("show");
              $(".Confirm").click(function(){
                  $("#Confirm").modal("show");
                  $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                  return false;
              });
          });
      </script>
      @yield("js")
  </body>
</html>
