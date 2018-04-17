document.addEventListener('deviceready', init, false);

function init() {
    document.querySelector('#loadPDF2').addEventListener('touchend', loadPDF2,false);
}

function loadPDF2() {
    var ref = cordova.InAppBrowser.open('TestPDF.pdf', '_blank', 'location=no');
}
