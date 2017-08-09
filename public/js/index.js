var postId = 0;
var post = null;

$('.edit').click(function(event) {
    event.preventDefault();

    post = event.target.closest('.post');
    postId = $(post).data('postid');

    var postBody = $(post).find('p').text();

    $('#post-body').val(postBody);
    $('#edit-modal').modal('show');
});

$('#modal-save').on('click', function () {

    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {
            body: $('#post-body').val(), postId: postId, _token: token
        }
    })
    .done(function (data) {
        $(post).find('p').text(data.new_body);
        $('#edit-modal').modal('hide');
    });

});

$('.like').on('click', function (event) {
    event.preventDefault();
    var isLike = event.target.previousElementSibling == null;
    post = event.target.closest('.post');
    postId = $(post).data('postid');

    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {
            isLike: isLike, postId: postId, _token: token
        }
    })
    .done(function (data) {
        if (isLike) {
            if (event.target.innerText == 'Like') {
                event.target.innerText = 'You like this post';
            } else {
                event.target.innerText = 'Like';
            }

            event.target.nextElementSibling.innerText = 'Dislike';
        } else {
            if (event.target.innerText == 'Dislike') {
                event.target.innerText = 'You don\'t like this post';
            } else {
                event.target.innerText = 'Dislike';
            }

            event.target.previousElementSibling.innerText = 'Like';
        }

        console.log(event.target.innerText);
    });
    console.log(isLike);

});
