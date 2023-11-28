<div class="container">
    <h2>Form Đăng ký</h2>
    <form action="resultRegister.php" method="post">
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="occupation">Nghề:</label>
            <input type="text" id="occupation" name="occupation" required>
        </div>
        <div class="form-group">
            <label for="note">Ghi chú:</label>
            <textarea id="note" name="note" rows="4"></textarea>
        </div>
        <button type="button" class="delete">Xóa</button>
        <button type="submit">Đăng ký</button>
    </form>
</div>