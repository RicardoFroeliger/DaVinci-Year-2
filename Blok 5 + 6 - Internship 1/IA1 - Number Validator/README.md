# IA1 - Number Validator
## Created by Ricardo Froeliger

After handing in this test assignment you can start with the first real internship assignment in September.<br>
You need to build a number validation application.


### Identification numbers, important and vulnerable
All kinds of identification numbers are given to citizens by government agencies.<br> 
Those numbers are important for transactions and authentications.<br> 
They are unique and valuable to their owners.<br> 
Think of driver's licenses, permits, vaccination certificates, etc.<br>
Errors in the registration of those numbers naturally cause big problems.


### Validation
Each of those numbers is made up of digits, sometimes separated by spaces, periods or other characters.<br>
The combination of digits must meet certain checksum requirements.<br>
Typos in a passed number, for example "06862589", are discovered faster if they can be checked whether the number still meets the checksum requirement.

How do we know if a number is valid?<br>
How do we validate a number on the checksum requirement?<br>
Let's take as an example the number: "06862589" for a medical access pass.<br> 
In this example, the remainder 7 applies to this type of access pass.<br>
Such an operator is also called remainder.


### Calculate checksum
First, the checksum is calculated as:<br>
The sum of the products of the respective single digits **0 6 8 6 2 5 8 9** with the respective weights **8 7 6 5 4 3 2 1**<br>

Calculate checksum: **(0 x 8) + (6 x 7) + (8 x 6) + (6 x 5) + (2 x 4) + (5 x 3) + (8 x 2) + (9 x 1) = 168**

The first weight always has a value equal to the total length of the number.<br> 
All subsequent weights decrease by 1.<br> 
A 'product' is another word for a 'multiplication'.

 

### Rest of dividing the checksum by the remainder must be zero
Now we need to calculate the remaining number of the outcome of the checksum by the remainder.<br>
If the remainder is zero then the number is valid according to the checksum requirement.<br> 
If the remainder is not zero then it is an invalid, erroneous number.

An integer division is the same as a division with an outcome and one with remainder.<br> 
For example, 17 divided by 5 integers has the result of 3 and the rest of that division is 2, because 5 x 3 + 2 is again 17.
The rest of the checksum 168 is integer divided by the remainder 7 = 0, so "06862589" is valid!

 

### Assignment
1. Construct a user interface in an HTML page.<br>
    The interface must contain an input field, select field, validate button and result field.
    Something like the example below: 
    ![Example](https://imgur.com/dQoL8NS.png)

2. Program the Javascript logic.<br>
    Program a function 'validateNumber' with parameters: 'number' and 'remainder'.<br>
    The function must return a boolean indicating whether the number (number) is valid (true or false) according to the checksum requirement with the check digit indicated by the remainder.<br>
    Or have the function return an error text if the number or remainder are out of range.

    Additional requirements/instructions:
    * Only if the function receives a number in the form of a string, the validation can lead to a valid number.
    * The received string of the number may contain characters other than pure digits. Remove those!
    * For the calculation of the checksum it can be useful to convert the string of the number to an array with single characters.
    * An operator is available in JavaScript to calculate the remainder of an integer division.
    * Valid values ​​for remainder are: 7,9,11 or 13.
    * Valid lengths for number: minimum 6 and maximum 14.
    * In the arrays validNumberExamples and invalidNumberExamples you will find test examples.

3. Program the interactions with the user interface
    * Make sure the button is activated from the Javascript. use your validateNumber function.
    * Make sure that only validations are performed with remainders equal to: 7,9,11 or 13.
    * Make sure that the number input also accepts characters other than numbers. You have to filter them out for validation afterwards.
    * Show the result of the validation in result field.
    
4. Test your application
    * Test your application yourself as normal, expected input.<br> 
        Use the values ​​from the arrays validNumberExamples and invalidNumberExamples.
    * Test your application yourself for deviant, unexpected input.
    * Possibly test your application with a script using the arrays validNumbersExamples and invalidNumbersExamples.
    * Have your application tested by a family member or friend with some sample data.<br>
        Or with an existing bank account number and with, for example, remainder 11.

5. Refactor the code
    Improve the quality of your code.<br>
    And repeat steps 4 and 5 until you are completely satisfied.