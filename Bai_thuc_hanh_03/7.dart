double calculatePower(double base, int exponent) {
  double result = 1.0;
  for (int i = 0; i < exponent; i++) {
    result *= base;
  }
  return result;
}

void main() {
  double base = 5.0; // Replace with the desired base
  int exponent = 3; // Replace with the desired exponent

  double power = calculatePower(base, exponent);
  print("$base^$exponent = $power");
}
