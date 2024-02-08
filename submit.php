<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Submit</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <img src="check.jpg" alt="Check Mark" class="sub" />
  <p class="cong">لقد انتهينا!</p>

  <div id="result-container" class="file">
    <!-- PHP logic to process form data -->
    <?php
    // Initialize classification result
    $classificationResult = '';
    // die($_GET);

    // Check if all question parameters are set in the URL
    if (isset($_GET['question1']) && isset($_GET['question2']) && isset($_GET['question3']) && isset($_GET['question4'])) {
      // Process the answers
      $answer1 = $_GET['question1'];
      $answer2 = $_GET['question2'];
      $answer3 = $_GET['question3'];
      $answer4 = $_GET['question4'];

      // Check the value of each answer and determine the classification result
      if ($answer1 === 'yes') {
        // Question 1 logic
        $classificationResult = "سري للغاية";
      } elseif ($answer2 === 'yes') {
        // Question 2 logic
        $classificationResult = "سري";
      } elseif ($answer3 === 'yes') {
        // Question 3 logic
        $classificationResult = "مقيد";
      } elseif ($answer4 === 'yes') {
        // Question 4 logic
        $classificationResult = "عام";
      } else {
        // If none of the conditions match, set a default classification result
        $classificationResult = "لم يتم تحديد التصنيف";
      }
    } else {
      // If any of the question parameters is missing, display an error message
      echo "<p>خطأ: بعض البيانات المطلوبة مفقودة.</p>";
    }
    ?>

    <!-- Display the classification result -->
    <p><?php echo $classificationResult; ?></p>
  </div>
</body>

</html>