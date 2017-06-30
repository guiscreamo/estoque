<?php
  require_once("config/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistema de Estoque All Net Group</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS INDEX -->
    <link rel="stylesheet" type="text/css" href="css/index.css" media="screen">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container-fluid login-area">
      <div class="row linha-imagem">
        <div class="col-sm-12">
          <img src="images/logo.png" title="All Net Group Estoque" class="logo">
        </div>
      </div><br><!-- DIV ROW -->

      <div class="row campos-login">
        <div class="col-sm-12">
          <form action="" method="post">
            <span class="glyphicon glyphicon-user"></span>
            <input type="text" name="login" placeholder="Informe seu login" required><br>
            <span class="glyphicon glyphicon-lock"></span>
            <input type="password" name="senha" placeholder="Informe a sua senha" required><br>
            <button type="submit" class="btn btn-primary btn-logar" name="btn-logar">Logar</button>
          </form>
        </div>
      </div>
      <a href="esqueceu_senha.php">Esqueceu a senha?</a>
    </div>
      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  if(isset($_POST['btn-logar'])){
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $query = mysqli_num_rows($mysqli->query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' AND nivel = 'Administrador' "));
    $query2 = mysqli_num_rows($mysqli->query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' AND nivel = 'Usuario_Templo' "));
    $query3 = mysqli_num_rows($mysqli->query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' AND nivel = 'Usuario_IURD' "));

    if($query == 1){

      session_start();

      $_SESSION['login'] = $_POST['login'];
      $_SESSION['senha'] = md5($_POST['senha']);

     echo "<div class='alert alert-success' style='position:relative; margin: -260px auto; width: 50%; text-align:center;'>Bem vindo, você logou com sucesso!</div>";
     echo "<meta http-equiv=Refresh content=2;url=paginas/dashboard.php>";
    }
    elseif($query2 == 1){

      session_start();

      $_SESSION['login'] = $_POST['login'];
      $_SESSION['senha'] = md5($_POST['senha']);

     echo "<div class='alert alert-success' style='position:relative; margin: -260px auto; width: 50%; text-align:center;'>Bem vindo, você logou com sucesso!</div>";
     echo "<meta http-equiv=Refresh content=2;url=paginas/clientes/templo/dashboard_templo.php>";
    }
    elseif($query3 == 1){

      session_start();

      $_SESSION['login'] = $_POST['login'];
      $_SESSION['senha'] = md5($_POST['senha']);

     echo "<div class='alert alert-success' style='position:relative; margin: -260px auto; width: 50%; text-align:center;'>Bem vindo, você logou com sucesso!</div>";
     echo "<meta http-equiv=Refresh content=2;url=paginas/clientes/iurd/dashboard_iurd.php>";
    }
    else{
      echo "<div class='alert alert-danger' style='position:relative; margin: -260px auto; width: 50%; text-align:center;'>Desculpe mas o usuário e senha parecem estar errados. Por favor verifique e tente novamente!</div>";
      echo "<meta http-equiv=Refresh content=2;url=index.php>";
    }


  }
?>