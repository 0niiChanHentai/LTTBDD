import 'dart:math';

String generateRandomPassword(int length) {
  const String validChars =
      "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#\$%^&*()_-+=";

  Random random = Random();
  String password = "";

  for (int i = 0; i < length; i++) {
    int randomIndex = random.nextInt(validChars.length);
    password += validChars[randomIndex];
  }

  return password;
}

void main() {
  int passwordLength = 10; // Replace with the desired password length
  String password = generateRandomPassword(passwordLength);
  print("Random Password: $password");
}
