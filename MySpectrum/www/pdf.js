document.addEventListener('deviceready', init, false);

function init() {
    document.querySelector('#loadPDF1').addEventListener('touchend', loadPDF1,false);
    document.querySelector('#loadPDF2').addEventListener('touchend', loadPDF2,false);
}

function loadPDF1() {
    console.log('loadPDF1');
    document.location.href='TestPDF.pdf';
}

ffunction loadPDF2() {
    console.log('loadPDF2');
    var ref = cordova.InAppBrowser.open('TestPDF.pdf', '_blank', 'location=no');
}
