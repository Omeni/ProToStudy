$(document).ready(function(){
    


    $(document).on('keypress', 'input[mylist]', function(event){
        var _this = '#' + $(this).attr('mylist');
        if(!$(_this).hasClass('active')){
            var width = $(this).outerWidth();
            var height =  $(this).outerHeight();
            var position = $(this).position();
            $(_this).addClass('active').fadeIn();
            $(_this).css('width', width);
            $(_this).css('top', position.top + height);
            $(_this).css('left', position.left);
        }
        

    });

    $(document).on('click', '.myautocomplete.active li',  function(event){
        var id = $('.myautocomplete.active').attr('id');
        var val = $(this).attr('value');
        var text = $(this).text();
        $('input[mylist="' + id + '"]').attr('data-id', val);
        $('input[mylist="' + id + '"]').val(text);
        $('.myautocomplete.active').removeClass('active').fadeOut();

    });

    $(document).on('click', 'input[mylist]', function(event){
        var _this = '#' + $(this).attr('mylist');
        if(!$(_this).hasClass('active')){
            var width = $(this).outerWidth();
            var height =  $(this).outerHeight();
            var position = $(this).position();
            $(_this).addClass('active').fadeIn();
            $(_this).css('width', width);
            $(_this).css('top', position.top + height);
            $(_this).css('left', position.left);
        }else{
            $('.myautocomplete.active').removeClass('active').fadeOut();
        }
    });

    
});

