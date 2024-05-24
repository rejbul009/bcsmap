
<!DOCTYPE html>
<html lang="en">
   @include('dash.inc.head')
    <body class="sb-nav-fixed">
      @include('dash.inc.topnav')





        <div id="layoutSidenav">

          @include('dash.inc.leftsidenav')
           
            <div id="layoutSidenav_content">

              @include('dash.inc.main')
              @include('dash.inc.footer')
                
                
            </div>
        </div>
        @include('dash.inc.scripts')
    </body>
</html>
