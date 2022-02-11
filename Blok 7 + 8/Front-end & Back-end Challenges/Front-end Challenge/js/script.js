let frontPage = document.querySelector('.startContainer h2');
let title = document.querySelector('.title');
let statement = document.querySelector('.statement');
let counter = document.querySelector('.counter');
let subjectIndex = 0, answers = [];

subjects = [subjects[0], subjects[1], subjects[2]];

function updateStatement() {
    if (frontPage) frontPage.innerHTML += ` aan de hand van ${subjects.length} stellingen`;
    if (title) title.innerHTML = subjects[subjectIndex].title;
    if (statement) statement.innerHTML = subjects[subjectIndex].statement;
    if (counter) counter.innerHTML = `${subjectIndex + 1}/${subjects.length}`;
}
updateStatement();


function generateImportanceCheckboxes() {
    let container = document.createElement('div');
    container.className = 'importanceContainer';

    for (let [i, subject] of subjects.entries()) {
        let div = document.createElement('div');
        let input = document.createElement('input');
        let label = document.createElement('label');

        input.type = 'checkbox';
        input.id = `subject${i}`;

        label.setAttribute('for', `subject${i}`);
        label.innerHTML = ` ${subject.title}`;

        div.appendChild(input);
        div.appendChild(label);

        container.appendChild(div);
    }
    document.body.appendChild(container);
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