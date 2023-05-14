import 'dart:math';

double calculateCircleArea(double radius) {
  return pi * pow(radius, 2);
}

void main() {
  double radius = 5.0; // Replace with the desired radius
  double area = calculateCircleArea(radius);
  print("The area of the circle is: $area");
}
