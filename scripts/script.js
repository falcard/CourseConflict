$(document).ready(function () {
    $.getJSON("getDept.php", success = function(data)
    {
       var options = "";
       
       for(var i = 0; i < data.length; i++)
       {
           options += "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
       }
       
       $("#slctDept").append(options);
       
       $("#slctDept").change();
    });
    
    $("#slctDept").change(function()
    {
        $.getJSON("getCourse.php?department=" + $(this).val(), success = function(data)
        {
            var options = "";
       
            for(var i = 0; i < data.length; i++)
            {
               options += "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
            }
            
            $("#slctCourse").html("");            
            $("#slctCourse").append(options);
       });
    });
});