import 'package:flutter/material.dart';

import '../thanh_phan/thanh_trang_con.dart';

class TrangCon extends StatelessWidget {
  const TrangCon({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
          child: Column(
        children: [
          Padding(
            padding: EdgeInsets.only(top: 25),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Padding(
                  padding: EdgeInsets.symmetric(horizontal: 15),
                  child: InkWell(
                    onTap: () {
                      Navigator.pop(context);
                    },
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
                        Icons.arrow_back,
                        color: Colors.black,
                        size: 32,
                      ),
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(horizontal: 15),
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
                        Icons.star,
                        color: Colors.black,
                        size: 32,
                      ),
                    ),
                  ),
                ),
              ],
            ),
          ),
          Container(
            height: 360,
            width: 360,
            child: Image.asset("images/bg.png"),
          ),
          SizedBox(height: 20),
          Container(
            alignment: Alignment.centerLeft,
            child: Padding(
              padding: EdgeInsets.symmetric(horizontal: 25),
              child: Text(
                "Pink Macaroon",
                style: TextStyle(
                  color: Colors.pink,
                  fontSize: 32,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ),
          )
        ],
      )),
      bottomNavigationBar: ThanhTrangCon(),
    );
  }
}
