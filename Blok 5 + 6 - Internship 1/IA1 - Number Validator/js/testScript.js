let validNumberExamples = [
    { number: '193769136', modulo: 9 },
    { number: '84076131', modulo: 7 },
    { number: '104814246', modulo: 7 },
    { number: '34828296597', modulo: 13 },
    { number: '06415932536', modulo: 9 },
    { number: '70241349997', modulo: 13 },
    { number: '553192630', modulo: 9 },
    { number: '7673642361', modulo: 7 },
    { number: '7553332', modulo: 7 },
    { number: '411612', modulo: 11 }
];

let invalidNumberExamples = [
    { number: '3371490', modulo: 11 },
    { number: '61095500901', modulo: 13 },
    { number: '23056724', modulo: 13 },
    { number: '93575855736', modulo: 13 },
    { number: '153689', modulo: 9 },
    { number: '32116529907', modulo: 13 },
    { number: '869131155', modulo: 9 },
    { number: '509652549', modulo: 7 },
    { number: '57074965', modulo: 9 },
    { number: '356024421', modulo: 7 }
];

for(num of validNumberExamples) console.log(validateNumber(num.number, num.modulo));
for(num of invalidNumberExamples) console.log(validateNumber(num.number, num.modulo));