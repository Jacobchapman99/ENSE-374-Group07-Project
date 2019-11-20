const cards = document.querySelectorAll('.memory-card');
const restartBtn = document.querySelector('#restart');
const timerHours = document.querySelector('#timer .hours');
const timerMins = document.querySelector('#timer .minutes');
const timerSeconds = document.querySelector('#timer .seconds');
let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;
let numOfMoves = -1;
var numOfMatchedCards = 0;
let gameStarted = false;
let elapsedSeconds = 0;
let hour = 0;
let min = 0;
let sec = 0;
let timer = undefined;


//user flips two cards, and goes through routines to see if they matched or not until the user wins or loses
function flipCard()
{
    startTimer();
    
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
         let victoryTemplate = '<h1 class="winnerHeader" style="color: green; font-size: 40px;"> Congratulations! You won in ' + hour + ' hours, ' + min + ' minutes, and ' + sec + ' seconds!' + '</h1> ';
         victoryScreen.style.display = "block";
         victoryScreen.innerHTML = victoryTemplate;
         stopTimer();
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

//starts timer once user presses a card
function startTimer() {
    if (!gameStarted) {
        gameStarted = true;
        timer = setInterval(setTime, 1000);
    }
}

//stops timer
function stopTimer() {
    gameStarted = false;
    clearInterval(timer);
}

//sets time in game
function setTime() {
    let remainderSeconds = ++elapsedSeconds;
    hour = parseInt(remainderSeconds / 3600);
    timerHours.textContent = stringifyTime(hour);
    
    remainderSeconds = remainderSeconds % 3600;
    min = parseInt(remainderSeconds / 60);
    timerMins.textContent = stringifyTime(min);
                   
    remainderSeconds = remainderSeconds % 60;
    sec = remainderSeconds;
    timerSeconds.textContent = stringifyTime(sec);
}

//restarts game
function restartGame() {
    location.reload();
}
//sets everything back to zero
function resetScore() {
    hasFlippedCard = false;
    lockBoard = false;
    numOfMoves = -1;
    numOfMatchedCards = 0;
    elapsedSeconds = 0;
    hour = 0;
    min = 0;
    sec = 0;
}


//outputs the time onto the html according to how many digits are generated
function stringifyTime(val) {
    var valString = val + '';
    return valString.length >= 2 ? val : '0' + val;
}
cards.forEach(card => card.addEventListener('click', flipCard));
restartBtn.addEventListener('click', restartGame);
