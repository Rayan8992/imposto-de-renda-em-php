<?php
require_once __DIR__ . '/src/tax.php';

$income = null;
if (isset($argv[1])) {
    $income = (float)$argv[1];
} else {
    $handle = fopen("php://stdin","r");
    $line = fgets($handle);
    if ($line !== false) $income = (float)trim($line);
}

if ($income === null) {
    fwrite(STDERR, "Uso: php cli.php <renda>\n");
    exit(1);
}

$tax = compute_tax($income);
if ($tax < 0) $tax = 0.0;
printf("%.2f\n", $tax);
