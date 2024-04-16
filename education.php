<?php
require 'connection.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $system_name; ?></title>
  <link rel="shortcut icon" href="sources/logoicon.png" type="image/png">
  <link rel="stylesheet" href="scrollbar.css">
  <link rel="stylesheet" href="index.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>

  <?php include 'header2.php'; ?>


  <div class="index-container" id="H1">
    <div class="text-container">
      <div class="index-text">
        <h1 data-aos="fade-up"><strong>Why Track Your Carbon Footprint?</strong></h1>
        <center>
          <hr data-aos="fade-up">
          <p data-aos="fade-up">One crucial way to contribute to the worldwide endeavor to lessen climate change's impacts is by minimizing your carbon footprint. Hence, it's essential for not just individuals but also companies and governments to monitor their carbon emissions.</p>
        </center>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill=" #fff0bb" fill-opacity="1" d="M0,96L80,128C160,160,320,224,480,229.3C640,235,800,181,960,181.3C1120,181,1280,235,1360,261.3L1440,288L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
  </div>

  <div class="index-container" id="H2">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>What is Carbon Footprint?</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">A carbon footprint encompasses the entire quantity of greenhouse gases (GHGs) produced directly or indirectly by an individual, organization, or nation. These GHGs consist of carbon dioxide (CO₂), methane (CH₄), nitrous oxide (N₂O), and fluorinated gases, including hydrofluorocarbons (HFCs), perfluorocarbons (PFCs), and sulfur hexafluoride (SF₆). In discussing an individual's carbon footprint, we refer to both the direct emissions from activities like driving and the indirect emissions from the lifecycle of goods and services they use. For instance, the carbon footprint of someone who uses a car accounts for the GHGs released during driving and those emitted during the manufacturing of the car and the production of its fuel.</p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H2">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>Why Track Your Carbon Footprint?</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">There are several reasons why it’s important to track your carbon footprint.</p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H3">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>1. Track to Reduce Emissions</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">The primary and most apparent benefit of monitoring your emissions is the ability to pinpoint where you can lessen your environmental footprint. For instance, discovering that a significant part of your emissions originates from driving could lead you to opt for carpooling or more frequent use of public transit. Similarly, if your home energy consumption is high, you might transition to energy-saving appliances. </p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H3">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>2. Save Money</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">Monitoring and minimizing your carbon footprint not only aids the environment but also benefits your financial situation. Numerous strategies to decrease your emissions, like carpooling, utilizing public transit, or adopting energy-efficient appliances, can also lead to cost savings. Thus, keeping an eye on your carbon footprint represents a dual advantage—it's beneficial for the earth and advantageous for your finances! </p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H3">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>3. Create Change</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">Tracking your carbon footprint extends beyond personal benefit—it contributes to driving broader change. By individuals monitoring their emissions, they deliver a strong signal to businesses and governments, indicating a serious commitment to addressing climate change and a desire for concrete action. When a significant number of people call for change, it generates a movement that cannot be overlooked, pushing for systemic shifts in how we approach environmental sustainability. </p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H3">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>4. Feel-Good Satisfaction</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">
Finally, keeping tabs on your carbon footprint can offer a sense of fulfillment. Observing the positive effects your efforts have on the environment can serve as a strong incentive to maintain your eco-friendly practices. Additionally, being aware that you're contributing to the fight against climate change—one of the most critical issues facing our generation—can instill a significant sense of pride. Therefore, we've outlined four compelling reasons why tracking your carbon footprint is worthwhile. </p>
      </center>
    </div>
  </div>

  <div class="index-content" id="H4"><?php include 'footer.php' ?></div>

  <script>
    AOS.init();
  </script>
</body>

</html>