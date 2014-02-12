var offset_menu;
var flag = true;

$(function () {

    function openModal($modal) {
        contentAutoWidth();
        $modal.modal('show');
    }


    $('.modal').on('hide', function () {
        //contentNormalWidt();
        //$(window).unbind("resize", contentAutoWidth);
        //$(window).bind("resize", contentAutoWidth);
    });

    $('body').on('hidden', '.modal', function () {
        contentNormalWidt();
    });

    contentAutoWidth = function () {
        var w = $(window).width();
        $('body').css('width', w + 'px');
        $('.help-menu').css('width', w + 'px');

    };

    contentNormalWidt = function () {
        $('body').css('width', '100%');
        $('.help-menu').css('width', '100%');
    }


    var header = $('#fixed-main-menu').height();


    $('.scrollmenu a, #linklogo, .help-menu a').click(function () {
        flag = false;
        var anchor = $(this).attr('href').substring(2);
        var offset = $('#' + anchor).offset();
        var caclculate_offset = offset.top - header;
        $("html, body").animate({ scrollTop: caclculate_offset + "px" }, function () {
            flag = true;
            putAnchor(anchor);
        });
        return false;
    });

    $(window).scroll(function () {
        if ($(document).scrollTop() > $('#fixed-main-menu').height()) {
            if (!$('.help-menu').hasClass('in_display')) {
                $('.help-menu').addClass('in_display');
            }
        } else {
            if ($('.help-menu').hasClass('in_display')) {
                $('.help-menu').removeClass('in_display');
            }
        }
    });

    offset_menu = $('#fixed-main-menu').offset();


    if ($('.in_scrollspy').length != 0)
        $('.in_scrollspy').each(function (i) {
            var position = $(this).position();
            $(this).scrollspy({
                min: position.top - header,
                max: position.top + $(this).height(),
                onEnter: function (element, position) {
                    putAnchor(element.id);
                },
                onLeave: function (element, position) {
//                    putAnchor(element.id);
                }
            });
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

    $('.home-btn').click(function () {
        openModal($('#home-modal'));
    })
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
function watchMenu() {

    if (($(document).scrollTop() ) > (offset_menu.top)) {
        $('#fixed-main-menu').addClass('fixerus');
    } else {
        $('#fixed-main-menu').removeClass('fixerus');
    }

}
function putAnchor(anchor) {
    if (flag) {
        history.pushState({
            title: '', url: anchor
        }, '', '#' + anchor);

        $('#fixed-main-menu li').removeClass('active');
        $('.help-menu li').removeClass('active');


        var $li = $('#fixed-main-menu #link_' + anchor);


        if ($li.length != 0) {
            $li.addClass('active');
        }

        flag = true;
    }
}

