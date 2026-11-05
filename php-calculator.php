<?php
// Simple calculator with functions and a loop

// Prompts for a number until the input is valid
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

// Prompts for an operator until the input is valid
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

// Performs the calculation
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

// Asks whether the user wants to calculate again
function askAgain(): bool
{
    $answer = strtolower(trim(readline("Calculate again? (y/n): ")));
    return $answer === "y" || $answer === "yes";
}

// Main program
echo "Simple Calculator\n";

do {
    $num1 = getNumber("Enter first number: ");
    $operation = getOperation();
    $num2 = getNumber("Enter second number: ");
    $result = calculate($num1, $num2, $operation);
    echo "Result: $result\n";
} while (askAgain());

echo "Goodbye!\n";
