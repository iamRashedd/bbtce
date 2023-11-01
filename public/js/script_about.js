$(document).ready(function() {
    $(".invisible_cont").hide();
    $(document).on('click', "#btn", function() {
        var moreLessButton = $(".invisible_cont").is(":visible") ? 'Read More' : 'Read Less';
        $(this).text(moreLessButton);
        $(this).parent(".about").find(".invisible_cont").toggle();
        $(this).parent(".about").find(".visible_cont").toggle();

    });
});