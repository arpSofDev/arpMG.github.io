//starting values;
var word = null;
var guessedWord = [];
var usedLetters = [];
var guessesLeft = 10;

function displayList(array, id, addComma = false){
  var html = "";
  if(addComma){
    html = array.join();
  }else{
    html = array.join('');
  }

  document.getElementById(id).innerHTML = html;
}

function selectWord(){
  word = document.getElementById("word").value.toUpperCase();
  if(word.length === 0 ){
    showModal("Hangman", "Please enter a word to begin");
  }else{
    document.getElementById("word-section").setAttribute('style', 'display:none');
    document.getElementById("guess-section").setAttribute('style', 'display:inline-block');
    document.getElementById("solution-section").setAttribute('style', 'display:inline-flex');
    document.getElementById("game-section").setAttribute('style', 'display:inline-block');

     //layout letters
    for(var i=0; i<word.length; i++){
      guessedWord.push('<i class="far fa-question-circle"></i>');
    }

    //display guessed Word...so far
    displayList(guessedWord, 'solution');
    displayList(usedLetters, 'used', true);
  }
  drawGallows();
  document.getElementById('guess').focus();
}
function makeGuess(){
  var guess = document.getElementById("guess").value.toUpperCase();
  guess = guess.trim();
  if(guess.length === 0){
    showModal("Oops", "Cant get it right if you dont make a guess. Please enter a letter");
    document.getElementById('guess').value = "";
  }else{
    if(usedLetters.indexOf(guess) !== -1){
      showModal("Oops", "You already used "+guess);
      document.getElementById('guess').value = "";

    }else{
      usedLetters.push(guess);
      usedLetters.sort();
      document.getElementById("guess").value = "";
      var correctLetterCount = 0;
      for(var i=0; i<word.length; i++){
        if(guess === word.charAt(i)){
          correctLetterCount++;
          guessedWord[i] = '<span class="correct">'+guess+'</span>';
        }
      }

      if(correctLetterCount === 0){
        document.getElementById('guesses-left').innerHTML = --guessesLeft;
        drawNext(guessesLeft);
        showModal("Incorrect guess", "There are no '"+guess+"'s in the word.");
      }else{
        if(correctLetterCount === 1){
          showModal("Correct guess", "There is 1 '"+guess+"' in the word.");
        }else{
          showModal("Correct guess", "There is are "+correctLetterCount+" '"+guess+"'s in the word.");
        }
      }
    }


    if(guessesLeft === 0){
      //display try button
      document.getElementById('tryButton').disabled = true;
      showModal("The Hangman got you!", "The word was '"+word+"'.", null);
    }else{
      displayList(guessedWord, 'solution');
      displayList(usedLetters, 'used', true);
      if(guessedWord.indexOf('<i class="far fa-question-circle"></i>') !== -1){
        document.getElementById('guess').focus();
      }else{
        showModal("Congratulations!", "You guessed the word", null);
        document.getElementById('guess').setAttribute('style', 'display:none');
        document.getElementById('tryButton').innerHTML = "Play again!";
        document.getElementById('tryButton').onclick = function(){location.reload();};

      }
    }
  }

}
