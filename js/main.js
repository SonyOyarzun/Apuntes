
function loadScript(url, callback){

    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    script.onreadystatechange = callback;
    script.onload = callback;
    head.appendChild(script);
}

loadScript('js/pdf.js','pdf');
loadScript('js/menu.js','menu');
loadScript('js/botones.js','botones');
loadScript('js/responsive.js','responsive');
