let number = document.querySelector('#number');
let remainder = document.querySelector('#remainder');
let submit = document.querySelector('button[type="submit"]');
let result = document.querySelector('#result');

function validateNumber(number, remainder) {
    if(typeof number != 'string') return false;

    remainder = parseInt(remainder);
    number = number.replace(/\D/g, '').split('').reverse();

    if(number.length < 6 || number.length > 14) return false;

    let total = number.reduce((ttl, num, idx) => ttl + (idx + 1) * num, 0);
    return total % remainder == 0;
}

submit.onclick = () => {
    let isValid = validateNumber(number.value, remainder.value);
    result.innerText = isValid ? 'Valid' : 'Invalid';
    result.style.color = isValid ? 'limegreen' : 'red';
}

// let total = 0; /* checksum calculating alternative */
// for(let i = 1; i <= number.length; i++) {
//     total += i * number[i - 1];
// }