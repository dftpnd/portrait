<form id="user_data" class="classic_form">
    <?php foreach($model as $attribute => $val):?>
    <label>
        <span>
        <?php echo $attribute;?>
            </span>
        <input type="text" name="Contacts[<?php echo $attribute;?>]" value="<?php echo $val;?>">
    </label>
    <?php endforeach;?>
    <input type="submit" value="Изменить" onclick="updateUser();return false">
</form>
<script>
    function updateUser() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/contacts',
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
