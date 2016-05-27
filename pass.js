
$(document).ready(function()
{
    var inputs = 
    {
        permission: "",
        object: "",
        username: "",
        thread: "",
        post: "",
        content: ""
    };
    
    var indexname = ""; //id of input box
    
    $(".input-wrapper").keyup(function(event)
    {
        indexname = event.target.id;
        inputs[indexname] = $(event.target).val();

        //$('#test').append($(event.target).val());
    });
    
    $('#change').click(function()
    {
        $('#test').empty();
        
        $.post("forum.php", {user_input: inputs}, function(data)
        {;
            $('#test').empty();
            $('#test').append(data);
            //console.debug(data);
            
        });
    });
    

    
    
});
