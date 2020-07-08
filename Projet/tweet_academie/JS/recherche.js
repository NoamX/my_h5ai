$(document).ready(() => {
    $('#search').keyup(() => {
        let value = $('#search').val();
        value = value.trim();
        if (!value) {
            $('.results').html('');
        } else {
            $('#search-error').html('');
            $.ajax({
                type: 'POST',
                url: 'PHP/recherche..php',
                data: {
                    tag: value,
                },
                success: (data) => {
                    if (data == 'Search for : ') {
                        $('.results').html(data += "\"" + value + "\"");
                    } else {
                        $('.results').html(data);
                    }
                },
            })
        }
    })

    $('.form-search').submit((event) => {
        event.preventDefault();
        let search = $('#search').val();
        search = search.trim();
        if (!search) {
            $('#search-error').css({
                color: 'red',
                textDecoration: 'underline',
                fontWeight: 'bold',
            }).html('You can\'t search nothing !');
        } else {
            $.ajax({
                type: 'POST',
                url: 'PHP/recherche..php',
                data: {
                    tag: search,
                },
                success: (data) => {
                    $('.results').html(data);
                },
            })
        }
    })
});