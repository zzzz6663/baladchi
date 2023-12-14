
(function ($) {
    $(document).ready(function () {



/////////////////////////////////////
// $('.accord-box .top .toggle_ad').click(function(){
//     console.log('s')
//     $(this).closet('.accord-box').toggleClass('active');
// })



//////////////////////////////////////
      $('.input-label input').focus(function(){
        $(this).parent().addClass('active');
      })
      $('.input-label input').blur(function(){
        if( !$(this).val() ) {
            $(this).parent().removeClass('active');
        }
      })
      $('.input-groupd input').focus(function(){
        $(this).addClass('active');
      })
      $('.input-groupd input').blur(function(){
        if( !$(this).val() ) {
            $(this).removeClass('active');
        }
      })




///////////////////////////////////
$('.search-toggle').click(function(e){
    e.preventDefault();
    $(this).parent().toggleClass('active');
})


///////////////////////////////////
$('#toggle-side').click(function(){
    $('body').toggleClass('out');
})
$('#sidebar-menu .close').click(function(){
    $('body').toggleClass('out');
})


//////////////////////////////////

$('svg.radial-progress').each(function( index, value ) {
  $(this).find($('circle.complete')).removeAttr( 'style' );
});








//////////////////////////////
$('.back-to-top').click(function(){
    $("html, body").animate({scrollTop: 0}, 1000);
})


////////////////////////////////////
$('.tab-nav li').click(function(){
    var a= $(this).index();
    var b= $(this).parent().parent().siblings('.tab-container');
    $(this).addClass('active').siblings().removeClass('active');
    b.children('ul').children('li').eq(a).addClass('active').siblings().removeClass('active');
})






////////////////////////////////////////////
if($('#topsearch').length){

NiceSelect.bind(document.getElementById("topsearch"), {searchable: false, placeholder:"انتخاب دسته بندی"});
}
if($('#mainsearch').length){

NiceSelect.bind(document.getElementById("mainsearch"), {searchable: false, placeholder:"همه دسته ها"});
}
$('select.nice-select').each(function(){
    var a= $(this)[0];
    var b= $(this).data('place');
    console.log(a);
    NiceSelect.bind(a, {searchable: true, placeholder:b});
})





// passcode
$('.inputscode').keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputscode').focus();
    }
});


///////////////////////////////////
$('.about-more-btn').click(function(){
    $(this).parent().remove();
    var a= $('.balad-about > div.text').height()+100;
    var a= $('.balad-about > div.text').addClass('active').css('max-height',a);
})


if($('.elem').length){
///////////////////////////////////////////
lc_lightbox('.elem', {
    wrap_class: 'lcl_fade_oc',
    gallery : true,
    thumb_attr: 'data-lcl-thumb',

    skin: 'minimal',
    radius: 0,
    padding : 0,
    border_w: 0,
});
}

$('.ads-gallery .ads-gallery-nav ul li').click(function(){
    var a= $(this).index();
    var b= $(this).parent().parent().siblings('.main-pic');
    $(this).addClass('active').siblings().removeClass('active');
    b.children('ul').children('li').eq(a).addClass('active').siblings().removeClass('active');
})
////////////////////////////////////////////////

$(function() {

    // open in fullscreen
    $('#map-full').click(function() {
        $('#map').fullscreen();
        return false;
    });
    // exit fullscreen

});

/////////////////////////////////////////////
$('.more-text').click(function(){
    var b= $(this).parent()
    var c= $(this).siblings('.in-text');
    $(this).remove();
    var a= c.height()+20;
   b.addClass('active').css('max-height',a);
})

///////////////////////////////////////////

if($('#txtEditor').length){
    $("#txtEditor").wysibb();

}


////////////////////////////////////
$('.add-charge-form .btn').click(function(e){
    let el =$(this)
    e.preventDefault();
    var a= $(this).siblings().children('input');
    var c= $(this).siblings().children('.num');
    var b= Number(a.val());
    if($(this).hasClass('add')){
        b= b+10000;

    }else{
        b= b-10000;
        if(b<0){
            b=0;
        }
    }
    a.val(b);
        c.text(b);
        let num = String(b).replace(/(.)(?=(\d{3})+$)/g, '$1,')
        console.log(60)
        if (b > 0) {
            b = b.num2persian()
            if (el.closest('.input-label1').find('.green_label').length) {
                el.closest('.input-label1').find('.green_label').html(" ( " + num + " ) " + " - " + b + "  تومان ")
            } else {
                el.closest('.input-label1').find(".pn").append(`
                <p class="green_label">  ${b} - ${num}
                تومان</p>
                `)
            }

        }

});
////////////////////////////////////
$(document).on('click', 'div.sliding-menu .top', function (event) {

    $(this).css('display','none')
    $(this).parent('').siblings().css('display','none')
    $(this).siblings().css('display','block')
})
$(document).on('click', 'div.sliding-menu .sub-slid', function (event) {
    let el= $(this)
    if(el.hasClass('no_subs')){
        return
    }
    $(this).css('display','none')
    $(this).parent('').siblings().css('display','none')
    $(this).parent('').parent('').siblings().css('display','none')
    $(this).siblings().css('display','block')
})
$(document).on('click', 'div.sliding-menu .sub > .back', function (event) {
    $(this).parent().css('display','none')
    $(this).parent('').siblings().css('display','flex')
    $(this).parent('').parent('').siblings().css('display','block');
    $(this).parent('').parent('').parent('').siblings().css('display','block');
})
////////////////////////////
$('.faq .top').click(function(){
    $(this).parent().toggleClass('active');
    $(this).siblings().slideToggle();
    $(this).parent().siblings().removeClass('active').children('.bot').slideUp()
})
////////////////////////////
$('.select2').each(function(){
    var b= $(this).data('place');

$(this).select2({
  // selectOnClose: true
     placeholder: b,
    dir: "rtl"
});
// placeholder: "Select a state",
})
////////////////////////////////////
if($( ".js-player" ).length){
    const players = Array.from(document.querySelectorAll('.js-player')).map(p => new Plyr(p));

}


////////////////////////////////////
$('.user-search-toggle').click(function(){
    $(this).siblings('.user-search').addClass('active');
})
$('.user-search .close').click(function(){
    $(this).parent().removeClass('active');
})
////////////////////////////////////
$('.my-add').click(function(){
    $(this).find('.left-sec').addClass('act');
})
$('.my-add .left-sec h4').click(function(e){
    e.stopPropagation()
    $(this).parents('.left-sec').removeClass('act');
})
////////////////////////////////////
////////////////////////////////////
////////////////////////////////////

//////////////////////////
//////////////////////////////////// Comment Slid
var valuesSlider = document.getElementById('slider-round');
var start = $('#slider-round').data('start');
if(!start){
    start=0;
}
var inputFormat = document.getElementById('input-format')
console.log(valuesSlider)

if(valuesSlider){
noUiSlider.create(valuesSlider, {
    start: start,
    tooltips: [
        wNumb({
    decimals: 0,
    prefix: ' ',
    suffix: ' %'
}) // tooltip with custom formatting
    ],
    direction: 'rtl',
    range: {
        'min': 0,
        'max': 100
    }
});
valuesSlider.noUiSlider.on('update', function (values, handle) {
    if(values[handle]<21){
        $('#slid-rate').attr('class','lev1')
    }else if(values[handle]<41){
        $('#slid-rate').attr('class','lev2')

    }else if(values[handle]<61){
        $('#slid-rate').attr('class','lev3')

    }else if(values[handle]<81){
        $('#slid-rate').attr('class','lev4')

    }else{

        $('#slid-rate').attr('class','lev5')
    }
    inputFormat.value = values[handle];
});
}

////////////////////////////////////

//////////////////////////






    })
})(jQuery);
