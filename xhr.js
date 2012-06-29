$(function(){
        
    $('form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type:'PUT',
                url:'/index.php',
                data:{
                    'uploaded_file':$('input[type=file]').val()
                },
                success:function(d,s,xhr){
                    console.log(d)
                }
            })
    })        
})
