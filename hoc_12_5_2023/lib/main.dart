import 'package:flutter/material.dart';

void main() {
  runApp(const MainApp());
}

class MainApp extends StatelessWidget {
  const MainApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: Center(
          child: SizedBox(
            width: 48.0,
            height: 48.0,
            child: DecoratedBox(
              decoration: BoxDecoration(
                color: Colors.amber,
              ),
            ),
          ),
        ),
      ),
    );
  }
}
