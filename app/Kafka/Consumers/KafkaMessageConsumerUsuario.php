<?php

namespace App\Kafka\Consumers;

use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Junges\Kafka\Contracts\Consumer;

use App\Models\KafkaMessages;

class KafkaMessageConsumerUsuario //implements Consumer
{
    public function handle(KafkaConsumerMessage $message): void
    {
        //$message->toArray()
        \Log::info('Mensagem recebida do Kafka:', $message);
        $model = new KafkaMessages();

       // $dados = $message->getBody();

       // $model->save($dados);

        //dd($dados);
    }
}