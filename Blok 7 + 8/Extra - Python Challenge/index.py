import re 
import math
import os

input = ''
word = ''

with open('input.txt') as f:
    input = f.read()

input = re.findall(r"\{\{\[\!([0-9]+)\!\]\}\}", input)

for match in input: 
    num = int(match)
    sqrtNum = math.sqrt(num)

    if sqrtNum.is_integer() and sqrtNum < 27:
        letter = chr(ord('@') + int(sqrtNum))
        word += letter

os.system('cls')
print(word)