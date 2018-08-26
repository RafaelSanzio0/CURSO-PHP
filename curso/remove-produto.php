<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-produto.php");


$id = $_POST['id'];  
removeProduto($conexao,$id); // APENAS CHAMO A FUNC JÁ CRIADA DE REMOVER OS ITENS

header("Location: produto-lista.php?removido=true"); // AQUI INDICAMOS QUE AO REMOVER O PRODUTO, O NAVEGADOR VAI FAZER UMA REQUISIÇÃO
                                                     // A 302, QUE SERIA REDIRECIONAR O USER INSTANTANEAMENTE PARA A MESMA PÁGINA,
                                                    // TENTE REMOVER ALGUM ITEM SEM ESTA FUNÇÃO ;D


    die(); // COM O DIE, INDICAMOS QUE QUEREMOS QUE O SERVIDO PARE, N FAÇA MAIS NADA, GARANTINDO ASSIM QUE O ITEM FOI REMOVIDO POR            COMPELETO.

?>

