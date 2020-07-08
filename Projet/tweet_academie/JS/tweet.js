$(document).ready(() => {

    $('.get-tweet').load('PHP/get_tweet..php');
    $('.trendings').load('PHP/trend..php');

    $('.form-tweet').submit((event) => {
        event.preventDefault();

        let tweet = $('#tweet').val();
        if (tweet) {
            $('#tweet-error').html('');
            $.ajax({
                type: 'POST',
                url: 'PHP/tweet..php',
                data: {
                    tweet: tweet,
                },
                success: () => {
                    $('#tweet').val('');
                    $('.get-tweet').load('PHP/get_tweet..php');
                    $('.trendings').load('PHP/trend..php');
                },
            })
        } else {
            $('#tweet-error').css({
                color: 'red',
                fontWeight: 'bold',
                textDecoration: 'underline',
            }).html('You can\'t send an empty tweet !');
        }
    });
});