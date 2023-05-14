import 'dart:io';

void main() {
  print("Enter the dividend:");
  String dividendInput = stdin.readLineSync()!;
  int dividend = int.parse(dividendInput);

  print("Enter the divisor:");
  String divisorInput = stdin.readLineSync()!;
  int divisor = int.parse(divisorInput);

  int quotient = dividend ~/ divisor;
  int remainder = dividend % divisor;

  print("Quotient: $quotient");
  print("Remainder: $remainder");
}
