$(document).ready(function() {

    if($(window).width() < 1010) {
        if(window.location.pathname != '/') {
            $(".sidebar_map_container").remove();
        }
    }

	$('.header_slider').bxSlider({
  auto: true,
		autoControls: false
});
    $('.home_banner').bxSlider({
  auto: true,
		autoControls: false,
        controls: false
});

//	$('.header_slider').bxSlider();

	var customSelect1 = $('.custom_select_1 select').selectBoxIt({
		autoWidth:false
	});




	$('.mobile_menu_button').click(function(e){
		$('#menu > ul').slideToggle(200, function(){
			if ($('#menu > ul').is(':visible')) {
				$('#menu > ul').addClass('expanded');
			} else {
				$('#menu > ul').removeClass('expanded');
			}
			$('#menu > ul').removeAttr('style');
		});
		e.preventDefault();
	});

	$('.mobile_side_menu_button').click(function(e){
		$('.inner_side_menu_mobile').slideToggle(200, function(){
			if ($('.inner_side_menu_mobile').is(':visible')) {
				$('.inner_side_menu_mobile').addClass('expanded');
			} else {
				$('.inner_side_menu_mobile').removeClass('expanded');
			}
			$('.inner_side_menu_mobile').removeAttr('style');
		});
		e.preventDefault();
	});

	/*$('.submenu_trigger_mobile').click(function(e){
		$('.submenu_trigger_mobile ~ ul').slideToggle(200, function(){
			if ($('.submenu_trigger_mobile ~ ul').is(':visible')) {
				$('.submenu_trigger_mobile ~ ul').addClass('expanded');
			} else {
				$('.submenu_trigger_mobile ~ ul').removeClass('expanded');
			}
			$('.submenu_trigger_mobile ~ ul').removeAttr('style');
		});
		e.preventDefault();
	});*/
	$('.submenu_trigger_mobile').click(function(e){
	    $('.submenu_trigger_mobile ~ ul').removeClass('expanded');

	    var $subm = $(this).closest("li").find("ul");

	    $subm.slideToggle(200, function(){
	        $subm.addClass('expanded');
	        $('.submenu_trigger_mobile ~ ul').not($subm).removeAttr('style');
        });
        e.preventDefault();
    });

	$('#services_show_more').click(function(e){
		$('.home_more_servises_box').slideToggle(200);

		if ($('#services_show_more').html()=='Показать больше услуг'){
			$('#services_show_more').html('Показать меньше услуг');
			$('#services_show_more').removeClass('services_show_more1');
			$('#services_show_more').addClass('services_show_less1');

		}
		else {
			$('#services_show_more').html('Показать больше услуг');

			$('#services_show_more').removeClass('services_show_less1');
			$('#services_show_more').addClass('services_show_more1');
		}

		e.preventDefault();
	});

	$("select#messageSelectObject").change(function(){

        $.getJSON("http://vkcomfort.ru/selectObject/" + $(this).val() + "/",  function(data){
            var options = '';

            for (var i = 0; i < data.length; i++) {

				$("select#messageSelectAddress").data("selectBox-selectBoxIt").add(
					{value: data[i].optionValue, text: data[i].optionDisplay}
				);
            }




        })
    })

	$("select#SelectObject").change(function(){


        $.getJSON("http://vkcomfort.ru/selectObject/" + $(this).val() + "/",  function(data){
            var options = '';

            for (var i = 0; i < data.length; i++) {

				$("select#SelectAddress").append('<option value=' + data[i].optionValue +'>' + data[i].optionDisplay + '</option>');

            }
        });
    });

	$("select#messageSelectTheme").change(function(){

	    $.getJSON("/selectSubject/" + $(this).val() + "/",  function(data){
	        $("select#messageSelectSubject").find("option").not(":first").remove();

            for (var i = 0; i < data.length; i++) {

                $("select#messageSelectSubject").data("selectBox-selectBoxIt").add(
                    {value: data[i].optionValue, text: data[i].optionDisplay}
                );
            }
        });
    });

	$("select#subject").change(function(){

        var id = $(this).children(":selected").attr("id");
		if (id == 20)
		{
			$("#textarea").val("Отказываясь от оплаты услуг, вы соглашаетесь на возврат страховой премии от «ВК Комфорт».\r\n-------------------------------\r\n");
		}
		else
		{
			$("#textarea").val('');
		}
    });


});

function showSubMenu(id)
	{
		$('#'+id).toggle('slow');

	}

function showObject(id) {
		//code
		$(".n").hide();
		$(".m").hide();
		$('#object_'+id).show();
		$('#newsObject_'+id).show();
	}

function hideObject(id) {
    //code
    //alert(id)
    //$(".marker_" + id).css({"z-index": 1});
}




