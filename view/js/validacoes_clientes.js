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
	if(endereco.length >= 10 && endereco.length <= 100) VAL_ENDERECO = true;
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

function mascaraCPF(){
    var cpf = document.getElementById("cpf_cliente").value;
    var posicao = cpf.length - 1;
	var aux;
    if (isNaN(cpf[posicao])) {
        aux = cpf.replace(cpf[posicao], "");
        document.getElementById("cpf_cliente").value = aux;
	}else if(posicao == 3){
		aux = cpf.substring(0,3);
		aux = aux + "." + cpf[posicao];
		document.getElementById("cpf_cliente").value = aux;
	}else if(posicao == 7){
		aux = cpf.substring(0,7);
        aux = aux + "." + cpf[posicao];
        document.getElementById("cpf_cliente").value = aux;
	}else if(posicao == 11){
		aux = cpf.substring(0,11);
		aux = aux + "-" + cpf[posicao];
		document.getElementById("cpf_cliente").value = aux;
	}else if(cpf.length>14){
		aux = cpf.substring(0,14);
		document.getElementById("cpf_cliente").value = aux;
    }
	if(cpf.length == 14) VAL_CPF = true;
	else VAL_CPF = false;
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

function validaDataNascimento() {
    var data_atual = new Date();
    var dia_atual = data_atual.getDate(); // 1-31
    var mes_atual = data_atual.getMonth() + 1; // 0-11 (zero=janeiro)
    var ano_atual = data_atual.getFullYear(); // com 4 dígitos
    var data = document.getElementById("nascimento_cliente").value;

    var dia = data.substr(0, 2);
    var mes = data.substr(3, 2);
    var ano = data.substr(6, 4);

	if (dia > 31) document.getElementById("nascimento_cliente").value = "";
	if (mes > 12) document.getElementById("nascimento_cliente").value = "";

    var idade;
    if (mes <= mes_atual) {
        if (dia <= dia_atual) {
            idade = (ano_atual - ano) + " anos e " + ((mes_atual - 1) - mes) + " mes(es) " + ((30 - dia) > 0 ? (30 - dia) : (dia - 30)) + " dia(s)";
        }
    }

    if ((ano_atual - ano) <= 17){
		document.getElementById("nascimento_cliente").value = "";
		alert("Para se cadastrar você deve ter mais de 18 anos. Desculpe não poderemos prosseguir com o cadastro.");
	} 
    else if ((ano_atual - ano) == 18) {
        if (mes_atual == mes && dia >= dia_atual){
			document.getElementById("nascimento_cliente").value = data;
			return VAL_NASC_CLIENTE = true;
		}else{
			document.getElementById("nascimento_cliente").value = "";
			alert("Para se cadastrar você deve ter mais de 18 anos. Desculpe não poderemos prosseguir com o cadastro.");
		}
	}
	else{
		document.getElementById("nascimento_cliente").value = data;
		return VAL_NASC_CLIENTE = true;
	}
}

function validaEmail(){//verifica se o e-mail digitado segue o padrão de e-mail, se não apaga para digitar novamente//
	var email = document.getElementById("email_cliente").value;
	var arroba = email.indexOf('@');
	var ponto= email.indexOf(".",arroba);
	var i=0;
	var nome = email.slice(0,arroba);
	var provedor = email.slice(arroba+1,ponto);
	var cont_ponto=0;
	var cont_arroba=0;
	var extprovedor = email.slice(ponto+1); 
	while ( arroba != -1 ) {
	   cont_arroba++;
	   arroba = email.indexOf( "@",arroba + 1 );
	}
	arroba = email.indexOf('@');
	while ( ponto != -1 ) {
	   cont_ponto++;
	   ponto = email.indexOf( ".",ponto + 1 );
	}
	ponto=email.indexOf(".",arroba);
	if(nome.length<1||provedor.length<2||ponto<arroba||cont_arroba>1||cont_arroba<1||extprovedor.length<=2){
		document.getElementById("email_cliente").value = "";
		VAL_EMAIL = false;
	}else{
		document.getElementById("email_cliente").value = email;
		VAL_EMAIL = true;
	}
}

function validaSenha(){
	var senha = document.getElementById("senha_cliente").value;
	if (senha.length >= 6 && senha.length <= 8){
			document.getElementById("senha_cliente").value = senha;
			return VAL_SENHA = true;
	}else{
		document.getElementById("senha_cliente").value = "";
		return VAL_SENHA = false;
		return alert ("Digite uma senha válida, com no mínimo 6 e no máximo 8 dígitos");
	} 
}

function confirmaSenha(){
	var senha = document.getElementById("senha_cliente").value;
	var Csenha = document.getElementById("Csenha_cliente").value;
	if (senha != Csenha) {
		document.getElementById("Csenha_cliente").value = "";
		alert ("As senhas não são iguais, por favor confirmar as senhas iguais.");
		return VAL_CONF_SENHA = false;
	}else{
		document.getElementById("senha_cliente").value = Csenha;
		return VAL_CONF_SENHA = true;
	}
}

function Enviar(){//verifica se todos os campos do formulário foi preenchido corretamente antes de enviar//

	if(VAL_NOME && VAL_ENDERECO && VAL_TELEFONE && VAL_CELULAR && VAL_CPF && VAL_NASC_CLIENTE && VAL_EMAIL && VAL_SENHA && VAL_CONF_SENHA){
	}
	else if(!VAL_NOME){
		document.getElementById("nome_cliente").focus();
	}
	else if(!VAL_TELEFONE){
		document.getElementById("telefone_cliente").focus();	
	}
	else if(!VAL_CELULAR){
		document.getElementById("celular_cliente").focus();	
	}
	else if(!VAL_CPF){
		document.getElementById("cpf_cliente").focus();
	}
	else if(!VAL_NASC_CLIENTE){
		document.getElementById("nascimento_cliente").focus();
	}
	else if(!VAL_EMAIL){
		document.getElementById("email_cliente").focus();
	}
	else if(!VAL_SENHA){
		document.getElementById("senha_cliente").focus();
	}
	else if(!VAL_CONF_SENHA){
		document.getElementById("Csenha_cliente").focus();
	}
	else{
		document.getElementById("endereco_cliente").focus();
	}

}
