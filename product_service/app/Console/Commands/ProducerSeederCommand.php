<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use PHPEasykafka\KafkaProducer;
use Psr\Container\ContainerInterface;
use Ramsey\Uuid\Uuid;

class ProducerSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:produce-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kafka produce';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param ContainerInterface $container
     * @return mixed
     * @throws \Exception
     */
    public function handle(ContainerInterface $container)
    {
        $topicConf = $container->get("KafkaTopicConfig");
        $brokerCollection = $container->get("KafkaBrokerCollection");

        $product_id = Uuid::uuid4();
        $product = Product::create(
            [
                "id" => $product_id,
                "name" => "Tenis",
                "description" => "Description",
                "price" => 30,
                "qtd_available" => 30,
                "qtd_total" => 30
            ]
        );

        $producer = new KafkaProducer(
            $brokerCollection,
            "products",
            $topicConf
        );
        $producer->produce($product->toJson());
    }
}
