import re 
import math
import os

inputFile = ''
word = ''

with open('input.txt') as f:
    inputFile = f.read()

inputFile = re.findall(r"\{\{\[\!([0-9]+)\!\]\}\}", inputFile)

for match in inputFile: 
    num = int(match)
    sqrtNum = math.sqrt(num)

    if sqrtNum.is_integer() and sqrtNum < 27:
        letter = chr(ord('@') + int(sqrtNum))
        word += letter

os.system('cls')
print(f'The word is: {word}')

input('Press enter to exit') 