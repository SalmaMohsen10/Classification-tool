<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>استطلاع رأي</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>

  <div class="thin">
    <b class="two">قياس الأثر</b>

    <form id="checkboxForm" action="./submit.php" method="get" onsubmit="return validateForm()">

      <div class="question">
        <p>
          1-هل يؤدي الوصول غير المصرح به إلى هذه البيانات أو الإفصاح عنها أو
          عن محتواها إلى ضرر جسيم واستثنائي لا يمكن تداركه أو إصلاحه على
          المصالح الوطنية أو أداء الجهات العامة أو صحة الأفراد وسلامتهم أو
          الموارد البيئية والطبيعية؟
          <a href="read_more1.html">اقرأ أكثر</a>
        </p>

        <div class="checkbox-container">
          <label for="checkbox1" class="yes">نعم</label>
          <input type="radio" id="checkbox1" class="styled-checkbox" name="question1" value="yes" />


          <label for="checkbox2" class="no">لا</label>
          <input type="radio" id="checkbox2" class="second-checkbox" name="question1" value="no" />
        </div>
      </div>

      <div class="question">
        <p>
          2- هل يؤدي الوصول غير المصرح به إلى هذه البيانات أو الإفصاح عنها أو
          عن محتواها إلى ضرر جسيم على المصالح الوطنية بشكل جزئي او يحدث خسارة
          مالية او يتسبب بحدوث أذى جسيم على صحة مجموعة من الافراد او يؤدي الى
          ضرر على المدى الطويل للموارد البيئية والطبيعية؟
          <a href="read_more2.html">اقرأأكثر</a>
        </p>

        <div class="checkbox-container">
          <label for="checkbox3" class="yes">نعم</label>
          <input type="radio" id="checkbox3" class="styled-checkbox" name="question2" value="yes" />


          <label for="checkbox4" class="no">لا</label>
          <input type="radio" id="checkbox4" class="second-checkbox" name="question2" value="no" />
        </div>
      </div>

      <div class="question">
        <p>
          3- هل يؤدي الوصول غير المصرح به إلى هذه البيانات أو الإفصاح عنها أو
          عن محتواها:
          <a href="read_more3.html">اقرأأكثر</a>
        </p>

        <ul>
          <li>تأثير سلبي محدود على عمل الجهات العامة او الانشطة</li>
          <li>الاقتصادية في المملكة او على عمل شخص معين</li>
          <li>
            ضرر محدود على اصول اي جهة و خسارة محدودة على وضعها المالي و
            التنافسي
          </li>
          <li>ضرر محدود على المدى القريب للموارد البيئية او الطبيعية</li>
        </ul>

        <div class="checkbox-container">
          <label for="checkbox5" class="yes">نعم</label>
          <input type="radio" name="question3" id="checkbox5" class="styled-checkbox" value="yes" />


          <label for="checkbox6" class="no">لا</label>
          <input type="radio" name="question3" id="checkbox6" class="second-checkbox" value="no" />
        </div>
      </div>

      <div class="question">
        <p>
          4-الوصول غير المصرح به لهذه البيانات لا يترتب عليه اي اثر؟<a href="read_more4.html">اقرأأكثر</a>
        </p>

        <div class="checkbox-container">
          <label for="checkbox7" class="yes">نعم</label>
          <input type="radio" id="checkbox7" class="styled-checkbox" name="question4" value="yes" />


          <label for="checkbox8" class="no">لا</label>
          <input type="radio" id="checkbox8" class="second-checkbox" name="question4" value="no" />
        </div>
      </div>
      <div class="result" id="result"></div>
      <div class="bar" id="bar"></div>

      <div class="buttons">
        <button class="one" type="submit">إرسال</button>
        <button class="two" type="button" onclick="deleteAllAnswers()">
          مسح الإجابات
        </button>
      </div>
    </form>


    <script>
      var classificationResult; // Global variable to store the classification result

      function classify() {
        // Get the answers to each question
        var answer1 = document.querySelector(
          'input[name="question1"]:checked'
        );
        var answer2 = document.querySelector(
          'input[name="question2"]:checked'
        );
        var answer3 = document.querySelector(
          'input[name="question3"]:checked'
        );
        var answer4 = document.querySelector(
          'input[name="question4"]:checked'
        );

        // Special condition for Question 1
        if (answer1 && answer1.value === "yes") {
          classificationResult = "سري للغاية";
          // Set the underline color to dark red
          document.getElementById("result").style.borderBottomColor =
            "#8B0000";
          return;
        }

        // Question 2 logic
        if (answer2 && answer2.value === "yes") {
          classificationResult = "سري";
          // Set the underline color to light red
          document.getElementById("result").style.borderBottomColor =
            "#FF4500";
          return;
        }

        // Question 3 logic
        if (answer3 && answer3.value === "yes") {
          classificationResult = "مقيد";
          // Set the underline color to brown or orange
          document.getElementById("result").style.borderBottomColor =
            "#A52A2A";
          return;
        }

        // Question 4 logic
        if (answer4 && answer4.value === "yes") {
          classificationResult = "عام";
          // Set the underline color to green
          document.getElementById("result").style.borderBottomColor =
            "#008000";
          return;
        }
      }

      // Add the 'submit' event listener to the form
      document
        .getElementById("checkboxForm")
        .addEventListener("submit", function(event) {
          // Call the classify function to determine the result
          classify();

          // Append classificationResult as a query parameter to the form action URL
          this.action = "./submit.php";
        });

      function deleteAllAnswers() {
        var checkboxes = document.querySelectorAll(
          ".styled-checkbox, .second-checkbox"
        );
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      }

      function validateForm() {
        var questions = document.querySelectorAll(".question");

        for (var i = 0; i < questions.length; i++) {
          var checkboxes = questions[i].querySelectorAll(
            ".styled-checkbox, .second-checkbox"
          );
          var checked = false;

          for (var j = 0; j < checkboxes.length; j++) {
            if (checkboxes[j].checked) {
              checked = true;
              break;
            }
          }

          if (!checked) {
            alert("برجاء اختيار إجابة لكل سؤال قبل الإرسال");
            return false; // Prevent form submission
          }
        }

        return true; // Allow form submission
      }
    </script>
  </div>
</body>

</html>