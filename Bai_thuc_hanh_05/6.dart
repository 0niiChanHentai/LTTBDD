import 'dart:io';

void main() {
  final file = File('hello_copy.txt');

  file.exists().then((exists) {
    if (exists) {
      // Delete the file
      file.delete().then((_) {
        print('File deleted successfully!');
      }).catchError((error) {
        print('Error deleting file: $error');
      });
    } else {
      print('File does not exist.');
    }
  }).catchError((error) {
    print('Error checking file existence: $error');
  });
}
