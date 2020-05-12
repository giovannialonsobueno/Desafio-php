 <?php
 //página feita para remoção de produtos e usuários
 // devido minha falta de conhecimento em php, criar um link para agir como botão foi a minha alternativa
 include('includes/functions.php');
 //caso o usuário não estiver logado, retorno a página de login
  session_start();
  if (!$_SESSION) {
  header('location: login.php');
  }
 //apagar produto/item
 if ($_POST['delete']) {
   $produto = pegarProduto($_GET['id']);
   //verificar se o item registrado existe
   if ($produto) {
     //identificar se o item teve o nome corretamente reescrito para ser apagado
     if ($_POST['delete'] == $produto['produto']) {
     unlink($produto['imagem']);
     $files = carregaProduto();
       foreach($files as $item => $info) {
         //encontra o produto em questão e apaga-o
         if($info['id'] == $_GET['id']) {
         unset($files[$item]);
         $data = json_encode($files);
         file_put_contents('produtos.json', $data);
         var_dump($data);
         break;
         }
       }
     }
   }
   //voltar automaticamente para a página de produtos após remoção do item
   header('location: indexProdutos.php');
   } else {
   //volta ao item caso o nome não foi escrito corretamente
   header('location: showProduto?id='.$_GET['id']);
   }

   //remoção de usuários
   if ($_GET['nome']) {
     $usuario = pegaUsuario($_GET['nome']);
     if ($usuario) {
       $files = carregaUsuarios();
         //encontra o usuário em questão e apaga-o
         foreach($files as $item => $info) {
           if($info['nome'] == $_GET['nome']) {
           unset($files[$item]);
           array_values($files);
           $data = json_encode($files);
           file_put_contents('usuarios.json', $data);
           break;
           }
         }
       }
       //retorna a página de usuários e cadastro
       header('location: createUsuario.php');
   }

    ?>
