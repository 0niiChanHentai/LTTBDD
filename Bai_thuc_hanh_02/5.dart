import 'dart:io';

void main() {
  // Take user input
  stdout.write('Enter a positive integer: ');
  int n = int.parse(stdin.readLineSync()!);

  // Validate input
  if (n <= 0) {
    print('Please enter a positive integer.');
    return;
  }

  // Calculate the sum
  int sum = calculateSum(n);

  // Print the sum
  print('The sum of the first $n natural numbers is: $sum');
}

int calculateSum(int n) {
  int sum = 0;

  for (int i = 1; i <= n; i++) {
    sum += i;
  }

  return sum;
}
