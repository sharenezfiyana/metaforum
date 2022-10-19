$(document).ready(function(){
    $("#ckeditor").hide();
    // $("#post").show();
    // $("#category").show();
    // $("#topic").show();
    $("#create-thread").click(function(){
        $("#ckeditor").show();
        $("#create-thread").hide();
        $("#categoryckeditor").hide();
        $("#topikckeditor").hide();
        $("#postckeditor").hide();
    });
});