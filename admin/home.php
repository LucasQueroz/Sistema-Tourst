<?php /*
	//session_start();
	
	include_once 'header.php';
	//include_once 'view/message.php'; 
?>

<section id="corpo">

		
<div class="container">
  <h2>Produtos Disponiveis</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Produto</th>
		<th scope="col">Descrição</th>
		<th scope="col">Preço Unitário</th>
		<th scope="col">Ação</th>
      </tr>
    </thead>
    <?php 
				//session_start();
				require_once '../controller/db_connect.php';
				
				//$email = $_SESSION['email'];

				$sql_produtos = "SELECT * FROM produtos";
				$produto_result = mysqli_query($connect, $sql_produtos);

				while($rows_produtos = mysqli_fetch_array($produto_result)):
		?>

    <tbody>
      <tr>
        <td><?php echo $rows_produtos['nome']?></td>
        <td><?php echo $rows_produtos['descricao']?></td>
        <td><?php echo $rows_produtos['preco']?></td>
	    <td class="text-center">
	    	<a class='btn btn-info btn-xs' href="/www/ZeroFila/admin/edita_produto.php?prod_id=<?php echo $rows_produtos['prod_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
	        <a class="btn btn-danger btn-xs" href="/www/ZeroFila/admin/class/DeletarProduto.php?prod_id=<?php echo $rows_produtos['prod_id']?>"><span class="glyphicon glyphicon-remove"></span> Del</a>
        </td>
      </tr>
      
    </tbody>
    <?php endwhile; ?>
  </table>
</div>

</section>