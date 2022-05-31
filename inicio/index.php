<!DOCTYPE html>
<html lang="pt-br">
<?php
  include_once('../funcionalidades/cabeca.php')
?>
</head>

<body> 
<?php
  include_once('../funcionalidades/cabecalho.php')
?>

  <section id="sessao01" class="tm-section-pad-top py-3">

    <div class="container py-3">

      <div class="row py-3">

        <div class="col-lg-5">
          <section>
            <div class="container tm-container-gallery">
              
              <div class="row">
                <div class="text-center col-12">
                    <img src="../Assets/img/Minhavidaacademica.png" height="300" width="300">
                </div>            
              </div>
          </section>
        </div>

        <div class="col-lg-6">
          <div class="row ">
            <div class="tm-intro-text-container">

              <h2 class="tm-text-primary mb-4"><strong>Sobre o Sistema</strong></h2>
              <p class="mb-4 tm-intro-text">
              O nosso sistema conta com acesso exclusivo para 
              todos os usuarios dos campus. Atualmente está disponível o cadastro
              para docente e tecnico, caso você seja um desses dois, faça o seu cadastro.
              </p>
              <h5><strong>Como cadastrar?</strong></h5>
              <p class="mb-5 tm-intro-text">
              A UFOPA em conjunto com o Programa de Ações Emergenciais (PAEM) desenvolveu um sistema único
              de acesso aos campi, a<strong> carterinha digital</strong>. Inicie seu cadastro para 
              ter acesso ao agendamento de salas, laboratórios e outros.
              </p>

            </div> 

          </div>

          <div class="row py-3">
            <div class="py-3 tm-intro-text-container">
                <a href="../View/quem_cadastrar.php" class="tm-intro-text tm-btn-primary">Fazer Cadastro</a>
            </div>

            <div class="py-3 tm-intro-text-container">
                <a href="../View/login.php" class="tm-intro-text tm-btn-primary">Fazer Login</a>
            </div>

          </div>
        </div>
        
      </div>
    </div>
  </section >

  <footer  class="tm-footer">
    <div class="container ">
      <small>Copyright &copy; 2021. All rights reserved.</small>
    </div>
  </footer>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> 
  </body>
</html>