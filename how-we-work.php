<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>How We Work</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  section {
    /* padding: 50px 0; */
  }
  .top-sec{
    text-align: center;
    background-color: #098978;
    padding: 50px 0;
  }
  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    min-height: 500px;
    border-bottom: 1px solid #000;
  }
  .left {
    flex: 1;
  }
  .right {
    flex: 1;
  }
  .title {
    font-size: 24px;
    margin-bottom: 20px;
  }
  .description {
    text-align: center;
    font-size: 18px;
    line-height: 1.6;
  }
  .hidden {
    display: none;
  }
</style>
</head>
<body>
  <section id="section1">
    <div class="top-sec">
        <h1>This Is Title</h1>
        <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem illo delectus atque, ipsa deserunt doloremque, quod odit aspernatur minima voluptate nihil quaerat perspiciatis.</p>
    </div>
  </section>

  <section id="section2">
    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 2</h2>
      </div>
      <div class="right">
        <p class="description">Description 2</p>
      </div>
    </div>

    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 3</h2>
      </div>
      <div class="right">
        <p class="description">Description 3</p>
      </div>
    </div>

    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 4</h2>
      </div>
      <div class="right">
        <p class="description">Description 3</p>
      </div>
    </div>

    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 5</h2>
      </div>
      <div class="right">
        <p class="description">Description 3</p>
      </div>
    </div>

    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 6</h2>
      </div>
      <div class="right">
        <p class="description">Description 3</p>
      </div>
    </div>

    <div class="container">
      <div class="left">
        <h2 class="title hidden">Heading 7</h2>
      </div>
      <div class="right">
        <p class="description">Description 3</p>
      </div>
    </div>
  </section>
  <!-- Add more sections as needed -->
  
  <script>
    window.addEventListener('scroll', function() {
      const sections = document.querySelectorAll('section');
      sections.forEach((section, index) => {
        const title = section.querySelector('.title');
        const rect = section.getBoundingClientRect();
        if (rect.top <= window.innerHeight * 0.6 && rect.bottom >= window.innerHeight * 0.4) {
          title.classList.remove('hidden');
        } else {
          title.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>