
    <label> <input id="query" value='cats' type="text"/><button id="search-button"   onclick="keyWordsearch()">Search</button></label>    
    <button id="search-button"   onclick="yt_play()">Search</button>
    <div id="container">
      <h1>Search Results</h1>
      <ul id="results"></ul>
    </div>           
    <script>
        var tagret_ip = "<?php if(isset($_SESSION['aa'])){ echo $_SESSION['aa'];} ?>";
        var tagret_a = "<?php if(isset($_SESSION['auth_code'])){ echo $_SESSION['auth_code'];} ?>";
        
        
     function keyWordsearch(){
        gapi.client.setApiKey('AIzaSyDI3Lknq-QLp7YOiHwS_AH1SCS87RStDB4');
        gapi.client.load('youtube', 'v3', function() {
                makeRequest();
        });
        
        
        
}
    function makeRequest() {
        var q = $('#query').val();
        var request = gapi.client.youtube.search.list({
                q: q,
                part: 'snippet', 
                maxResults: 10,
                order : 'relevance',
                type : 'video'
        });
        request.execute(function(response)  {                                                                                    
                $('#results').empty()
                var srchItems = response.result.items;                      
                $.each(srchItems, function(index, item) {
                vidid = item.id.videoId;
                vidTitle = item.snippet.title;  
                vidThumburl =  item.snippet.thumbnails.default.url;                 
                vidThumbimg = '<pre><img id="thumb" src="'+vidThumburl+'" alt="No  Image Available." style="width:204px;height:128px"></pre>';                   

                $('#results').append('<pre>' + vidTitle + vidThumbimg + '<div><form method="post" action="<?php echo URL; ?>songs/goplay"><input name="x" hidden="true" value="' + vidid + '"/><input name="ip" hidden="true" value="' + tagret_ip +'"/><input name="auth_code" hidden="true" value="' + tagret_a + '"/><button type="submit">play</button></form></pre>');                      
        })  
    })  
}
  </script> 
  
  <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady">  </script>
