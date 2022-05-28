<?php
session_start();

if(!isset($_SESSION['token']))
{
    header("location: ./login_tec.php");
    exit();
}
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Minha Vida Academica</title>
    <link rel="shortcut icon" href="../../Assets/img/Minhavidaacademica.ico">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../../Assets/css/areaprivtec.css" />
    
    <link href="../../bootstrap/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
    <script src="https://kit.fontawesome.com/b7e150eff5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <?php
            include "./menu_tecnico.php";
        ?>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container">
                <h2>Área de Cadastro.</h2>
                <hr>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <p>Nesta página você podera realizar o cadastrado manual do agente de portaria de seu campus, de acordo com sua respectiva função.</p>
                        </div>
                    </div>
                <hr>
                <form  method="POST" action="../../controller/portaria_controller/cont_cadastrar_port.php" class="alert alert-secondary"> 
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>
                    <h4>Faça o cadastro.</h4>


                                <!--Nome-->
                                    <div class=" input-group mb-3">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text" >Nome</span>
                                    </div>
                                    <input required name="nome" id="nome" type="text" class="form-control" placeholder="Digite nome completo" aria-label="nome" maxlength="40">
                                </div>
                       
                                <!--Data de nascimento  -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Data de nascimento</span>
                                    </div>
                                    <input type="date" name="data_nascimento" min="1900-01-01" max="2021-12-31"  class="form-control" aria-label="data_nascimento" aria-describedby="basic-addon4" required="" maxlength="10" >
                                </div>

                                <!-- turno  -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Turno</span>
                                    </div>
                                    <select required name="turno" class="custom-select" id="turno">
                                        <option disabled selected></option>
                                        <option value='1'>manha</option>
                                        <option value="2">tarde</option>
                                        <option value="3">noite</option>
                                    </select>
                                </div>

                                <!-- CPF -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >CPF</span>
                                    </div>
                                    <input required name="cpf" id="cpf" type="text" class="form-control" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" placeholder="Digite seu numero do CPF (Ex: 000.000.000-00)" aria-label="cpf" aria-describedby="basic-addon5" maxlength="14" onkeypress="$(this).mask('000.000.000-09')" onblur="validarCPF(this)">
                                </div>

                                <!--Campus-->
                               
                                   <?php
                                    $url = "../../JSON/campus.json";
                                    //var_dump($url);
                                    //$url = "https://swapi.dev/api/people/?page=1";
                                    $resultado = json_decode(file_get_contents($url));

                                    if (!$resultado) {
                                        switch (json_last_error()) {
                                            case JSON_ERROR_DEPTH:
                                                echo 'A profundidade máxima da pilha foi excedida';
                                            break;
                                            case JSON_ERROR_STATE_MISMATCH:
                                                echo 'JSON malformado ou inválido';
                                            break;
                                            case JSON_ERROR_CTRL_CHAR:
                                                echo 'Erro de caractere de controle, possivelmente codificado incorretamente';
                                            break;
                                            case JSON_ERROR_SYNTAX:
                                                echo 'Erro de sintaxe';
                                            break;
                                            case JSON_ERROR_UTF8:
                                                echo 'Caractere UTF-8 malformado, codificação possivelmente incorreta';
                                            break;
                                            default:
                                                echo 'Erro desconhecido';
                                            break;
                                        }
                                        exit;
                                    }
                               
                                ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="campus">Campus</label>
                                    </div>
                                    <select required name="campus" class="custom-select" id="campus">
                                    <option disabled selected></option>
                                        <?php
                                            foreach ($resultado->data as $value) { ?>
                                            <option value="<?php echo $value->id_campus_instituto; ?>"><?php echo $value->nome; ?></option> <?php
                                                }
                                        ?>
    
                                    </select>
                                </div>

                              <!--   <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="campus">Campus</label>
                                    </div>
                                    <select required name="campus" class="custom-select" id="campus">
                                        <option disabled selected></option>
                                        <option value="1">CAMPUS UNIVERSITÁRIO DE ORIXIMINÁ - PROF.DR. DOMINGOS DINIZ</option>
                                    </select>
                                </div>
 -->
                                <!--Função -->

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Função</span>
                                    </div>
                                    <select required name="funcao" class="custom-select" id="funcao">
                                        <option disabled selected></option>
                                        <option value='S'>Segurança</option>
                                        <option value="P">Portaria</option>
                                        <option value="L">Limpeza</option>
                                    </select>
                                </div>
                                <!--Curso -->
                        <!--         <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="curso">Curso</label>
                                    </div>
                                    <select required name="curso" class="custom-select" id="curso">
                                        <option disabled selected></option>
                                        <option value="1"> SISTEMAS DE INFORMAÇÃO</option>
                                        <option value="2"> CIÊNCIAS BIOLÓGICAS</option>
    
                                    </select>
                                </div> -->


                                <!--Entrada-->

                                <!--Semestre-->
                                
                                <!--Endereço-->

                                    <!--Rua/Travessa-->

                                    <!--Numero-->


                                    <!--Bairro-->

                                    <!-- Qtde pessoas  -->
                                
                                <!--username-->
                                <div class=" input-group mb-3">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text" >Username</span>
                                    </div>
                                    <input required name="username" id="username" type="text" class="form-control" placeholder="Digite seu login, ex:joaotec11" aria-label="username" maxlength="40">
                                </div>
                                
                                 <!--Email-->
                                 <div class=" input-group mb-3">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text" >@</span>
                                    </div>
                                    <input required name="email" id="email" type="email" pattern=".+@gmail\.com" title="Por Favor digite somente o seu endereço de email , exemple@gmail.com " class="form-control" placeholder="Digite o seu email " aria-label="Email"  maxlength="40">
                                    
                                    <!-- <div class=" input-group-prepend">
                                        <span id="msgemail" class="input-group-text" ></span>
                                    </div> -->
                                </div>

                                <!--Password-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >Senha</span>
                                    </div>
                                    <input required name="senha" id="senha" type="password" class="form-control" placeholder="Crie uma senha de acesso" aria-label="Nome" aria-describedby="basic-addon2" maxlength="32">
                                </div>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 py-4">
                                    <button name="pesqdispo" class="btn btn-primary" type="submit">Cadastrar</button>
                                </div> 
                                <!--<div class="col-md-6">
                                    <button name="pesqdispo" class="btn btn-primary" type="submit">Verificar Disponibilidade e Finalizar Reserva</button>
                                </div>-->
                            </div>
                        </div>
                            
                    </div>
    
                </form>

            
            </div>
        </main>
    </div>
    <script src="../../Assets/js/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <!-- Mostrando ou ocultando textarea -->
    

    <!--  //Validação dos campos -->
    <script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>


    <script>
        function validarCPF(el){
            if( !_cpf(el.value) ){
            alert("CPF inválido!" + el.value);
            // apaga o valor
            el.value = "";
            }
        }
    </script>
    <script>
        function _cpf(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf == '') return false;
            if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
            add = 0;
            for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
            rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
            return false;
            add = 0;
            for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
            rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
            return false;
            return true;
        }
    </script>
</body>
<script src="../../Assets/js/jquery-3.5.1.js"></script>
<script src="../../Assets/js/buscar_nome_matri.js"></script>
<script src="../../bootstrap/js/bootstrap.js"></script>
<script src="../../Assets/js/areaprivtec.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../bootstrap/js/locales/bootstrap-datetimepicker.pt-BR.js" charset="UTF-8"></script>

<script type="text/javascript">

    $('.form_date').datetimepicker({
        language:  'pt-BR',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        daysOfWeekDisabled: "0",
        startView: 2,
        minView: 2,
        forceParse: 0,
        startDate: new Date(),
        endDate: '+7d',
        
    });
</script>
<script>
    //Funções após a leitura do documento
    $(document).ready(function() {
    //Select para mostrar e esconder divs
    $('#SelectOptions').on('change',function(){
        var SelectValue='.'+$(this).val();
        $('.DivPai div').hide();
        $(SelectValue).toggle();
    });
    });
</script>
</html>