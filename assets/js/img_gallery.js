var img_one_html = $("#imgOne").html();
var img_two_html = $("#imgTwo").html();
var img_three_html = $("#imgThree").html();

function insertData() {
    $("#carouselSlideOne").html(img_one_html);
    $("#carouselSlideTwo").html(img_two_html);
    $("#carouselSlideThree").html(img_three_html);
}

$(document).on('click', '#galleryImgOne', function() {
    $('#galleryModal').modal('show');
    insertData();
})

$(document).on('click', '#galleryImgTwo', function() {
    $('#galleryModal').modal('show');
    insertData();
})

$(document).on('click', '#galleryImgThree', function() {
    $('#galleryModal').modal('show');
    insertData();
})