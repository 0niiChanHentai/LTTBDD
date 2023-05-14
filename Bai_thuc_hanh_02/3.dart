import 'dart:io';

void main() {
  // Take user input
  stdout.write('Enter a number: ');
  double number = double.parse(stdin.readLineSync()!);

  // Check if the number is positive, negative, or zero
  if (number > 0) {
    print('$number is positive.');
  } else if (number < 0) {
    print('$number is negative.');
  } else {
    print('The number is zero.');
  }
}
