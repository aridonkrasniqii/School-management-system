 <?php
  include "./repositories/faq-repository.php";
  $faqs = new faq_repository();
  $faqArr = $faqs->getAll();
  ?>

 <section class="faq">
   <div class="container">
     <h2>Frequently Asked Questions</h2>
     <div class="faq__input">
       <form action="./controllers/faq-controller.php" method="post" class="faq__register">

         <textarea name="faq_question" id="register-faq" placeholder="Type your question here"></textarea>
         <input type="hidden" name="faq_answer">
         <input type="submit" name="submit-faq" value="Post">

       </form>
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
             <?php if (empty($arr['faq_answer'])) {
                  echo "No answer for this question";
                } else {
                  echo $arr['faq_answer'];
                }
                ?>
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