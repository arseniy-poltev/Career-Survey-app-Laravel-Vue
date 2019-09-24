var nameFields = $('#name', '#myhrsolutions_mybhcbundle_surveyregisteredtype_name');
var businessFields = $('#business', '#myhrsolutions_mybhcbundle_surveyregisteredtype_business');
var addressFields = $('#address', '#myhrsolutions_mybhcbundle_surveyregisteredtype_address');
var phoneFields = $('#phone, #myhrsolutions_mybhcbundle_surveyregisteredtype_client_phone');
var emailFields = $('#email', '#myhrsolutions_mybhcbundle_surveyregisteredtype_email');
var hiaMemberNumberFields = $('#myhrsolutions_mybhcbundle_surveyregisteredtype_hia_member_number');

var phoneRegExp = /^(\(?(\d{3})\)?\s?-?\s?(\d{3})\s?-?\s?(\d{4}))$/;

function validatePersonalDataForm() {
    var ok = true;
    nameFields.each(function(index) {
        var self = $(this);

        if ($.trim(self.val()) == '') {
            if (self.parent().find('span').length == 0) {
                self.parent().prepend("<span class='error'>This field is required!</span>");
            }
            ok = false;
        }
    });

    businessFields.each(function(index) {
        var self = $(this);
        if ($.trim(self.val()) == '') {
            if (self.parent().find('span').length == 0) {
                self.parent().prepend("<span class='error'>This field is required!</span>");
            }
            ok = false;
        }
    });

    addressFields.each(function(index) {
        var self = $(this);
        if ($.trim(self.val()) == '') {
            if (self.parent().find('span').length == 0) {
                self.parent().prepend("<span class='error'>This field is required!</span>");
            }
            ok = false;
        }
    });

    phoneFields.each(function(index) {
        var self = $(this);
        if (!phoneRegExp.test(self.val())) {
            if (self.parent().find('span').length == 0) {
                self.parent().prepend("<span class='error'>This phone number is not valid!</span>");
            }
            ok = false;
        }
    });

    emailFields.each(function(index) {
        var self = $(this);
        if ($.trim(self.val()) == '') {
            if (self.parent().find('span').length == 0) {
                self.parent().prepend("<span class='error'>This field is required!</span>");
            }
        } else {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(self.val())) {
                if ($('#email_confirmation').length == 1 && $.trim($('#email_confirmation').val()) != self.val()) {
                    if ($('#email_confirmation').parent().find('span').length == 0) {
                        $('#email_confirmation').parent().prepend("<span class='error'>This email is not valid!</span>");
                    }
                    ok = false;
                }
            } else {
                if (self.parent().find('span').length == 0) {
                    self.parent().prepend("<span class='error'>This email is not valid!</span>");
                }
                ok = false;
            }
        }
    });

    return ok;
}

nameFields.each(function(index) {
    var self = $(this);
    self.blur(function() {
        if ($.trim(self.val()) != '')
            self.parent().find('span').remove();
    });
});
businessFields.each(function(index) {
    var self = $(this);
    self.blur(function() {
        if ($.trim(self.val()) != '')
            self.parent().find('span').remove();
    });
});
addressFields.each(function(index) {
    var self = $(this);
    self.blur(function() {
        if ($.trim(self.val()) != '')
            self.parent().find('span').remove();
    });
});
phoneFields.each(function(index) {
    var self = $(this);
    self.blur(function() {
        if ($.trim(self.val()) != '' && phoneRegExp.test(self.val())){
            self.parent().find('span').remove();
        }
    });
});
emailFields.each(function(index) {
    var self = $(this);
    self.blur(function() {
        if ($.trim(self.val()) != '')
            self.parent().find('span').remove();
    });
});
$('#email_confirmation').blur(function() {
    if ($.trim($('#email_confirmation').val()) != '' && (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email_confirmation').val())) && $('#email_confirmation').val() == $.trim($('#email').val()))
        $('#email_confirmation').parent().find('span').remove();
});