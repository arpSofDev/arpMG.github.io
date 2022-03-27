var surface = document.getElementById("canvas");
var context = null;
if (surface.getContext) {
    // If Canvas is supported
    context = surface.getContext('2d');
}
function drawGallows(){
  // Draw gallows
  context.moveTo(20, 20);
  context.lineTo(140, 20);
  context.moveTo(20, 20);
  context.lineTo(20, 280);
  context.moveTo(10, 280);
  context.lineTo(280, 280);
  context.stroke();
  drawNext();
}

function drawNext(guessesLeft){
  switch (guessesLeft) {
    case 9:
      //head
      context.beginPath();
      context.arc(140, 90, 30, 0, 2 * Math.PI);
      context.stroke();
      break;
    case 8:
      //body
      context.moveTo(140, 120);
      context.lineTo(140, 180);
      context.stroke();
      break;
    case 7:
      //left leg
      context.moveTo(140, 180);
      context.lineTo(105, 240);
      context.stroke();
      break;
    case 6:
      //right leg
      context.moveTo(140, 180);
      context.lineTo(175, 240);
      context.stroke();
      break;
    case 5:
      //left arm
      context.moveTo(140, 150);
      context.lineTo(105, 150);
      context.stroke();
      break;
    case 4:
      //right arm
      context.moveTo(140, 150);
      context.lineTo(175, 150);
      context.stroke();
      break;
    case 3:
      //left eye
      context.beginPath();
      context.arc(130, 85, 5, 0, 2 * Math.PI);
      context.stroke();
      context.beginPath();
      context.arc(132, 87, 2, 0, 2 * Math.PI);
      context.fillStyle = "black";
      context.fill();
      context.stroke();
      break;
    case 2:
      //right eye
      context.beginPath();
      context.arc(150, 85, 5, 0, 2 * Math.PI);
      context.stroke();
      context.beginPath();
      context.arc(148, 87, 2, 0, 2 * Math.PI);
      context.fillStyle = "black";
      context.fill();
      context.stroke();
      break;
    case 1:
      //nose
      context.moveTo(140, 90);
      context.lineTo(140, 95);
      context.stroke();
      //up mouth
      context.beginPath();
      context.arc(140, 65, 40, 0.6*Math.PI, 0.4*Math.PI, true);
      context.stroke();
      break;
    case 0:
      //noose
      context.moveTo(140, 20);
      context.lineTo(140, 60);
      context.stroke();
      //remove up mouth
      context.clearRect(120, 100, 40, 10);
      // down mouth
      context.beginPath();
      context.arc(140, 145, 40, 1.4*Math.PI, 1.6*Math.PI);
      context.stroke();
    // default:

  }
}
