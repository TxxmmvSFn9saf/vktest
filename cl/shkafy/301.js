$(function() {
    $('.center').slick({
        centerMode : true,
        centerPadding : '60px',
        slidesToShow : 3,
        responsive : [ {
            breakpoint : 768,
            settings : {
                arrows : false,
                centerMode : true,
                centerPadding : '40px',
                slidesToShow : 2
            }
        }, {
            breakpoint : 480,
            settings : {
                arrows : false,
                centerMode : true,
                centerPadding : '40px',
                slidesToShow : 1
            }
        } ]
    });

    $(".kl-container-2-mask").height($(".kl-container-2").height());

    /*$(".kl-container-2").resize(function() {
        $(".kl-container-2-mask").height($(".kl-container-2").height());
    });*/

    $("button.solution").click(function() {
        var solution = $(this).closest(".kl-container-2-block").find("strong").text();
        $("[name=solution]").val(solution);

        $('[data-remodal-id=kl-modal-solution]').remodal({
            closeOnOutsideClick : false
        }).open();
        return false;
    });

    $("#kl-form1").validate({
        errorPlacement : function(error, element) {
            return false;
        },
        submitHandler : function(f) {
            if (!$(f).find("[type=checkbox]").is(":checked")) {
                $(f).find(".agree-error").show();

                return false;
            }
            return true;
        },
        rules : {
            name : {
                required : true
            },
            phone : {
                required : true,
                number : true
            }
        }
    });

    $("#kl-form-2").validate({
        errorPlacement : function(error, element) {
            return false;
        },
        submitHandler : function(f) {
            if (!$(f).find("[type=checkbox]").is(":checked")) {
                $(f).find(".agree-error").show();

                return false;
            }
            return true;
        },
        rules : {
            name : {
                required : true
            },
            phone : {
                required : true,
                number : true
            }
        }
    });

    $("#kl-form-3").validate({
        errorPlacement : function(error, element) {
            return false;
        },
        submitHandler : function(f) {
            if (!$(f).find("[type=checkbox]").is(":checked")) {
                $(f).find(".agree-error").show();

                return false;
            }
            return true;
        },
        rules : {
            name : {
                required : true
            },
            phone : {
                required : true,
                number : true
            }
        }
    });

});
