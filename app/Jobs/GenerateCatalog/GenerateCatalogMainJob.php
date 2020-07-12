<?php

namespace App\Jobs\GenerateCatalog;


class GenerateCatalogMainJob extends AbstractJob
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->debug('Start');

        // Сначала кешируем продукты
        GenerateCatalogCacheJob::dispatchNow();

        // Создаем цепочку заданий формирования файлов с ценами
        $chainPrices = $this->getChainPrices();

        $chainMain = [
            new GenerateCategoriesJob, // Генерация категорий
            new GenerateDeliveriesJob, // Генерация способов доставки
            new GeneratePointsJob, // Генерация пунктов выдачи
        ];


        $chainlast = [
            new ArchiveUploadsJob,// Архивирование файлов и перенос архива в публичную папку
            new SendPriceRequestJob,//Отправка уведомления староннему сервису о том что можно скачать свежий архив
        ];

        $chain = array_merge($chainPrices, $chainMain, $chainlast);

        GenerateGoodsFileJob::withChain($chain)->dispatch();


        $this->debug('Finish');
    }

    private function getChainPrices()
    {
        $result = [];
        $products = collect([1, 2, 3, 4, 5]);
        $fileNum = 1;

        foreach ($products->chunk(1) as $chunk) {
            $result[] = new GeneratePricesFileChunkJob($chunk, $fileNum);
            $fileNum++;
        }

        return $result;
    }
}
