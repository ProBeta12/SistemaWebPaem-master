<?php
session_start();

//verifica se clicou no butão
if(isset($_POST['nome']))
{
  include_once('../../JSON/rota_api.php');

  //pegando o ano de ingresso,matricula e nome do usuario
  $nome =strtoupper( addslashes( $_POST['nome']));
  $turno = addslashes($_POST['turno']);
  $funcao = addslashes($_POST['funcao']);

  // Separando o endereço de emal digitado pelo usuario
  $email = addslashes($_POST['email']);
  $dominio = strstr($email, '@');

  //criando array para juntar todos os dados digitado pelo usuario
  $cadastro_port = [];

  //verificando o dominio
  if($dominio == "@gmail.com"){
      
    $cadastro_port = array(
      //Array dados do tecnico para tabela tecnico
      "portaria" => array(
        "nome" => $nome,
        "data_nascimento" => addslashes($_POST['data_nascimento']),
        "funcao" => $funcao,
        "turno_trabalho" => $turno,
        "campus_instituto_id_campus_instituto" => addslashes($_POST['campus']),
      ),
      //Array dados do tecnico para tabela usuario
      "usuario" => array(
        'email' => addslashes($_POST['email']),
        'senha' => addslashes($_POST['senha']),
        'login' => addslashes($_POST['username']),
        'cpf' =>  addslashes($_POST['cpf']),
        'tipo' => addslashes('4'),
        "campus_instituto_id_campus_instituto" => addslashes($_POST['campus']),
      ),
    );
  }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
     Coloque o seu email institucional, por gentileza. Abraços :)
    </div>";
      header("Location: ../../View/tecnico/home_tecnico_port.php");
  }
 

  //Verifica se a quantidades de vacinas for igual a nenhuma, o discente é obrigado a dar uma justificativa
      //Verifica se a quantidades de vacinas for igual a 1 
      //Verifica se a quantidades de vacinas for igual a 2

       //Verifica se a quantidades de vacinas for igual a 3

  //vereficar se esta tudo preenchido no array
  $validacao = (false === array_search(false , $cadastro_port['portaria'], false));
  $validacao1 = (false === array_search(false , $cadastro_port['usuario'], false));

  if($validacao === true && $validacao1 === true)
  { 
   
    //$retorno = busca_discente($unidade_campus,$ano_ingresso,$matricula,$nome,$id_curso);
 
    if($retorno === false){
      throw new Exception( $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
      Infelizmente não encontramos você. Verifique se os seguintes dados foram
      digitados corretamente: Campus/Instituto, Matricula, Nome, Curso e Ano de Ingresso.
      </div>");
      header("Location: ../../View/tecnico/home_tecnico_port.php");
      exit();
    
    }else{

      //transformando array em json
      $cadastro_port_json = json_encode($cadastro_port);

      //chamada da função CURL para o tecnico
      
      $ch = curl_init( $rotaApi.'/api.paem/portarias/portaria');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $cadastro_port_json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json;charset=UTF-8',)
      );
      
      $result = curl_exec($ch);
      $httpcode1 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);
      
      //Resposta para o usuario
      switch ($httpcode1) {

        case 201:
        
          $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
          Usuário cadastrado com sucesso!!
          </div>";
          header("Location: ../../View/tecnico/home_tecnico_port.php");
          exit();
          break;
        
        case 500:
          $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
          Email e/ou Matricula já cadastrados!!
          </div>";
          header("Location: ../../View/tecnico/home_tecnico_port.php");
          exit();
          break;

        default:
          $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
          Erro no Servidor, Erro ao Cadastrar!!
          </div>";
          header("Location: ../../View/tecnico/home_tecnico_port.php");
          exit();
      }
    }
      
  }
  else
  {
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
      Preencha todos os campos!!
    </div>";
      header("Location: ../../View/tecnico/home_tecnico_port.php");
  }
}
//Função buscar discente
// function busca_discente($unidade_campus,$ano_ingresso,$matricula,$nome,$id_curso ){
//   //Pegando o JSON de todos os discente da ufopa
//   $url = file_get_contents("../../JSON/discentes.json");

//   $resultado = json_decode($url,true);

//   if (!$resultado) {
//     switch (json_last_error()) {
//         case JSON_ERROR_DEPTH:
//             echo 'A profundidade máxima da pilha foi excedida';
//         break;
//         case JSON_ERROR_STATE_MISMATCH:
//             echo 'JSON malformado ou inválido';
//         break;
//         case JSON_ERROR_CTRL_CHAR:
//             echo 'Erro de caractere de controle, possivelmente codificado incorretamente';
//         break;
//         case JSON_ERROR_SYNTAX:
//             echo 'Erro de sintaxe';
//         break;
//         case JSON_ERROR_UTF8:
//             echo 'Caractere UTF-8 malformado, codificação possivelmente incorreta';
//         break;
//         default:
//             echo 'Erro desconhecido';
//         break;
//     }
//     exit;
//   }

//   //Pegando os dados do discente
//   foreach($resultado as &$value){
//     $nome_discente = $value['unidade'][$unidade_campus][$ano_ingresso][$id_curso][$matricula];
//   }

//   if(!empty($nome_discente)){
 
//     if($nome_discente == $nome){
//       //esta tudo okay, discente encontrado 
//       return true;
//     }else{
//       //Discente não encontrado
//       return false;
//     }
    
//   }else{
//     return false;
//   }
// }

?>