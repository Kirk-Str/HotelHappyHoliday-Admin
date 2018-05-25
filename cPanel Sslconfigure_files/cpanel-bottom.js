if(typeof PAGE.appGroups!=='undefined'){
	for(var i=0;i<PAGE.appGroups.length;i++){
		if(PAGE.appGroups[i].group==='preferences'){
			for(var j=0;j<PAGE.appGroups[i].items.length;j++){
				if(['password','setlang'].indexOf(PAGE.appGroups[i].items[j].feature)>-1){
					PAGE.appGroups[i].items.splice(j,1);j--;
				}
			}
		}
		if(PAGE.appGroups[i].group==='domains'){
			for(var j=0;j<PAGE.appGroups[i].items.length;j++){
				if(PAGE.appGroups[i].items[j].feature==='sitepublisher'){
					// PAGE.appGroups[i].items.splice(j,1);j--; To Remove
					PAGE.appGroups[i].items[j].url='http://www.profreehost.com/get/cu.cc'; // To edit the url
				}
			}
		}
		if(PAGE.appGroups[i].group==='databases'){
			for(var j=0;j<PAGE.appGroups[i].items.length;j++){
				if(PAGE.appGroups[i].items[j].feature==='postgres'){
					PAGE.appGroups[i].items.splice(j,1);j--;
				}
			}
		}
		if(PAGE.appGroups[i].group==='software'){
			for(var j=0;j<PAGE.appGroups[i].items.length;j++){
				if(PAGE.appGroups[i].items[j].feature==='sitereptile'){
					PAGE.appGroups[i].items[j].url='https://profreehost.com/account?view=builders';
				}
			}
		}
		/*
		if(PAGE.appGroups[i].group==='support'){
			for(var j=0;j<PAGE.appGroups[i].items.length;j++){
				if(['createticket','ShowTickets'].indexOf(PAGE.appGroups[i].items[j].feature)>-1){
				PAGE.appGroups[i].items.splice(j,1);j--;
				}
				if(PAGE.appGroups[i].items[j].feature==='cloudflare_analytics'){
					PAGE.appGroups[i].items[j].url='https://profreehost.com/support';
				}
			}
		}
		*/
		if(PAGE.appGroups[i].group==='soft_div'){
			PAGE.appGroups.splice(i,1);i--;
		}
	}
}

window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#3c404d",
      "text": "#d6d6d6"
    },
    "button": {
      "background": "#8bed4f"
    }
  },
  "theme": "classic",
  "content": {
    "dismiss": "Continue",
    "link": "More Info",
    "href": "https://profreehost.com/privacy"
  }
})});