let buttons = [...document.querySelectorAll('div.buttonContainer > button')];
let state = document.querySelector('h1.state');
let combinations = [[0, 3], [1, 0], [2, 3], [0, 2]];

for(btn of buttons) {
    btn.addEventListener('click', b => clickButton(b.target));
    btn.className = 'state0', btn.innerText = 'No';
    btn.id = `btn${buttons.indexOf(btn)}`;
}

function clickButton(btn) {
    for(idx of combinations[buttons.indexOf(btn)]) {
        let targetBtn = document.querySelector(`div.buttonContainer > button#btn${idx}`);
        targetBtn.className = targetBtn.className == 'state0' ? 'state1' : 'state0';
        targetBtn.innerText = targetBtn.innerText == 'No' ? 'Yes' : 'No';
    }

    state.innerText = buttons.every(b => b.className == 'state0') ? 'All set to No!' : 
    (buttons.every(b => b.className == 'state1') ? 'All set to Yes!' : 'Busy clicking!');
}