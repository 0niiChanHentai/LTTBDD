import 'package:flutter/material.dart';

class ItemTrangChu extends StatelessWidget {
  const ItemTrangChu({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GridView.count(
      crossAxisCount: 1,
      children: [
        for (int i = 1; i < 5; i++)
          Container(
            height: 240,
            width: 240,
            child: Row(
              children: [
                Padding(
                    padding: EdgeInsets.symmetric(horizontal: 25),
                    child: Container(
                      height: 240,
                      width: 240,
                      child: Image.asset("images/1.jpg"),
                    )),
                Column(
                  children: [
                    Container(
                      alignment: Alignment.center,
                      child: Text(
                        "Item #1.1 Name",
                        style: TextStyle(
                          color: Colors.black,
                          fontSize: 40,
                        ),
                      ),
                    ),
                    Container(
                      child: Text(
                        "\$19.99",
                        style: TextStyle(
                          color: Colors.black,
                          fontSize: 40,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ),
                  ],
                ),
              ],
            ),
          )
      ],
    );
  }
}
