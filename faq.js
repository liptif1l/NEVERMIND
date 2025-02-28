document.getElementById('question-form').addEventListener('submit', function (event) {
    event.preventDefault();  // Запобігає перезавантаженню сторінки після відправлення форми

    // Отримуємо введене питання
    const questionInput = document.getElementById('question-input');
    const questionText = questionInput.value.trim();

    if (questionText) {
        // Створюємо новий блок для питання
        const questionElement = document.createElement('div');
        questionElement.classList.add('question');
        questionElement.innerHTML = <p>${questionText}</p>;

        // Додаємо блок питання до контейнера з питаннями
        document.getElementById('questions-container').appendChild(questionElement);

        // Очищаємо поле введення після відправлення питання
        questionInput.value = '';
    } else {
        alert("Будь ласка, введіть питання!");
    }
});
