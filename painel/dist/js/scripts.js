function excluir(pagina, id, acao){
    var msg = confirm("Atenção: Deseja Excluir esse Registro?")
if (msg){
//console.log(id);
alert("Arquivo excluido com sucesso!");
window.location.href=(pagina +"?id="+id + "&acao=" +acao);
}
}