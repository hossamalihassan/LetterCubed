const ratingStars = [...document.getElementsByClassName("rating-star")]
const resultSection = document.querySelector(".rating-result")

function executeRating(stars, resultSection){
    const starClassActive = "fas fa-star rating-star"
    const starClassInactive = "far fa-star rating-star"
    const starsLen = stars.length

    stars.map((star) => {
        star.onclick = () => {
            let i = stars.indexOf(star)

            if(star.className === starClassInactive) {
                updateRating(resultSection, i+1)
                for(i; i>= 0; i--) stars[i].className = starClassActive
            } else {
                updateRating(resultSection, i)
                for(i; i<starsLen; ++i) stars[i].className = starClassInactive
            }

        }
    })

}

function updateRating(resultSection, newRes){
    resultSection.innerHTML = newRes + " out of 5"
}

executeRating(ratingStars, resultSection)