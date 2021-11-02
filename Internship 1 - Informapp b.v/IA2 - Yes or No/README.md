# IA2 - Yes or No
## Created by Ricardo Froeliger

You will program a click puzzle page in 2 steps. Try to get as far as possible.<br>
Edit the CSS and Javascript on the HTML page **without modifying the HTML (functionally)**.

### Assignment 1
Each button toggles when clicked, flipping from No (in red) to Yes (in green) and back again.<br>
Create smart, compact, readable code with the following requirements:

* Leave the HTML as it is, do everything with Javascript and CSS only.
* Buttons are ~100px~ 150px by ~100px~ 150px in size.
* Center the buttons in the page.
* Apply the class "state0" to buttons when they are set to No: state0 gives the background color: ~#f88~ #f03.
* Apply the class "state1" to buttons if they are set to Yes: state1 gives the background color: ~#8f8~ #0f7.
* The button font size is ~20px~ 25px and font weight is set to bold.
* Edit the function clickButton and link them to the click event of the buttons using a for loop.<br> 
  To detect button clicked, you're not allowed to use the onclick attribute.

### Assignment 2
Each button now toggles other buttons defined in the combinations array.<br>
The page also shows whether everything is set to Yes or No or not.<br>
Create smart, compact, readable code with the following requirements:

* Create the page as in Yes or No assignment 1. 
* Leave the HTML as it is, do everything with Javascript and CSS only.
* Buttons now toggle other buttons by making use of indexes, examples are: 
    * button0 toggles button0 and button3
    * button2 toggles button1
    * button3 toggles button1 and button2
* If all buttons are set to Yes, the state ~h2~ h1 should change to "All set to Yes!".
* If all buttons are set to No, the state ~h2~ h1 should change to "All set to No!".
* If it is neither all Yes or all No, the state ~h2~ h1 should change to "Busy Clicking!".