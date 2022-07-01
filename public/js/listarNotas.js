function excluirNota ($idNota, $idUsuario){
    alert($idNota);    

    $.ajax({
        type: 'POST',
        url: "/sistema/excluirNotas",        
        data: { idNota: $idNota, idUsuario: $idUsuario },
        success: function(data) {
            if ( data ){
                
                if ( concorda == 'S' ){
                    toastr["success"]('Contratação Realizada com Sucesso! Estamos te preparando para o agendamento de sua vídeoconferência!',{timeOut: 3600});                    
                                    
                }
                
                // Encaminhar para o final
                location.href=data;                
            }
            else
                toastr["warning"]('Erro ao confirmar sua solicitação do e-CPF.');
        },
        error: function() {
            toastr["warning"]('Erro ao confirmar sua solicitação do e-CPF.');
        }
    });
}