import 'dart:io';
import 'package:csv/csv.dart';

void main() {
  // Define the student data
  List<List<dynamic>> students = [
    ['Name', 'Age', 'Address'],
    ['John Doe', 20, '123 Main St'],
    ['Jane Smith', 18, '456 Elm St'],
    ['Michael Johnson', 22, '789 Oak St'],
  ];

  // Store student data in a CSV file
  final file = File('students.csv');
  String csvData = const ListToCsvConverter().convert(students);
  file.writeAsString(csvData).then((_) {
    print('Student data stored in students.csv file.');
  }).catchError((error) {
    print('Error storing student data: $error');
  });

  // Read student data from the CSV file
  file.readAsString().then((csvContent) {
    List<List<dynamic>> studentsData = CsvToListConverter().convert(csvContent);
    print('\nStudent data read from students.csv file:');
    for (var student in studentsData) {
      print('Name: ${student[0]}, Age: ${student[1]}, Address: ${student[2]}');
    }
  }).catchError((error) {
    print('Error reading student data: $error');
  });
}
