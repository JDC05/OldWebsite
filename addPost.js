const clearMessage = document.getElementById('clearMessage');
clearMessage.addEventListener('click', alertEvent);

function alertEvent (e)
{
  var result = confirm('Are you sure you want to clear?');
  if (result == false)
  {
      e.preventDefault();
  }
};



const postMessage = document.getElementById('postMessage');
postMessage.addEventListener('click', checkForBlank);

function checkForBlank(e)
{
  var errorMessage = "";
  document.getElementById("title").style.borderColor = 'white';
  document.getElementById("text").style.borderColor = 'white';

  if(document.getElementById('title').value == "")
  {
    errorMessage += "PLEASE ENTER A TITLE \n";
    document.getElementById("title").style.borderColor = 'red';
  }

  if(document.getElementById('text').value == "")
  {
    errorMessage += "PLEASE FILL IN THE TEXT\n";
    document.getElementById("text").style.borderColor = 'red';
  }

  if(errorMessage != "")
  {
    alert(errorMessage + "\nPlease enter the RED fields");
    e.preventDefault();
  }

};

