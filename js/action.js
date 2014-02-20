var offset_menu;
var flag = true;

$(function () {


    $('body').on('hidden', '.modal', function () {
        contentNormalWidt();
    });

    contentAutoWidth = function () {
        var w = $(window).width();
        $('.help-menu').css('width', w + 'px');
        $('body').css('width', w + 'px');


    };

    contentNormalWidt = function () {
        $('body').css('width', '100%');
        $('.help-menu').css('width', '100%');
    }


    var header = $('.help-menu').outerHeight();

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
    });

    $('.callback-btn').click(function () {
        openModal($('#callback-modal'));
    });

    $('.reservd').click(function () {
        openModal($('#reservd-modal'));
    });

    $('.ask-btn').click(function () {
        openModal($('#ask-modal'));
    });

    $('.callback-bottom').click(function () {
        openModal($('#callback-modal-bottom'));
    });

    $('.add_review').click(function () {
        openModal($('#review-modal'));
    })
    $(document).on('click', '.cl-home-btn', function () {
        openModal($('#home-modal'));
    });

    $('#map-detail').click(function () {
        openModal($('#map-detail-modal'));
        return false;
    });


});

function openModal($modal) {
    contentAutoWidth();
    $modal.modal('show');
}

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


        $('.help-menu li').removeClass('active');

        var $li = $('#hp-' + anchor);


        if ($li.length != 0) {
            $li.addClass('active');
        }

        flag = true;
    }
}


inArray = Array.prototype.indexOf ?
    function (arr, val) {
        return arr.indexOf(val) != -1
    } :
    function (arr, val) {
        var i = arr.length
        while (i--) {
            if (arr[i] === val) return true
        }
        return false
    }

var Box = {
    that: {},
    init: function ($items) {
        that = this;
        that.appendBox($items);
    },
    appendBox: function ($items) {

        $.each($items, function (k, el) {
            if (that.isAvalible($(el))) {
                $(el).append('<div class="td-box-calendar"></div>');
                $data = $(el).find(".data-dom");


                if ($data.length != 0) {
                    var homs = new Array();
                    $.each($data, function (i, el) {
                        var home_id = $(el).text();
                        homs[i] = parseInt(home_id, 10);
                    });

                    that.addCell($(el).find('.td-box-calendar'), homs);
                } else {
                    that.addCell($(el).find('.td-box-calendar'), []);
                }


            }
        });
    },
    isAvalible: function ($el) {
        if ($el.length != 0) {
            if ($el.find('.fc-date').length != 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    },
    addCell: function ($el, data) {
        var i = 1;
        while (i <= 5) {
            var doble_class = '';
            if ($.inArray(i, data) != -1) {
                doble_class = "home-broned";
            }

            $el.append('<button class="cl-home-btn ' + doble_class + '" value="' + i + '">' + i + '</button>');
            i++;
        }
    }
}