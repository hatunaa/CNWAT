<div class="register-container">
    <h3>
        <b>Form Đăng Ký</b>
    </h3>
    <form method="POST" id="form">
        <div class="form-group col-12 mb-3">
            <label for="">Username:</label>
            <input class="form-control" type="text" name="name" value="" />
        </div>
        <div class="form-group col-12 mb-3">
            <label for="">Password:</label>
            <input class="form-control" type="password" name="password" value="" />
        </div>
        <div class="form-group col-12 mb-3 gender-container">
            <label for="">Gender:</label>
            <span class="gender-container-child">
                <span><input type="radio" name="gender" value="Male" />Male</span>
                <span><input type="radio" name="gender" value="Female" />Female</span>
            </span>
        </div>
        <div class="form-group col-12 mb-3">
            <label for="">Address:</label>
            <select name="address">
                <option value="HN">Hà Nội</option>
                <option value="TPHCM">Thành phố HCM</option>
                <option value="DN">Đà Nẵng</option>
                <option value="QN">Quảng Ninh</option>
                <option value="HP">Hải Phòng</option>
            </select>
        </div>
        <div class="form-group col-12 mb-3">
            <label for="">Enable Programming Language:</label>
            <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="PHP"> PHP </span>
            <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="C#"> C# </span>
            <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="Java"> Java </span>
            <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="C++"> C++ </span>
        </div>
        <div class="form-group col-12 mb-3 skill-container">
            <label for="">Skill:</label>
            <span class="skill-container-child">
                <span><input type="radio" name="skill" value="Normal" />Normal</span>
                <span><input type="radio" name="skill" value="Good" />Good</span>
                <span><input type="radio" name="skill" value="VeryGood" />VeryGood</span>
                <span><input type="radio" name="skill" value="Excellent" />Excellent</span>
            </span>
        </div>
        <div class="form-group col-12 mb-3">
            <label for="">Note:</label>
            <textarea class="form-control" name="note" value=""></textarea>
        </div>
        <div class="form-group col-12 mb-3">
            <label for="">Marriage Status:</label>
            <span class="ms-4"><input type="checkbox" name="marriageStatus" value="1"></span>
        </div>
        <div class="form-group mt-3 col-3">
            <button class="btn btn-danger btn-delete" type="button" name="btn-delete">Xóa</button>
            <input class="btn btn-primary" type="submit" value="Đăng ký" name="submitForm" />
        </div>
    </form>
</div>

<script>
    var inputArr = document.querySelectorAll("input[type=text]");
    var btnDelete = document.querySelector(".btn-delete")
    btnDelete.onclick = () => {
        document.getElementById("form").reset()
    }
</script>