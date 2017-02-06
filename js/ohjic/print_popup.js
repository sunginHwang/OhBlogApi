function printPopup(targetElement,cssList,cssLinkList,height,width){
	var mywindow = null
		,data = null;
	var agent = navigator.userAgent.toLowerCase();
	
	data = $('<div/>').append($(targetElement).clone()).html();
	mywindow = window.open('', '_blank', 'height='+height+',width='+width);
    mywindow.document.write('<html><head><title>인쇄</title>');
    mywindow.document.write( '<meta http-equiv="X-UA-Compatible" content="IE=edge">');
	mywindow.document.write('<meta http-equiv="cache-control" content="max-age=0" />');
	mywindow.document.write('<meta http-equiv="cache-control" content="no-cache" />');
	mywindow.document.write('<meta http-equiv="expires" content="0" />');
	mywindow.document.write('<meta http-equiv="pragma" content="no-cache" />');
	$.each(cssLinkList, function(key, val) {
		mywindow.document.write('<link rel="stylesheet" type="text/css" href="'+val+'?' + new Date().getTime() + '" media="all">');
	});
	mywindow.document.write('<style>');
	$.each(cssList, function(key, val) {
		mywindow.document.write(val);
	});
	mywindow.document.write('</style>');
    mywindow.document.write('</head><body style="-webkit-print-color-adjust:exact">');
    mywindow.document.write(data);
    if (agent.indexOf("trident") != -1 || agent.indexOf("msie") != -1) { 
    	mywindow.document.write('<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>');
    }
    mywindow.document.write('</body><script>'); 
    if (agent.indexOf("trident") != -1 || agent.indexOf("msie") != -1) { 
    	mywindow.document.write('window.focus();window.print();');
    	/*mywindow.document.writeln('window.focus();');
    	mywindow.document.writeln('var OLECMDID = 7;');
    	mywindow.document.writeln('var PROMPT = 1;');
    	mywindow.document.writeln('WebBrowser1.ExecWB( OLECMDID, PROMPT);');*/
    	mywindow.document.write('</script></html>');
    	mywindow.document.location.reload();
	}
    else{
    	mywindow.document.write('window.focus();window.print();window.close();');
        mywindow.document.write('</script></html>');
    }
	
    return true;
};

/*function checkPreviewPrint(){ 
	var OLECMDID = 7;
	var PROMPT = 1; 
	var WebBrowser = '<OBJECT ID="previewPrintStatus" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
	document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
	if(typeof previewPrintStatus.AddressBar == "undefined" || $.trim(previewPrintStatus.AddressBar) == "undefined" || previewPrintStatus.AddressBar != true){
		return false;
	}
	else{
		return true;
	}
}*/