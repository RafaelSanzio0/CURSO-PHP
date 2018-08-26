  <!-- AQUI ESTOU CRIANDO O CAMPO DE PREENCHIMENTO QUE O USUÁRIO IRAR COLOCAR SEUS DADOS-->

<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-categoria.php"); 
      include("banco-produto.php"); 



$id = $_GET['id'];
$produto = buscaProduto($conexao,$id);
$categorias = listaCategoria($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";


?>

<h1>Alterar Produto</h1>  
<form action="altera-produto.php" method="post"> <!-- OS DADOS INSERIDOS IRÃO PARA A PAGINA ESPECIFICADA NA TAG COM O MÉTODO DE ENVIO
                                                    POST AO INVES DE UM GET, POIS O MESMO É MAIS SEGURO PARA AÇOES QUE MECHE COM OS DADOS DO BANCO -->
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome"  value="<?=$produto['nome']?>"/></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"/></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name="descricao" ><?=$produto['descricao']?></textarea></td>
        
        <tr>
            
            <td></td>
                
            <td><input type="checkbox" name="usado" value="true" <?=$usado?> >Usado</td>
            
       
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
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
