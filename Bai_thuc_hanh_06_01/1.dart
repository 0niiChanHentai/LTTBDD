class Laptop {
  int id;
  String name;
  int ram;

  Laptop(this.id, this.name, this.ram);

  void printDetails() {
    print('ID: $id');
    print('Name: $name');
    print('RAM: $ram GB');
  }
}

void main() {
  Laptop laptop1 = Laptop(1, 'Laptop A', 8);
  Laptop laptop2 = Laptop(2, 'Laptop B', 16);
  Laptop laptop3 = Laptop(3, 'Laptop C', 32);

  print('Laptop 1 Details:');
  laptop1.printDetails();
  print('');

  print('Laptop 2 Details:');
  laptop2.printDetails();
  print('');

  print('Laptop 3 Details:');
  laptop3.printDetails();
  print('');
}
