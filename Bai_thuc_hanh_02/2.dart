import 'dart:io';

void main() {
  // Take user input
  stdout.write('Enter a character: ');
  String input = stdin.readLineSync()!;
  if (input.length != 1) {
    print('Please enter a single character.');
    return;
  }

  // Convert input to lowercase for easier comparison
  String character = input.toLowerCase();

  // Check if the character is a vowel or consonant
  if (isVowel(character)) {
    print('$character is a vowel.');
  } else {
    print('$character is a consonant.');
  }
}

bool isVowel(String character) {
  List<String> vowels = ['a', 'e', 'i', 'o', 'u'];
  return vowels.contains(character);
}
