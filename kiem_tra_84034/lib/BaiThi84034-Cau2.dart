import 'package:flutter/material.dart';
import 'package:kiem_tra_84034/BaiThi84034-Cau2-Items.dart';

class Cau2 extends StatelessWidget {
  const Cau2({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 5,
      child: Scaffold(
        body: SafeArea(
            child: Column(
          children: [
            SizedBox(height: 30),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Padding(
                    padding: EdgeInsets.symmetric(horizontal: 25),
                    child: InkWell(
                      onTap: () {
                        Navigator.pop(context);
                      },
                      child: Icon(
                        Icons.arrow_back,
                        color: Colors.black,
                        size: 32,
                      ),
                    )),
                Padding(
                    padding: EdgeInsets.symmetric(horizontal: 25),
                    child: Text(
                      "Market",
                      style: TextStyle(
                        color: Colors.black,
                        fontSize: 32,
                      ),
                    )),
                Padding(
                    padding: EdgeInsets.symmetric(horizontal: 25),
                    child: InkWell(
                      onTap: () {},
                      child: Icon(
                        Icons.filter_list,
                        color: Colors.black,
                        size: 32,
                      ),
                    )),
              ],
            ),
            SizedBox(height: 30),
            Container(
                height: 50,
                width: 400,
                decoration: BoxDecoration(
                    color: Colors.grey,
                    borderRadius: BorderRadius.circular(40),
                    border: Border.all(
                      color: Colors.black,
                      width: 2,
                    )),
                child: Padding(
                  padding: EdgeInsets.all(15),
                  child: Text(
                    "Search",
                    style: TextStyle(
                      color: Colors.black,
                      fontSize: 16,
                    ),
                  ),
                )),
            SizedBox(height: 10),
            TabBar(labelColor: Colors.black, tabs: [
              Tab(
                  child: Text(
                "Hot deals",
                style: TextStyle(
                  color: Colors.blue,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
              Tab(
                  child: Text(
                "Trending",
                style: TextStyle(
                  color: Colors.blue,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
              Tab(
                  child: Text(
                "Recomn",
                style: TextStyle(
                  color: Colors.blue,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
            ]),
            Flexible(
                flex: 1,
                child: TabBarView(
                  children: [
                    ItemTrangChu(),
                    ItemTrangChu(),
                    ItemTrangChu(),
                    ItemTrangChu(),
                  ],
                ))
          ],
        )),
      ),
    );
  }
}
