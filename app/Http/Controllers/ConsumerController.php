<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Consumer\TopicoUsuario;
use Illuminate\Http\Request;

use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\ConsumerMessage;

class ConsumerController extends Controller
{
    public function consumirMensagemUsuario()
    {        
        //$topicoUsuario = new TopicoUsuario();

       // $topicoUsuario->handle();

        /*$consumer = Kafka::consumer(['usuarios'])
                ->withBrokers('localhost:9092')
                ->withAutoCommit()
                ->withHandler(function(ConsumerMessage $message, MessageConsumer $consumer) {
                    //echo "Mensagem recebida ".$message->getBody();
                })
                ->build();
    
            $consumer->consume();*/
    }
}
