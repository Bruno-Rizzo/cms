<!DOCTYPE html>

<html lang="pt-BR">

@include('layouts.header')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.navbar')

@include('layouts.sidebar') 

 
  <div class="content-wrapper">
    
    @yield('content')    
    
  </div>

@include('layouts.footer')

</body>
</html>