function validateForm() {
    var requiredFields = document.querySelectorAll('.required');

    for (var i = 0; i < requiredFields.length; i++) {
        var field = requiredFields[i];
        if (field.value.trim() === '') { 
            alert("Tous les champs sont obligatoires.");
            return false;
        }
    }
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if (password !== confirm_password) {
        alert("Les mots de passe ne correspondent pas.");
        return false;
    }

    return true;
}
function addQuestion() {
    var question = document.getElementById("question").value;
    var category = document.getElementById("category").value;
    var option1 = document.getElementById("option1").value;
    var option2 = document.getElementById("option2").value;
    var option3 = document.getElementById("option3").value;
    var answer = document.getElementById("answer").value;

    var params = "question=" + encodeURIComponent(question) + "&category=" + encodeURIComponent(category) +
                 "&option1=" + encodeURIComponent(option1) + "&option2=" + encodeURIComponent(option2) +
                 "&option3=" + encodeURIComponent(option3) + "&answer=" + encodeURIComponent(answer);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_question_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message); 
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params);

    return false;
}
function deleteQuestion() {
    var questionId = document.getElementById("questionId").value;
    var params = "questionId=" + encodeURIComponent(questionId);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_question_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message); 
                window.location.href = "home_admin.php";
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params);
    return false;
}


function hideQuestion() {
    var id = document.getElementById("id").value;
    var params = "id=" + encodeURIComponent(id);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "masquer_question_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params);
    return false;
}

function deletePlayer() {
    var email = document.getElementById("email").value;

    var params = "email=" + encodeURIComponent(email);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_player_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params); 
    return false;
}

function blockPlayer() {
    var email = document.getElementById("email").value;
    var params = "email=" + encodeURIComponent(email);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "block_player_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params); 
    return false;
}

function debloquerJoueur() {
    var email = document.getElementById("email").value;
    var params = "email=" + encodeURIComponent(email);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "deblocker_joueur_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params); 
    return false;
}

document.getElementById("debloquerJoueurForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    debloquerJoueur(); 
});

function supprimerQuestion() {
    var questionId = document.getElementById("id").value;
    var params = "id=" + encodeURIComponent(id);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "supprimer_question_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send(params); 
    return false;
}

document.getElementById("supprimerQuestionForm").addEventListener("submit", function(event) {
    event.preventDefault();
    supprimerQuestion();
});

function masquerQuestion(event) {
    event.preventDefault();

    var id = document.getElementById("id").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "masquer_question_backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("message").innerHTML = response.message;
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send("id=" + encodeURIComponent(id));
}

document.getElementById("masquerQuestionForm").addEventListener("submit", masquerQuestion);
