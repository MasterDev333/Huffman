(function ($) {
    "use strict";
	var param_page = 1;
	var limit_resource = 12;
    $(document).ready(function () {
		// param_page = getformCookie('resource_page');
        var $am_resource_posts = $('#ajaxResources'), am_resource_form = $('#resource-filter');
        var e_has_more_posts = false, paged = 1, ajax_loading = false, postslisted = 0;
        var am_resource_form_submit = function (num_paged) {

            var params = am_resource_form.serialize() + "&postslisted=" + postslisted;

			var change_limit = '';
            params += "&resource_type=resources";
            
            if(param_page!== null && param_page > 1){
                change_limit = (param_page * limit_resource);
                num_paged = 1;
                params += "&change_limit=" + parseInt(change_limit);
            }else{
                params += "&change_limit=";
            }

            postslisted = (num_paged === 1) ? 0 : postslisted;
            params += "&paged=" + num_paged;
            $.ajax({
                type: "post",
                dataType: "json",
                url: ajaxurl,
                data: params,
                beforeSend: function () {
                    $('.load-more').removeClass('hidden');
                    if (num_paged === 1) {
                        $am_resource_posts.html('');
                    }
                },
                success: function (response) {
                    var newElems = $(response.content).css({opacity: 0});
                    newElems.animate({opacity: 1});
                    $('.load-more').addClass('hidden');
                    $am_resource_posts.append(response.content);

                    if (response.hasMore === true) {
                        paged = response.paged;
                        e_has_more_posts = true;
                    } else {
                        e_has_more_posts = false;
                    }
                    ajax_loading = false;
                    if(param_page!== null && param_page > 1){							
                            paged = parseInt(param_page) + 1;											
                            param_page = null;	
                        // read blog article from Blog cookie
                        var resourceArticleID = getformCookie('resource_id');					
                        setTimeout(function(){
                            if (resourceArticleID != "" && $("#resource-"+resourceArticleID).length) {
                                //console.log('Article:'+blogArticleID);
                                $('html,body').animate({
                                    scrollTop: $("#resource-"+resourceArticleID).offset().top
                                });
                            }
                        }, 2000);
                    }
                    postslisted = response.postslisted;

                }
            });

            console.log(params);
        };
		// // scroll to bottom
		// if(param_page!== null && param_page > 1){
		// 	$('html,body').animate({
		// 	   scrollTop: $(".r-sub-s").offset().top
		// 	}, 'slow');
		// }

        var formInitialData = $('#resource-filter').serialize();

        var filterActive = false;

        function formValueCampare() {

            if (formInitialData != $('#resource-filter').serialize()) {
                $('#resource-filter .reset-btn').addClass('active');
                filterActive = true;
            } else {
                $('#resource-filter .reset-btn').removeClass('active');
                filterActive = false;
            }

        }

      

        // $(document).on('click', '#resource-filter .r-search-bar-form .clear-s', function () {
        //     $('#resource-filter .reset-btn').trigger('click');
        // });
        
        // Show dropdown
        $('.box-searching_value').on('click', function() {
            let $parent = $(this).closest('.box-searching_row');
            let $dropdown = $('.box-searching_dropdown', $parent);
            if( !$dropdown.hasClass('active') && $('.box-searching_dropdown.active').length ) {
                $('.box-searching_dropdown.active').removeClass('active');
            }
            if( !$(this).hasClass('show') && $('.box-searching_value.show').length ) {
                $('.box-searching_value.show').removeClass('show')
            }
            $dropdown.toggleClass('active');
            $(this).toggleClass('show');
        });

        $('.form-searching__alt .input-searching-text').on('focus', function(e) {
            $('#resource-filter').fadeIn(300);
            $('body').addClass('show-filter');
            e.preventDefault();
            e.stopPropagation();
        });

        $('#resource-filter .box-searching_dropdown input[type=checkbox]:checked').each(function() {
            let $parent = $(this).closest('.box-searching_row');
            let $value = $('.box-searching_value', $parent);
            let valArr = [], valStr;
            $('input[type=checkbox]:checked', $parent).each(function() {
                valArr.push($(this).attr("data-value"));
            });
            if( valArr.length > 0 ) {
                $value.addClass('active');
                valStr = valArr.join(', ');
            }
            $value.html(valStr);
        });

        $('#resource-filter .box-searching_dropdown input[type=checkbox]').on('change', function() {
            let $parent = $(this).closest('.box-searching_row');
            let $value = $('.box-searching_value', $parent);
            let valArr = [], valStr;
            $('input[type=checkbox]:checked', $parent).each(function() {
                valArr.push($(this).attr("data-value"));
            });
            if( valArr.length > 0 ) {
                $value.addClass('active');
                valStr = valArr.join(', ');
            }
            else {
                $value.removeClass('active');
                if( $value.attr('id') == 'type' ) {
                    valStr = 'Choose asset type';
                } else {
                    valStr = 'Choose category';
                }
            }
            $value.html(valStr);
        });

        var inputValue = $('#keywords').val();
        var defaultCheckboxCheckedLength = $('#resource-filter .box-searching_dropdown input[type=checkbox]:checked');

        if (inputValue || defaultCheckboxCheckedLength.length > 0) {
            $('#resource-filter .reset-btn').addClass('active');

            filterActive = true;

            setTimeout(function () {
                am_resource_form_submit(1);
            }, 100);
        } else {
            am_resource_form_submit(1);
        }

        jQuery('#resource-filter').submit(function (e) {
            setformCookie('resource_page', paged, 1);
            formValueCampare();
            am_resource_form_submit(1);
            $('body').removeClass('show-filter');
            $('.box-searching_dropdown.active').removeClass('active');            

            if(window.matchMedia("(max-width: 768px)").matches) {
                $(this).fadeOut();
            }

            $('html, body').animate({
                scrollTop: $('#ajaxResources').offset().top
            }, 1000);

            e.preventDefault();
        });

        $(window).scroll(function () {
            if ($(window).scrollTop() >= (($(document).height() - $(window).height()) - $('footer').height())) {
                if (e_has_more_posts === true && ajax_loading === false) {
                    ajax_loading = true;
					param_page = null;
                    setformCookie('resource_page', paged, 1);
                    am_resource_form_submit(paged);
                }
            }
        });
		
		$(document).on('click', '.i-link.post-resource',function(){ 
			var article_id = $(this).attr('id');
			setformCookie('resource_id', article_id, 1);
		});

    });
})(jQuery);