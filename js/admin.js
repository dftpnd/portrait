function updateUser() {
    $.ajax({
        type: "POST",
        url: '/userAdmin/admin/index',
        dataType: "json",
        data: $('#user_data').serialize(),
        success: function (data) {
            if (data == null) {
                alert('Ошибка. Попробуйте перезагрузить страницу.');
            } else {
                alert('Изменено');
                location.reload();
            }

        }
    });
}