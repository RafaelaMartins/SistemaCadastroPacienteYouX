$(document).ready(function(){
    $('#register').show();
    $('#taxpayer_id').mask('000.000.000-00', {reverse: true});
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#cpf_recover').mask('000.000.000-00', {reverse: true});
    //$('#cnpj_recover').mask('00.000.000/0000-00', {reverse: true});
    $("#heighth").mask("0,00");
    uf();
})


function register_mode(){
    $('#login').hide();
    $('#register').show();
    $('#recover').hide();
}

function montaSelect(linhas) {
    const linhaTemplate5 = function (linha) {
      
            return ` 
               <option id="${linha.sigla}" value="${linha.sigla}">${linha.nome}</option>
            `;
        

    }

    function render7() {
        return linhas.map((linha) => {
            return linhaTemplate5(linha);
        }).join('');
    }
    return render7()
}


function uf(){
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados`,{
        method: 'GET',
    }) .then((response) => response.json())
    .then((response) => {
        $('#uf').append(montaSelect(response));
        
    });
}






function register(){
    if(!$('#razao_social').val().trim()){
        $('#razao_social').addClass('is-invalid');
        return;
    }
    if($('#birthdate').val()==""){
        $('#birthdate').addClass('is-invalid');
        return;
    }
    if(!$('#weigth').val().trim()){
        $('#weigth').addClass('is-invalid');
        return;
    }
    if(!$('#uf').val().trim()){
        $('#uf').addClass('is-invalid');
        return;
    }
    if(!$('#taxpayer_id').val().trim()){
        $('#taxpayer_id').addClass('is-invalid');
        return;
    }
    if(!$('#heighth').val().trim()){
        $('#heighth').addclass('is-invalid');
        return;
    }
    
    $('.is-invalid').removeClass('is-invalid');
    let cpf = $("#taxpayer_id").val().replaceAll(".", '');
    cpf = cpf.replaceAll("-", '');
    var formdata = new FormData();
    formdata.append("nome", $('#razao_social').val());
    formdata.append("birthdate", $('#birthdate').val());
    formdata.append("uf", $('#uf').val());
    formdata.append("heighth", parseFloat($('#heighth').val()));
    formdata.append("taxpayer_id", btoa(cpf));
    formdata.append("weigth", parseInt($('#weigth').val()));

    var requestOptions = {
      method: 'POST',
      body: formdata,

    };
    $("#loading").removeClass("d-none");
    fetch(`${url_api}registers`, requestOptions)
      .then((response) => response.json())
      .then((response) => {
            $("#loading").addClass("d-none");
            if(response.status){
             $.dialog({
                title:'Sucesso',
                content:response.message,
                type:'green'
             })
            
            }else{
                $.dialog({
                    title:'Erro',
                    content:response.message,
                    type:'red'
                })
            }
        })
      .catch(response => {
            $("#loading").addClass("d-none");
          $.dialog({
              title:'Erro',
              content:response.message,
              type:'red'
          })
      });
}

