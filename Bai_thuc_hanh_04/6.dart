void main() {
  Map<String, dynamic> person = {
    'name': 'John Doe',
    'address': '123 Main St',
    'age': 30,
    'country': 'USA'
  };

  // Update the country name
  person['country'] = 'Canada';

  // Print all keys and values
  person.forEach((key, value) {
    print('$key: $value');
  });
}
