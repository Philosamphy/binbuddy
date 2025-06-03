<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #e2f0da;
    }
  </style>
</head>
<body>

  <main class="max-w-md mx-auto mt-12 p-8 bg-white rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-center mb-6 text-green-700">Login to BinBuddy</h1>

    <form action="#" method="POST" class="space-y-6" id="login">

      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Enter your email"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

      <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full transition">
        Login
      </button>
    </form>

    <p class="mt-6 text-center text-gray-600 text-sm">
      Don't have an account
      <a href="/register" class="text-green-600 font-semibold underline">Register here</a>.
    </p>
  </main>

  <script>
    document.getElementById('login').addEventListener('submit', function(event) {
      event.preventDefault(); 
      window.location.href = '/homepage'; 
    });
  </script>
</body>
</html>