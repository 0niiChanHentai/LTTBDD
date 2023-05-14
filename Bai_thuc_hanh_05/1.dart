import 'dart:io';

void main() {
  final name = "Your Name"; // Replace "Your Name" with your actual name

  // Open the file in append mode
  File('hello.txt').writeAsString('$name\n', mode: FileMode.append)
      .then((file) => print('Name added successfully!'))
      .catchError((error) => print('Error adding name: $error'));
}
import 'dart:io';

void main() {
  final name = "Your Name"; // Replace "Your Name" with your actual name

  // Open the file in append mode
  File('hello.txt').writeAsString('$name\n', mode: FileMode.append)
      .then((file) => print('Name added successfully!'))
      .catchError((error) => print('Error adding name: $error'));
}
