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
function logout() {
    fetch('logout.php')
        .then(response => {
            window.location.href = 'index.html';
        })
        .catch(error => console.error('Erreur lors de la déconnexion:', error));
}
document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_questions.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var questions = JSON.parse(xhr.responseText);
                displayQuestions(questions);
            } else {
                console.error("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    xhr.send();
});

function displayQuestions(questions) {
    var questionsContainer = document.getElementById("questions");
    questions.forEach(function(question, index) {
        var questionDiv = document.createElement("div");
        questionDiv.innerHTML = "<p>Question " + (index + 1) + ": " + question.question + "</p>";
        question.options.forEach(function(option) {
            questionDiv.innerHTML += "<p>" + option + "</p>";
        });
        questionDiv.innerHTML += "<p>Réponse : " + question.answer + "</p>";
        questionsContainer.appendChild(questionDiv);
    });
}
