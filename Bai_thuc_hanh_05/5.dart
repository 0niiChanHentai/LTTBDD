import 'dart:io';

void main() {
  for (int i = 1; i <= 100; i++) {
    String fileName = 'file_$i.txt';

    File(fileName).create().then((file) {
      print('File created: ${file.path}');
    }).catchError((error) {
      print('Error creating file: $error');
    });
  }
}
