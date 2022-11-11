const API_KEY = "549813482a5ad2f96aa6a8ec7758a4b7"

// extract params from url
function getJsonFromUrl(url) {
    if(!url) url = location.search;
    var query = url.substr(1);
    var result = {};
    query.split("&").forEach(function(part) {
      var item = part.split("=");
      result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
}

// get posterTag and check if we don't have it
function getPosterTag(poster_path, found, title){
  let posterTag = ""
  if(!found){
      posterTag = '<div class ="poster poster-not-found">' +
                      '<p>' + title + '</p>' +
                  '</div>'
  } else {
      let poster = "https://image.tmdb.org/t/p/w500" + poster_path;
      posterTag = '<div class="poster">' +
                      '<img src="'+ poster +'" class="poster-img">' +
                  '</div>' 
  }

  return posterTag
}