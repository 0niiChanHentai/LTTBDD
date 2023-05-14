import 'dart:io';

void main() {
  stdout.write('Enter the first number: ');
  double num1 = double.parse(stdin.readLineSync()!);

  stdout.write('Enter the second number: ');
  double num2 = double.parse(stdin.readLineSync()!);

  stdout.write('Enter the operation (+, -, *, /): ');
  String operation = stdin.readLineSync()!;

  double result;

  switch (operation) {
    case '+':
      result = num1 + num2;
      print('$num1 + $num2 = $result');
      break;
    case '-':
      result = num1 - num2;
      print('$num1 - $num2 = $result');
      break;
    case '*':
      result = num1 * num2;
      print('$num1 * $num2 = $result');
      break;
    case '/':
      if (num2 == 0) {
        print('Error: Division by zero is not allowed.');
      } else {
        result = num1 / num2;
        print('$num1 / $num2 = $result');
      }
      break;
    default:
      print('Error: Invalid operation.');
  }
}
