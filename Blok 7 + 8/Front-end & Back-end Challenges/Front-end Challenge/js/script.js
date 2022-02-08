let title = document.querySelector('h1.title');
let statement = document.querySelector('h3.statement');
let subjectIndex = 0, answers = [];

subjects = [subjects[0], subjects[1], subjects[2]];

title.innerHTML = subjects[0].title;
statement.innerHTML = subjects[0].statement;
parties.map(p => p.match = 0);

function start() {
    let startContainer = document.querySelector('div.startContainer').style;
    let voteContainer = document.querySelector('div.voteContainer').style;

    startContainer.display = startContainer.display == 'none' ? 'block' : 'none';
    voteContainer.display = voteContainer.display == 'none' ? 'block' : 'none';
}

function clickVoteButton(opinion) {
    subjectIndex++
    
    answers.push({ subject: subjectIndex, opinion });
    if (!subjects[subjectIndex]) return end();

    title.innerHTML = subjects[subjectIndex].title
    statement.innerHTML = subjects[subjectIndex].statement;
}

function clickSkipButton() {
    subjectIndex++

    if (!subjects[subjectIndex]) return end();

    title.innerHTML = subjects[subjectIndex].title
    statement.innerHTML = subjects[subjectIndex].statement;
}

function clickBackButton() {
    subjectIndex--

    if (!subjects[subjectIndex]) return start();

    title.innerHTML = subjects[subjectIndex].title
    statement.innerHTML = subjects[subjectIndex].statement;
}

function end() {
    if(answers.length < 1) console.log('not enough info');

    // console.log('out')
    statement.innerHTML = 'done'
    document.querySelector('div.buttonContainer').style.display = 'none';
    console.log(answers);
}

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