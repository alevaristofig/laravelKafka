<?php

namespace App\Kafka\Consumers;

use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Junges\Kafka\Contracts\Consumer;

class KafkaMessageConsumerUsuario //implements Consumer
{
    public function handle(KafkaConsumerMessage $message): void
    {
        //$message->toArray()
        \Log::info('Mensagem recebida do Kafka:', $message);

        $dados = $message->getBody();

        //dd($dados);
    }
}