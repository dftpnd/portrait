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
    var onMouseOutOpacity = 1;
    var i = 1;
    while (i <= 5) {
        if ($('#thumbs-' + i).length != 0)
            if ($('#thumbs-' + i + ' .thumbs li').length != 0)
                $('#thumbs-' + i).galleriffic({
                    delay: 0,
                    numThumbs: 3,
                    preloadAhead: 10,
                    enableTopPager: false,
                    enableBottomPager: true,
                    maxPagesToShow: 10,
                    imageContainerSel: '#slideshow-' + i,
                    controlsContainerSel: '#controls-' + i,
                    captionContainerSel: '#caption-' + i,
                    loadingContainerSel: '#loading-' + i,
                    renderSSControls: true,
                    renderNavControls: true,
                    playLinkText: 'Play Slideshow',
                    pauseLinkText: 'Pause Slideshow',
                    prevLinkText: '&lsaquo; Previous Photo',
                    nextLinkText: 'Next Photo &rsaquo;',
                    nextPageLinkText: '&rarr;',
                    prevPageLinkText: '&larr;',
                    enableHistory: false,
                    autoStart: false,
                    syncTransitions: false,
                    defaultTransitionDuration: 0,
                    onSlideChange: function (prevIndex, nextIndex) {
//                        this.find('ul.thumbs').children()
//                            .eq(prevIndex).hide().end()
//                            .eq(nextIndex).show()
                    },
                    onPageTransitionOut: function (callback) {
                        this.hide();
                        callback();
                    },
                    onPageTransitionIn: function () {
                        this.show();
                    }
                });
        i++;
    }

    $('.thumb').click(function () {
        var home_id = $(this).parents('.navigation').data('home-id');
        openModal($('#thumb-modal-' + home_id));
    })
    ////=============
    if (typeof codropsEvents != "undefined") {
        var cal = $('#calendar').calendario({
                onDayClick: function ($el, $contentEl, dateProperties) {
                    date_cliked = dateProperties;
                },
                caldata: codropsEvents
            }),
            $month = $('#custom-month').html(cal.getMonthName()),
            $year = $('#custom-year').html(cal.getYear());
        $('#custom-next').on('click', function () {
            cal.gotoNextMonth(updateMonthYear);
        });
        $('#custom-prev').on('click', function () {
            cal.gotoPreviousMonth(updateMonthYear);
        });
        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());
            Box.init($('.fc-row > div'))
        }

        Box.init($('.fc-row > div'));
    }
    ////===========

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

    $.fn.clearForm = function ($form) {
        $.each($form.find('input'), function (k, el) {
            $(el).val('')
        });

        return $(this);
    }

    $.fn.jax = function (complete, success, error) {

        var $element = $(this);
        var data, url, type;

        $element.addClass('loading');


        if ($('#form-' + $element.attr('id')).length !== 0) {
            var $form = $('#form-' + $element.attr('id'));
            data = $form.serialize();
            url = $form.attr('action');
            type = $form.attr('method');

        }


        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function (data) {
                if (data.status == "success") {
                    if (typeof success !== "undefined") {
                        success(data);
                    }

                } else {
                    if (typeof error != "undefined") {
                        error(data);
                    } else {
                        $.each(data.message, function (atrib, messages) {
                            $.each(messages, function (i, msg) {
                                alert(msg);
                            });
                        });
                    }
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

    $('.callback-bottom').click(function () {
        openModal($('#callback-modal-bottom'));
    });

    $('.add_review').click(function () {
        openModal($('#review-modal'));
    });

    $('.delete-upload').click(function () {
        var $el = $(this);
        var id = $el.data('upload-id');

        $.ajax({
            url: "/userAdmin/admin/deleteUpload",
            type: "GET",
            dataType: 'json',
            data: ({
                id: id
            }),
            success: function (data) {
                if (data.status == "success") {
                    $el.parents('.template-download').remove();
                }
            }
        });

    });


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
        openModal($('#map-detail-modal'));
        return false;
    });

    $('#order-callback-top').click(function () {
        var $form = $(this).parents('form');
        $(this).jax(
            function () {

            },
            function () {
                $form.clearForm($form);
                $('#callback-modal').modal('hide');
                $('#reservd-modal').modal('show');
            },
            function (data) {
                $.each(data.messages, function (atrib, messages) {
                    $form.find('input[name="' + atrib + '"]').parents('.model-row').addClass('error-field ');
                });
            }
        );

    });

    $('#order-callback-bottom').click(function () {
        var $form = $(this).parents('form');
        $(this).jax(
            function () {

            },
            function () {
                $form.clearForm($form);
                $('#callback-modal').modal('hide');
                $('#reservd-modal').modal('show');
            },
            function (data) {
                $.each(data.messages, function (atrib, messages) {
                    $form.find('input[name="' + atrib + '"]').parents('.model-row').addClass('error-field ');
                });
            }
        );

    });


    $('#order-callback-sall').click(function () {
        var $form = $(this).parents('form');
        $(this).jax(
            function () {

            },
            function () {
                $form.clearForm($form);
                $('#callback-modal').modal('hide');
                $('#reservd-modal').modal('show');
            },
            function (data) {
                $.each($form.find('.error-field'), function (i, el) {
                    $(el).removeClass('error-field');
                });

                $.each(data.messages, function (atrib, messages) {
                    $form.find('input[name="' + atrib + '"]').parents('.model-row').addClass('error-field ');
                });
            }
        );
    });

    $('#order-callback-midle').click(function () {
        var $form = $(this).parents('form');
        $(this).jax(
            function () {

            },
            function () {
                $form.clearForm($form);
                $('#reservd-modal').modal('show');
            },
            function (data) {

            }
        );
    });

    $('#send-review').click(function () {
        var $form = $(this).parents('form');
        $(this).jax(
            function () {

            },
            function () {
                $form.clearForm($form);
                $('#review-modal').modal('hide');
                $('#reservd-modal').modal('show');
            },
            function (data) {

            }
        );
    });


    $(document).on('click', '#bron-home', function () {
        var $form = $('.modal .form-bron-home');
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            dataType: 'json',
            data: $form.serialize(),
            success: function (data) {
                if (data.status == "success") {
                    $form.find('input').parent().removeClass('error-field');
                    $('#home-modal').modal('hide');
                    $('#reservd-modal').modal('show');
                } else {
                    for (key in data.message) {
                        var $error_input = $form.find('.bh-' + key);
                        $error_input.parent().addClass('error-field');
                        //alert(data.message[key]);
                    }
                }
            },
            complete: function () {


            },
            error: function () {

            }

        });
    });

    $(".phone-mask").mask("(999) 999-9999");
});

function openModal($modal) {
    contentAutoWidth();
    $modal.modal('show');
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
        var mm = today.getMonth() + 1;

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
                that.$modal().find(".phone-mask").mask("(999) 999-9999");
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
            var date = that.dateFormat();
            $('#home-modal .pick-date').val(date);
            $('#home-modal .pick-date').parent().append('<input type="hidden" value="' + date + '" name="Datapick[datapick]" />');

            $('#home-modal .pick-date').attr('disabled', 'disabled');
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

                return day + '.' + month + '.' + year;
            }
        }
    }



}