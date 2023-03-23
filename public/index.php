<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

// print (APP_PATH. '<br>' .FILES_PATH. '<br>'. VIEWS_PATH); return false;

require APP_PATH . "App.php";
require APP_PATH . 'helpers.php';

$files = getTransactionFiles(FILES_PATH);

$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}
// echo "<pre>";
// print_r($transactions); return false;
// echo "</pre>";

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';
