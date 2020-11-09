function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
var r;
(function($) {
  'use strict';
  $(function() {
    var sidebar = $('.sidebar');
    $('#sidebar').addClass( getCookie('menuIS') );

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required
    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      if (current === "") {
        //for root url
        if ($this.attr('href').indexOf("index.html") !== -1) {
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      } else {
        //for other url
        if ($this.attr('href').indexOf(current) !== -1) {
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      }
    })

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if ($('.scroll-container').length) {
        const ScrollContainer = new PerfectScrollbar('.scroll-container');
      }
    }

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    $(".purchace-popup .popup-dismiss").on("click",function(){
      $(".purchace-popup").slideToggle();
    });

    /* -- */
    $('.usermenuhide').on('click', function(event) {
      event.preventDefault();
      $('#sidebar').toggleClass('hide');
      var _kl = $('#sidebar').hasClass('hide') ? 'hide' : '';
      setCookie('menuIS', _kl );
    });

    removeInputStyle(0);
    var f = $('form');
    if (f.length) f.find('*').filter(':input:visible:first').focus();
    $('form input,form select,form textarea').addClass('form-control');


    $('#salir, ol.breadcrumb').remove();
    cargar_menu();
    App.init();
    $('input[type=search], input[type=date]').addClass('form-control').removeAttr('style');
    $('.btn').removeAttr('style').addClass('btn-sm')
    $('table').addClass('table');
    /* -- */
  });
})(jQuery);
App = new Object();
App.init = function(){}
App.dataTables = function(){}
/* Custom */
removeInputStyle = function (r) {
  var t = typeof(r)=="undefined" ? 500 : r
  setTimeout(function(){
  $('table, td, select, input[type="text"]').removeAttr('style').removeAttr('width');
  },t);
}
function divtoExcel(elem) {
  var mywindow = window.open('', 'PRINT', 'height=450,width=650');
  mywindow.document.write('<html><head><title></title>');
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(elem).innerHTML);
  mywindow.document.write('</body></html>');
  mywindow.document.close();
  mywindow.focus();
  mywindow.print();
  mywindow.close();
  return true;
}
function cargar_menu(){
  $.ajax({
  url    :"Controller_home/cargar_menu",
  type   :'POST',
  success:function(data){
    $("#movilmenu").html(data);

    var menudos = data.replace(/\n/g, ""); menudos.replace(/\s{2,}/g, '');

    for (var i = 0; i < 50; i++) {
      menudos = menudos.replace("#"+i+'"', "#OPCION"+i+'"');
      menudos = menudos.replace('id="'+i+'"', 'id="OPCION'+i+'"');
    }

    $("#mainmenu").html(menudos);
    setTimeout(function(){
      _yu=$('a[href="'+_curr+'"]');
      $("#mainmenu").css('max-width', $("#sidebar").width() );

      _yu.addClass('active').parent().addClass('activae');
      if ($('#menus .main'+_yu.data('parent'))[1]) $('#menus .main'+_yu.data('parent'))[1].click();
    },10);
  }
  });
}