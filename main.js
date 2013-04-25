document.addEventListener('DOMContentLoaded',function(){
    verifyBrowser();
});

verifyBrowser = function(){
	var browser = {};
    var uagent = navigator.userAgent.toLowerCase();

    browser.firefox = /mozilla/.test(uagent) && /firefox/.test(uagent);
    browser.chrome = /webkit/.test(uagent) && /chrome/.test(uagent);
    browser.safari = /applewebkit/.test(uagent) && /safari/.test(uagent) 
                                                    && !/chrome/.test(uagent);
    browser.opera = /opera/.test(uagent);
    browser.msie = /msie/.test(uagent);
    browser.version = '';

    for (x in browser) {
        if (browser[x]) {            
            browser.version = uagent.match(new RegExp("(" + x +")( |/)([0-9]+)"))[3];
            break;
        }
    }
	if ((x === "msie")){
		document.getElementById("browserProblems").style.display = "block";
	}
}