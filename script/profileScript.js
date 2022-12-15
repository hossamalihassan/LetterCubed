function sendRequest(user_id, cond){
    console.log(user_id)

    var url = '/lettercubed/inc/user_following_script.php?user_id=' + user_id + "&cond=" + cond
    var request = new XMLHttpRequest()
    request.onreadystatechange = function() {
        if (request.readyState == XMLHttpRequest.DONE) {
            window.location.reload();
        }
    }
    request.open("GET", url, true)
    request.send()
}