import 'package:flutter/material.dart';
import 'package:kiem_tra/trang/trang_chu.dart';
import 'package:kiem_tra/trang/trang_con.dart';

void main() {
  runApp(TranCongMinh_84034());
}

class TranCongMinh_84034 extends StatefulWidget {
  const TranCongMinh_84034({Key? key}) : super(key: key);

  @override
  State<TranCongMinh_84034> createState() => _TranCongMinh_84034State();
}

class _TranCongMinh_84034State extends State<TranCongMinh_84034> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      routes: {
        "/": (context) => TrangChu(),
        "TrangCon": (context) => TrangCon(),
      },
    );
  }
}
