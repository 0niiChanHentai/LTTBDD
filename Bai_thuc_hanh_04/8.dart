import 'dart:io';

void main() {
  List<String> tasks = [];

  while (true) {
    print("\nWhat would you like to do?");
    print("1. Add task");
    print("2. Remove task");
    print("3. View tasks");
    print("4. Exit");

    String choice = stdin.readLineSync();
    print("");

    if (choice == "1") {
      addTask(tasks);
    } else if (choice == "2") {
      removeTask(tasks);
    } else if (choice == "3") {
      viewTasks(tasks);
    } else if (choice == "4") {
      print("Exiting the application...");
      break;
    } else {
      print("Invalid choice. Please try again.");
    }
  }
}

void addTask(List<String> tasks) {
  print("Enter the task:");
  String task = stdin.readLineSync();
  tasks.add(task);
  print("Task added: $task");
}

void removeTask(List<String> tasks) {
  if (tasks.isEmpty) {
    print("No tasks to remove.");
    return;
  }

  print("Enter the index of the task to remove:");
  int index = int.tryParse(stdin.readLineSync());

  if (index == null || index < 0 || index >= tasks.length) {
    print("Invalid index. Please try again.");
    return;
  }

  String removedTask = tasks.removeAt(index);
  print("Task removed: $removedTask");
}

void viewTasks(List<String> tasks) {
  if (tasks.isEmpty) {
    print("No tasks available.");
    return;
  }

  print("Tasks:");

  for (int i = 0; i < tasks.length; i++) {
    print("$i. ${tasks[i]}");
  }
}
