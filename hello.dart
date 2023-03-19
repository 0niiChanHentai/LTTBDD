class Laptop {
  int id;
  String name;
  int ram;

  Laptop({required this.id, required this.name, required this.ram});

  void printDetails() {
    print("Laptop ID: $id");
    print("Laptop name: $name");
    print("Laptop RAM: $ram GB");
  }
}

void main() {
  Laptop laptop1 = Laptop(id: 1, name: "Dell Inspiron", ram: 8);
  Laptop laptop2 = Laptop(id: 2, name: "Lenovo ThinkPad", ram: 16);
  Laptop laptop3 = Laptop(id: 3, name: "HP Spectre", ram: 32);

  laptop1.printDetails();
  laptop2.printDetails();
  laptop3.printDetails();
}
