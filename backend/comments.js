$(document).ready(function() {
    // Comment form submission
    $('#dessertscommentForm').submit(function(event) {
        event.preventDefault();

        var commentText = $('textarea[name="comment_text"]').val();
        var dessertId = $('#dessertId').val(); 
        var username = $(this).data('username');

        $.ajax({
            url: '../backend/add_comment.php',
            method: 'POST',
            data: { comment_text: commentText, dessert_id: dessertId, username: username },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Comment added successfully
                    var commentId = response.commentId;
                    var commentHtml = '<div class="comment">' +
                        '<p>' + commentText + '</p>' +
                        '<p>Posted by: ' + username + '</p>' +
                        '</div>';
                    $('.comment-list').append(commentHtml);

                    // Clear comment textarea
                    $('textarea[name="comment_text"]').val('');
                } else {
                    // Display error message
                    alert('Failed to add comment.');
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    $('#drinkscommentForm').submit(function(event) {
        event.preventDefault();
    
        var commentText = $('textarea[name="comment_text"]').val();
        var drinkId = $('#drinkId').val(); 
        var username = $(this).data('username');
    
        $.ajax({
            url: '../backend/add_comment.php',
            method: 'POST',
            data: { comment_text: commentText, drink_id: drinkId, username: username },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Comment added successfully
                    var commentId = response.commentId;
                    var commentHtml = '<div class="comment">' +
                        '<p>' + commentText + '</p>' +
                        '<p>Posted by: ' + username + '</p>' +
                        '</div>';
                    $('.comment-list').append(commentHtml);
    
                    // Clear comment textarea
                    $('textarea[name="comment_text"]').val('');
                } else {
                    // Display error message
                    alert('Failed to add comment.');
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    
});
