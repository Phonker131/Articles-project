// Constants & global variables
const MAX_NUMBER_ARTICLES = 10;
const BASE_DIR = '/~29565063/cms';
let index = 0;
let favorite = false;

function addToFavorite(articleId){
    let favoritesId = [];
    console.log(this)
    if(localStorage.getItem("favorites")){
        favoritesId = JSON.parse(localStorage.getItem("favorites"));
    }
    if(!favoritesId.includes(articleId)){
        favoritesId.push(articleId);
    }
    else{
        favoritesId.splice(favoritesId.indexOf(articleId),1);
    }

    localStorage.setItem("favorites",JSON.stringify(favoritesId));

}


// Makes button enabled/disabled while entering article name on pages of creation and edition
function enableSaveButton() {
    let articleName = document.querySelector("#article-name").value.trim();
    let createButton = document.querySelector('.create');
    if (articleName.length > 0 && articleName.length <= 32 && createButton.hasAttribute("disabled")) {
        createButton.removeAttribute("disabled");
    }
    if ((articleName.length === 0 || articleName.length > 32) && !createButton.hasAttribute("disabled")) {
        createButton.setAttribute("disabled", "disabled");
    }
}

// Creates AJAX request to make an article
function createArticle() {
    let formData = new FormData();
    let articleName = document.querySelector("#article-name").value;
    formData.set("article_name", articleName);
    fetch(BASE_DIR+"/article", { method: 'POST', body: formData }).then(response => response.json()).then(data => {
        if (data.result) {
            window.location.href = BASE_DIR+"/edit_article/" + data.result;
        }
    });
}

// Creates AJAX request to remove an article
function removeArticle(articleId) {
    fetch(BASE_DIR+"/article/" + articleId, { method: 'DELETE' }).then(response => response.json()).then(data => {
        if (data.result) {
            document.querySelector("#article" + articleId).remove();
            let articles = document.querySelectorAll('.article');
            if ((index - 1) * MAX_NUMBER_ARTICLES == articles.length) {
                prev();
            } else {
                index--;
                next();
            }
            renderNumberPages();
        }
    });
}

function onlyFavorite(){

    favorite = !favorite;
        index--;
        next();
}



// Render the next page of article list
function next() {
    console.log(favorite)
    let articles = document.querySelectorAll('.article');
    let n = 0
    if (articles.length % MAX_NUMBER_ARTICLES > 0) {
        n = 1;
    }
    if ((index + 1) * MAX_NUMBER_ARTICLES <= articles.length + n * MAX_NUMBER_ARTICLES) {
        articles.forEach((article, i) => {

            if(!favorite) {
                if (i >= index - 1 && i < index * MAX_NUMBER_ARTICLES) {
                    article.style.display = 'none'
                }
                if (i >= index * MAX_NUMBER_ARTICLES && i < (index + 1) * MAX_NUMBER_ARTICLES) {
                    article.style.display = 'block'
                }
            }
            else{
                let favAr = JSON.parse(localStorage.getItem("favorites"));
                console.log(favAr)
                let id = article.id.replace("article",'');
                console.log(id)
                if (!favAr.includes(parseInt(id)) /*&&  i >= index - 1 && i < index * MAX_NUMBER_ARTICLES*/) {
                    article.style.display = 'none'
                }
                if (favAr.includes(parseInt(id))&&i >= index * MAX_NUMBER_ARTICLES && i < (index + 1) * MAX_NUMBER_ARTICLES) {
                    article.style.display = 'block'
                }



            }



        })
        index++;
    }
    checkPaginationButtons();
}

function checkPaginationButtons(){
    console.log(index)
    let articles = document.querySelectorAll('.article');
    let n = 0
    if (articles.length % MAX_NUMBER_ARTICLES > 0) {
        n = 1;
    }
    if ((index + 1) * MAX_NUMBER_ARTICLES > articles.length + n * MAX_NUMBER_ARTICLES) {
        document.querySelector('.next').style.visibility = 'hidden';
    }
    else{
        document.querySelector('.next').style.visibility = 'visible';
    }

    if (index<=1) {
        document.querySelector('.prev').style.visibility = 'hidden';
    }
    else{
        document.querySelector('.prev').style.visibility = 'visible';
    }
}





// Render the previous page of article list
function prev() {
    let articles = document.querySelectorAll('.article');
    if (index > 1) {
        articles.forEach((article, i) => {
            if (i >= (index - 2) * MAX_NUMBER_ARTICLES && i < index * MAX_NUMBER_ARTICLES) {
                article.style.display = 'block';
            }
            if (i >= (index - 1) * MAX_NUMBER_ARTICLES && i < index * MAX_NUMBER_ARTICLES) {
                article.style.display = 'none'
            }
        })
        index--;
    }
    checkPaginationButtons();
}

// Dynamically renders the number of pages
function renderNumberPages() {
    let articles = document.querySelectorAll('.article');
    let numberArticles = Math.ceil(articles.length / MAX_NUMBER_ARTICLES);
    document.querySelector('.number-articles').innerHTML = "Page count " + numberArticles;
}



// Adding functions for dom elements by event load content of document
document.addEventListener("DOMContentLoaded", function () {
    // Pagination
    if (!!document.querySelector('.article')) {
        renderNumberPages();

        document.querySelector('.next').addEventListener('click', next)
        document.querySelector('.prev').addEventListener('click', prev)
        document.querySelector('.favorites').addEventListener('click',onlyFavorite )
        next();

        // Show model-window by creating article
        document.querySelector('.open-modal').addEventListener('click', function () {
            document.querySelector('#modal-window').style.display = "block";
        });

        // Hide model-window
        document.querySelector('.cancel').addEventListener('click', function () {
            document.querySelector('#modal-window').style.display = "none";
        });

        document.querySelector('.create').addEventListener('click', createArticle);

        // Toggle favorite on checkbox change
        document.querySelectorAll('.favoriteCheckbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const articleId = this.getAttribute('data-id');
                toggleFavorite(articleId);
            });
        });
    }

    if (!!document.querySelector('#article-name')) {
        enableSaveButton();
        document.querySelector('#article-name').addEventListener('input', enableSaveButton);
    }
});
