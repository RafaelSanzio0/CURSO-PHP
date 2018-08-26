  <!-- AQUI ESTOU CRIANDO O CAMPO DE PREENCHIMENTO QUE O USUÁRIO IRAR COLOCAR SEUS DADOS-->

<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-categoria.php"); 

$categorias = listaCategoria($conexao);

?>

<h1>Formulário de cadastro</h1>  
<form action="adiciona-produto.php" method="post"> <!-- OS DADOS INSERIDOS IRÃO PARA A PAGINA ESPECIFICADA NA TAG COM O MÉTODO DE ENVIO
                                                    POST AO INVES DE UM GET, POIS O MESMO É MAIS SEGURO PARA AÇOES QUE MECHE COM OS DADOS DO BANCO -->
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" /></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input class="form-control" type="number" name="preco" /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name="descricao"></textarea></td>
        
        <tr>
            
            <td></td>
                
            <td><input type="checkbox" name="usado" value="true">Usado</td>
       
        </tr>
        <td>Categoria</td>
        
            <td>
                <select class="form-control" name="categoria_id">
                    <?php foreach($categorias as $categoria): ?> 
                
                    <option value="<?=$categoria['id']?>">
                        <?=$categoria['nome']?>
                    </option>
                
                    <?php endforeach ?>
                    
                </select>
                
           </td>
        
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
