<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-produto.php"); ?>   <!-- AQUI ESTOU IMPORTANDO ARQUIVOS DOS OUTROS PHPS -->

<?php


$nome = $_POST["nome"];   
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];   // AQUI ESTOU CRIANDO AS VARIAVEIS E SEU DEVIDO MÉTODO DE REQUISIÇÃO
$categoria_id = $_POST['categoria_id'];

if(array_key_exists('usado',$_POST)) {
    
    $usado = "true";

}else{
    
    $usado = "false";
}



if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?> <!-- SE RECEBO TODOS OS PAREMETROS RECEBO A MSG DE SUCESSO-->
    <p class="text-success">O produto <?= $nome ?> no valor de <?= $preco ?> foi adicionado com sucesso!</p>

<?php } else { // CASO MEU USUÁRIO ESQUEÇA DE PREENCHER ALGUM CAMPO, RECEBO A MSG DE ERRO
    
    $msg = mysqli_error($conexao);
    
?>

    <p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
