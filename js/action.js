$(function () {
    $('html').click(function () {
        closeDoor();
    });
});
function addZero(num) {
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
function onDayClickUser($el, dateProperties) {
    var t = '.';

    var datapick = addZero(dateProperties.day) + t + addZero(dateProperties.month) + t + dateProperties.year;
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



