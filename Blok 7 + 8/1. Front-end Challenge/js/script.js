let currentPage = 0, subjectIndex = 0;
let answers = {}, selectedParties = [];

/* ------------ Uncomment for testing ------------ */
// subjects = [subjects[0], subjects[1], subjects[2]];


/* TODO */
/**
 * Make website responsive 
 * Use tailwind framework instead of w3.css
 * Change styling for importance/parties container and checkboxes
 * Make full statements appear above the importance checkboxes when hovered over
 * Make a list of the parties that agree/disagree for each statement
**/


/* ---- Show Page ---- */
function showPage(page) {
    currentPage = page;
    let containers = [
        '.startContainer', '.statementContainer',
        '.importanceContainer', '.partiesContainer', '.resultContainer'
    ];

    // Hide all containers and only make the one needed visible
    containers.map(c => document.querySelector(c).style.display = 'none');
    document.querySelector(containers[page]).style.display = 'block';


    // Special containers that only need to be on one page
    document.body.className = page == 0 ? 'background' : '';
    document.querySelector('.buttonContainer').style.display = page == 1 ? 'block' : 'none';
    document.querySelector('h1.counter').style.display = page == 1 ? 'inline-block' : 'none';
    document.querySelector('button.back').style.display = page != 0 ? 'inline-block' : 'none';
    document.querySelector('.impCheckboxContainer').style.display = page == 2 ? 'flex' : 'none';
}
showPage(0);



/* -- Update Statement -- */
function updateStatement() {
    document.querySelector('.title').innerText = subjects[subjectIndex].title;
    document.querySelector('.statement').innerText = subjects[subjectIndex].statement;
    document.querySelector('.counter').innerText = `${subjectIndex + 1}/${subjects.length}`;

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
    document.querySelector('.impCheckboxContainer').style.display = enoughAnswers ? 'block' : 'none';

    // Disable button if not enough answers
    document.querySelector('#importanceButton').disabled = !enoughAnswers;

    if (enoughAnswers) showPage(2);
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
        input.id = `subject_${i}`;
        input.onchange = () => importanceCheckboxUpdated();
        label.setAttribute('for', `subject_${i}`);
        label.innerText = ` ${subject.title}`;


        // Append the checkboxes to the column and body
        div.appendChild(input);
        div.appendChild(label);
        columns[columns.length - 1].appendChild(div);

        let container = document.querySelector('.impCheckboxContainer');
        if (i % 10 == 0) container.appendChild(columns[columns.length - 1]);
    }
}

function importanceCheckboxUpdated() {
    let statementsSelected = document.querySelector('.importanceContainer p');
    let checkboxes = document.querySelectorAll('.impCheckboxContainer input');
    let checkedLength = [...checkboxes].filter(c => c.checked).length;

    statementsSelected.innerText = `${checkedLength}/${subjects.length} stellingen geselecteerd`;
}

function validateImportanceCheckboxes() {
    let checkboxes = document.querySelectorAll('.impCheckboxContainer input');
    let checked = [...checkboxes].filter(c => c.checked);
    checked = checked.map(c => parseInt(c.id.split('_')[1]));

    // (Re)sets subject importance 
    subjects.map((s, i) => s.important = checked.includes(i));
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
    let enoughPartiesSelected = [...inputs].filter(i => i.checked).length > 2;
    button.disabled = !enoughPartiesSelected;
}

function validatePartiesCheckboxes() {
    let inputs = document.querySelectorAll('.partiesLowerCheckboxContainer input');
    let enoughPartiesSelected = [...inputs].filter(i => i.checked).length > 2;
    let checkedParties = [...inputs].filter(i => i.checked).map(i => i.id);

    // Re(sets) all selected parties only the ones the result needs
    selectedParties = parties.filter(p => checkedParties.includes(p.name));

    if (enoughPartiesSelected) {
        calculateResult();
        showPage(4);
    }
}



/* ---- Result Page ---- */
function calculateResult() {
    // (Re)sets all party matches to 0
    parties.map(p => p.match = 0);

    for (let answer of Object.entries(answers)) {
        let subject = answer[0].split('_')[1], opinion = answer[1];

        for (let party of subjects[subject].parties) {
            // Continue with the other party if either answer or position is none
            if (opinion == 'none' || party.position == 'none') continue;


            // Count up/down the match per party and check for subject importance
            let targetParty = parties.find(p => p.name == party.name);
            let important = subjects[subject].important;

            if (party.position == opinion) important ? targetParty.match += 2 : targetParty.match++;
            else important ? targetParty.match -= 2 : targetParty.match--;
        }
    }

    generateResultPage();
}

function generateResultPage() {
    let container = document.querySelector('.resultCardContainer');
    let sortedParties = selectedParties.sort((a, b) => b.match - a.match);

    // (Re)sets all cards that are in the resultCardContainer
    while (container.firstChild) container.removeChild(container.lastChild);

    for (let party of sortedParties) {

        // Calculate the matching percentage for each party
        let percentage = ((party.match / subjects.length) * 100).toFixed(0);
        if (percentage > 100) percentage = 100;
        else if (percentage < 0) percentage = 0;


        // Create and style cards
        let divInner = document.createElement('div'), divOuter = document.createElement('div');
        let h2Inner = document.createElement('h2'), h2Outer = document.createElement('h2');
        let progress = document.createElement('progress');

        h2Outer.innerText = `${party.name} ${party.long ? `- (${party.long})` : ''}`;
        h2Inner.innerText = `${percentage}%`;

        progress.value = percentage;
        progress.max = '100';
        progress.min = '0';


        // Append the cards to the container
        divInner.appendChild(progress);
        divInner.appendChild(h2Inner);
        divOuter.appendChild(h2Outer);
        divOuter.appendChild(divInner);
        container.appendChild(divOuter);
    }
}