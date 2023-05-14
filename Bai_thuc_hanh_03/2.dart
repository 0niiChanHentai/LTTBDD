void printEvenNumbers(int start, int end) {
  print("Even numbers between $start and $end:");
  for (int i = start; i <= end; i++) {
    if (i % 2 == 0) {
      print(i);
    }
  }
}

void main() {
  int start = 1; // Replace with the desired starting number
  int end = 20; // Replace with the desired ending number
  printEvenNumbers(start, end);
}
