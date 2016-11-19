
var animate = ['fadeInLeft', 'fadeInRight', 'rotateIn', 'rotateInUpLeft','rotateInDownRight'];


$(document).ready(function(){
    

    //загружаем правильную страницу =)
    /*var page = location.href;
    page = page.split('!');
    if(page[1]){
        page_city = page[1].split('_');
        load_page(page_city[0], page_city[1]);
        if(page_city[1]){
            $('#city').html(townList[page_city[1]][0]);
            $('#city').attr('data-id', page_city[1]);
            $('.cont-head li:nth-child(1)').html(townList[page_city[1]][1]);
            if(townList[page_city[1]][2].length > 2){
                $('.cont-head li:nth-child(2)').html('SMS: '+ townList[page_city[1]][2]);
            }else{
                $('.cont-head li:nth-child(2)').html('');
            }
        }    
    }
*/

    //меню
    $(document).on('click', '.menu1 li a', function(){
        var _this = $(this).closest('li');
        if(!_this.hasClass('active')){
            _this.closest('ul').find('li').removeClass('active');
            _this.closest('ul').find('ul').fadeOut();
            _this.addClass('active');
            _this.children('ul').fadeIn();
        }else{
            _this.removeClass('active');
            _this.children('ul').fadeOut();
        }
    });

    //маска мобильного телефона
    $("#mobile").mask("8 (999) 999-9999");


    //animate tabs
    $(document).on('click', '.nav-tabs li', function(){
        var block = $(this).attr('role'); //определяем тип таба
        $('#'+ block).addClass('animated fadeInDown'); //открываем с анимацией
    });   

    // добавляем клас к боди при изменении размера
    $(window).bind("resize", function () { 
        var body = $('body');
        if ($(window).width() >= 992) {
            $('body').removeClass('sm-sidebar').removeClass('sidebar-show').removeClass('sidebar-small').addClass('bg-sidebar');
        } else if ($(window).width() <= 992 && $(window).width() >= 468) {
            $('body').removeClass('sm-sidebar').addClass('bg-sidebar sidebar-small');
        } else if ($(window).width() <= 468) {
            $('body').removeClass('bg-sidebar').addClass('sm-sidebar');
        }
    });
   

    // отображаем поле выбора даты и время при снятии галочки чекбокса - "Заказ на текущее врем" и наоборот 
    $(document).on('click', '#time-check', function(){
        if($(this).hasClass('active')){
            $('#selecttime').fadeIn('slow');
            $(this).removeClass('active');
        }else{
            $('#selecttime').fadeOut('slow');
            $(this).addClass('active');
        }
    }
    );


    //дата время настройки для бутстраповского календарика
    $(document).on('mouseenter', '#datetimepicker1', function(){
        $('#datetimepicker1').datetimepicker({
            language: 'ru',
            format: 'HH:MM DD.MM.YYYY',
            minDate: new Date()

        });
    });
    //дата время

    $(document).on('click', '.answer-select', function(){
        var question = $(this).attr('data-quest');
        var answer = $('.question .active input[type="radio"]').attr('value') ? $('.question .active input[type="radio"]').attr('value') : 0;
        var article = $(this).closest('form').attr('data-article');
        var dtry = $(this).closest('form').attr('data-try');
        var theme = $('body').attr('theme-id');
        if(answer != 0)
        {
            question_next(theme, article, question, answer,  parseInt(dtry));
        } else {
            alertify.error('Ответ не выбран!!!');
        }
    });

    $(document).on('click', '.question input[type="radio"]', function(){
        if(!$(this).hasClass('active')) {
            $('.question input[type="radio"]').closest('label').removeClass('active');
            $(this).closest('label').addClass('active');
        }
    });

    /* Open close right sidebar */
    $('.nav-menu-btn').on('click',function(){
        var body = $('body');
        if ($(window).width() >= 480) {
            if(body.hasClass('sidebar-small')){
                $('body').removeClass('sidebar-small');
            } else {
                $('body').addClass('sidebar-small');            }   
        } else {
            $('body').removeClass('bg-sidebar').addClass('sm-sidebar').toggleClass('sidebar-show');
        }
    });

    //Загрузка страниц через ajax
    $('.menu1 li a').on('click',function(){
        var page = $(this).attr('data-page'); // акшен
        var parent_page = $(this).closest('ul').attr('data-parent'); //контроллер
        var id = $(this).attr('data-id'); //id
        var name = $(this).text(); //name theme
        load_page(page, parent_page, id, name);
    });
    
    

     /* get modal */
     //отправление параметров в форму
    $('body').on('click','.get-modal',function(e){
        e.preventDefault();
        //определеяем страницу
        var page = $('body').attr('data-page');
        //определяем контроллер
        var controller = $('a[data-page="' + page + '"]').closest('ul').attr('data-parent');
        //определеяем изменение это или добавление
        var type = $(this).attr('data-type') == 'update' ? 1 : 0;
        var cont = page;
        
        //при изменении берем ид изменяемого элемента, при добавлении предка его предка, для переопределения предка элемента,
        // например у населенного пункта нужно изменить регион, но регион можно выбрать только из текущей страны
        var id = $(this).attr('data-id');
        show_modal(cont, type, id);

    });
    /* get modal */

});
//вызов формы изменить и добавить
function show_modal (cont, type, id){
    var page = $('body').attr('data-page');
    var controller = $('a[data-page="' + page + '"]').closest('ul').attr('data-parent');
    $.ajax({
        type: "GET",
        url: '/' + controller + '/form/',
        data:{
            'cont':cont,
            'type':type,
            'id':id
        },
        cache: "false",
        success: function(data){
            
            $("#mymodal").addClass(cont);
            $('#mymodal').modal('show');
            $("#mymodal .modal-content .modal-body").html(data);
            
            $('#mymodal').on('hidden.bs.modal', function (e) {
                $("#mymodal .modal-content .modal-body").empty();
            });
            
        }
    });
}


    function question_next(theme, article, question, answer, dtry) {
        $.ajax({
            type: "GET",
            url: '/psm/questionnext/' + theme + '/' + article + '/' + question + '/' + answer + '/' + dtry + '/',
            data:{},
            cache: "false",
            success: function(data){
                
                if(data && data == 'finish'){
                    alertify.success('Тема изучена!');
                } else if (data && data == 'error') {
                    alertify.error('Ответ НЕверный!');
                    dtry = dtry + 1;
                    $('form.question').attr('data-try', dtry);
                    anchor_article(article);
                } else if (data) {
                    alertify.success('Ответ верный!');
                    dtry = dtry - 1 >= 0 ? dtry - 1 : 0;
                    $('.block-question').html(data);
                    $('form.question').attr('data-try', dtry);
                }
                
            }
        });
    }


    function anchor_article (article) {
        var article = 'article-' + article;
        if ($(article).length != 0) { 
            $('html, body').animate({ scrollTop: $(article).offset().top }, 500); 
        }
    }

    //Загрузка страниц
    function load_page(page, parent_page='psm', id, name){
        $.ajax({
            type: "POST",
            url: '/' + parent_page + '/theme/' + id + '/' + name + '/',
            data:{},
            cache: "false",
            success: function(data){
                $(".wrap.cont").html(data);

            }
        });
        //меняем урл
        window.location.hash = '!' + page;
        $('body').attr('data-page',page);
        $('body').attr('theme-id',id);
    }



