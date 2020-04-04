$.validator.addMethod("username_regex", function(value, element) {

return this.optional(element) || /^[a-z0-9\.\-_]{3,30}$/i.test(value);

}, "Please choise a username with only a-z 0-9.");