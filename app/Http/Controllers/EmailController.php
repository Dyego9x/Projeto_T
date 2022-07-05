<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\models\DadosUsuariosModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;





class EmailController extends Controller
{
    public function configurarEmail($emailUsuario, $pegarSenha){
        $erro = false;
        
        // Instanciamos a classe PHPMailer
        $mail = new PHPMailer();

        // Informamos que o protocolo utilizado é o SMTP, conforme recomendado pelo Gmail
        $mail->isSMTP();

        // Este é o endereço para o servidor de e-mails do Gmail
        $mail->Host = 'smtp.gmail.com';

        // Habilitamos a autenticação SMTP
        $mail->SMTPAuth = true;

        // Definimos a criptografia a ser usada, conforme recomendado pelo Gmail
        $mail->SMTPSecure = 'tls';


        $mail->Username = '';
        $mail->Password = '';

        // Para autenticar via SSL precisamos informar a porta 587, conforme recomendado pelo Gmail
        $mail->Port = 587;       

        // Definimos o e-mail do remetente
        $mail->setFrom('diego.contabilivre@gmail.com');

        // Informamos um e-mail para o qual serão enviadas as respostas
        $mail->addReplyTo('diego.contabilivre@gmail.com');

        // Adicionamos um destinatário
        $mail->addAddress($emailUsuario);

        // Indicamos o uso do HTML
        $mail->isHTML(true);

        // Damos um título para a mensagem
        $mail->Subject = 'Ta na mão sua senha chefia!';

        // Definimos o conteúdo do e-mail
        $mail->Body    = 'Segue abaixo a senha chefia <br>Senha: '.$pegarSenha;

        // Criamos um texto opcional para clientes que não suportem HTML, ou que tenham esse recurso desativado
        $mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';

        // Adicionamos arquivos para serem enviados em anexo
        // $mail->addAttachment('/tmp/image.jpg', 'nome.jpg');
        // $mail->send();
        // dd($emailUsuario);
        if(!$mail->send()) {
            // dd($mail->ErrorInfo);
            $erro = true;
            return $erro;
        } else {            
            return $erro;
            
        }
    }
    

}
