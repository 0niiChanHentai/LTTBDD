import 'dart:math';

double calculateHypotenuse(double a, double b) {
  double squareSum = pow(a, 2) + pow(b, 2);
  double hypotenuse = sqrt(squareSum);
  return hypotenuse;
}

void main() {
  double sideA = 3.0; // Replace with the length of side A
  double sideB = 4.0; // Replace with the length of side B

  double hypotenuse = calculateHypotenuse(sideA, sideB);
  print("The length of the hypotenuse is: $hypotenuse");
}
