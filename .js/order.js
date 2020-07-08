$(document).ready(function () {
    let a = 0;
    $('#nom').click(function () {
            if (a == 0) {
                $('#nom').html('Nom ⮝');
                a = 1;
            } else {
                $('#nom').html('Nom ⮟');
                a = 0;
            }
            let arr = [];
            let li = $('.list-order');
            for (let i = 0; i < li.length; i++) {
                arr.push(li[i]);
            }
            arr.reverse();
            arr.forEach(function (value) {
                $(value).appendTo('.order');
            });
        }
    )

    $('#taille').click(function () {

    })
});