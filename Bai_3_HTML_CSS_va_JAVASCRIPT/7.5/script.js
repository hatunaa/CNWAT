function jsUcfirst(string) {
    trimmedString = string.trim();
    normalizedString = trimmedString.replace(/\s+/g, ' ');

    words = normalizedString.split(' ');
    capitalizedWords = words.map(word => {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    });

    normalizedResult = capitalizedWords.join(' ');

    return normalizedResult;
}

function convertName() {
    var name = document.getElementById("fullName").value
    name = jsUcfirst(name)
    document.getElementById("fullName").value = name
}

function checkEmail() {
    re = /\@tunglv\./
    email = document.getElementById("email").value
    if (!re.test(email)) {
        document.getElementById("error").innerText = "Vui lòng nhập email đúng yêu cầu!!!"
    } else {
        document.getElementById("error").innerText = ""
    }
}

function checkPass() {
    pass = document.getElementById("password").value
    confirmPass = document.getElementById("confirmPassword").value
    if (pass !== confirmPass) {
        document.getElementById("errorPass").innerText = 'Mật khẩu gõ lại không đúng!'
    } else {
        document.getElementById("errorPass").innerText = ''
    }
}

function resetForm() {
    location.href = location.href
}

function checkAll() {
    var name = document.getElementById("fullName").value
    name = jsUcfirst(name)
    if (name === '') {
        document.getElementById("errorName").innerText = 'Nhập tên!'
    } else {
        document.getElementById("errorName").innerText = ''
    }

    var gender = document.querySelector("input[type='radio'][name='gender']:checked")
    gender = gender != null ? gender.value : ''
    if (gender === '') {
        document.getElementById("errorGender").innerText = 'Chọn giới tính!'
    } else {
        document.getElementById("errorGender").innerText = ''
    }

    var name = document.getElementById("dob").value
    if (name === '') {
        document.getElementById("errorDob").innerText = 'Chọn ngày sinh!'
    } else {
        document.getElementById("errorDob").innerText = ''
    }

    var course = document.querySelector("input[type='checkbox'][name='course']:checked")
    course = course != null ? course.value : ''
    if (course === '') {
        document.getElementById("errorCourse").innerText = 'Chọn khóa học!'
    } else {
        document.getElementById("errorCourse").innerText = ''
    }

    var name = document.getElementById("username").value
    if (name === '') {
        document.getElementById("errorUsername").innerText = 'Nhập username!'
    } else {
        document.getElementById("errorUsername").innerText = ''
    }

    var name = document.getElementById("notes").value
    name = jsUcfirst(name)
    if (name === '') {
        document.getElementById("errorNote").innerText = 'Nhập note!'
    } else {
        document.getElementById("errorNote").innerText = ''
    }
}