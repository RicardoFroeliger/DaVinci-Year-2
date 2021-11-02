let buttons = document.querySelectorAll('div.buttonContainer > button');

for(btn of buttons) {
    btn.addEventListener('click', b => clickButton(b.target));
    btn.className = 'state0', btn.innerText = 'No';
}

function clickButton(btn) {
    btn.className = btn.className == 'state0' ? 'state1' : 'state0';
    btn.innerText = btn.innerText == 'No' ? 'Yes' : 'No';
}