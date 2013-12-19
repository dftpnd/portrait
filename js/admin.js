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
$(function () {



    $("body").on("click", ".popup_prepear", function () {
        var datapick_id = $(this).children(":first").children(":first").attr('datapick_id');
        $.ajax({
            url: '/userAdmin/admin/popupPrepear',
            type: 'POST',
            dataType: 'html',
            data: ({
                datapick_id: datapick_id
            }),
            success: function (data) {
                openDoor(data);
            }
        });
    });

})