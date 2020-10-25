// radio buttons script
let radio = document.querySelectorAll('.form-check-input');
let visible = document.querySelector('.visible');
let nameThesis = document.querySelector('.form-control.text');
let descriptionThesis = document.querySelector('.form-control.textarea');

for (let rad of radio) {

    rad.onclick = function () {
        if (rad.value === '0') {
            visible.hidden = true;
            visible.disabled = true;
             descriptionThesis.value = '';
             nameThesis.value = '';

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
        descriptionThesis.value = '';
        nameThesis.value = '';
    } else {
        visible.hidden = false;
        visible.disabled = false;
    }
}
