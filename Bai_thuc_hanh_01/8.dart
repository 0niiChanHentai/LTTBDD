import 'dart:io';

void main() {
  print("Enter the first number:");
  String firstNumberInput = stdin.readLineSync()!;
  int firstNumber = int.parse(firstNumberInput);

  print("Enter the second number:");
  String secondNumberInput = stdin.readLineSync()!;
  int secondNumber = int.parse(secondNumberInput);

  print("Before swapping:");
  print("First number: $firstNumber");
  print("Second number: $secondNumber");

  // Swap the numbers
  int temp = firstNumber;
  firstNumber = secondNumber;
  secondNumber = temp;

  print("After swapping:");
  print("First number: $firstNumber");
  print("Second number: $secondNumber");
}
