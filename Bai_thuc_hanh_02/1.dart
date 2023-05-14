import 'dart:io';

void main() {
  // Take user input
  stdout.write('Enter a number: ');
  int number = int.parse(stdin.readLineSync()!);

  // Check if the number is odd or even
  if (number % 2 == 0) {
    print('$number is even.');
  } else {
    print('$number is odd.');
  }
}
