var VAL_NOME = false, VAL_TELEFONE = false, VAL_CELULAR = false, VAL_EMAIL = false, VAL_ENDERECO = false, VAL_CPF = false, VAL_RG = false, VAL_NASC_CLIENTE = false, VAL_CONF_SENHA = false, VAL_SENHA = false
function mascaraNome(){ //Não deixa o usuário digitar números, nem segurando a mesma tecla//
	var nome = document.getElementById("nome_cliente").value;
	var posicao = nome.length - 1;
	var aux;
	if(posicao == -1){
		document.getElementById("nome_cliente").value = nome;
	}
	else if (!isNaN(nome[posicao])){ //isNaN verifica se a variável não é número//entra se form um número
		if (nome.charCodeAt(posicao)==32) {//se espaço
				document.getElementById("nome_cliente").value = nome;
		}
		else{
			aux = nome.replace(nome[posicao],""); //substitui o que estiver na posição por vazio. 
			document.getElementById("nome_cliente").value = aux; //envia dados para o html
		}
	}
	else if(posicao > 0 ){
		if(nome[posicao - 1] == nome[posicao] && nome[posicao - 1] == nome[posicao - 2]){
			document.getElementById("nome_cliente").value = nome.substring(0,nome.length-1); //envia dados para o html
		}
	}
	if(nome.length >= 10) VAL_NOME = true;
	else VAL_NOME = false;
} 

function validaEndereco(){ //limita o tamanho do endereço do cliente//
	var endereco = document.getElementById("endereco_cliente").value;
	if(endereco.length <= 100)	VAL_ENDERECO = true;
	else VAL_ENDERECO = false;
}

function mascaraFone(){ //aplica os caracteres e subdivide os números no formato de telefone para o usuário//
	var fone = document.getElementById("telefone_cliente").value;
	var posicao = fone.length - 1;
	var aux;
	if(isNaN(fone[posicao])){
		aux = fone.replace(fone[posicao],"");
		document.getElementById("telefone_cliente").value = aux;
	}
	else if(posicao == 0){
		aux = "("+fone[posicao];
		document.getElementById("telefone_cliente").value = aux;
	}else if(posicao == 3){
		aux = fone.substring(0,3);
		aux = aux + ")" + fone[posicao];
		document.getElementById("telefone_cliente").value = aux;
	}else if(posicao == 9){
		aux = fone.substring(0,9);
		aux = aux + "-" + fone[posicao];
		document.getElementById("telefone_cliente").value = aux;
	}else if(fone.length>14){
		aux = fone.substring(0,14);
		document.getElementById("telefone_cliente").value = aux;
	}	
	if(fone.length == 14) VAL_TELEFONE = true;
	else VAL_TELEFONE = false;
}

function mascaraCel(){ //aplica os caracteres e subdivide os números no formato de telefone para o usuário//
	var cel = document.getElementById("celular_cliente").value;
	var posicao = cel.length - 1;
	var aux;
	if(isNaN(cel[posicao])){
		aux = cel.replace(cel[posicao],"");
		document.getElementById("celular_cliente").value = aux;
	}
	else if(posicao == 0){
		aux = "("+cel[posicao];
		document.getElementById("celular_cliente").value = aux;
	}else if(posicao == 3){
		aux = cel.substring(0,3);
		aux = aux + ")" + cel[posicao];
		document.getElementById("celular_cliente").value = aux;
	}else if(posicao == 9){
		aux = cel.substring(0,9);
		aux = aux + "-" + cel[posicao];
		document.getElementById("celular_cliente").value = aux;
	}else if(cel.length>14){
		aux = cel.substring(0,14);
		document.getElementById("celular_cliente").value = aux;
	}	
	if(cel.length == 14) VAL_CELULAR = true;
	else VAL_CELULAR = false;
}

function validaDataNascimento(){
	var data_atual = new Date();
	var dia_atual= data_atual.getDate(); // 1-31
	var mes_atual= data_atual.getMonth(); // 0-11 (zero=janeiro)
	var ano_atual = data_atual.getFullYear(); // com 4 dígitos
	var data = document.getElementById("nascimento_cliente").value;
	var dia = data.substr(0,2);
	var mes = data.substr(3,2);
	var ano = data.substr(6,4);
	var idade = ano_atual-ano;

	switch (mes) {
		case '01': if (dia <= 31) return true;
		break;
		case '02': if (dia <= 29) return true;
		break;
		case '03': if (dia <= 31) return true;
		break;
		case '04': if (dia <= 30) return true;
		break;
		case '05': if (dia <= 31) return true;
		break;
		case '06': if (dia <= 30) return true;
		break;
		case '07': if (dia <= 31) return true;
		break;
		case '08': if (dia <= 31) return true;
		break;
		case '09': if (dia <= 30) return true;
		break;
		case '10': if (dia <= 31) return true;
		break;
		case '11': if (dia <= 30) return true;
		break;
		case '12': if (dia <= 31) return true;
		break;
	}
	if (idade <= 17) alert("Para se cadastrar você deve ter mais de 18 anos. Desculpe.");
	else if (idade == 18){
		if (ano_atual == ano && mes_atual + 1 == mes && dia >= dia_atual) return true;
		else alert("Para se cadastrar você deve ter mais de 18 anos. Desculpe."); 
	}
	else return true;
}

function mascaraDataNascimento(){
	var data = document.getElementById("nascimento_cliente").value;
	var posicao = data.length -1;
	var aux;
	if(isNaN(data[posicao])){
		aux = data.replace(data[posicao],"");
		document.getElementById("nascimento_cliente").value = aux;
	}else if(posicao == 2){
		aux = data.substring(0,2);
		aux = aux + "/" + data[posicao];
		document.getElementById("nascimento_cliente").value = aux;
	}else if(posicao == 5){
		aux = data.substring(0,5);
		aux = aux + "/" + data[posicao];
		document.getElementById("nascimento_cliente").value = aux;
	
	}if(data.length == 10) VAL_NASC_CLIENTE = true;
	else VAL_NASC_CLIENTE = false;
}

