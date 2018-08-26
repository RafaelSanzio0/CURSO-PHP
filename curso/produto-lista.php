<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-produto.php"); ?>


<?php

    if(array_key_exists("removido",$_GET) && $_GET["removido"] == true){ // COM ESSE IF, A MSG DE PRODUTO APAGADO APAREÇA APENAS QUANDO 
                                                                        // O USER REALMENTE DELETAR UM PRODUTO DA TABELA, SEM ESTA 
                                                                        // CONDICIONAL, A MSG APARECIA A TODO MOMENTO NO NOSSO LAYOUT
?>  
      <p class="alert-success"> Produto apagado com sucesso</p>  

<?php
        
    }

?>


<table class="table table-striped table-bordered"> 

    <?php
    
        $produtos = listaProdutos($conexao); // CHAMO MINHA FUNÇÃO CRIADA ANTERIORMENTE
        foreach($produtos as $produto) : //  AQUI IREMOS PERCORRER O ARRAY PRODUTOS INTEIRO! COM O ELEMENTO PRODUTO
    ?>
    
    
    
    
    <!-- ESTES CARAS SAO MEUS DADOS INSERIDOS, SÓ QUE EM FORMA DE TABELA 
                                              NA DESCRIÇÃO DEIXEI UM RANGE DE 15 CARACTER, PARA O MESMO N OCUPAR A TABELA TODA-->
    <tr>
        <td><?= $produto['nome'] ?></td> 
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto["descricao"],0,15) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td><a class="btn btn-primary" href="altera-produto.php?id=<?=$produto['id']?>">alterar</a></td>


        
        <td>
            <form action="remove-produto.php" method="post"> <!-- EXPLICAÇÃO NA PÁGINA DO MESMO-->
                <input type="hidden" name="id" value="<?=$produto{'id'} ?>">
                <button class="btn btn-danger">remover</button>
         
            </form>
        </td>
    </tr>
    
    <?php
        endforeach // AQUI ACABA O CILCO FOREACH
    ?>
</table>

<?php include("rodape.php"); ?>
