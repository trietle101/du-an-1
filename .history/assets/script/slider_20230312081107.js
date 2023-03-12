var index = 1;

function chuyen() {
    var arr = [
        'assets/img/slider/slider1.png',
        'assets/img/slider/slider2.png',
        'assets/img/slider/slider3.png',
    ];
    document.getElementById('hinh').src = arr[index]
    index++;
    if (index == 3) {
        index = 0;
    }
}
setInterval(chuyen, 2000);