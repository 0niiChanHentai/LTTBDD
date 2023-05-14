enum Gender {
  male,
  female,
  others,
}

void main() {
  List<Gender> genders = Gender.values;

  print('All Gender values:');
  for (var gender in genders) {
    print(gender);
  }
}
