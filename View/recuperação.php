<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Minha Vida Academica</title>
    <link rel="shortcut icon" href="../Assets/img/Minhavidaacademica.ico">
    <script src="https://kit.fontawesome.com/b7e150eff5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/style.css" />
    <link rel="stylesheet" href="../Assets/css/icon.css">
    

</head>
<body>
    <!-- Hero section -->
    <section id="hero" class="text-white tm-font-big tm-parallax">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">              
            <div class="container">  
                <div class="tm-next">
                    <a href="../index.php" class="navbar-brand"><img src="../Assets/img/ufopa-icon-semfundo.png" class="img-icon"/>UFOPA-MINHA VIDA ACADEMICA</a>
                </div>     
            </div>
        </nav>
    </section>
    
    <section class="tm-section-pad-top">
        <div class="px-5 px-md-5 px-lg-5  py-5 mx-auto">
            <div class="row px-5 corpo">
                <div class="col mx-lg-5 px-5" >

                
                    <form method="POST" action="./envio_email.php" class="px-5">

                        <div class="card2 card border-0 px-5">
                            <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                            <div id="titulo">
                                <h3 class="card-title text-lg">Esqueceu sua senha? Vamos recuperá-la</h3><br>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <p>Nesta página você poderá realizar a troca de senha. Digite seu E-mail Institucional e enviaremos uma senha temporária para que você possa logar e efetuar a troca de senha no seu perfil.</p>
                                    <p>Caso não receba a senha temporária ou seu e-mail não tenha sido encontrado, entre em contato com a equipe de suporte através do whatsapp - <a href="https://chat.whatsapp.com/GuKBhaCcZKHIW37u1Z5zIN" class="text-danger font-weight-bold ">Suporte Whatsapp</a></p>
                                </div>
                            </div>
                            <hr>
                            
                            <!--Email de recuperação -->
                            <div class="row px-5  mb-2">
                                <label class="mb-2">
                                    <h6 class="mb-0 text-sm">Email Institucional</h6>
                                </label>
                                <input class="mb-4" type="email" name="email" placeholder="Digite um endereço de e-mail válido">
                            </div>
                            <!----------------- -->

                            <!-- <div class="row px-5 mb-5">
                                <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">lembre de mim</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Esqueceu a senha?</a>
                            </div> -->
                            <div class="row mb-5 px-5"> 
                                <button type="submit" class="btn btn-blue text-center">Enviar</button> 
                            </div>
                            <div class="row mb-5 px-5"> 
                                <small class="font-weight-bold">Ainda não possui uma conta? <a href="./quem_cadastrar.php" class="text-danger ">Registre-se</a></small>  
                            </div>
                            <div class="row mb-5 px-5"> 
                                <small class="font-weight-bold">Não sabe como logar no seu E-mail institucional? <a href="https://mail.ufopa.edu.br/" class="text-danger ">Aperte Aqui</a></small>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer  class="tm-footer">
        <div class="container ">
            <small>Copyright &copy; 2021. All rights reserved.</small>
        </div>
    </footer>
</body>
</html>