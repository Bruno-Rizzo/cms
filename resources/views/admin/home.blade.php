@extends('layouts.app')

@section('content')
    
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
          <i class="fas fa-chart-pie mr-1"></i> Dashboard
        </h4>
      </div><!-- /.col -->
   </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12">

        <div class="card card-primary card-outline">

          <div class="card-header">
            <h5 class="m-0">Painel Administrativo</h5>
          </div>

          <div class="card-body">

            <div class="row">

              <div class="col-md-3">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$visitsCount}}</h3>
                    <p>Acessos</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{$onlineCount}}</h3>
                    <p>Usuários Online</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-heart"></i>
                  </div>
                </div>
              </div> 

              <div class="col-md-3">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$pageCount}}</h3>
                    <p>Páginas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-sticky-note"></i>
                  </div>
                </div>
              </div> 

              <div class="col-md-3">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Usuários</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-friends"></i>
                  </div>
                </div>
              </div> 

            </div> <!--row-->

            <div class="row">

              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Páginas mais Visitadas</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="pagePie"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Sobre o Sistema</h3>
                  </div>
                  <div class="card-body">
                    Texto Card 2
                  </div>
                </div>
              </div>

            </div>

          </div> <!--card-body -->

        </div>

      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>

  window.onload = function(){
    let ctx = document.getElementById('pagePie').getContext('2d');
    window.pagePie = new Chart(ctx,{
      type:'pie',
      data:{
        datasets:[{
          data:{{$pageValues}},
          backgroundColor:'#0000FF'
        }],
        labels:{!! $pageLabels !!}
      },
      options:{
        responsive:true,
        legend:{
          display:false
        }
      }
    });
  }

</script>

@endsection

