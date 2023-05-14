void main() {
  double principal = 1000;
  double rate = 2.5;
  int time = 3;

  double simpleInterest = (principal * rate * time) / 100;

  print('Principal: \$${principal.toStringAsFixed(2)}');
  print('Rate: ${rate.toStringAsFixed(2)}%');
  print('Time: $time years');
  print('Simple Interest: \$${simpleInterest.toStringAsFixed(2)}');
}
