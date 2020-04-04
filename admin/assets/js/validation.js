    $(function () {
        $("#firstname").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");
            }
 
            return isValid;
        });
    });



        $(function () {
        $("#lastname").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lastname").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lastname").html("Only Alphabets allowed.");
            }
 
            return isValid;
        });
    });


        $(document).ready(function()

{

$("#form_register").validate(

{

rules:{

'firstname':{

required: true,

minlength: 1

},

'lastname':{

required: true,
},

'email':{

required: true,
},

'shp_name':{

required: true,

},

'email':{

required: true,
},

'company':{

required: true,
},

'category':{

required: true,
},


'radio11':{

required: true,
},




'b_number':{

required: true,
},


},

messages:{

'firstname':{

required: "The name field is required!"
},

'lastname':{

required: "The Last field is required!"
},

'shp_name':{

required: "The Shopname field is required!"
},

'email':{

required: "The Email is required!"
},

'company':{

required: "The Company Name  is required!"

},

'category':{

required: "The Category field is required!"
},

'radio11':{

required: "Must be select VAT!"

},



}

});

});

  

