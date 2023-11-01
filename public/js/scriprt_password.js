var a;

function pass() {
    if (a == 1) {
        document.getElementById('password').type = 'password';
        document.getElementById('pass_icon').src = 'image/pwd_hide.png';
        a = 0;

    } else {
        document.getElementById('password').type = 'text';
        document.getElementById('pass_icon').src = 'image/pwd_show.png';
        a = 1;
    }
}
var b;

function confpass() {
    if (b == 1) {
        document.getElementById('confirm_password').type = 'password';
        document.getElementById('confirepwd_icon').src = 'image/pwd_hide.png';
        b = 0;

    } else {
        document.getElementById('confirm_password').type = 'text';
        document.getElementById('confirepwd_icon').src = 'image/pwd_show.png';
        b = 1;
    }
}