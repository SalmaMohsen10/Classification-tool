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

    // Check if the question parameters are set in the URL
    if (isset($_GET['question1']) && isset($_GET['question2']) && isset($_GET['question3']) && isset($_GET['question4'])) {
      // Process the answers
      if ($_GET['question1'] === 'on') {
        // Question 1 logic
        $classificationResult = "سري للغاية";
      } elseif ($_GET['question2'] === 'on') {
        // Question 2 logic
        $classificationResult = "سري";
      } elseif ($_GET['question3'] === 'on') {
        // Question 3 logic
        $classificationResult = "مقيد";
      } elseif ($_GET['question4'] === 'on') {
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