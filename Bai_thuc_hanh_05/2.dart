import 'dart:io';

void main() {
  final yourName = "Your Name"; // Replace "Your Name" with your actual name
  final friendName =
      "Friend's Name"; // Replace "Friend's Name" with your friend's name

  final file = File('hello.txt');

  file.exists().then((exists) {
    if (exists) {
      // Append friend's name to the file
      file
          .writeAsString('$friendName\n', mode: FileMode.append)
          .then((_) => print('Friend\'s name added successfully!'))
          .catchError((error) => print('Error adding friend\'s name: $error'));
    } else {
      print('File does not exist.');
    }
  }).catchError((error) => print('Error checking file existence: $error'));
}
