<?php
// Simple Calculator met functies en loop

// Vraagt om een getal en blijft vragen tot de invoer geldig is
function getNumber(string $prompt): float
{
    while (true) {
        $input = trim(readline($prompt));
        if (is_numeric($input)) {
            return (float)$input;
        }
        echo "Invalid number, try again.\n";
    }
}

// Vraagt om een operator en blijft vragen tot de invoer geldig is
function getOperation(): string
{
    $valid = ["+", "-", "*", "/"];
    while (true) {
        $operation = trim(readline("Enter operation (+, -, *, /): "));
        if (in_array($operation, $valid, true)) {
            return $operation;
        }
        echo "Invalid operation!\n";
    }
}

// Voert de berekening uit
function calculate(float $num1, float $num2, string $operation): float|string
{
    switch ($operation) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
        case "/":
            if ($num2 == 0) {
                return "Error: Division by zero!";
            }
            return $num1 / $num2;
        default:
            return "Invalid operation!";
    }
}

// Vraagt of de gebruiker opnieuw wil rekenen
function askAgain(): bool
{
    $answer = strtolower(trim(readline("Calculate again? (y/n): ")));
    return $answer === "y" || $answer === "yes";
}

// Hoofdprogramma
echo "Simple Calculator\n";

do {
    $num1 = getNumber("Enter first number: ");
    $operation = getOperation();
    $num2 = getNumber("Enter second number: ");
    $result = calculate($num1, $num2, $operation);
    echo "Result: $result\n";
} while (askAgain());

echo "Goodbye!\n";
