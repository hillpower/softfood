<?php 
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "", "softfood");
	
	if($_GET['uTipo'] == "alterar") {
		$id = $_GET['uId'];
		$situacao = $_GET['uSituacao'];
		
		$query = "UPDATE pedido SET situacao_id=$situacao WHERE id = $id";
			
		mysqli_query($link, $query);
	}	
	else {
		$id = $_GET['uId'];
		
		$query = "SELECT p.numeropedido, p.datacompra, ip.quantidade, pr.nome as nomep, ip.valor, p.total, c.nome, c.endereco, p.obs
		FROM itempedido AS ip
		INNER JOIN pedido AS p ON (ip.pedido_id = p.id)
		INNER JOIN produto AS pr ON (ip.produto_id = pr.id)
		INNER JOIN cliente AS c ON (p.cliente_id = c.id)
		WHERE ip.pedido_id = ".$id;
		
		$result = mysqli_query($link, $query);
		while($row = mysqli_fetch_assoc($result)) {
			$header = "NÚMERO DO PEDIDO - ".$row["numeropedido"]."</br></br>";
			$resumo .= $row["quantidade"]." ".$row["nomep"]." = R$ ".number_format($row["valor"], 2, ',', '.')."</br>";	
			$footer = "</br> Total do pedido: R$".number_format($row["total"], 2, ',', '.')."</br>";	
			$footer .= "</br> Dados da entrega: ".$row["nome"]." - ".$row["endereco"]."</br>";	
			$footer .= "</br> Observações: ".$row["obs"]; 
		}
		$resumo = $header.$resumo.$footer;
		
		echo $resumo;
	}
	mysqli_close($link);
	
	//echo $query;
?>