void main() {
  Map<String, String> phoneBook = {
    'Alice': '1234567',
    'Bob': '2345678',
    'Charlie': '3456789',
    'Dave': '4567890',
    'Eve': '5678901',
  };

  var keysWithLengthFour = phoneBook.keys.where((key) => key.length == 4);

  print('Keys with length 4:');
  for (var key in keysWithLengthFour) {
    print(key);
  }
}
