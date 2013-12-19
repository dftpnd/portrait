$(function () {
    $('html').click(function () {
        closeDoor();
    });

    $.fn.jax = function (complete, success) {

        var $element = $(this);
        var data, url;

        $element.addClass('loading');


        if ($('#form-' + $element.attr('id')).length !== 0) {
            data = $('#form-' + $element.attr('id')).serialize();
            url = $('#form-' + $element.attr('id')).attr('action')
        }


        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                if (data.status == "success") {
                    if (typeof success !== "undefined") {
                        success(data);
                    }

                } else {
//                    for (key in data.message) {
//                        $('#jgrowl_error').jGrowl(data.message[key]);
//                    }
                }
            },
            complete: function () {
                $element.removeClass('loading');
                if (typeof complete !== "undefined") {
                    complete();
                }
            },
            error: function () {

            }

        });
        return $element;
    };


    $('.sender').click(function () {
        $(this).jax(function () {

        }, function () {
            alert('success')
        });

        return false;
    });


});
function sender($el) {
    $el.addClass('loading');

    $el.jax(function () {

    }, function () {

    });

    return false;

}
function addZero(num) {
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}

function onDayClickUser($el, dateProperties) {
    var t = '.';

    var datapick = new Object();

    datapick.datapick = addZero(dateProperties.day) + t + addZero(dateProperties.month) + t + dateProperties.year;
    datapick.day = dateProperties.day;
    datapick.month = dateProperties.month;
    datapick.year = dateProperties.year;

    $.ajax({
        url: '/site/CalendarDoor',
        type: 'POST',
        dataType: 'html',
        data: ({
            datapick: datapick
        }),
        success: function (data) {
            openDoor(data);
        }
    });
}



