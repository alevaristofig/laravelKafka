<?php declare(strict_types=1);

namespace App\Consumer;

use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\ConsumerMessage;

class TopicoUsuario
{
    protected $signature  = 'consume:usuarios';

    protected $description  = 'Consumindo mensagens Kafka do tópico: usuários';

    public function handle()
    {
        try {

            $consumer = Kafka::consumer(['usuarios'])
                ->withBrokers('localhost:29092')
                ->withAutoCommit()
                ->withHandler(function(ConsumerMessage $message, MessageConsumer $consumer) {
                    echo "Mensagem recebida ".$message->getBody();
                })
                ->build();
    
            $consumer->consume();
        } catch (\Execption $e) {
            dd($e->getMessage());
        }
    }
}