// START Read Image File
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.preview').attr('src', e.target.result);
            $('.remove-preview').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$('.remove-preview').click(function(e) {
    e.preventDefault();
    $(this).hide();
    $('.preview').attr('src', '');
    $('.biz_photo').val('');
});
// END Read Image File

// START Attribute for background images
$('.data-img').each(function() {
	var attr = $(this).attr('data-bg');
	if (typeof attr !== typeof undefined && attr !== false) {
		$(this).css('background-image', 'url('+attr+')');
	}
});
// END Attribute for background images

// START Init Parallax.js
$('.parallax').parallax();
// END Init Parallax.js

// START DISPLAY TIME 24 hr format
function startTime() {
    var time = new Date();
    var h = time.getHours();
    var m = time.getMinutes();
    var s = time.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
// END DISPLAY TIME 24 hr format

var today = new Date();
var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var day = ["Sun", "Mon", "Tue", "Wed", "Thu", "Sat"];

function getTimeZone() {
    var offset = new Date().getTimezoneOffset(),
        o = Math.abs(offset);
    return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
}

var date = day[today.getDay()] + " " + today.getDate() + " " + month[today.getMonth()] + " " + today.getFullYear();
$('#date').html(date);
$('#timezone').html(getTimeZone());

$('.btn-cta').click(function () {
    var aTag = $(this).attr('href');
    $('html,body').animate({
        scrollTop: $(aTag).offset().top
    }, 600);

    return false;
});

// START Weather Plugin
$.simpleWeather({
    location: $('.weather-widget').data('weather'),
    woeid: '',
    unit: 'f',
    success: function(weather) {
        html = '<h2 class="forecast"><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
        html += '<ul class="weather-info">';
        html += '<li class="currently">'+weather.currently+'</li>';
        html += '<li class="location">'+weather.city+', '+weather.region+'</li>';
        html += '<li class="wind">'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li>'
        html += '</ul>';

        $('.weather-widget').html(html);
    },
    error: function(error) {
        $('.weather-widget').html('<p>'+error+'</p>');
    }
});
// END Weather Plugin

// START FuzzySearch
var fuzzyhound = new FuzzySearch();
var formAction = $('.search-directory').attr('action') + '?location=';
$('.keyword').typeahead({
        minLength: 2,
        highlight: false
    },
    {
        name: 'movies',
        source: fuzzyhound,
        templates: {
            suggestion: function(result){return '<div class="suggestions"><a href="'+formAction+(result)+'">'+fuzzyhound.highlight(result)+'</a></div>'}
    }
});

$.ajaxSetup({cache: true});

var sourceJSON = $('.keyword').data('suggest');
function setsource(url, keys, output) {
    $.getJSON(url).then(function (response) {
        fuzzyhound.setOptions({
            source: response,
            keys: keys,
            output_map: output
        })
    });
}
setsource(sourceJSON);
// END FuzzySearch

// START Search Form Validation
function strip_char() {
    var str = document.getElementById('keyword');
    var spchr = /[^0-9\s,a-z]/gi;
    var space = /\s\s+/g;
    var comma = /,,+/g;
    str.value = str.value.replace(spchr, '').replace(space, '').replace(comma, ', ');

}

$('.top-cities').click(function () {
    var aTag = $(this).attr('href');
    $('html,body').animate({
        scrollTop: $(aTag).offset().top
    }, 600);

    return false;
});

// START MATERIAL CARD
$('.card-content .card-show').click(function(){        
    $(this).parent().parent().find('.card-reveal').slideToggle('normal');
});

$('.card-reveal .card-close').click(function(){
    $(this).parent().parent().find('.card-reveal').slideToggle('normal');
});
// END MATERIAL CARD


// START Load More States
$('.load-more-states').click(function(){
    var data_loader = $(this).data('loadmore');
    var row = Number($('#row').val());
    var allcount = Number($('#all').val());
    row = row + 12;

    if(row <= allcount){
        $("#row").val(row);

        $.ajax({
            url: data_loader,
            type: 'post',
            data: {row:row},
            beforeSend:function(){
                $(".load-more-states").text("Loading...");
            },
            success: function(response){
                setTimeout(function() {
                    $(".state-item:last").after(response).show().fadeIn("slow");

                    var rowno = row + 12;

                    if(rowno > allcount){
                        $('.load-more-states').text("Show Less");
                    }else{
                        $(".load-more-states").text("Show More");
                    }
                }, 2000);


            }
        });
    } else {
        $('.load-more-states').text("Loading...");

        setTimeout(function() {
            $('.state-item:nth-child(12)').nextAll('.state-item').remove().fadeIn("slow");
            $("#row").val(0);
            $('.load-more-states').text("Show More");

        }, 2000);


    }

});
// END Load More States

// START Load More Cities
$('.load-more-cities').click(function(){
    var data_city = $(this).data('loadmore');
    var state = $('#state').val();
    var row = Number($('#row').val());
    var allcount = Number($('#all').val());
    row = row + 12;

    if(row <= allcount){
        $("#row").val(row);

        $.ajax({
            url: data_city,
            type: 'post',
            data: {row:row, state:state},
            beforeSend:function(){
                $(".load-more-cities").text("Loading...");
            },
            success: function(response){
                setTimeout(function() {
                    $(".city-item:last").after(response).show().fadeIn("slow");

                    var rowno = row + 12;

                    if(rowno > allcount){
                        $('.load-more-cities').text("Show Less");
                    }else{
                        $(".load-more-cities").text("Show More");
                    }
                }, 2000);


            }
        });
    } else {
        $('.load-more-cities').text("Loading...");

        setTimeout(function() {
            $('.city-item:nth-child(12)').nextAll('.city-item').remove().fadeIn("slow");
            $("#row").val(0);
            $('.load-more-cities').text("Show More");

        }, 2000);


    }

});
// END Load More States

// START Submit Business
$('.biz_state').keyup(function() {
    $(this).val($(this).val().replace(/[^A-Za-z]/g, ''));
    this.value = this.value.toUpperCase();
});
$('.biz_zip').keyup(function(e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
});
$('.submit-biz').on('submit', function(e) {
    e.preventDefault();
    var sbmt_biz_action = $(this).attr('action');
    $.ajax({
        url: sbmt_biz_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.submit-biz-btn').html('Loading ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.submit-biz-btn').html('Submit <i class="fa fa-paper-plane">');
                $('.submit-biz')[0].reset();
                grecaptcha.reset();
            } else {
                alertify.error(msg.message);
                $('.submit-biz-btn').html('Submit <i class="fa fa-paper-plane">');
                $('.submit-biz')[0].reset();
                grecaptcha.reset();
            }
        }
    });

});
// END Submit Business

// START Contact Us
$('.form-contact').on('submit', function(e) {
    e.preventDefault();
    var contact_action = $(this).attr('action');
    $.ajax({
        url: contact_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-send').html('Sending ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-send').html('Send <i class="fa fa-paper-plane">');
                $('.form-contact')[0].reset();
                grecaptcha.reset();
            } else {
                alertify.error(msg.message);
                $('.btn-send').html('Send <i class="fa fa-paper-plane">');
                $('.form-contact')[0].reset();
                grecaptcha.reset();
            }
        }
    });

});
// END Contact Us

// START SLICK CAROUSEL
$('.slick-responsive').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
// END SLICK CAROUSEL