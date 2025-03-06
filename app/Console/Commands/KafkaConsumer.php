<?php

namespace App\Console\Commands;

//use Junges\Kafka\Contracts\KafkaConsumerMessage;
//use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\ConsumerMessage;

use Illuminate\Console\Command;

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
                dd($message->getBody());
            })           
            ->build();

        $consumer->consume();
    }
}
