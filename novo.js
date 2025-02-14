// const btn_salvar=document.querySelector("#btn_salvar");
// const btn_cancelar=document.querySelector("#btn_cancelar");
const f_nome=document.querySelector('#f_nome');
const f_telefone=document.querySelector('#f_telefone');
const f_email=document.querySelector('#f_email');
const f_cpf=document.querySelector('#f_cpf');
const f_modeloCar=document.querySelector('#f_modeloCar');
const f_placa=document.querySelector('#f_placa');


btn_salvar.addEventListener("click",(evt)=>{
    const dados={
        "f_nome" : f_nome.value,
        "f_telefone" : f_telefone.value,
        "f_email" : f_email.value,
        "f_cpf" : f_cpf.value,
        "f_modeloCar" : f_modeloCar.value,
        "f_placa" : f_placa.value
    }
    console.log(dados);
});


const cabecalho={
    method:"POST",
    body:JSON.stringify(dados)
}

const endpoint= "htttp//127.0.0.1:1880/Usuarios"
fetch(endpoint,cabecalho)
.then(res=>res.json())
.then(res=>{
    if(res.status==200){
        f_nome.value="";
        f_telefone.value="";
        f_email.value="";
        f_cpf.value="";
        f_modeloCar.value="";
        f_placa.value="";

        f_nome.focus();

    }else{
        alert("Erro ao salvar")
    }
    console.log(res);
})


btn_cancelar.addEventListener("click",(evt)=>{


});

const reset=()=>{
    f_nome.value="";
    f_telefone.value="";
    f_email.value="";
    f_cpf.value="";
    f_modeloCar.value="";
    f_placa.value="";

    f_nome.focus();
}