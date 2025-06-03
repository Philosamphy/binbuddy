<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - About Us</title>
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
      background: #cdeccd;
      border-radius: 16px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }

    h1, h2 {
      color: #2e7d32;
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
      <h1>🌍 About BinBuddy</h1>
      <p><strong>BinBuddy</strong> is your smart companion for turning everyday waste into impactful change. We believe that recycling and upcycling should be fun, rewarding, and part of your lifestyle. Our app helps you track your recycling efforts, discover creative upcycling tutorials, and earn badges along your green journey.</p>
    </div>

    <div class="card">
      <h2>🎯 Our Mission</h2>
      <p>To inspire sustainable habits through technology by making recycling smarter, more engaging, and more educational. We empower individuals, especially youth, to reduce waste, reuse creatively, and build an eco-conscious future.</p>
    </div>

    <div class="card">
      <h2>👨‍👩‍👧‍👦 Meet the Team</h2>
      <ul>
        <li>🌱 <strong>Nuha</strong> – UX Designer & Eco Enthusiast</li>
        <li>🔧 <strong>Kisharini</strong> – Lead Developer</li>
        <li>🎓 <strong>Sam</strong> – Sustainability Advisor</li>
      </ul>
    </div>

    <div class="card">
      <h2>📣 Join the Movement</h2>
      <p>We’d love to hear your feedback, ideas, and success stories! Connect with us on <a href="https://instagram.com/binbuddyapp" target="_blank">Instagram</a> or <a href="mailto:hello@binbuddy.app">hello@binbuddy.app</a></p>
    </div>
  </main>

<footer class="flex justify-center items-center bg-white px-6 py-4 shadow-md">Created by BinBuddy | © 2025 All rights reserved</footer>
</body>
</html>