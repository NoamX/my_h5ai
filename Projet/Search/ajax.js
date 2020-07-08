$(document).ready(() => {
    $('#search').keyup(() => {
        let value = $('#search').val();
        if (!value) {
            $('.films').html('');
        } else {
            $('#search-error').html('');
            $.ajax({
                type: 'POST',
                url: 'search..php',
                data: {
                    search: value,
                },
                success: (data) => {
                    $('.films').html(data);
                },
            })
        }
    })

    $('.form-search').submit((event) => {
        event.preventDefault();
        $('.films').html('');
        let search = $('#search').val();
        if (!search) {
            $('.films').append('');
            $('#search-error').css({
                color: 'red',
                textDecoration: 'underline',
                fontWeight: 'bold',
            }).html('Please fill all the fields !');
        } else {
            $('#search-error').html('');
            $.ajax({
                type: 'POST',
                url: 'search..php',
                data: {
                    search: search,
                },
                success: (data) => {
                    $('.films').html(data);
                },
            })
        }
    })
});