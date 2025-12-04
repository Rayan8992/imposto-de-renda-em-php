<?php
require_once __DIR__ . '/../src/tax.php';

function assert_close($got, $want, $label) {
    $eps = 1e-2;
    if (abs($got - $want) > $eps) {
        fwrite(STDERR, "FALHA: $label — got " . number_format($got,2) . " want " . number_format($want,2) . PHP_EOL);
        exit(1);
    } else {
        echo "OK: $label\n";
    }
}

assert_close(compute_tax(2000.00), 0.00, "isento (2000.00)");

assert_close(compute_tax(2500.00), 5.34, "7.5% (2500.00)");

assert_close(compute_tax(3000.00), 55.84, "15.0% (3000.00)");

assert_close(compute_tax(4000.00), 224.51, "22.5% (4000.00)");

assert_close(compute_tax(5000.00), 466.27, "27.5% (5000.00)");

echo "Todos os testes OK\n";
exit(0);
