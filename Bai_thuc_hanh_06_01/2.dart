class House {
  int id;
  String name;
  double price;

  House(this.id, this.name, this.price);

  void printDetails() {
    print('ID: $id');
    print('Name: $name');
    print('Price: \$${price.toStringAsFixed(2)}');
  }
}

void main() {
  List<House> houses = [];

  House house1 = House(1, 'House A', 250000.0);
  House house2 = House(2, 'House B', 350000.0);
  House house3 = House(3, 'House C', 450000.0);

  houses.add(house1);
  houses.add(house2);
  houses.add(house3);

  for (var house in houses) {
    house.printDetails();
    print('');
  }
}
