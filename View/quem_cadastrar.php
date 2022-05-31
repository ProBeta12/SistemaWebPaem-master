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

    <section id="cadastrar" class="tm-section-pad-top">
        <div class="container">
            <div class="row">

                <div class="col">
                    <section id="login">
                        <div class="container tm-container-gallery">
                        <div class="row">
                            <div class="text-center col-12">
                                <h4 class="t tm-section-title my-4">Seja bem vindo a tela de Cadastro!</h4>
                                <h4 class="tm-section-subtitle mb-3">Antes de começarmos, qual a seu cargo/função na UFOPA? Escolha a opção que melhor se adequa a você!</h4>
                            </div>            
                        </div>
                        <div class="row tm-section-pad-top">
                            <div class="col-lg-4">
                                <a href="./tecnico/cadastrar_tec.php"><i class="fas fa-5x fa-user-tie text-center tm-icon"></i>
                                <h4 class="text-center tm-text-primary mb-3">Técnico UFOPA</h4></a>
                            </div>
                        
                            <div class="col-lg-4 mt-5 mt-lg-0">
                            <a href="./docente/cadastrar_docente.php"><i class="fas fa-5x fa-chalkboard-teacher text-center tm-icon"></i>
                            <h4 class="text-center tm-text-primary mb-3">Docente UFOPA</h4></a>
                            </div>

                            <div class="col-lg-4 mt-5 mt-lg-0">
                            <a href="./discente/cadastrar_disc.php"><i class="fas fa-5x fa-user-graduate text-center tm-icon"></i>
                            <h4 class="text-center tm-text-primary mb-3">Discente UFOPA</h4></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
      </div>
    </section>
  

    <footer  class="tm-footer">
        <div class="container ">
            <small>Copyright &copy; 2021. All rights reserved.</small>
        </div>
    </footer>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> 

</body>
</html>