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