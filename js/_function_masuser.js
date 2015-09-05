// JavaScript Document
// Author : kimniyom
// Date : 08/09/2556
// Time : 14.23.00

/******************************************* เช็คตัวเลข *************************************************/
function chkNumber(ele) {
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar < '0' || vchar > '9') && (vchar != '.'))
        return false;
    ele.onKeyPress = vchar;
}


/********************************************* Function เช็คค่าว่างหน้า From register *****************************/
function check_from() {
    with (register) {
        if (alias.value == '') {
            alias.focus();
            return false;
        } else if (email.value == '') {
            email.focus();
            return false;
        } else if (password.value == '') {
            password.focus();
            return false;
        } else if (name.value == '') {
            name.focus();
            return false;
        } else if (lname.value == '') {
            lname.focus();
            return false;
        } else if (sex.value == '') {
            alert("ยังไม่ได้เลือกเพศ");
            return false;
        } else if (tel.value == '' || tel.length != '10') {
            tel.focus();
            return false;
        }
    }
}

				