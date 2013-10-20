// Hide Address Bar on Mobile Devices
	function hideAddressBar()
	{
	  if(!window.location.hash) 
	  {
		  if(document.height < window.outerHeight)
		  {
			  document.body.style.height = (window.outerHeight + 50) + 'px'; 
		  }
	
		  setTimeout( function(){ window.scrollTo(0, 1); }, 50 );
	  }
	}
	window.addEventListener("load", function(){ if(!window.pageYOffset){ hideAddressBar(); } } );
	window.addEventListener("orientationchange", hideAddressBar ); 
	
	
	// Mobile Safari in standalone mode
	if(("standalone" in window.navigator) && window.navigator.standalone){
	
		// If you want to prevent remote links in standalone web apps opening Mobile Safari, change 'remotes' to true
		var noddy, remotes = false;
	
		document.addEventListener('click', function(event) {
	
			noddy = event.target;
	
			// Bubble up until we hit link or top HTML element. Warning: BODY element is not compulsory so better to stop on HTML
			while(noddy.nodeName !== "A" && noddy.nodeName !== "HTML") {
				noddy = noddy.parentNode;
			}
	
			//if('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes))
			if('href' in noddy && noddy.href.indexOf('http') !== -1 && noddy.href.indexOf('.jpg') == -1 && noddy.href.indexOf('.png') == -1 && noddy.href.indexOf('.pdf') == -1 && noddy.href.indexOf('.doc') == -1 && noddy.href.indexOf('.docx') == -1 && noddy.href.indexOf('.gif') == -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes))
			{
				event.preventDefault();
				document.location.href = noddy.href;
			}
	
		},false);
	}