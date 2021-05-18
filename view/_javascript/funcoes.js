/** Talvez eu não esteja uasando essa classe ***/



// Variaveis globais da tabela de preços
var $output_valCompra = document.querySelector("#valComp");
var $output_valEnt = document.querySelector("#valEnt");
var $output_valTot = document.querySelector("#valTot");

// Variáveis globais com informações dos produtos
var campo_nome = document.getElementById("produto1").innerHTML;


// Objetos 
function Produto(nome, preco, quantidade){
	this.nome = nome;
	this.preco = preco;
	this.quantidade = quantidade;

	this.mostrarProdutos = function (){
		console.log("Nome: " + this.nome + "Preço: " + this.preco + "Quantidade: " + this.quantidade);
	}
};


// Funçoes
function adicionarDados(event) {
	event.preventDefault();

	novo_produto = new Produto()
}


$output_valores.onload = function() {
	var valComp = $output_valCompra.value;
	var valEnt = $output_valEnt;
	var total;
}