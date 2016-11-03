<header class="main-header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" onclick="home()">SOUNDENGINIUS</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" onclick="home()">หน้าแรก</a></li>
                    <li><a href="/contact" onclick="contact()">ติดต่อเรา</a></li>
                    @if(Session::get('remember_token'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">{{ Session::get('user_name') }}<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/cart"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ตะกร้าสินค้า</a>
                                </li>
                                <li><a href="/checkout"><span class="glyphicon glyphicon-shopping-cart"
                                                              aria-hidden="true"></span> รายการสั่งซื้อสินค้า</a></li>
                                <li><a href="/user"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> จัดการข้อมูลผู้ใช้</a>
                                </li>
                                <li><a href="/signout" onclick="signout()">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="#" data-toggle="modal" data-target=".signup">สมัครสมาชิก</a></li>
                        <li><a href="#" data-toggle="modal" data-target=".signin">เข้าสู่ระบบ</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(!Session::get('remember_token'))
        <div class="modal fade signup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">สมัครสมาชิก</h4>
                    </div>
                    <form action="{{ url('signup') }}" method="POST">

                        <div class="modal-body">
                            <div class="form-group">
                                <div>
                                    <td><label for="email">อีเมลล์</label>
                                        <input class="form-control" id="email"
                                               name="email"
                                               type="email" required>
                                        {{ csrf_field() }}
                                    </td>
                                </div>
                                <div>
                                    <td><label for="password">พาสเวิร์ด</label>
                                        <input class="form-control" id="password"
                                               name="password" type="password"
                                               required></td>
                                </div>
                                <div>
                                    <td><label for="name">ชื่อ</label>
                                        <input class="form-control" id="name" name="name"
                                               type="text" required></td>
                                </div>
                                <div>
                                    <td><label for="address">ที่อยู่</label>
                                        <textarea class="form-control" id="address" name="address" required></textarea>
                                    </td>
                                </div>
                                <div>
                                    <td><label for="tel">เบอร์โทร</label>
                                        <input class="form-control" id="tel" name="tel"
                                               type="tel" required></td>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            <input type="submit" value="สมัคร" class="btn btn-primary">
                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">เข้าสู่ระบบ</h4>
                    </div>
                    <form action="{{ url('signin') }}" method="POST">

                        <div class="modal-body">
                            <div class="form-group">
                                <div>
                                    <td><label for="email">อีเมลล์</label>
                                        <input class="form-control" id="email"
                                               name="email"
                                               type="email" required>
                                        {{ csrf_field() }}
                                    </td>
                                </div>
                                <div>
                                    <td><label for="password">พาสเวิร์ด</label>
                                        <input class="form-control" id="password"
                                               name="password" type="password"
                                               required>
                                    </td>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            <input type="submit" value="ล๊อกอิน" class="btn btn-primary">
                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endif


</header>