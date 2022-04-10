var date = new Date();
var hours = date.getHours();

var message;

    if (hours < 12) {
        message = "Good Morning";
    } else if (hours >= 12 && hours <= 17) {
        message = "Good Afternoon";
    } else {
        message = "Good Evening";
    }
    
    document.getElementById("greeting").innerHTML = message + ", Welcome to Rafael Architectures!";