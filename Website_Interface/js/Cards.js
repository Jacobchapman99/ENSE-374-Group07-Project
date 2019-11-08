const cards = document.querySelectorAll('.memory-card');

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;

function flipCard() {
    if(lockBoard) return;
    if(this === firstCard) return;
    
    this.classList.add('flip');
    
    if(!hasFlippedCard)
    {
        hasFlippedCard = true;
        firstCard = this;
        return;
    }
    
    secondCard = this;
    
    checkForMatch();
}

function checkForMatch() {
    let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;
    isMatch ? disableCards() : unflipCards();
    }

function disableCards() {
    firstCard.removeEventListener('click', flipCard);
    secondCard.removeEventListener('click', flipCard);
    
    resetBoard();
}

function unflipCards() {
    lockBoard = true;
    
    setTimeout(() => {
        firstCard.classList.remove('flip');
        secondCard.classList.remove('flip');
        
       resetBoard();
    }, 1500);
}

function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
}

(function shuffle() {
 cards.forEach(card => {
    let randomPos = Math.floor(Math.random() * 12 );
    card.style.order = randomPos;
    });
 })();
cards.forEach(card => card.addEventListener('click', flipCard));


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
    resetBoard();
    shuffle();
  }
}, 1000);
}
