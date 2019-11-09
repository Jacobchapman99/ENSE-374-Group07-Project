const cards = document.querySelectorAll('.memory-card');
const restart = document.querySelectorAll('.memory-card');
let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;
let numOfMoves = -1;
var numOfMatchedCards = 0;

const resetButton = document.getElementsByClassName('restart_button');


//user flips two cards, and goes through routines to see if they matched or not until the user wins or loses
function flipCard()
{
    if(lockBoard) return;
    if(this === firstCard) return;
    
    //win condition
    if(numOfMatchedCards === 6)
    {
        let victoryScreen = document.getElementById("win-screen");
        victoryScreen.style.display = "block";
        let victoryTemplate = '<h1 class="winnerHeader"> Congratulations! You Won! With ${numOfMoves} and ${remaining} seconds left! </h1> ';
        victoryScreen.innerHTML = victoryTemplate;
    }
    this.classList.add('flip');
    
    if(!hasFlippedCard)
    {
        hasFlippedCard = true;
        firstCard = this;
        return;
    }
    
    secondCard = this;
    
    //increments number of moves made
    numOfMoves++;
    let movesDisplay = document.getElementById("moves-counter");
    movesDisplay.innerHTML = numOfMoves + " Moves";
    
    
    checkForMatch();
  
}

//checks both cards and sees if they are the same
function checkForMatch()
{
    let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;
    isMatch ? disableCards() : unflipCards();
}

// once theres a match, the cards will be locked in place and cannot be touched
function disableCards()
{
    firstCard.removeEventListener('click', flipCard);
    secondCard.removeEventListener('click', flipCard);
    
    numOfMatchedCards++;
    
    if(numOfMatchedCards === 6)
     {
         let victoryScreen = document.getElementById("win-screen");
         victoryScreen.style.display = "block";
         let victoryTemplate = '<h1 class="winnerHeader"> Congratulations! You Won! </h1> ';
         victoryScreen.innerHTML = victoryTemplate;
     }
     
    resetBoard();
}

//if theres no match, the cards return back facing down
function unflipCards()
{
    lockBoard = true;
    
    setTimeout(() =>
    {
        firstCard.classList.remove('flip');
        secondCard.classList.remove('flip');
        
       resetBoard();
    }, 1500);
}

//resets values to default when cards get unflipped
function resetBoard()
{
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
}

//shuffles cards each time browser is refreshed
(function shuffle(){
 
 cards.forEach(card =>
    {
    let randomPos = Math.floor(Math.random() * 12 );
    card.style.order = randomPos;
    });
 })();




//resets board if user presses restart button
function reset()
{
    restart.forEach(card => card.classList.add('flip'));
    
    for(var i = 0; i < 12; i++)
    {
    if(cards[i].classList.contains('flip') === restart[i].classList.contains('flip'))
    {
        cards[i].classList.remove('flip');
    }
    }
}

function timer()
{
//Set the gaming time region
var remaining = 60;

//Call update function every second
var update = setInterval (function()
  {
  //Print the remaining time
  document.getElementById("timer").innerHTML = remaining + "s";
  
  //remaining time minus 1
  remaining--;

  if (remaining < 4)
  {
    document.getElementById("timer").style.color = "#ff0000";
  }

  //If the remaining time is less than 0, print Time Expired
  if (remaining < 0)
  {
    //Stop the Update loop
    clearInterval(update);
    document.getElementById("timer").innerHTML = "Game END!";
    resetBoard();
    reset();
    shuffle();
  }
}, 1000);
}

cards.forEach(card => card.addEventListener('click', flipCard));
resetButton.forEach(button => button.addEventListener('click', reset));
