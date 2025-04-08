<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class KafkaMessages extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'mongokafka';
}