// D5 a Javascript object
var date = new Date();
var hours = date.getHours();

// D4 a variable with global scope
var message;

    // D6 a conditional statement
    if (hours < 12) {
        message = "Good Morning";
    } else if (hours >= 12 && hours <= 17) {
        message = "Good Afternoon";
    } else {
        message = "Good Evening";
    }
document.getElementById("greeting").innerHTML = message + ", Welcome to Rafael Architectures!";

// Populating an array of quotes
var quote1 = "“Be yourself; everyone else is already taken.”― Oscar Wilde";
var quote2 = "“Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.”― Albert Einstein";
var quote3 = "“Be the change that you wish to see in the world.”― Mahatma Gandhi";
var quote4 = "“In three words I can sum up everything I've learned about life: it goes on.” ― Robert Frost";
var quote5 = "“If you tell the truth, you don't have to remember anything.”― Mark Twain";
// D2 Use an array
var quotes = [quote1, quote2, quote3, quote4, quote5];
var max = 5;
//sleep function taken from tutorialspoint.com
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
// modified function from tutorialspoint.com to fit our needs
async function generateQuote() {
    // D1 use a loop 
    while(1) {
        // generate a random number between 0-4, has a chance of generating same number
        // D3 a variable with local scope
        const random = Math.floor(Math.random() * max);
        document.getElementById("quote").innerHTML = quotes[random];
        // sleep for 3 seconds
        await sleep(3000);
    }    
}
generateQuote();