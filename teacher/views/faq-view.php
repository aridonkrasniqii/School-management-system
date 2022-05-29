 <section class="faq">
   <div class="container">
     <h2>Frequently Asked Questions</h2>
     <div class="faq__input">
       <form action="./teacher/controllers/faq-controller.php" method="post" class="faq__register">

         <textarea name="faq_question" id="register-faq" placeholder="Type your question here"></textarea>
         <input type="hidden" name="faq_answer">
         <input id="faqbtn" type="submit" name="submit-faq" value="Post">

       </form>

       <?php
        require("./database/connection.php");
        include "./repositories/faq-repository.php";
        $faqs = new faq_repository();
        $faqArr = $faqs->getAll();
        ?>

     </div>
     <div class="accordion">
       <?php foreach ($faqArr as $arr) { ?>
       <div class="accordion-item">
         <button id="accordion-button-1" aria-expanded="false">
           <span class="accordion-title">
             <?php echo $arr['faq_question']; ?>
           </span>
           <span class="icon" aria-hidden="true"></span>
         </button>
         <div class="accordion-content">
           <p>
             <?php
                $faq_answers = $faqs->getSpecificAnswers($arr['faq_id']);
                ?>
             <?php
                if (empty($faq_answers)) {
                  echo "No answer for this question";
                }
                foreach ($faq_answers as $f) {
                  echo "Answer : <br> " . $f . "<br>";
                }
                ?>

           <div class="answer-class">
             <form class="answer-form" action="./teacher/controllers/faq-controller.php" method="post">
               <input type="text" name="faq-answer" placeholder=" Type your answer here ">
               <input type="hidden" name="faq-id" value="<?php echo $arr['faq_id']; ?>">
               <button type="submit" name="submit-answer" id="answer-btn">Answer</button>
             </form>
           </div>
           </p>
         </div>
       </div>
       <?php
        } ?>

     </div>
   </div>
   <script>
   const items = document.querySelectorAll('.accordion button');

   function toggleAccordion() {
     const itemToggle = this.getAttribute('aria-expanded');

     for (i = 0; i < items.length; i++) {
       items[i].setAttribute('aria-expanded', 'false');
     }

     if (itemToggle == 'false') {
       this.setAttribute('aria-expanded', 'true');
     }
   }

   items.forEach((item) => item.addEventListener('click', toggleAccordion));
   </script>
 </section>

 <style>
#faqbtn {
  color: black;
  font-size: 20px;
  padding: 4px;
  height: 30px;
  width: 100px;
  margin-left: 30px;
  margin-bottom: 20px;
  border-radius: 2px;
}

.answer-form {
  display: flex;
  box-sizing: border-box;
  background-color: white;
  color: black;
}


.answer-class {
  display: flex;
  background-color: white;
  justify-content: center;
  width: 1000px;
}

#answer-btn {
  border: 1px solid black;
  cursor: pointer;
  padding: 4px;
  text-align: center;
  margin: 0 0 10px 10px;
  width: 100px;
}

.accordion button[aria-expanded='true']+.accordion-content {
  opacity: 1;
  max-height: 15em;
  transition: all 200ms linear;
  will-change: opacity, max-height;
}
 </style>