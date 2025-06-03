<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Tutorial</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe2Z51I3yHqpTqvR5n06t8WZIbhLd8R7E&libraries=places"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #e2f0da; }
     .container {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
    }

    .card {
      background: #FFFFFF;
      border-radius: 16px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }

    iframe {
      width: 100%;
      height: 315px;
      margin-top: 10px;
      border-radius: 12px;
      border: none;
    }

    ul {
      padding-left: 20px;
    }

    li {
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {

      .container {
        padding: 10px;
      }

      iframe {
        height: 200px;
      }
    }

  </style>
</head>
<body>
  <header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
    <div class="flex items-center space-x-4 w-full max-w-6xl">
      <img src="/logo.jpg" alt="BinBuddy Logo" class="h-10" />
      <div class="relative flex-grow max-w-xl">
        <input id="locationInput" type="text" placeholder="Search for nearby recycling centres" class="w-full rounded-full border border-gray-300 py-2 px-4 pl-10 pr-10" onkeydown="if (event.key === 'Enter') redirectToMap()"/>
        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
      </div>
    </div>
    <nav class="flex space-x-6 text-lg font-medium ml-6">
      <a href="/homepage" class="text-black">Home</a>
      <a href="/tutorial" class="text-black">Tutorials</a>
      <a href="/about" class="text-black">About</a>
      <a href="/profile">
        <img src="/profile.jpg" class="h-10 rounded-full" alt="Profile" />
      </a>
    </nav>
  </header>
  <main class="container">

    <div class="card">
      <h2>DIY Upcycling Projects</h2>
      <p>🌿 <strong>Tin Can Herb Garden</strong></p>
      <iframe src="https://www.youtube.com/embed/LqOb92Vl3AA?si=3ZWQKimJN8nZu6sd" allowfullscreen></iframe>
      </br>

      <p>📦 <strong>Cardboard Organizer</strong></p>
      <iframe src="https://www.youtube.com/embed/fNY4LwL1anw?si=58ya2XXs5smz4qr0" allowfullscreen></iframe>
      </br>

      <p>📝 <strong>Recycled Paper</strong></p>
      <iframe src="https://www.youtube.com/embed/5xrWrKIVBgo?si=DyLtDgu8uJOg0MHQ" allowfullscreen></iframe>
    </div>

    <div class="card">
      <h2>Badge Unlock Guide</h2>
      <p>🏅 <strong>Dumpster Detective</strong> – Log your first 5 items<br>
         🛍️ <strong>Trash Transformer</strong> – Complete a DIY project</p>
      <p>📘 <a href="https://www.epa.gov/recycle" target="_blank">Learn how to recycle properly (EPA)</a></p>
    </div>

    <div class="card">
      <h2>Tips & Tricks</h2>
      <ul>
        <li>✅ <a href="https://www.youtube.com/watch?v=dr4e0wHsb64" target="_blank">Clean items before recycling</a></li>
        <li>✅ <a href="https://recyclenation.com" target="_blank">Know your local recycling rules</a></li>
        <li>✅ <a href="https://www.pinterest.com/upcyclethat/" target="_blank">Get creative with reusing waste</a></li>
      </ul>
    </div>
  </main>


<footer class="flex justify-center items-center bg-white px-6 py-4 shadow-md">Created by BinBuddy | © 2025 All rights reserved</footer>
</body>
</html>