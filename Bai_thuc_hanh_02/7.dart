void main() {
  for (int i = 1; i <= 9; i++) {
    print("Multiplication Table of $i:");
    for (int j = 1; j <= 10; j++) {
      int result = i * j;
      print("$i x $j = $result");
    }
    print(""); // Print an empty line after each table
  }
}
