<?php
session_start();
if (isset($_POST["submit"])) {
  $_SESSION["test_atmpt"] += 1;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Group Assignment 1 - index.html" />
  <meta name="keywords" content="HTML, CSS" />
  <meta name="author" content="webify_group" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MP3 PROJECT</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css" />
</head>

<body class="quiz_background">
  <?php include_once("inc/quiznav.inc"); ?>
  <form method="post" action="markquiz.php" class="was-validated" novalidate>
    <fieldset>
      <legend>
        <h2>Student Details</h2>
      </legend>
      <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" id="studentid" placeholder="Student ID" name="studentId" maxlength="10" minlength="7" required="required" pattern="[0-9]+" />
        <label for="studentid">Student ID</label>
        <div class="invalid-feedback">Please fill out.</div>
      </div>
      <div class="form-floating mt-3 mb-3">
        <input type="text" name="fname" id="givenName" maxlength="30" required="required" pattern="^[a-zA-Z -]{1,30}$" placeholder="Given Name" class="form-control" />
        <label for="givenName">Given Name</label>
        <div class="invalid-feedback">Please fill out.</div>
      </div>
      <div class="form-floating mt-3 mb-3">
        <input type="text" name="lname" class="form-control" id="familyName" maxlength="30" required="required" pattern="^[a-zA-Z -]{1,30}$" placeholder="Family Name" />
        <label for="familyName">Family Name</label>
        <div class="invalid-feedback">Please fill out.</div>
      </div>
      <div class="form-floating mt-3 mb-3">
        <input type="text" name="dob" id="date" pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" required="required" class="form-control" placeholder="dd/mm/yyyy" />
        <label for="date">Date of Birth</label>
        <div class="invalid-feedback">Please fill out. (DD/MM/YYYY)</div>
      </div>
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 1</h2>
      </legend>
      <div class="form-floating mb-3 mt-3">
        <input type="text" name="question01" value="" id="question01" minlength="4" maxlength="4" pattern="^\d{4}$" required="required" class="form-control" placeholder="What year was MP3 published?" />
        <label for="textQuestion">What year was MP3 published?</label>
        <div class="invalid-feedback">Please fill out.</div>
        <img src="/Images/mp3.png" class="mp3" alt="MP3 Device" />
      </div>
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 2</h2>
      </legend>
      <br />
      <p class="question_text">
        Who is the key contributor of the MP3 file format?
      </p>
      <div class="form-check">
        <input type="radio" name="question02" id="karlheinz" required="required" class="form-check-input" value="karlheinz" />
        <label for="karlheinz">Karlheinz Brandenburg</label>
      </div>

      <div class="form-check">
        <input type="radio" name="question02" id="ernst" value="ernst" class="form-check-input" />
        <label for="ernst">Ernst Eberlein</label>
      </div>

      <div class="form-check">
        <input type="radio" name="question02" id="heinz" value="heinz" class="form-check-input" />
        <label for="heinz">Heinz Gerhäuser</label>
      </div>

      <div class="form-check">
        <label for="bernhard">Bernhard Grill</label>
        <input type="radio" name="question02" id="bernhard" value="bernhard" class="form-check-input" />
        <div class="invalid-feedback">Please select an answer.</div>
      </div>
    </fieldset>

    <fieldset>
      <legend>
        <h2>Question 3</h2>
      </legend>
      <br />
      <p class="question_text">
        Which group is responsible for managing the file format? Choose the
        correct answer.
      </p>

      <div class="form-check">
        <input class="form-check-input" type="radio" id="MPEG" name="question03" value="MPEG" />
        <label for="MPEG">MPEG Audio Group</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" id="xiph" name="question03" value="xiph" required="required" />
        <label for="xiph">Xiph.Org Foundation</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" id="microsoft" name="question03" value="microsoft" />
        <label for="microsoft">Microsoft</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="apple" name="question03" value="apple" />
        <label for="apple">Apple</label>
      </div>
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 4</h2>
      </legend>
      <br />
      <p class="question_text">
        If a song is 32MB on a CD, approximately how big will it be when
        compressed as an MP3?
      </p>
      <label for="compression"> Choose the correct answer</label>
      <br />
      <div class="form-check">
        <select class="form-select" name="question04" id="compression" required="required">
          <option value="">---</option>
          <option value="1MB">1.0MB</option>
          <option value="2MB">2.0MB</option>
          <option value="3MB">3.0MB</option>
          <option value="4MB">4.0MB</option>
        </select>
        <div class="invalid-feedback">Please select an answer.</div>
        <img src="/Images/CD.png" class="cd" alt="CD" />
      </div>
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 5</h2>
      </legend>
      <br />
      <p class="question_text">
        Which one of these elements will be removed from a song when
        compressed to MP3?
      </p>
      <div class="form-check">
        <input type="checkbox" name="question05[]" id="q5option1" class="form-check-input" value="outside" />
        <label for="q5option1">Sounds outside of human perception</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="question05[]" id="q5option2" value="too-loud" />
        <label for="q5option2">Sounds that are too loud</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="question05[]" id="q5option3" value="white-noise" />
        <label for="q5option3">White/Static Noise</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="question05[]" id="q5option4" value="softer-sou" />
        <label for="q5option4">
          The softer sound when a loud sound is playing simultaneously
        </label>
        <div class="invalid-feedback">Please select an answer.</div>
      </div>
    </fieldset>

    <fieldset>
      <legend>
        <h2>Question 6</h2>
      </legend>
      <br />
      <p class="question_text">
        Does MP3 use a lossy or lossless audio compression algorithm?
      </p>
      <div class="form-check">
        <input type="radio" name="question06" id="q6option1" class="form-check-input" value="lossy" required="required" />
        <label for="q6option1">Lossy</label>
      </div>
      <div class="form-check">
        <input type="radio" name="question06" id="q6option2" class="form-check-input" value="lossless" />
        <label for="q6option2">Lossless</label>
      </div>

      <div class="form-check">
        <input type="radio" name="question06" id="q6option3" class="form-check-input" value="neither" />
        <label for="q6option3">Neither</label>
      </div>

      <div class="form-check">
        <input type="radio" name="question06" id="q6option4" class="form-check-input" value="both" />
        <label for="q6option4">Both</label>
        <div class="invalid-feedback">Please select an answer.</div>
      </div>
      <img src="/Images/mp3device.jpg" class="device" alt="Mp3 Player" />
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 7</h2>
      </legend>
      <br />
      <div class="form-outline">
        <p class="question_text">
          Which audio file format is most common for streaming?
        </p>
        <textarea placeholder="Write your answer here..." id="q7" name="question07" value="" rows="4" cols="40" class="form-control" required="required"></textarea>
        <div class="invalid-feedback">Please fill out.</div>
      </div>
      <img src="/Images/audiofileformat.png" class="audio" alt="Audio File Format" />
    </fieldset>
    <fieldset>
      <legend>
        <h2>Question 8</h2>
      </legend>
      <br />
      <p class="question_text">
        Which MPEG-1 layer uses the mp3 file extension?
      </p>

      <div class="form-check">
        <input type="radio" id="q8aans1" name="question08" value="M1L1" required="required" class="form-check-input" />
        <label for="q8aans1">MPEG-1 Layer I</label>
      </div>

      <div class="form-check">
        <input type="radio" id="q8aans2" name="question08" value="M1L2" class="form-check-input" />
        <label for="q8aans2">MPEG-1 Layer II</label>
      </div>

      <div class="form-check">
        <input type="radio" id="q8aans3" name="question08" value="M1L3" class="form-check-input" />
        <label for="q8aans3">MPEG-1 Layer III</label>
      </div>

      <div class="form-check">
        <input type="radio" id="q8aans4" name="question08" value="M2L1" class="form-check-input" />
        <label for="q8aans4">MPEG-2 Layer I</label>
        <div class="invalid-feedback">Please select an answer.</div>
      </div>
    </fieldset>

    <!-- still need to figure out what to do with this  -->

    <div>
      <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success btn-lg" />
      <input type="reset" value="Reset Form" class="btn btn-secondary btn-lg" />
    </div>
  </form>
  <?php
  // 
  ?>
  <?php include_once("inc/footer.inc"); ?>
</body>

</html>