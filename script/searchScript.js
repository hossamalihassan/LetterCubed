let results_container = document.querySelector(".results")

window.addEventListener("DOMContentLoaded", function() {
    const searchTag = getJsonFromUrl().search
    if(searchTag === "" || searchTag === undefined){
        getPopularMovies()
    } else {
        document.title = adjustTitle(searchTag) + " - LetterCubed"
        getSearchResultsPageReady(searchTag.toLowerCase())
        getSearchResults(searchTag.toLowerCase())
    }
});

function getSearchResultsPageReady(search_tag) {
    let popular_title = document.querySelector(".popular-title")
    popular_title.style.display = "none"

    let search_title = document.querySelector(".search-title")
    search_title.style.display = "block"

    let search_results_title = document.querySelector(".search-results-title b")
    search_results_title.innerHTML = adjustTitle(search_tag)
}

function adjustTitle(search_tag){
    let title = ""
    for(let i=0; i < search_tag.length; i++){
        if(search_tag[i] == '+'){
            title += " "
        } else {
            title += search_tag[i]
        }
    }

    return title
}

// get search results/popular movies from API
async function getDataFromAPI(API_call){
    let returnedData = await fetch(API_call).then(response => response.json())

    if(checkIfResultArrIsEmpty(returnedData.results)) return

    console.log(returnedData)

    // sort the data we got and render it 
    let sortedResults = sortResultsByPopularity(returnedData.results)
    await renderResults(sortedResults) 
}

function getPopularMovies(){
    let popular_API_call = 'https://api.themoviedb.org/3/movie/popular?api_key='+ API_KEY +'&language=en-US&page=1'
    getDataFromAPI(popular_API_call)
}

function getSearchResults(search_tag){
    let search_API_call = 'https://api.themoviedb.org/3/search/movie?api_key='+ API_KEY +'&language=en-US&query=' + search_tag
    getDataFromAPI(search_API_call)
}

function checkIfResultArrIsEmpty(results){
    if(results.length === 0){
        results_container.innerHTML += "<b>no results found</b>"
        return true
    }
}

// sort results 
function sortResultsByPopularity(search_results) {
    let results_copy = search_results.slice(0)
    results_copy.sort(function (a,b){
        if(a.popularity > b.popularity) return -1;
        if(a.popularity < b.popularity) return 1;
        return 0;
    });

    return results_copy
}

// render results we got
async function renderResults(results) {
    let results_content = ''

    results.forEach(result => {
        movie_box = formatResultBox(result)
        results_content += movie_box;
    });

    results_container.innerHTML = results_content

}

function formatResultBox(result){
    let id = result.id;
    let title = result.title;
    let release_date = result.release_date.substring(0,4)

    let poster_path = result.poster_path
    let posterTag = (poster_path !== null) ? 
                getPosterTag(poster_path=poster_path, found=true) :
                getPosterTag(poster_path="", found=false, title=title)

    let movie = '<div class="search-result-box">' +
                    posterTag +
                    '<div class="main-info">' +
                        '<h2 class="name"><a href="movie.html?id='+ id +'" class="movie-page-link">'+ title +'</a></h2>' +
                        '<h4  class="release-date">'+ release_date +'</h4>' +
                    '</div>' +
                '</div>'

    return movie
}