<form id="user_data" class="classic_form">
    <label>
        <span>
        Login
            </span>
        <input type="text" name="User[username]" value="<?php echo $user->username ?>">
    </label>
    <label>
        <span>
        New Password
            </span>
        <input type="text" name="User[password]" value="">
    </label>
    <input type="submit" value="Изменить" onclick="updateUser();return false">
</form>
<script>
    function updateUser() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/index',
            dataType: "json",
            data: $('#user_data').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                }else{
                    alert('Изменено');
                    location.reload();
                }

            }
        });
    }
</script>
