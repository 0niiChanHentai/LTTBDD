class Camera {
  int _id;
  String _brand;
  String _color;
  double _price;

  Camera(this._id, this._brand, this._color, this._price);

  int get id => _id;

  set id(int value) => _id = value;

  String get brand => _brand;

  set brand(String value) => _brand = value;

  String get color => _color;

  set color(String value) => _color = value;

  double get price => _price;

  set price(double value) => _price = value;
}

void main() {
  Camera camera1 = Camera(1, 'Canon', 'Black', 999.99);
  Camera camera2 = Camera(2, 'Nikon', 'Silver', 799.99);
  Camera camera3 = Camera(3, 'Sony', 'Red', 1199.99);

  print('Camera 1 Details:');
  print('ID: ${camera1.id}');
  print('Brand: ${camera1.brand}');
  print('Color: ${camera1.color}');
  print('Price: \$${camera1.price}');

  print('\nCamera 2 Details:');
  print('ID: ${camera2.id}');
  print('Brand: ${camera2.brand}');
  print('Color: ${camera2.color}');
  print('Price: \$${camera2.price}');

  print('\nCamera 3 Details:');
  print('ID: ${camera3.id}');
  print('Brand: ${camera3.brand}');
  print('Color: ${camera3.color}');
  print('Price: \$${camera3.price}');
}
