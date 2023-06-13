import 'package:flutter/material.dart';

import 'BaiThi84034-Cau1.dart';
import 'BaiThi84034-Cau2.dart';

void main() {
  runApp(Kiem_Tra());
}

class Kiem_Tra extends StatefulWidget {
  const Kiem_Tra({Key? key}) : super(key: key);

  @override
  State<Kiem_Tra> createState() => _Kiem_TraState();
}

class _Kiem_TraState extends State<Kiem_Tra> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      routes: {
        "/": (context) => Cau1(),
        "Cau2": (context) => Cau2(),
      },
    );
  }
}
