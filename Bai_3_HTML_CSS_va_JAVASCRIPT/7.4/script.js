function checkInput() {
    var mahs = document.getElementById('mahs').value
    var hoten = document.getElementById('hoten').value
    var ngaysinh = document.getElementById('ngaysinh').value
    var diachi = document.getElementById('diachi').value
    var lop = document.getElementById('lop').value
    var diemtoan = parseFloat(document.getElementById('diemtoan').value)
    var diemly = parseFloat(document.getElementById('diemly').value)
    var diemhoa = parseFloat(document.getElementById('diemhoa').value)

    if (mahs.length !== 8) {
        alert('Mã học Sinh phải có độ dài 8 ký tự.')
        return
    }

    if (hoten.length > 50) {
        alert('Họ tên có độ dài tối đa là 50 ký tự.')
        return
    }

    if (diachi.length > 50) {
        alert('Địa chỉ có độ dài tối đa là 150 ký tự.')
        return
    }

    if (lop.length > 6) {
        alert('Lớp có độ dài tối đa là 6 ký tự.')
        return
    }

    if (diemtoan < 0 || diemtoan > 10 || isNaN(diemtoan)) {
        alert('Điểm Toán phải nằm trong khoảng từ 0 đến 10.')
        return
    }

    if (diemly < 0 || diemly > 10 || isNaN(diemly)) {
        alert('Điểm Lý phải nằm trong khoảng từ 0 đến 10.')
        return
    }

    if (diemhoa < 0 || diemhoa > 10 || isNaN(diemhoa)) {
        alert('Điểm Hóa phải nằm trong khoảng từ 0 đến 10.')
        return
    }
}