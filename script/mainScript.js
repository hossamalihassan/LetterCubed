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

function goToSignupPage() {
  window.location = "index.php"
}

// prevent change profile picture form from reloading
// let change_profile_pic = document.querySelector(".change-pic-form")
// change_profile_pic.addEventListener("submit", function(e) {
//   e.preventDefault()
// })