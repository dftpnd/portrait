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
function openDoor(html) {
    $('#modal .modal-body').html(html);
    $('#modal').modal('show');
}
function closeDoor() {
    $('#modal').modal('hide');
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

    $(document).on("click", "#popup-sender", function () {
        $(this).jax(
            function () {

            },
            function () {
                closeDoor();
            }
        );
    });

    $(document).on("change", "#select-home-id", function () {
        $(this).parents('form').submit();
    });


})

