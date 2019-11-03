function timer(){
//Set the gaming time region
var remaining = 60;

//Call update function every second
var update = setInterval (function() {
  //Print the remaining time
  document.getElementById("timer").innerHTML = remaining + "s";
  
  //remaining time minus 1
  remaining--;

  if (remaining < 4) {
    document.getElementById("timer").style.color = "#ff0000";
  }

  //If the remaining time is less than 0, print Time Expired
  if (remaining < 0) {
    //Stop the Update loop
    clearInterval(update);
    document.getElementById("timer").innerHTML = "Game END!";
  }
}, 1000);
}
