/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Andrew Stromnov (stromnov@gmail.com). */
jQuery(function ($) {
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['ru']);
});
//===============

var offset_menu;
var flag = true;
var date_cliked = {};

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
    $('.home-btn').click(function () {
        var home_select = $(this).data('home-id');
        var home_removed = [];
        var date_cliked = null;

        homeBron.open(date_cliked, home_select, home_removed);
    });

    $(document).on('click', '.cl-home-btn:not(.home-broned)', function () {
        var home_select = $(this).val();
        var home_removed = [];

        var $items = $(this).siblings('button');

        $.each($items, function (i, el) {
            if ($(el).hasClass('home-broned')) {
                home_removed[i] = $(el).val();
            }
        });

        homeBron.open(date_cliked, home_select, home_removed);
    });

    $('#map-detail').click(function () {
        initialize();
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
                $(el).addClass('avalible_cell');
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
                return that.avalibleCell($el)
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
            var doble_class = '', title = "";
            if ($.inArray(i, data) != -1) {
                doble_class = "home-broned";
                title = 'Домик уже занят';
            } else {
                title = 'Домик свободен';
            }

            $el.append('<button title="' + title + '" class="cl-home-btn ' + doble_class + '" value="' + i + '">' + i + '</button>');
            i++;
        }
    },
    avalibleCell: function ($cell) {
        var date = new Date(that.getDateCell($cell));
        var today = new Date(that.getToday());

        if (date >= today) {
            return true;
        } else {
            return false;
        }
    },
    getDateCell: function ($cell) {
        var dd = addZero($cell.find('.fc-date').text());
        var mm = that.getNumberMounth($('#custom-month').text());
        var yyyy = $('#custom-year').text();

        return that.dateOneFormat(dd, mm, yyyy)
    },
    getNumberMounth: function (mounth_name) {
        var mounths = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
        var mount_id = $.inArray(mounth_name, mounths) + 1;
        return addZero(mount_id);
    },
    getToday: function () {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        return that.dateOneFormat(dd, mm, yyyy)
    },
    dateOneFormat: function (dd, mm, yyyy) {
        return yyyy + '-' + mm + '-' + dd;
    }

}

var homeBron = {
    that: {},
    home_select: null,
    home_removed: [],
    date_select: null,
    $modal: function () {
        return $('#home-modal');
    },
    open: function (date_select, home_select, home_removed) {
        that = this;
        that.date_select = date_select;
        that.home_select = home_select;
        that.home_removed = home_removed;

        $('#home-modal-container').html(' ');
        $('#home-modal-container').html($('.home-modal-block').clone());

        that.buildFragment(
            function () {
                openModal(that.$modal());
            }
        );
    },
    buildFragment: function (callback) {
        that.buildSelect();
        that.buildDatePicker();
        callback();
    },
    buildSelect: function () {
        if (that.home_removed.length != 0) {
            $.each(that.home_removed, function (i, home_id) {
                $('#home-modal .home-select option[value="' + home_id + '"]').remove();
            });
        }
        $('#home-modal .home-select option[value="' + that.home_select + '"]').attr('selected', 'selected');
        //$('#home-select').attr('disabled', 'disabled');
    },
    buildDatePicker: function () {
        if (that.date_select != null) {
            $('#home-modal .pick-date').val(that.dateFormat());
            $('#home-modal .pick-date').attr('disabled', 'disabled')
        } else {
            $('#home-modal .pick-date').datepicker();
        }
    },
    dateFormat: function () {

        if (that.date_select != null) {
            if (typeof that.date_select == 'object') {
                var month = addZero(that.date_select.month);
                var day = addZero(that.date_select.day);
                var year = that.date_select.year;

                return day + '-' + month + '-' + year;
            }
        }
    }



}