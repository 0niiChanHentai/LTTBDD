import 'package:flutter/material.dart';
import 'package:kiem_tra/thanh_phan/muc.dart';

class TrangChu extends StatelessWidget {
  const TrangChu({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: DefaultTabController(
        length: 5,
        child: SafeArea(
            child: Column(
          children: [
            Padding(
              padding: EdgeInsets.only(top: 25),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Padding(
                    padding: EdgeInsets.symmetric(horizontal: 20),
                    child: InkWell(
                      onTap: () {},
                      child: Container(
                        height: 40,
                        width: 40,
                        decoration: BoxDecoration(
                            color: Colors.white,
                            borderRadius: BorderRadiusDirectional.circular(10),
                            border: Border.all(
                              color: Color(0xFF808080),
                              width: 2,
                            )),
                        child: Icon(
                          Icons.menu,
                          color: Colors.black,
                          size: 32,
                        ),
                      ),
                    ),
                  ),
                  Padding(
                    padding: EdgeInsets.symmetric(horizontal: 20),
                    child: InkWell(
                      onTap: () {},
                      child: Container(
                        height: 40,
                        width: 40,
                        decoration: BoxDecoration(
                            color: Colors.white,
                            borderRadius: BorderRadiusDirectional.circular(10),
                            border: Border.all(
                              color: Color(0xFF808080),
                              width: 2,
                            )),
                        child: Icon(
                          Icons.search,
                          color: Colors.black,
                          size: 32,
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
            SizedBox(height: 30),
            TabBar(labelColor: Colors.black, tabs: [
              Tab(
                  child: Text(
                "All",
                style: TextStyle(
                  color: Colors.red,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
              Tab(
                  child: Text(
                "Fruits",
                style: TextStyle(
                  color: Colors.blue,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
              Tab(
                  child: Text(
                "Vegatables",
                style: TextStyle(
                  color: Colors.blue,
                  fontSize: 16,
                  fontWeight: FontWeight.bold,
                ),
              )),
              Tab(
                  child: Text(
                "Greens",
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
                    Muc(),
                  ],
                ))
          ],
        )),
      ),
    );
  }
}
