<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Login</title>
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

    <form action="http://localhost:8000/api/login" method="POST" class="space-y-6" id="login">

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

      <div class="relative">
        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
           <button type="button" onclick="togglePassword()" class="absolute right-4 top-12 transform -translate-y-1/2 text-gray-600">
              <i class="fas fa-eye" id="toggleIcon"></i>
           </button>
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
    document.getElementById('login').addEventListener('submit', async function(event) {
      event.preventDefault(); 
      
      const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      await fetch('http://127.0.0.1:8000/sanctum/csrf-cookie', {
     credentials: 'include'
     });

      const response = await fetch("http://127.0.0.1:8000/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({ email, password })
      });

      const result = await response.json();

      if (response.ok) {
        alert("Login successful!");
        localStorage.setItem("user", JSON.stringify(result.user));
        window.location.href = "/homepage";
      } else {
        alert(result.message || "Login failed.");
      }
    } catch (error) {
      alert("Error connecting to the server.");
      console.error(error);
    }
  });

  function togglePassword() {
  const passwordInput = document.getElementById("password");
  const icon = document.getElementById("toggleIcon");
  const isPassword = passwordInput.type === "password";

  passwordInput.type = isPassword ? "text" : "password";
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
}

  </script>
</body>
</html>
