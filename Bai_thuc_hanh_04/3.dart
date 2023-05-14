import 'dart:io';

void main() {
  List<double> expenses = [];

  print("Enter the expense amounts (Enter '0' to stop):");

  while (true) {
    double expense = double.tryParse(stdin.readLineSync());
    if (expense == 0) {
      break;
    }
    expenses.add(expense);
  }

  double total = 0;
  for (double amount in expenses) {
    total += amount;
  }

  print("Total expenses: \$${total.toStringAsFixed(2)}");
}
