void main() {
  String str = "Hello  World   Dart";

  String withoutSpaces = str.replaceAll(' ', '');

  print("Original string: $str");
  print("String without spaces: $withoutSpaces");
}
