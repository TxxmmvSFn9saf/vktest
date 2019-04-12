var paymoComission = 1;

$(function() {
    $("#modalPaymoOpener").click(function() {
        $('[data-remodal-id=modal]').remodal({
            closeOnOutsideClick: false
        }).open();
        return false;
    });

    $("[data-remodal-action]").click(function() {
        $("#paymoWinTitle").html("").hide();
        $("#paymoForm").show();
        $("#paymo_frame").remove();
    });

    $("[name=account]").mask("9999999999999");

    var $modalForm = $('#paymoForm');

    $('#paymoWin').find('[name=amount]').bind("keyup", function() {
        $('#paymoWinTotal').html(getAmount($(this).val()));
    });

    $('#footerPaymo').find('[name=amount]').bind("keyup", function() {
        $('#paymoFooterTotal').html(getAmount($(this).val()));
    });

    $modalForm.validate({
        rules: {
            account: {
                required: true,
                minlength: 13,
                maxlength: 13,
                digits: true
            },
            amount: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function () {

            $("#paymoForm").hide();

            var $am = $modalForm.find("[name=amount]");
            var $acc = $modalForm.find("[name=account]");
            var $email = $modalForm.find("[name=email]");
            var ins = $modalForm.find("[name=ins]").is(":checked");

            $("#paymoWinTitle").html("Платёж по ЛС №" + $acc.val()).show();

            PaymoFrame.set({
                parent_id: "paymoFrame",
                api_key: "ef063acc-34fe-4f9a-9ce1-12477b42bd53",
                tx_id: getTxID($acc.val(), ins),
                description: $acc.val(),
                amount: getAmount($am.val()) * 100,
                success_redirect: "http://vkcomfort.ru/",
                fail_redirect: "http://vkcomfort.ru/",
                rebill: {},
                extra: {
                    email: $email.val(),
                    ls: $acc.val()
                },
                version: "2.0.0"
            });

            return false;
        },
        errorElement : 'div',
        errorPlacement: function(error, element)
        {
            error.insertAfter(element);
        }
    });


    $("#closeFooterPaymo").click(function() {
        $("#paymo_frame").remove();
        $("#paymoFooterForm").show();
        $("#footerPaymo").find("h3").html("Оплатить ЖКУ");
        $(this).hide();
    });


    var $footerForm = $('#paymoFooterForm');
    $footerForm.validate({
        rules: {
            account: {
                required: true,
                minlength: 13,
                maxlength: 13,
                digits: true
            },
            amount: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function () {

            $("#paymoFooterForm").hide();

            var $am = $footerForm.find("[name=amount]");
            var $acc = $footerForm.find("[name=account]");
            var ins = $footerForm.find("[name=ins-footer]").is(":checked");
            var $email = $footerForm.find("[name=email]");

            $("#footerPaymo").find("h3").html("ЛС №" + $acc.val());
            $("#closeFooterPaymo").show();

            PaymoFrame.set({
                parent_id: "paymoFooterContainer",
                api_key: "ef063acc-34fe-4f9a-9ce1-12477b42bd53",
                tx_id: getTxID($acc.val(), ins),
                description: $acc.val(),
                amount: getAmount($am.val()) * 100,
                success_redirect: "http://vkcomfort.ru/",
                fail_redirect: "http://vkcomfort.ru/",
                rebill: {},
                extra: {
                    email: $email.val(),
                    ls: $acc.val()
                },
		  version: "2.0.0"
            });

            return false;
        },
        errorElement : 'div',
        errorPlacement: function(error, element)
        {
            error.insertAfter(element);
        }
    });

});

function getTxID(acc, ins) {
    var d = new Date();

    var tx = acc + "-" + d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

    if(ins) {
        tx += "-insurance=1";
    } else {
        tx += "-insurance=0";
    }

    return tx;
}

function getAmount(amount) {
    var amount = parseFloat(amount).toFixed(2);

    var sum = amount;
    if (amount > 0) {
        //amount = parseFloat(amount) + parseFloat(((amount / 100) * paymoComission).toFixed(2));
        amount = (amount / 0.99).toFixed(2);
    } else {
        amount = 0;
    }

    return amount;
}

