var url='http://proyecto-laravel.devel';
window.addEventListener("load",function(){
    
    $('.btn-like').css('cursor','pointer');
    $('.btn-dislike').css('cursor','pointer');
    
    function like(){
        $('.btn-like').unbind('click').click(function (){
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src','/img/heart-red.png');
            
            $.ajax({
                url: url+'/like/' + $(this).data('id'),
                type: 'GET',
                success: function (response){
                    if (response.like){
                        console.log('Has dado like');
                    }else{
                        console.log('Ha fallado el like');
                    }                   
                }
                
            });
            
            dislike();
        });
    }
    like();
    function dislike(){
        $('.btn-dislike').unbind('click').click(function (){
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src','/img/heart-black.png');
            
            $.ajax({
                url: url+'/disLike/' + $(this).data('id'),
                type: 'GET',
                success: function (response){
                    if (response.like){
                        console.log('Has dado dislike');
                    }else{
                        console.log('Ha fallado el dislike');
                    }                   
                }
                
            });
            like();
        });
    }
    dislike();
    
    $('#search-form').submit(function(){
        $(this).attr('action','/user/index/'+$('#search-form #search').val());
        
    });
    
    
});


