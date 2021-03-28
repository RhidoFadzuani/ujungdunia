<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAWAS-laporan Warga Subang</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/loginstyle.css')}}">
  <link rel="stylesheet" href="{{asset('css/home.css')}}">
  @yield('css')
</head>
<body>
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-2">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                  
                  <h3>@yield('judul')</h3>
              
              
                  @yield('isian')
         
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @yield('js')
   
</body>
</html>