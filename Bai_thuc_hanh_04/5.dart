void main() {
  List<String> friends = [];

  friends.add("Alice");
  friends.add("Bob");
  friends.add("Charlie");
  friends.add("David");
  friends.add("Eve");
  friends.add("Frank");
  friends.add("Grace");

  String nameStartingWithA = friends
      .firstWhere((friend) => friend.startsWith('A'), orElse: () => null);

  print("Name starting with 'A': $nameStartingWithA");
}
