const btbtn_pesq=document.querySelector("#btn_pesq");
const f_txtePesq=document.querySelector("#btn_pesq");

btn_pesq.addEventListener("click",(evt)=>{
    const valorPesq = f_txtePesq.value;
    if(valorPesq.value==""){
        alert("Erro nada foi encontrado")
        f_txtePesq.focus();
        return;
    }
    const f_pesq=document.querySelector("input[name=f_pesq]:check").value;
    const entpoint='htttp//127.0.0.1:1880/pesqContato/${f_pesq}/${valorPesq}';
    fetch(endpoint)
    .then(res=>res.json())
    .then(res=>{
        console.log(res);
    })
});