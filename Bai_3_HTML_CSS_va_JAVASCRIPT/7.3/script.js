function checkForm() {
    var malop = document.getElementById('malop').value
    var tenlop = document.getElementById('tenlop').value
    var khoahoc = document.getElementById('khoahoc').value
    var gv = document.getElementById('gv').value
    if (malop.length !== 6) {
        alert('Mã lớp phải có độ dài 6 ký tự.')
        return
    }

    if (khoahoc < 1) {
        alert('Khóa học phải là số nguyên dương.')
        return
    }
}