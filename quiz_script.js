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
            var input = document.createElement("input");
            input.type = "radio";
            input.name = "question" + index;
            input.value = option;
            questionDiv.appendChild(input);
            questionDiv.appendChild(document.createTextNode(option));
            questionDiv.appendChild(document.createElement("br"));
        });
        var answerButton = document.createElement("button");
        answerButton.textContent = "Répondre";
        answerButton.addEventListener("click", function() {
            checkAnswer(index, question.answer);
        });
        questionDiv.appendChild(answerButton);
        questionsContainer.appendChild(questionDiv);
        questionsContainer.appendChild(document.createElement("br"));
    });
}

function checkAnswer(questionIndex, correctAnswer) {
    var selectedOption = document.querySelector('input[name="question' + questionIndex + '"]:checked');
    if (!selectedOption) {
        alert("Veuillez sélectionner une réponse.");
        return;
    }
    var userAnswer = selectedOption.value;
    if (userAnswer === correctAnswer) {
        alert("Bonne réponse !");
    } else {
        alert("Mauvaise réponse. La réponse correcte est : " + correctAnswer);
    }
}
