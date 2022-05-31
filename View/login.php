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
            <div class="row py-3">

                <div class="col">
                    <section id="login" >
                        <div class="container tm-container-gallery">
                            <div class="row">
                                <div class="text-center col-12">
                                    <h2 class="tm-text-primary tm-section-title mb-5">Logar como:</h2>
                                </div>            
                            </div>
                            <div class="row my-5">
                                <div class="col-lg-4">
                                    <a href="./tecnico/login_tec.php"><i class="fas fa-5x fa-user-tie text-center tm-icon"></i>
                                    <h4 class="text-center tm-text-primary mb-3">Servidor Técnico</h4></a>
                                </div>
                    
                                <div class="col-lg-4 mt-5 mt-lg-0">
                                    <a href="./docente/login_docente.php"><i class="fas fa-5x fa-chalkboard-teacher text-center tm-icon"></i>
                                    <h4 class="text-center tm-text-primary mb-3">Docente</h4></a>
                                </div>

                                <div class="col-lg-4 mt-5 mt-lg-0">
                                    <a href="./discente/login_discente.php"><i class="fas fa-5x fa-user-graduate text-center tm-icon"></i>
                                    <h4 class="text-center tm-text-primary mb-3">Discente</h4></a>
                                </div>
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