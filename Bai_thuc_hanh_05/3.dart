import 'dart:io';

void main() {
  Directory.current().then((currentDirectory) {
    print('Current working directory: ${currentDirectory.path}');
  }).catchError((error) {
    print('Error retrieving current working directory: $error');
  });
}
