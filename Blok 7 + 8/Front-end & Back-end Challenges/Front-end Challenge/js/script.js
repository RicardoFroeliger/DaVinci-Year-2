let currentPage = 0;
let subjectIndex = 0;
let answers = {}

subjects = [subjects[0], subjects[1], subjects[2]];

function showPage(page) {
    currentPage = page;
    let containers = [
        '.startContainer', '.statementContainer',
        '.importanceContainer', '.partiesContainer'
    ];

    // Hide all containers and only make the one needed visible
    containers.map(c => document.querySelector(c).style.display = 'none');
    document.querySelector(containers[page]).style.display = 'block';


    // Special containers that only need to be on one page
    document.body.className = page == 0 ? 'background' : '';
    document.querySelector('.buttonContainer').style.display = page == 1 ? 'block' : 'none';
    document.querySelector('h1.counter').style.display = page == 1 ? 'inline-block' : 'none';
    document.querySelector('button.back').style.display = page != 0 ? 'inline-block' : 'none';
}
showPage(0);



function updateStatement() {
    document.querySelector('.title').innerHTML = subjects[subjectIndex].title;
    document.querySelector('.statement').innerHTML = subjects[subjectIndex].statement;
    document.querySelector('.counter').innerHTML = `${subjectIndex + 1}/${subjects.length}`;

    // Hide all 'selected bars' and only make the selected one visible
    let buttons = document.querySelectorAll('.buttonContainer input');
    [...buttons].map(b => b.classList.remove('w3-border-blue'));

    if (answers[`subject_${subjectIndex}`]) {
        let selected = ['pro', 'none', 'contra'].indexOf(answers[`subject_${subjectIndex}`]);
        buttons[selected].classList.add('w3-border-blue');
    }
}
updateStatement();



/* ---- Back Button ---- */
function clickBackButton() {
    if (!subjects[subjectIndex - 1]) return showPage(0);
    if (currentPage != 1) {
        updateStatement();
        return showPage(currentPage - 1);
    }

    subjectIndex--;
    updateStatement();
}



/* -------- Vote Page -------- */
function clickVoteButton(answer) {
    // (Over)write the answer when clicked
    answers[`subject_${subjectIndex}`] = answer;

    if (!subjects[subjectIndex + 1]) return validateAnswers();
    subjectIndex++;
    updateStatement();
}
function clickSkipButton() {
    // Clear a possible earlier answer when clicked
    delete answers[`subject_${subjectIndex}`];

    if (!subjects[subjectIndex + 1]) return validateAnswers();
    subjectIndex++;
    updateStatement();
}

function validateAnswers() {
    // Check if there are more than 50% of the statements are answered
    let enoughAnswers = Object.values(answers).length > Math.floor(subjects.length / 2);

    // Show error and hide checkboxes if not enough answers
    document.querySelector('.errorContainer').style.display = enoughAnswers ? 'none' : 'block';
    document.querySelector('.impCheckboxContainer').style.display = enoughAnswers ? 'block' : 'none'

    // Disable button if not enough answers
    document.querySelector('#importanceButton').disabled = !enoughAnswers;

    if(enoughAnswers) showPage(2);
}



/* --------- Importance Page --------- */
function generateImportanceCheckboxes() {
    let columns = [];
    for (let [i, subject] of subjects.entries()) {

        // Create column containers for the checkboxes
        let colDiv = document.createElement('div');
        colDiv.style.display = 'inline-block';
        if (i % 10 == 0) columns.push(colDiv);


        // Create and style checkboxes
        let div = document.createElement('div');
        let input = document.createElement('input');
        let label = document.createElement('label');

        input.type = 'checkbox';
        input.id = `subject${i}`;
        label.setAttribute('for', `subject${i}`);
        label.innerText = ` ${subject.title}`;


        // Append the checkboxes to the column and body
        div.appendChild(input);
        div.appendChild(label);
        columns[columns.length - 1].appendChild(div);

        let container = document.querySelector('.impCheckboxContainer');
        container.style.display = 'flex';
        if (i % 10 == 0) container.appendChild(columns[columns.length - 1]);
    }
}

function validateImportanceCheckboxes() {
    let checkboxes = document.querySelectorAll('.impCheckboxContainer input');
    let checked = [...checkboxes].filter(c => c.checked);
    console.log(checked.map(c => c.id.split('subject')[1]));

    // if statement
    showPage(3);
}



/* --------- Parties Page --------- */
function generatePartiesCheckboxes() {
    let columns = [];
    for (let [i, party] of parties.sort((a, b) => b.size - a.size).entries()) {

        // Create column containers for the checkboxes
        let colDiv = document.createElement('div');
        colDiv.style.display = 'inline-block';
        if (i % 8 == 0) columns.push(colDiv);


        // Create and style checkboxes
        let div = document.createElement('div');
        let input = document.createElement('input');
        let label = document.createElement('label');

        input.type = 'checkbox';
        input.id = party.name;
        input.onchange = () => partyCheckboxUpdated();
        label.setAttribute('for', party.name);
        label.innerText = ` ${party.name}`;


        // Append the checkboxes to the column and body
        div.appendChild(input);
        div.appendChild(label);
        columns[columns.length - 1].appendChild(div);

        let container = document.querySelector('.partiesLowerCheckboxContainer');
        if (i % 10 == 0) container.appendChild(columns[columns.length - 1]);
    }
}

function filterPartiesCheckboxes(filter) {
    // Unchecks all checkboxes
    let inputs = document.querySelectorAll('.partiesLowerCheckboxContainer input');
    [...inputs].map(i => i.checked = false);

    // Check all checkboxes selected by the filter
    switch (filter) {
        case 'all':
            [...inputs].map(i => i.checked = true);
            break;
        case 'big':
            let bigParties = [...inputs].filter(i => parties.find(p => p.name == i.id).size > 1);
            bigParties.map(i => i.checked = true);
            break;
        case 'secular':
            let secularParties = [...inputs].filter(i => parties.find(p => p.name == i.id).secular);
            secularParties.map(i => i.checked = true);
            break;
    }

    partyCheckboxUpdated();
}

function partyCheckboxUpdated() {
    let button = document.querySelector('#partiesButton');
    let inputs = document.querySelectorAll('.partiesLowerCheckboxContainer input');
    
    // Disable button if not enough checkboxes are selected
    button.disabled = !([...inputs].filter(i => i.checked).length > 2);
}

function validatePartiesCheckboxes() {
    let inputs = document.querySelectorAll('.partiesLowerCheckboxContainer input');
    let selectedParties = [...inputs].filter(i => i.checked).map(i => i.id); 
    console.log(parties.filter(p => selectedParties.includes(p.name)));
}

// function validateAnswers() {
//     // Reset Matches to 0
//     parties.map(p => p.match = 0);

//     // Check if There are Enough Usable Answers
//     // let usableAnswers = answers.filter(a => a.opinion != 'none').length;
//     // if(usableAnswers < Math.ceil(subjects.length / 2))

//     // for (let answer of answers) {
//     //     for (let party of subjects[answer.subject].parties) {

//     //         if (answer.opinion != 'none' && party.position != 'none') {
//     //             let targetParty = parties.find(p => p.name == party.name);

//     //             if (party.position == answer.opinion) targetParty.match++
//     //             else targetParty.match--;
//     //         }
//     //     }
//     // }
//     // let sortedParties = parties.sort((a, b) => b.match - a.match);

//     window.location = './importance.html';
// }

// function calculateMatchingParties() {
//     let matchingParties = [];

//     for (let answer of answers) {

//     }
//     console.log(answers)
// }
// function toggleEndScreen() {
//     if (answers.length < 1) console.log('not enough info');

//     // console.log('out')
//     statement.innerHTML = 'done'
//     document.querySelector('div.buttonContainer').style.display = 'none';
//     calculateMatchingParties();
//     toggleImportanceScreen();
// }



// make it so that if the opinion matches the party's opinion
// match = +1, no match = -1, no opinion = nothing

// subjectIndex++;


// for (let party of subjects[subjectIndex].parties) {
//     let targetParty = parties.find(p => p.name == party.name);

//     if (party.position == 'pro') {
//         if (opinion == 'pro') targetParty.match++;
//         else if (opinion == 'contra') targetParty.match--;
//     } else if (party.position == 'contra') {
//         if (opinion == 'contra') targetParty.match++;
//         else if (opinion == 'pro') targetParty.match--;
//     }
// }
// console.log(parties.map(p => p.match))

// if(checkedBoxes.length > 2) {
//     document.querySelector('.importanceContainer button').removeAttribute('disabled');
// } else {
//     document.querySelector('.importanceContainer button').setAttribute('disabled', '');
// }