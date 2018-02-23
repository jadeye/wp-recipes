jQuery(function($){
    $("#recipe_rating").bind( "rated", function () {
        $(this).rateit( "readonly", true);

        var form                =   {
            action:                 "r_rate_recipe",
            rid:                    $(this).data('rid'),
            rating:                 $(this).rateit('value')
        };

        $.post( recipe_obj.ajax_url, form, function (data) {
            
        })
    })

    $("#recipe-form").on("submit", function (e) {
        e.preventDefault();

        $(this).hide();
        $("#recipe-status").html('<div class="alert alert-info text-center">Please wait!</div>' );

        tinyMCE.triggerSave();
        var contents = $("#recipecontenteditor").val();

        var form            =   {
            action:             "r_submit_user_recipe",
            content:            contents,
            title:              $("#r_inputTitle").val(),
            ingredients:        $("#r_inputIngredients").val(),
            time:               $("#r_inputTime").val(),
            utensils:           $("#r_inputUtensils").val(),
            level:              $("#r_inputLevel").val(),
            meal_type:          $("#r_inputMealType").val()
        };
        
        $.post( recipe_obj.ajax_url, form).always( function (response) {
            if (response.status == 2){
                showMsg(260);
                $('#recipe-status').html(
                    '<div class="alert alert-success">Recipe submitted successfully!</div>'
                ).fadeIn().delay(5000).fadeOut();
                console.log("GOOD FORM");
            } else {
                showMsg(320);
                /*$('html, body').animate({
                    scrollTop: $("#recipe-status").offset().top-100
                }, 500);*/
                $('#recipe-status').html(
                    '<div class="alert alert-danger">Unable to submit recipe. Please fill in all the fields.</div>'
                ).fadeIn().delay(5000).fadeOut();
                $("#recipe-form").show();
                console.log("EMPTY FORM");
            }
        });

        function showMsg(goto) {
            $('html, body').animate({
                scrollTop: $("#recipe-status").offset().top-goto
            }, 500);
        }
    });
});