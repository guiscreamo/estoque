<?php
  require_once "../config/conexao.php";
  require_once "../config/login.php";

  $login = $_SESSION['login'];
  $date = date("F j, Y, g:i a");

  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Painel Administrativo</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS PAINEL ADMINISTRATIVO -->
    <link rel="stylesheet" type="text/css" href="../css/painel_administrativo.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.jscrollpane.custom.css" />
    <link rel="stylesheet" type="text/css" href="../css/bookblock.css" />
    <link rel="stylesheet" type="text/css" href="../css/custom.css" />
    <script src="../js/modernizr.custom.79639.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!-- NAVBAR MENU -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Navegar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="dashboard.php" class="navbar-brand"><img src="../images/logo_branco.png" title="All Net Group Estoque"></a>
        </div>
        
        <div class="collapse navbar-collapse" id="menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="data"><?php echo $date ?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $login ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Minha Conta</a></li>
                <li><a href="#">Meus Chamados</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="?sair=sim"><span class="glyphicon glyphicon-off">Sair</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <?php
      if(@$_GET['sair']){
      session_destroy();
      echo "<div class='alert alert-info' style='position:absolute; top:0; left:0; width:100%; text-align:center; font-size:20px;'>Até logo!</strong></div>";
      echo "<meta http-equiv=Refresh content=1;url=../index.php>";
      }
      ?>

      </div>
    </nav>
        
    <div class="container-fluid">
      <div class="page-header">
        <h3>Bem Vindo Ao Gerenciamento</h3>
      </div>
    </div>

    <div class="container menuprincipal">
      <div class="row">
        <div class="col-sm-2" id="menu-dashboard">
          <a href="produtos.php"><img src="../images/codigo_barras.jpg" class="img-responsive"></a>
          <span class="produtos">Produtos</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard">
          <a href="adicionar_produtos.php"><img src="../images/codigo_barras_adicionar.jpg" class="img-responsive"></a>
          <span class="adicionar_produtos">Adicionar Produtos</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_usuarios">
          <a href="usuarios.php"><img src="../images/usuarios.png" class="img-responsive"></a>
          <span class="usuarios">Usuários</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_adicionar_usuarios">
          <a href="adicionar_usuarios.php"><img src="../images/adicionar_usuarios.png" class="img-responsive"></a>
          <span class="adicionar_usuarios">Adicionar Usuários</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_usuarios">
          <a href="clientes.php"><img src="../images/clientes.png" class="img-responsive"></a>
          <span class="clientes">Clientes</span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2" id="menu-dashboard_adicionar_usuarios" style="margin-top: 10px;">
          <a href="adicionar_clientes.php"><img src="../images/adicionar_clientes.png" class="img-responsive"></a>
          <span class="adicionar_usuarios">Adicionar Clientes</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_usuarios" style="margin-top: 10px;">
          <a href="chamados.php"><img src="../images/chamados.png" class="img-responsive"></a>
          <span class="chamados">Chamados</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_usuarios" style="margin-top: 10px;">
          <a href="criar_chamados.php"><img src="../images/criar_chamado.png" class="img-responsive"></a>
          <span class="chamados" style="margin-left: -20px;">Criar Chamado</span>
        </div>
        <div class="col-sm-2" id="menu-dashboard_usuarios" style="margin-top: 10px;">
          <a href="relatorios.php"><img src="../images/relatorios.png" class="img-responsive"></a>
          <span class="relatorio">Relatórios</span>
        </div>
      </div><!-- DIV ROW -->
    </div>

    <div class="page-header">
      <h3>Dashboard</h3>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div id="total_estoque" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <script type="text/javascript">
            Highcharts.chart('total_estoque', {
                  chart: {
                      type: 'column'
                  },
                  title: {
                      text: 'Monthly Average Rainfall'
                  },
                  subtitle: {
                      text: 'Source: WorldClimate.com'
                  },
                  xAxis: {
                      categories: [
                          'Jan',
                          'Feb',
                          'Mar',
                          'Apr',
                          'May',
                          'Jun',
                          'Jul',
                          'Aug',
                          'Sep',
                          'Oct',
                          'Nov',
                          'Dec'
                      ],
                      crosshair: true
                  },
                  yAxis: {
                      min: 0,
                      title: {
                          text: ''
                      }
                  },
                  tooltip: {
                      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                      footerFormat: '</table>',
                      shared: true,
                      useHTML: true
                  },
                  plotOptions: {
                      column: {
                          pointPadding: 0.2,
                          borderWidth: 0
                      }
                  },
                  series: [{
                      name: 'Tokyo',
                      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                  }, {
                      name: 'New York',
                      data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                  }, {
                      name: 'London',
                      data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                  }, {
                      name: 'Berlin',
                      data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                  }]
              });
          </script>
        </div>
        <div class="col-sm-6">
          
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/pushy.min.js"></script>
    
  </body>
</html>