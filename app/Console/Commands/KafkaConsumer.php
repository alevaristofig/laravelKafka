<?php

namespace App\Console\Commands;

use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\ConsumerMessage;

use Illuminate\Console\Command;

use App\Models\KafkaMessages;

class KafkaConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume messages from Kafka topics';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $consumer = Kafka::consumer(['usuarios','pacientes','medicamentos','aplicacao'])
            ->withBrokers('localhost:9092')
            ->withAutoCommit()
            ->withHandler(function(ConsumerMessage $message, MessageConsumer $consumer) {  
                $model = new KafkaMessages();    
                $dados = $message->getBody();

                $model->nome = $dados['nome'];
                $model->raca = $dados['raca'];
                $model->peso = $dados['peso'];
                $model->cor = $dados['cor'];
                $model->idade = $dados['idade'];
                $model->usuario = $dados['usuario']['id'];

                $model->save();
                
                dd($message->getBody());
            })           
            ->build();

        $consumer->consume();
    }
}
