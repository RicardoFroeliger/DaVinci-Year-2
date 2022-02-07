let title = document.querySelector('h1.title');
let statement = document.querySelector('h3.statement');
let subjectIndex = 0;

title.innerHTML = subjects[0].title;
statement.innerHTML = subjects[0].statement;
parties.map(p => p.match = 0);


function clickButton(opinion) {
    if(!subjects[subjectIndex]) return console.log('end');
    console.log(opinion)
    // make it so that if the opinion matches the party's opinion
    // match = +1, no match = -1, no opinion = nothing

    subjectIndex++;

    title.innerHTML = subjects[subjectIndex].title
    statement.innerHTML = subjects[subjectIndex].statement;

    for (let party of subjects[subjectIndex].parties) {
        let targetParty = parties.find(p => p.name == party.name);

        if (party.position == 'pro') targetParty.match += 1;
        else if (party.position == 'contra') targetParty.match -= 1;
    }
}

function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }