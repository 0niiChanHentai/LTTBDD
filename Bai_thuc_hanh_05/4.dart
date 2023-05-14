import 'dart:io';

void main() {
  final sourceFile = File('hello.txt');
  final destinationFile = File('hello_copy.txt');

  sourceFile.exists().then((exists) {
    if (exists) {
      // Copy the contents of the source file to the destination file
      sourceFile.readAsBytes().then((bytes) {
        destinationFile.writeAsBytes(bytes).then((_) {
          print('File copied successfully!');
        }).catchError((error) {
          print('Error copying file: $error');
        });
      }).catchError((error) {
        print('Error reading source file: $error');
      });
    } else {
      print('Source file does not exist.');
    }
  }).catchError((error) {
    print('Error checking source file existence: $error');
  });
}
