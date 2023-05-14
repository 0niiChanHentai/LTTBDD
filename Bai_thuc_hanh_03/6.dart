String reverseString(String str) {
  String reversed = '';
  for (int i = str.length - 1; i >= 0; i--) {
    reversed += str[i];
  }
  return reversed;
}

void main() {
  String originalString = 'Hello, World!'; // Replace with the desired string
  String reversedString = reverseString(originalString);
  print("Original String: $originalString");
  print("Reversed String: $reversedString");
}
