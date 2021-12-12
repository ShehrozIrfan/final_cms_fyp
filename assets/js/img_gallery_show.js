function insertData(elm) {
    var closest = elm.closest('.parent-gallery');
    var image_one_html = closest.find('#imgOne');
    var image_two_html = closest.find('#imgTwo');
    var image_three_html = closest.find('#imgThree');

    $("#carouselSlideOne").html(image_one_html.html());
    $("#carouselSlideTwo").html(image_two_html.html());
    $("#carouselSlideThree").html(image_three_html.html());
}

$(document).on('click', '#galleryImgOne', function(e) {
    var elm = $(e.target);
    $('#galleryModal').modal('show');
    insertData(elm);
})

$(document).on('click', '#galleryImgTwo', function(e) {
    var elm = $(e.target);
    $('#galleryModal').modal('show');
    insertData(elm);
})

$(document).on('click', '#galleryImgThree', function(e) {
    var elm = $(e.target);
    $('#galleryModal').modal('show');
    insertData(elm);
})