$(document).ready(function(){
    $('#login').show();
    $('#register').hide();
    $('#recover').hide();
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#cpf_recover').mask('000.000.000-00', {reverse: true});
    //$('#cnpj_recover').mask('00.000.000/0000-00', {reverse: true});
    $("#bithdate").mask("00/00/0000");
    uf();
})

function login_mode(){
    $('#login').show();
    $('#register').hide();
    $('#recover').hide();
}
function register_mode(){
    $('#login').hide();
    $('#register').show();
    $('#recover').hide();
}
function recover_mode(){
    $('#login').hide();
    $('#register').hide();
    $('#recover').show();
}

function montaSelect(linhas) {
    const linhaTemplate5 = function (linha) {
      
            return ` 
               <option id="${linha.sigla}">${linha.nome}</option>
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




function logar(){
    $("#loading").removeClass("d-none");
    var formdata = new FormData();
    formdata.append("username", $('#username').val());
    formdata.append("key", btoa($('#key').val()));


    var requestOptions = {
      method: 'POST',
      body: formdata,

    };

    fetch("login", requestOptions)
      .then((response) => response.json())
      .then((response) => {
            $("#loading").addClass("d-none");
            if(response.status){
              window.location.href=response.data
            }else{
                $.alert({
                    title:'Erro',
                    content:response.message,
                    type:'red'
                })
            }
        })
      .catch(response => {
        $("#loading").addClass("d-none");
          $.alert({
              title:'Erro',
              content:response.message,
              type:'red'
          })
      });
    }



function register(){
    if(!$('#razao_social').val().trim()){
        $('#razao_social').addClass('is-invalid');
        return;
    }
    if(!$('#birthdate').val().trim()){
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

    var cnpj = "";
    if($("#cnpj").val().trim()){
        cnpj = $("#cnpj").val().replaceAll(".", '');
        cnpj = cnpj.replaceAll("/", '');
        cnpj = cnpj.replaceAll("-", '');
    }
    let cpf = $("#cpf").val().replaceAll(".", '');
    cpf = cpf.replaceAll("-", '');
    var formdata = new FormData();
    formdata.append("username", $('#razao_social').val());
    formdata.append("email", $('#email').val());
    formdata.append("phone", $('#telefone').val());
    formdata.append("type", $('#regime').val());
    formdata.append("taxpayer_id", cpf);
    formdata.append("ein", cnpj);
    formdata.append("key", btoa($('#new_key').val()));
    var requestOptions = {
      method: 'POST',
      body: formdata,

    };
    $("#loading").removeClass("d-none");
    fetch("registers", requestOptions)
      .then((response) => response.json())
      .then((response) => {
            $("#loading").addClass("d-none");
            if(response.status){
             $.dialog({
                title:'Sucesso',
                content:response.message,
                type:'green'
             })
             login_mode();
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

function recover(){

    if(!$('#cpf_recover').val().trim() &&  !$('#email_recover').val().trim()){
        $('#cpf_recover').addClass('is-invalid');
        $('#email_recover').addClass('is-invalid');
        return;
    }
    let cpf = $("#cpf_recover").val().replaceAll(".", '');
    cpf = cpf.replaceAll("-", '');
    var formdata = new FormData();
    formdata.append("email", $('#email_recover').val());
    formdata.append("taxpayer_id", cpf);
    var requestOptions = {
      method: 'POST',
      body: formdata,

    };
    $("#loading").removeClass("d-none");
    fetch("recover", requestOptions)
      .then((response) => response.json())
      .then((response) => {
        $("#loading").addClass("d-none");
            if(response.status){
             $.dialog({
                title:'Sucesso',
                content:response.message,
                type:'green'
             })
             login_mode();
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

function reset(){
    var access = $('#wsx12').val();
    if($('#key').val() != $('#new_key').val()){
        $('#key').addClass('is-invalid');
        $('#new_key').addClass('is-invalid');
        $.alert({
            title:'Atenção!',
            content:'Senhas não coincidem'
        });
        return;
    }
    if(!$('#key').val().trim() || !$('#new_key').val().trim()){
        $('#key').addClass('is-invalid');
        $('#new_key').addClass('is-invalid');
        $.alert({
            title:'Atenção!',
            content:'Preencha todos os campos'
        });
        return;
    }
    $('#key').removeClass('is-invalid');
    $('#new_key').removeClass('is-invalid');
    var formdata = new FormData();
    formdata.append("key", btoa($('#key').val()));
    formdata.append("key_confirm", btoa($('#new_key').val()));
    var requestOptions = {
      method: 'POST',
      body: formdata,
      headers: new Headers({
        tok: access,
      }),
    };
    $("#loading").removeClass("d-none");
    fetch("reset", requestOptions)
      .then((response) => response.json())
      .then((response) => {
        $("#loading").addClass("d-none");
            if(response.status){
             $.dialog({
                title:'Sucesso',
                content:'Senha redefinida com sucesso',
                type:'green'
             })
             window.location.href=json.url
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

$('#key').keypress(function (e) {
    var key = e.which;
    if (key == 13)  // the enter key code
    {
        logar();
        return;
    }
});
