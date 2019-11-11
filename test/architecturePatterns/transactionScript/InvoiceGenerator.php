<?php

declare(strict_types=1);

namespace TransactionScript;

class InvoiceGenerator
{
    /**
     * Все действия происходят в одной транзакции.
     */
    public function generateInvoices(): void
    {
        echo "Транзакция началась.\n";
        echo "Загрузка всех заказов для доставки.\n";
        echo "Проходимся по каждому ордеру, создаем инвойс с этими товарами.\n";
        echo "Сохраняем инвойс.\n";
        echo "Делаем пометку что заказы готовы к отправке и зарезервированы.\n";
    }
}