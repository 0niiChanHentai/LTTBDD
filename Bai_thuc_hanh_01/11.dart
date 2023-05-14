import 'dart:io';

void main() {
  print("Enter the total bill amount:");
  String billAmountInput = stdin.readLineSync()!;
  double billAmount = double.parse(billAmountInput);

  print("Enter the number of people:");
  String numberOfPeopleInput = stdin.readLineSync()!;
  int numberOfPeople = int.parse(numberOfPeopleInput);

  double splitAmount = billAmount / numberOfPeople;

  print("The split amount per person is: \$${splitAmount.toStringAsFixed(2)}");
}
