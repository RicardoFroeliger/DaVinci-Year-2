let subjectIndex = 0;
let answers = [];

let urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('statement')) subjectIndex = parseInt(urlParams.get('statement'));

// subjects = [subjects[0], subjects[1], subjects[2]];

function updateStatement() {
    document.querySelector('.title').innerHTML = subjects[subjectIndex].title;
    document.querySelector('.statement').innerHTML = subjects[subjectIndex].statement;
    document.querySelector('.counter').innerHTML = `${subjectIndex + 1}/${subjects.length}`;
}

function generateCheckboxes() {
    let columns = [];
    for (let [i, subject] of subjects.entries()) {

        let colDiv = document.createElement('div');
        colDiv.style.display = 'inline-block';
        if (i % 10 == 0) columns.push(colDiv);

        let div = document.createElement('div');
        let input = document.createElement('input');
        let label = document.createElement('label');

        input.type = 'checkbox';
        input.id = `subject${i}`;
        input.onclick = () => clickCheckbox();

        label.setAttribute('for', `subject${i}`);
        label.innerHTML = ` ${subject.title}`;

        div.appendChild(input);
        div.appendChild(label);

        columns[columns.length - 1].appendChild(div);

        let checkboxContainer = document.querySelector('.checkboxContainer');
        if (i % 10 == 0) checkboxContainer.appendChild(columns[columns.length - 1]);
    }
}



function clickVoteButton(opinion) {
    subjectIndex++;
    answers.push({ subject: subjectIndex - 1, opinion });
    if (!subjects[subjectIndex]) return validateAnswers();
    updateStatement();
}
function clickSkipButton() {
    subjectIndex++;
    if (!subjects[subjectIndex]) return validateAnswers();
    updateStatement();
}
function clickBackButton() {
    subjectIndex--;
    if (!subjects[subjectIndex]) return window.location = '../index.html';
    updateStatement();
}
function clickCheckbox() {
    let checkboxes = document.querySelectorAll('.checkboxContainer input');
    let checkedBoxes = [...checkboxes].filter(c => c.checked);
    console.log(checkedBoxes.length)
}



function validateAnswers() {
    // Reset Matches to 0
    parties.map(p => p.match = 0);

    // Check if There are Enough Usable Answers
    // let usableAnswers = answers.filter(a => a.opinion != 'none').length;
    // if(usableAnswers < Math.ceil(subjects.length / 2))

    // for (let answer of answers) {
    //     for (let party of subjects[answer.subject].parties) {

    //         if (answer.opinion != 'none' && party.position != 'none') {
    //             let targetParty = parties.find(p => p.name == party.name);

    //             if (party.position == answer.opinion) targetParty.match++
    //             else targetParty.match--;
    //         }
    //     }
    // }
    // let sortedParties = parties.sort((a, b) => b.match - a.match);

    window.location = './importance.html';
}

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