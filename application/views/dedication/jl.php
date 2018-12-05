<!doctype html>
<html lang="en">
<head>
  <?php $counter = 0?>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php
  $prefix = $this->session->userdata('prefix');
  $account_id = $this->session->userdata('account_id');
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
  ?>

  <title>
    JL | Dedication
  </title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>
  <div class="container-fluid" style="height: 100%; width: 100%;">

    <?php 
    $this->load->view('layouts/header');
    ?>
  
    <div class="row mx-5 oapps-mh"><!-- MAIN START -->
    <!-- Card start -->
      <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">JL's Dedication</h5>
          <p class="card-text">
            For the past year that we had worked on our Systems Analysis and Design Project, The Online Activity Proposal Processing System (OAPPS), me and my group had grown into our respective persons drastically and dramatically. 
            Creating this system was a challenge, but one we knew we would be able to accomplish because of my faith in my skills and in my group. I wonder then if I could still consider the creation of this system a challenge if my sense of 
            confidence was so strong. Perhaps it is a mark of what one may call a leader that this confidence yields itself unto. You may call me bold and arrogant to refer to myself as our leader as if I may have skills beyond that of my groupmates; but no, 
            I could only attest for my decision-making skills, communication skills, management skills, analytical skills, and strong-headedness. All else, the patience, the execution of tasks, the ingenuity of solutions, 
            the grounded areas of work – these are all the work of my groupmates that have been achieved to a marvelous degree. I was only there to direct, yet I had so much confidence in them that it felt like cheating. 
            The leader is just as dependent on his group – achieve confidence in one another and excellence will follow.
          </p>

          <p class="card-text">
            Before I thank my group, I’d like to go on a tangent first and thank God. Perhaps this is not the place for me to say, 
            but I am not incredibly religious yet I have a firm belief that God is here and He is good. In the past year, I’ve felt myself become closer to Him with the help of people that 
            I will also thank later. There were many times wherein I drew my confidence from Him – I prayed, then I pound my fist on my chest to give life to my heart – through that, somehow, 
            He had given me strength.
          </p>

          <p class="card-text">
            Next, I would like to thank my parents. Mama and Papa, thank you so very much for giving me such a wonderful life. It was never perfect and nearing the end of my thesis we hit an all-time low in terms of finances. But, I was still provided with the things I needed in order to perform the things I needed to perform. Thank you, mama, especially. Despite our lack of money, you had bought me a new coat, my very first personal coat, and a tie. I wasn’t able to show you how much I appreciated this gesture because of my stoic nature but it is truly one of the most loving acts I have ever had done unto me.
          </p>

          <p class="card-text">
            Next, I would like to thank my cousins. Ate Noreen, Kuya Yves, Yeye, Emma, and Coleen. Each and every one of you hold such a special place in my heart that I don’t think any other group of people can ever take that place. Perhaps it’d be more sincere to thank you in our native tongue but I reckon that the grammarian might not be so thrilled having to edit a secondary language, so you would all have to forgive me for how I am writing this.
          </p>

          <p class="card-text">
            To Ate, thank you so much for being there for me when times were rough. When I needed someone to rely on you were there for me. You treated me as if I were your little brother, and I had felt it in the depths of my heart. In this whole year I was making this system with my team, I had felt that I had gotten terribly closer to all of you; and the world has become all the better for it. I look up to you so dearly and hope to grow into a person similar to you one day. If ever the day comes, that I remind someone of you – I’d know that I had done something right. I love you very dearly, ate.
          </p>

          <p class="card-text">
            To Kuya, ever since our childhood I thought of you like the brother I never had but desperately wanted to have. In my silence as a child, you would approach me and encourage me to join along despite my introverted nature. You were always looking out for me, and for that I have always been eternally grateful. I also love how we share interests; it makes me feel like there is someone I can always approach when I want to talk about my passions. I know that you are also similar to me in how we carry our burdens. Because of that fact, I’d like to let you know that I hope that we can start relying on each other. There is a newfound trust in me that is rooted from my love for you and our, should I be bold to say, fellow siblings. And, truly, I love you so very much.
          </p>

          <p class="card-text">
            To Yeye, whenever I think of you, you remind me so very much of myself. I feel as if we were born with similar souls but had grown up just a little bit differently. It is because of that fact that I learn so very much from you and our interactions with one another. I learned that there are somethings that I could try doing from your perspective – and truly it has helped me grow as a person. You had always cared for me deeply and I care for you deeply just the same. You are there in the fondest of my memories along with our beloved siblings. I love you very much, Yeye.
          </p>

          <p class="card-text">
            To Emma, you had always been there from the very start. You were that one thing I could not rid of if I had tried. Perhaps you are the closest to what I could have felt a sibling to be. I know that I am not the best kuya – but for staying with me all the same, I’d like to thank you. Seeing you grow up slowly gives me a sense of pride, for you had grown up in my midst as we learned from one another. We see now how good it is, the lessons we have taught one another and what else must we do with these things we learned than to challenge the world with it? Love you, Ems. 
          </p>

          <p class="card-text">
            Last, but certainly not least,
          </p>

          <p class="card-text">
            To Coleen, you have always been an important person to me. You are the one that looks at me with kind eyes and smiles – as if you understand what exists inside me that even I, myself, cannot grasp. But perhaps that is a merely romanticism of the reality. Despite that, to me, it was a saving grace. Because truly, you had saved me. I had finally felt like someone wanted to understand me. You were my gateway to this world that is new to me wherein I feel welcome and loved. How could I possibly not be grateful for a gift so precious as being understood and cherished? You will always be so very important to me – likely until my death I would think fondly of you, like the rest of our siblings. You are truly God’s Instrument that exudes His Love. All this growth I had done in this past year, I couldn’t have done without you. I love you very very much. 
          </p>

          <p class="card-text">
            <img src="<?=base_url()?>assets/img/flower.png">
          </p>

          <p class="card-text">
            To my groupmates, I had already given you this message prior but I’ll draft it unto this so that it will be duly commemorated:
          </p>  

          <p class="card-text font-italic">
            Good morning guys! Thank you. Maraming salamat at tapos na din. Thank you for bearing with me kahit medyo sabog ako minsan and trusting me na madadala natin yung efforts natin to something great. Thanks Aethan for working tirelessly and coding for OAPPS. Alam kong na enjoy mo naman and marami ka natutunan doing it pero I'd like to thank you all the same. Thanks Joseph for being very patient and working just as hard in filling in the holes in my leadership, though I'm not sure if it's appropriate to call it that. Thanks, finally, to Martie for going out of your way to perform to the best of your ability. I know na it mightve been hard and alam kong naging issue naman natin dati yung feeling niyo lahat with na insecure kayo sa abilities niyo but please believe when I say na talagang di magiging OAPPS yung OAPPS kung di sa effort mo. So, thank you everyone for working so hard. I know I may not act like it but I still think of you guys as good friends, it's just that I'm not exactly very sure how to approach things. But that is okay. Thanks for the wonderful experience of working together, I still wouldn't have chosen any other group of people to be the members of my team. Pahinga na guys and salamat!
          </p>  

          <p class="card-text">
           Moving past my family and team, I hope you’d allow much shorter messages, this does not mean you are any less dear to me though. I’d like to thank my best friend Arvi for always being so understanding and ever present for me. My other best friend Tristan for being such an outstanding person to perhaps exist as the second half of me in our duality. My best friend from Ateneo, Regie Santiago, though we haven’t talked in a while, I still would like to give gratitude to you. To my dear friend, Angela Se for being so welcoming and heartwarming for the past year. The rest of my high school friends: Pedro, Jaoie, Charles, Renzo, Franz, Paolo, Kishiro, Edward, Logatoc, and everybody else. I love you all dearly
          </p>  
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
      <!-- Card end -->
    </div> <!-- MAIN END -->
  </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
  crossorigin="anonymous">
</script>


<!-- Local files -->
<script type="text/javascript">
  var BASE_URL = "<?=base_url();?>";
</script>
<script src="<?=base_url();?>assets/js/core.js">
</script>

<?php else: ?>
<title>
  JL | Dedication
</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>
  <div class="container-fluid" style="height: 100%; width: 100%;">

    <?php 
    $this->load->view('layouts/guest_header');
    ?>
  
    <div class="row mx-5 oapps-mh"><!-- MAIN START -->
        <!-- Card start -->
      <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">JL's Dedication</h5>
          <p class="card-text">
            For the past year that we had worked on our Systems Analysis and Design Project, The Online Activity Proposal Processing System (OAPPS), me and my group had grown into our respective persons drastically and dramatically. 
            Creating this system was a challenge, but one we knew we would be able to accomplish because of my faith in my skills and in my group. I wonder then if I could still consider the creation of this system a challenge if my sense of 
            confidence was so strong. Perhaps it is a mark of what one may call a leader that this confidence yields itself unto. You may call me bold and arrogant to refer to myself as our leader as if I may have skills beyond that of my groupmates; but no, 
            I could only attest for my decision-making skills, communication skills, management skills, analytical skills, and strong-headedness. All else, the patience, the execution of tasks, the ingenuity of solutions, 
            the grounded areas of work – these are all the work of my groupmates that have been achieved to a marvelous degree. I was only there to direct, yet I had so much confidence in them that it felt like cheating. 
            The leader is just as dependent on his group – achieve confidence in one another and excellence will follow.
          </p>

          <p class="card-text">
            Before I thank my group, I’d like to go on a tangent first and thank God. Perhaps this is not the place for me to say, 
            but I am not incredibly religious yet I have a firm belief that God is here and He is good. In the past year, I’ve felt myself become closer to Him with the help of people that 
            I will also thank later. There were many times wherein I drew my confidence from Him – I prayed, then I pound my fist on my chest to give life to my heart – through that, somehow, 
            He had given me strength.
          </p>

          <p class="card-text">
            Next, I would like to thank my parents. Mama and Papa, thank you so very much for giving me such a wonderful life. It was never perfect and nearing the end of my thesis we hit an all-time low in terms of finances. But, I was still provided with the things I needed in order to perform the things I needed to perform. Thank you, mama, especially. Despite our lack of money, you had bought me a new coat, my very first personal coat, and a tie. I wasn’t able to show you how much I appreciated this gesture because of my stoic nature but it is truly one of the most loving acts I have ever had done unto me.
          </p>

          <p class="card-text">
            Next, I would like to thank my cousins. Ate Noreen, Kuya Yves, Yeye, Emma, and Coleen. Each and every one of you hold such a special place in my heart that I don’t think any other group of people can ever take that place. Perhaps it’d be more sincere to thank you in our native tongue but I reckon that the grammarian might not be so thrilled having to edit a secondary language, so you would all have to forgive me for how I am writing this.
          </p>

          <p class="card-text">
            To Ate, thank you so much for being there for me when times were rough. When I needed someone to rely on you were there for me. You treated me as if I were your little brother, and I had felt it in the depths of my heart. In this whole year I was making this system with my team, I had felt that I had gotten terribly closer to all of you; and the world has become all the better for it. I look up to you so dearly and hope to grow into a person similar to you one day. If ever the day comes, that I remind someone of you – I’d know that I had done something right. I love you very dearly, ate.
          </p>

          <p class="card-text">
            To Kuya, ever since our childhood I thought of you like the brother I never had but desperately wanted to have. In my silence as a child, you would approach me and encourage me to join along despite my introverted nature. You were always looking out for me, and for that I have always been eternally grateful. I also love how we share interests; it makes me feel like there is someone I can always approach when I want to talk about my passions. I know that you are also similar to me in how we carry our burdens. Because of that fact, I’d like to let you know that I hope that we can start relying on each other. There is a newfound trust in me that is rooted from my love for you and our, should I be bold to say, fellow siblings. And, truly, I love you so very much.
          </p>

          <p class="card-text">
            To Yeye, whenever I think of you, you remind me so very much of myself. I feel as if we were born with similar souls but had grown up just a little bit differently. It is because of that fact that I learn so very much from you and our interactions with one another. I learned that there are somethings that I could try doing from your perspective – and truly it has helped me grow as a person. You had always cared for me deeply and I care for you deeply just the same. You are there in the fondest of my memories along with our beloved siblings. I love you very much, Yeye.
          </p>

          <p class="card-text">
            To Emma, you had always been there from the very start. You were that one thing I could not rid of if I had tried. Perhaps you are the closest to what I could have felt a sibling to be. I know that I am not the best kuya – but for staying with me all the same, I’d like to thank you. Seeing you grow up slowly gives me a sense of pride, for you had grown up in my midst as we learned from one another. We see now how good it is, the lessons we have taught one another and what else must we do with these things we learned than to challenge the world with it? Love you, Ems. 
          </p>

          <p class="card-text">
            Last, but certainly not least,
          </p>

          <p class="card-text">
            To Coleen, you have always been an important person to me. You are the one that looks at me with kind eyes and smiles – as if you understand what exists inside me that even I, myself, cannot grasp. But perhaps that is a merely romanticism of the reality. Despite that, to me, it was a saving grace. Because truly, you had saved me. I had finally felt like someone wanted to understand me. You were my gateway to this world that is new to me wherein I feel welcome and loved. How could I possibly not be grateful for a gift so precious as being understood and cherished? You will always be so very important to me – likely until my death I would think fondly of you, like the rest of our siblings. You are truly God’s Instrument that exudes His Love. All this growth I had done in this past year, I couldn’t have done without you. I love you very very much. 
          </p>

          <p class="card-text">
            <img src="<?=base_url()?>assets/img/flower.png">
          </p>

          <p class="card-text">
            To my groupmates, I had already given you this message prior but I’ll draft it unto this so that it will be duly commemorated:
          </p>  

          <p class="card-text font-italic">
            Good morning guys! Thank you. Maraming salamat at tapos na din. Thank you for bearing with me kahit medyo sabog ako minsan and trusting me na madadala natin yung efforts natin to something great. Thanks Aethan for working tirelessly and coding for OAPPS. Alam kong na enjoy mo naman and marami ka natutunan doing it pero I'd like to thank you all the same. Thanks Joseph for being very patient and working just as hard in filling in the holes in my leadership, though I'm not sure if it's appropriate to call it that. Thanks, finally, to Martie for going out of your way to perform to the best of your ability. I know na it mightve been hard and alam kong naging issue naman natin dati yung feeling niyo lahat with na insecure kayo sa abilities niyo but please believe when I say na talagang di magiging OAPPS yung OAPPS kung di sa effort mo. So, thank you everyone for working so hard. I know I may not act like it but I still think of you guys as good friends, it's just that I'm not exactly very sure how to approach things. But that is okay. Thanks for the wonderful experience of working together, I still wouldn't have chosen any other group of people to be the members of my team. Pahinga na guys and salamat!
          </p>  

          <p class="card-text">
           Moving past my family and team, I hope you’d allow much shorter messages, this does not mean you are any less dear to me though. I’d like to thank my best friend Arvi for always being so understanding and ever present for me. My other best friend Tristan for being such an outstanding person to perhaps exist as the second half of me in our duality. My best friend from Ateneo, Regie Santiago, though we haven’t talked in a while, I still would like to give gratitude to you. To my dear friend, Angela Se for being so welcoming and heartwarming for the past year. The rest of my high school friends: Pedro, Jaoie, Charles, Renzo, Franz, Paolo, Kishiro, Edward, Logatoc, and everybody else. I love you all dearly
          </p>  


          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
      <!-- Card end -->
    </div> <!-- MAIN END -->
  </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
  crossorigin="anonymous">
</script>

<?php endif?>
</body>



</html>