  $(document).ready(function()
  {
      $("#currenttime").change(function()
      {
          if($("#currenttime").prop("checked"))
          {
              var date = new Date();
              var hours = date.getHours();
              var minutes = date.getMinutes();

              hours = hours % 12;

              if(hours < 10)
                  hours = "0"+hours;

              if(minutes < 10)
                  minutes = "0"+minutes;

              time = hours+":"+minutes;
              
              $("#timeofcrime").val(time);
          }
      });

    $("#currentdate").change(function()
    {
        if($("#currentdate").prop("checked"))
        {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();

            if(month < 10)
              month = "0"+month;

            if(day < 10)
              day = "0"+day;

            var current_date = year+"-"+month+"-"+day;
            $("#dateofcrime").val(current_date);
        }

    });

  });