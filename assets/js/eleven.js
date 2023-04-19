$(document).ready(function () {
    $('#menuCloseBtn').click(function () {
        $('#menu').addClass('menu-close').removeClass('menu-open');
    })
    $('#menuOpenBtn').click(function () {
        $('#menu').addClass('menu-open').removeClass('menu-close');
    });

})

const pickSize = function (this) {
    this.addClass('bg-dark');
    alert('asdas');
}

function pickSize() {
    alert('asdas');

}

