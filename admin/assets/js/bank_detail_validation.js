$(document).ready(function()
{

$("#details").validate(

{

rules:{

'acount_holder':{

required: true,

minlength: 1

},

'bank':{

required: true,
},

'branch':{

required: true,
},

'branch_code':{

required: true,

}
},

messages:{

'acount_holder':{

required: "Account holder field require!"
},

'bank':{

required: "The bank field is required!"
},

'branch':{

required: "The branch field is required!"
},

'branch_code':{

required: "The branch code is required!"
},
}
});

});

  

