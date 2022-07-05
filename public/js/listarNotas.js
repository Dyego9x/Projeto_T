function excluirNota (idNota, idUsuario){      

    $.ajax({
        type: 'POST',
        url: "/sistema/excluirNotas",        
        data: { idNota: idNota, idUsuario: idUsuario, _token: $('input[name=_token]').val()},
        dataType: 'json',
        success: function(retorno) {            
            if ( retorno.erro == 'N' ){
                alert('Nota excluída com sucesso!');
                location.href ='/sistema/listar-notas';    
                                 
            }
            else{
                alert('Erro!');
            }            
        },
        error: function() {
            alert('Erro!');
        }
    });
}

function editarNota (idNota, valorNota, dataNota){          

    $.ajax({
        type: 'POST',
        url: "/sistema/editar-notas",        
        data: { idNota: idNota, valorNota: valorNota, dataNota:dataNota , _token: $('input[name=_token]').val()},
        dataType: 'json',
        success: function(retorno) {            
            if ( retorno.erro == 'N' ){
                alert('Valores atualizados com sucesso!');
                location.href ='/sistema/listar-notas';    
                                 
            }
            else{
                alert('Erro!');
            }            
        },
        error: function() {
            alert('Erro!');
        }
    });
}

function ativarModal(dataAtual, valorAtual, numeroNota, idNota){    
    

    $("#atual-valor").val(''+valorAtual+'');
    $("#atual-data").val(''+dataAtual+'');
    $("#id_nota").val(''+idNota+'');
    $('#exampleModalLabel').text('Atualizar Dados da Nota'+numeroNota+'');
    
    $("#exampleModal").modal('show');
}

function esconderModal(){
    
    $("#exampleModal").modal('hide');
}

function baixarArquivo(idNota, valorNota, dataNota){          

        $.ajax({
            type: 'POST',
            url: "/sistema/download",        
            data: { idNota: idNota , _token: $('input[name=_token]').val()},
            dataType: 'json',
            success: function(retorno) {            
                if ( retorno.erro == 'N' ){
                    alert('Valores atualizados com sucesso!');
                    href(retorno.dados);
                                     
                }
                else{
                    alert('Erro!');
                }            
            },
            error: function() {
                alert('Erro!');
            }
        });
}

