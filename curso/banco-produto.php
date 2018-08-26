<!-- AQUI ESTA TODA LÓGICA DO BANCO, BEM COMO SELECIONAR OS PRODUTOS DA TABELA, INSERIR E REMOVER. -->


<?php

function listaProdutos($conexao) {
    $produtos = array();              // CRIEI UMA VAR PARA RECEBER A LISTA DE PRODUTOS
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id"); // OUTRA QUE SERIA O RESULTADO DA CONSULTA

    while($produto = mysqli_fetch_assoc($resultado)) { // ESTE WHILE SERVE PARA CONTINUAR BUSCANDO TODOS OS PRODUTOS QUE HÁ NA LISTA
                                                        // SEM ELE, O CODIGO PEGARIA O PRIMEIRO PRODUTO DA TABELA APENAS.
        array_push($produtos, $produto); // ADD OS ELEMENTOS NA LISTA
    }

    return $produtos; //  RETORNA A LISTA COM OS VALORES PREENCHIDOS
    
}


function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {  // AQUI N TEM O QUE DIZER, FUNÇAO DE INSERIR VALORES NA LISTA(TABELA)
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco},'{$descricao}',{$categoria_id},{$usado})";
    return mysqli_query($conexao, $query);  //  RETORNA NO MEU BANCO(CONEXAO), A CONSULTA DE INSERÇÃO(QUERY)
}



function removeProduto($conexao, $id) { // MESMO ESQUEMA DE INSERÇÃO, APENAS TROCAMOS A CONSULTA QUE O SCRIPT VAI RODAR
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao,$query); 
    
}

function buscaProduto($conexao, $id){
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao,$query);
    return mysqli_fetch_assoc($resultado);
    
    
    
}
