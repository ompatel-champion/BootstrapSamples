$(document).ready(function()
{
    var tr,td,cell;
    td=$("td").length;
    tr=$("tr").length;
    cell=td/(tr-1);//one tr have that much of td
    //alert(cell);
    $("td").keydown(function(e)
    {
        switch(e.keyCode)
        {

            case 37 : var first_cell = $(this).index();
                if(first_cell==0)
                {
                    $(this).parent().prev().children("td:last-child").focus();
                }
                else
                    $(this).prev("td").focus();break;//left arrow
            case 39 : var last_cell=$(this).index();
                if(last_cell==cell-1)
                {
                    $(this).parent().next().children("td").eq(0).focus();
                }
                $(this).next("td").focus();break;//right arrow
            case 40 : var child_cell = $(this).index();
                $(this).parent().next().children("td").eq(child_cell).focus();break;//down arrow
            case 38 : var parent_cell = $(this).index();
                $(this).parent().prev().children("td").eq(parent_cell).focus();break;//up arrow
        }
        if(e.keyCode==113)
        {
            $(this).children().focus();
        }
    });
    // $("td").focusin(function()
    // {
    //     $(this).css("outline","solid steelblue 3px");//animate({'borderWidth': '3px','borderColor': '#f37736'},100);
    // });
    // $("td").focusout(function()
    // {
    //     $(this).css("outline","none");//.animate({'borderWidth': '1px','borderColor': 'none'},500);
    // });

});