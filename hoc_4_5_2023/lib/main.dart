import 'package:flutter/material.dart';

void main() {
  runApp(CounterApp());
}

class CounterApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
          appBar: AppBar(title: Text('Counter App')),
          body: Center(
            child: Text('Xin chào!',
                style: TextStyle(fontSize: 30, color: Colors.red)),
          )),
    );
  }
}
