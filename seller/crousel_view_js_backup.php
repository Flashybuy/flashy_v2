var check2 = document.getElementsByName('ch[]');
              var vas2 ="";

              for(var i=0, n=check2.length;i<n;i++) 
              {
                if (check2[i].checked)
                {
                   vas2 += ","+check2[i].value;
                  alert(vas2);
                }
              }
              if (vas2) vas2 = vas2.substring(1);
                  $.ajax({
                        url:"admin/multi_status_update.php/"+vas2,
                        data:{'status':vas2,'id':check2},
                        success:function(data){
                         $("#delete_modal").modal("show");

                        }
                  });


              });