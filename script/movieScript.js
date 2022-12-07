window.addEventListener("DOMContentLoaded", function() {
    const movie_id = getJsonFromUrl().id
    if(movie_id === "" || movie_id === undefined){
        window.location = "search.php"
    }
    getMovieData(movie_id)
});

// get and format the data we got 
let returnedMovieData;
async function getMovieData(movie_id){
    let movie_API_call = 'https://api.themoviedb.org/3/movie/' + movie_id +'?api_key='+ API_KEY +'&append_to_response=credits'
    returnedMovieData = await fetch(movie_API_call).then(response => response.json())

    formatMovieData(returnedMovieData)
}

// add and remove movie from database
function addMovie(cond) {
    sendMovieDataToPHPFile(returnedMovieData, cond, "movie_log_script")
}

function removeMovie(cond) {
    sendMovieDataToPHPFile(returnedMovieData, cond, "movie_remove_log_script")
}

function sendMovieDataToPHPFile(movie, cond, file_name) {
    var url = '/lettercubed/inc/' + file_name + '.php?id=' + movie.id + '&title=' + movie.title + '&poster_path=' + movie.poster_path + '&rating=' + getRating() + '&cond=' + cond
    var request = new XMLHttpRequest()
    request.open("GET", url, true)
    request.send()
}

function getRating() {
    return document.querySelector(".rating-result").innerHTML.substring(0,1)
}

function changeAddButtonText(cond){
    if(cond == "watched"){
        let watchedBtn = document.querySelector(".watched-btn")
        watchedBtn.innerHTML = "Watched"
        watchedBtn.onclick = "removeMovie('watched')"
    } else if(cond == "watchlist"){
        let watchlistBtn = document.querySelector(".watchlist-btn")
        watchlistBtn.innerHTML = "Added To Watchlist"
        watchlistBtn.onclick = "removeMovie('watchlist')"
    }
}

function changeRemoveButtonText(cond){
    if(cond == "watched"){
        let watchedBtn = document.querySelector(".watched-btn")
        watchedBtn.innerHTML = "Log"
        watchedBtn.onclick = "addMovie('watched')"
    } else if(cond == "watchlist"){
        let watchlistBtn = document.querySelector(".watchlist-btn")
        watchlistBtn.innerHTML = "Add to watchlist"
        watchlistBtn.onclick = "addMovie('watchlist')"
    }
}

// format data before displaying it
function formatMovieData(returnedMovieData){
    let title = returnedMovieData.title
    let cast = getAtLeastTenCastMembers(returnedMovieData.credits.cast)
    let director = getDirectorName(returnedMovieData.credits.crew)
    let poster = returnedMovieData.poster_path
    let year = returnedMovieData.release_date.substring(0,4)
    let genres = getGenres(returnedMovieData.genres)
    let tagLine = returnedMovieData.tagline
    let overview = returnedMovieData.overview

    renderMovieData(title, cast, director, poster, year, genres, tagLine, overview)
}

function getGenres(genres){
    let genres_arr = []
    for(let genre of genres){
        genres_arr.push(" " + genre.name)
    }

    return genres_arr.toString().trimStart()
}

function getAtLeastTenCastMembers(allCast){
    cast = []
    for(let i=0; i < Math.min(10, allCast.length); i++) {
        cast[i] = {
            name: allCast[i].name,
            img: allCast[i].profile_path,
            character: allCast[i].character
        }
    }

    return cast
}

function getDirectorName(allCrew){
    director = ""
    for(var credit of allCrew){
        if(credit.job == "Director"){
            director = credit.name;
            break;
        }
    }

    return director
}

// render the data we got 
function renderMovieData(title, cast, director, poster, year, genres, tagLine, overview){
    document.title = title + " - LetterCubed"
    setPosterDirectorSection(poster, director, title)
    setMovieMainInfoSection(year, title, genres, tagLine, overview)
    setCastSection(cast)
}

function setPosterDirectorSection(poster, director, title){
    let posterTag = (poster !== null) ? 
                    getMoviePoster(poster_path=poster, found=true) :
                    getMoviePoster(poster_path="", found=false, title=title) 

    setElementContent(document.querySelector(".poster-tag"), posterTag)

    setElementContent(document.querySelector(".director-title"), "<h4>Directed by</h4>")
    setElementContent(document.querySelector(".director-name"), director)
}

function getMoviePoster(poster_path, found, title){
    let posterTag = ""
    if(!found){
        posterTag = '<div class ="poster poster-not-found">' +
                        '<p>' + title + '</p>' +
                    '</div>'
    } else {
        let w500_poster = "https://image.tmdb.org/t/p/w500" + poster_path;
        let original_poster = "https://image.tmdb.org/t/p/original" + poster_path;
        posterTag = '<picture class="poster">' +
                        '<source srcset="'+ original_poster +'">' +
                        '<img srcset="'+ w500_poster +'" class="poster-img">' +
                    '</picture>'
    }
    return posterTag
}

function setMovieMainInfoSection(year, title, genres, tagLine, overview){
    setElementContent(document.querySelector(".release-year p"), year)
    setElementContent(document.querySelector(".movie-name p"), title)
    setElementContent(document.querySelector(".genre p"), genres)
    setElementContent(document.querySelector(".tagline p"), tagLine)
    setElementContent(document.querySelector(".overview p"), overview)
}

function setCastSection(cast) {
    if(cast.length === 0) return
    let cast_title = document.querySelector(".cast-title")
    cast_title.innerHTML += '<p class="movie-cast-title">Cast</p>'

    let cast_section = document.querySelector(".cast-content")
    cast_section_content = ""

    cast.forEach(credit => (
        cast_section_content += '<div class="movie-cast-box">' +

                                    getCastPhotoTag(credit.img, credit.name) +

                                    '<div class="cast-box-info">'+
                                        '<div class="cast-actor-name">' +
                                            '<p>'+ credit.name +'</p>' +
                                        '</div>' +

                                        '<div class="cast-actor-character">' +
                                            '<p>'+ credit.character +'</p>' +
                                        '</div>' +
                                    '</div>' +
                                
                                '</div>'
    ))

    setElementContent(cast_section, cast_section_content)

}

function getCastPhotoTag(photo_path, name){
    photo_tag = ''
    if(photo_path === null){
        photo_tag = '<div class="cast-actor-img photo-not-found">' +
                        convertCastNameToInitials(name) +
                    '</div>'
    } 
    
    else {
        let photo = "https://image.tmdb.org/t/p/original" + photo_path;
        photo_tag = '<div class="cast-actor-img">' +
                        '<img src="'+ photo  +'">' +
                    '</div>'
    }

    return photo_tag
}

function convertCastNameToInitials(name){
    let converted_name = name.substring(0,1) + "."
    for(let i=1; i < name.length; i++){
        if(name[i-1] === ' '){
            converted_name += name[i] + "."
        }
    }

    return converted_name
}

function setElementContent(element, content){
    element.innerHTML = content
}