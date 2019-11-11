<?php

declare(strict_types=1);

namespace TransactionScript;

// У нас один класс в данном случае, в него можно записывать значения, можно
// получать значения. Ниже 2 варианта использование, для 2-х реализаций.

require_once 'InvoiceGenerator.php'; // Вторая реализация с проверками.

$invoiceGenerator = new InvoiceGenerator();
$invoiceGenerator->GenerateInvoices();