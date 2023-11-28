var i = 1;
var loopInterval;
var isLoop = false;

function start() {
    if (!isLoop) {
        isLoop = true;
        changeImage();
    }
}


function stop() {
    isLoop = false;
    clearTimeout(loopInterval);
}

function changeImage() {
    imgAction = document.getElementById("img")
    imgAction.src = "./img/" + i + ".png";
    i++;

    if (i > 4) {
        i = 1;
    }

    if (isLoop) {
        loopInterval = setTimeout(changeImage, 200);
    }
}

