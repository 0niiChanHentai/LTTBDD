import 'package:flutter/material.dart';

class dangNhap extends StatefulWidget {
  const dangNhap({Key? key}) : super(key: key);

  @override
  State<dangNhap> createState() => _dangNhapState();
}

class _dangNhapState extends State<dangNhap> {
  // Đặt mặc định "Hover" là false
  bool _isHover = false;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFE966A0),
      body: SafeArea(
        child: Align(
          alignment: Alignment.center,
          child: Column(
            children: [
              SizedBox(
                // Đặt chiều cao, rộng theo tỉ lệ màn hình
                height: MediaQuery.of(context).size.height * 0.1,
                width: MediaQuery.of(context).size.width * 0.1,
              ),
              Container(
                height: MediaQuery.of(context).size.height * 0.1,
                width: MediaQuery.of(context).size.width * 0.1,
                color: Colors.red,
              ),
              SizedBox(
                height: MediaQuery.of(context).size.height * 0.1,
                width: MediaQuery.of(context).size.width * 0.1,
              ),
              // Cho nhiều thứ chồng lên nhau
              Stack(
                /* Cho phép hiển thị đầy đủ phần Positioned :
                   top: 8, right: -8
                */
                clipBehavior: Clip.none,
                children: [
                  AnimatedContainer(
                      duration: Duration(milliseconds: 200),
                      height: MediaQuery.of(context).size.height * 0.6,
                      width: MediaQuery.of(context).size.width * 0.6,
                      decoration: BoxDecoration(
                        color: Color(0xFF2B2730),
                        borderRadius: BorderRadius.all(Radius.circular(10)),
                      )),
                  // Điều chỉnh vị trí của "InkWell" theo "Container" nhưng chỉ được dùng trong "Stack"
                  AnimatedPositioned(
                    duration: Duration(milliseconds: 200),
                    // Tạo hiệu ứng chuyển động mượt
                    curve: Curves.easeInOutBack,
                    // Đặt độ lệch của "InkWell" so với "Container" trên
                    top: _isHover ? -8 : 0,
                    right: _isHover ? 8 : 0,
                    child: InkWell(
                      onTap: () {},
                      // Đặt giao diện mặc định của "InkWell" là "Hover" tức false
                      onHover: (hover) {
                        setState(() {
                          _isHover = hover;
                        });
                      },
                      // Tạo lớp trong suốt khi không tương tác
                      overlayColor:
                          MaterialStateProperty.all(Colors.transparent),
                      borderRadius: BorderRadius.all(Radius.circular(10)),
                      child: AnimatedContainer(
                          // Tốc độ delay khi tương tác
                          duration: Duration(milliseconds: 200),
                          height: MediaQuery.of(context).size.height * 0.6,
                          width: MediaQuery.of(context).size.width * 0.6,
                          decoration: BoxDecoration(
                            color: _isHover
                                ? Color(0xFF6554AF)
                                : Color(0xFFE966A0),
                            borderRadius: BorderRadius.all(Radius.circular(10)),
                          )),
                    ),
                  ),
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
