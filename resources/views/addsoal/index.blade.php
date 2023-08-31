
{{-- INI HALAMAN UNTUK NAMBAH SOAL PER CPMK --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Question Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #3498db, #ebe4e3);
    }
    .container {
      padding: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Create a Question</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="questionTypeTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="essay-tab" data-bs-toggle="tab" data-bs-target="#essay" type="button" role="tab" aria-controls="essay" aria-selected="true">Essay</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="objective-tab" data-bs-toggle="tab" data-bs-target="#objective" type="button" role="tab" aria-controls="objective" aria-selected="false">Objective</button>
              </li>
            </ul>
            <div class="tab-content" id="questionTypeContent">
              <div class="tab-pane fade show active" id="essay" role="tabpanel" aria-labelledby="essay-tab">
                <label for="essayQuestion">Essay Question:</label>
                <textarea class="form-control" id="essayQuestion" rows="3"></textarea>
              </div>
              <div class="tab-pane fade" id="objective" role="tabpanel" aria-labelledby="objective-tab">
                <label for="objectiveQuestion">Objective Question:</label>
                <input type="text" class="form-control" id="objectiveQuestion">
                <label for="answerA">Answer A:</label>
                <input type="text" class="form-control" id="answerA">
                <label for="answerB">Answer B:</label>
                <input type="text" class="form-control" id="answerB">
                <label for="answerC">Answer C:</label>
                <input type="text" class="form-control" id="answerC">
                <label for="answerD">Answer D:</label>
                <input type="text" class="form-control" id="answerD">
                <label for="correctAnswer">Correct Answer:</label>
                <select class="form-control" id="correctAnswer">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <label for="points">Points:</label>
            <input type="number" class="form-control" id="points">
            <button class="btn btn-primary mt-3" id="generateQuestion">Generate Question</button>
            <button class="btn btn-primary mt-3" id="generateQuestion">Submit</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Generated Question</h4>
          </div>
          <div class="card-body" id="generatedQuestion">
            <!-- Generated question will be displayed here -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('generateQuestion').addEventListener('click', function() {
      const questionTypeTabs = new bootstrap.Tab(document.querySelector('#questionTypeTabs .active'));
      const selectedQuestionType = questionTypeTabs._element.getAttribute('aria-controls');

      const points = document.getElementById('points').value;

      let generatedQuestionHTML = '';
      if (selectedQuestionType === 'essay') {
        const essayQuestion = document.getElementById('essayQuestion').value;
        generatedQuestionHTML = `<p><strong>Essay Question:</strong><br>${essayQuestion}</p><p><strong>Points:</strong> ${points}</p>`;
      } else if (selectedQuestionType === 'objective') {
        const objectiveQuestion = document.getElementById('objectiveQuestion').value;
        const answerA = document.getElementById('answerA').value;
        const answerB = document.getElementById('answerB').value;
        const answerC = document.getElementById('answerC').value;
        const answerD = document.getElementById('answerD').value;
        const correctAnswer = document.getElementById('correctAnswer').value;

        generatedQuestionHTML = `
          <p><strong>Objective Question:</strong><br>${objectiveQuestion}</p>
          <p><strong>Answer A:</strong> ${answerA}</p>
          <p><strong>Answer B:</strong> ${answerB}</p>
          <p><strong>Answer C:</strong> ${answerC}</p>
          <p><strong>Answer D:</strong> ${answerD}</p>
          <p><strong>Correct Answer:</strong> ${correctAnswer}</p>
          <p><strong>Points:</strong> ${points}</p>
        `;
      }

      document.getElementById('generatedQuestion').innerHTML = generatedQuestionHTML;
    });
  </script>
</body>
</html>
