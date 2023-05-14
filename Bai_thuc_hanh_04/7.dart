void main() {
  Map<String, dynamic> contact = {
    'name': 'John Doe',
    'phone': '123-456-7890',
  };

  Iterable<String> keysWithLength4 =
      contact.keys.where((key) => key.length == 4);

  print("Keys with length 4:");
  keysWithLength4.forEach((key) {
    print(key);
  });
}
