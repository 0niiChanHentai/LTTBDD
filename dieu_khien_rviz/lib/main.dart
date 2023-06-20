import 'package:flutter/material.dart';

import 'dang_Nhap/dang_Nhap.dart';

void main() {
  runApp(dieuKhienRviz());
}

class dieuKhienRviz extends StatefulWidget {
  const dieuKhienRviz({Key? key}) : super(key: key);

  @override
  State<dieuKhienRviz> createState() => _dieuKhienRvizState();
}

class _dieuKhienRvizState extends State<dieuKhienRviz> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      routes: {
        "/": (context) => dangNhap(),
      },
    );
  }
}
