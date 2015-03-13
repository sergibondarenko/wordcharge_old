var myCategory;

// Helper function to display JavaScript value on HTML page.
function showResponse(response) {
    var jsonObj = response;
    console.log(jsonObj);
    console.log(jsonObj.items.length);
    //var responseString = JSON.stringify(response, '', 2);
    //document.getElementById('response').innerHTML += responseString;
	document.getElementById('videorows').innerHTML = ''; //Remove existing page videos

    var domDivRow = document.createElement('div');
	domDivRow.setAttribute('class', 'row');
    
    var jsonObjArrLen = jsonObj.items.length;
    for(var i = 0; i < jsonObjArrLen; i++){
        if(jsonObj.items[i].id.hasOwnProperty('videoId') == true){
            var videoUrl = 'http://www.youtube.com/embed/' + jsonObj.items[i].id.videoId;

            var domDivFrame = document.createElement('div');
			domDivFrame.setAttribute('class', 'col-md-3');

			//var textNode = document.createTextNode('This is a test text');
			var videoFrame = document.createElement('iframe');
			videoFrame.setAttribute('src', videoUrl);
			videoFrame.setAttribute('width', 280);
			videoFrame.setAttribute('height', 210);

			//domDivFrame.appendChild(textNode);
			domDivFrame.appendChild(videoFrame);
			domDivRow.appendChild(domDivFrame);
	
			var domElement = document.getElementById('videorows');
			domElement.appendChild(domDivRow);

//            document.getElementById('videorows').innerHTML += '<iframe width="420" height="315" src="'+videoUrl+'"></iframe><br>';
        } 
    }
}

// Called automatically when JavaScript client library is loaded.
function onClientLoad(selectedCategory) {
    gapi.client.load('youtube', 'v3', onYouTubeApiLoad);
	myCategory = selectedCategory;
}

// Called automatically when YouTube API interface is loaded (see line 9).
function onYouTubeApiLoad() {
    // This API key is intended for use only in this lesson.
    // See http://goo.gl/PdPA1 to get a key for your own applications.
    //gapi.client.setApiKey('AIzaSyCR5In4DZaTP6IEZQ0r1JceuvluJRzQNLE');
    gapi.client.setApiKey('AIzaSyCEmhLRLXatMGEtEVQ78Roo83VdaDpaYZ8');
    
    search(myCategory);
}

function search(aCategory) {
    // Use the JavaScript client library to create a search.list() API call.
    var request = gapi.client.youtube.search.list({
        part: 'snippet',
        //q: 'prodigy brothers music',
		q: aCategory,
        //order: 'viewCount',
        //region: 'IT',
        //regionCode: 'IT',
        time: 'today',
        type: 'video',
        videoEmbeddable: 'true',
        maxResults: 4
    });
    
    // Send the request to the API server,
    // and invoke onSearchRepsonse() with the response.
    request.execute(onSearchResponse);
}

// Called automatically with the response of the YouTube API request.
function onSearchResponse(response) {
    showResponse(response);
}
