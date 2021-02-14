<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\KafkaProductObserver;
use Illuminate\Support\ServiceProvider;
use PHPEasykafka\Broker;
use PHPEasykafka\BrokerCollection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Registrar camaradas para buscá-los atraves do container de injeção de serviços do Laravel
         * Retorna todos os Brokers que estão rodando para a aplicação
         */
        $this->app->bind("KafkaBrokerCollection", function () {
            $broker = new Broker(env("KAFKA_HOST","kafka"), env("KAFKA_PORT","9092"));
            $kafkaBrokerCollection = new BrokerCollection();
            $kafkaBrokerCollection->addBroker($broker);
            return $kafkaBrokerCollection;
        });

        /**
         * Registrar configurações do Tópico
         */
        $this->app->bind("KafkaTopicConfig", function () {
            return [
                'topic' => [
                    'auto.offset.reset' => 'largest'
                ],
                'consumer' => [
                    'enable.auto.commit' => "true",
                    'auto.commit.interval.ms' => "100",
                    'offset.store.method' => 'broker'
                ]
            ];
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(KafkaProductObserver::class);
    }
}
