const cards = document.querySelectorAll('.memory-card');

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;
let numOfMoves = -1;
var numOfMatchedCards = 0;

function flipCard()
{
    if(lockBoard) return;
    if(this === firstCard) return;

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
    
    numOfMoves++;
    let movesDisplay = document.getElementById("moves-counter");
    movesDisplay.innerHTML = numOfMoves + " Moves";
    
    
    checkForMatch();
  
}


function checkForMatch()
{
    let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;
    isMatch ? disableCards() : unflipCards();
}

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

function resetBoard()
{
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
}

(function shuffle(){
 
 cards.forEach(card =>
    {
    let randomPos = Math.floor(Math.random() * 12 );
    card.style.order = randomPos;
    });
 })();



cards.forEach(card => card.addEventListener('click', flipCard));


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
    shuffle();
  }
}, 1000);
}
