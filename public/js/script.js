let radio = document.querySelectorAll('.radio');
let visible = document.querySelector('.visible');

for (let rad of radio) {

    rad.onclick = function () {

        if (rad.value === '0') {
            visible.hidden = true;
            visible.disabled = true;
        } else {
            visible.hidden = false;
            visible.disabled = false;
        }
    }
}

window.onload = function () {

    if (radio[1].checked) {
        visible.hidden = true;
        visible.disabled = true;
    } else {
        visible.hidden = false;
        visible.disabled = false;
    }
}
