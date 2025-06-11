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
    <h1 class="text-3xl font-bold text-center mb-6 text-green-700">Create your BinBuddy Account</h1>

    <form action="http://localhost:8000/api/register" method="POST" class="space-y-6" id="register">
      <div>
        <label for="fullname" class="block text-gray-700 font-medium mb-1">Full Name</label>
        <input
          type="text"
          id="fullname"
          name="fullname"
          placeholder="Your full name"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="you@example.com"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

       <div>
        <label for="location" class="block text-gray-700 font-medium mb-1">Location</label>
        <input
          type="text"
          id="location"
          name="location"
          placeholder="Seremban"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

       <div>
        <label for="phone_number" class="block text-gray-700 font-medium mb-1">Phone Number</label>
        <input
          type="tel"
          id="phone_number"
          name="phone_number"
          placeholder="+60 XXXXXXXXX"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

       <div>
        <label for="birthday" class="block text-gray-700 font-medium mb-1">Birthday</label>
        <input
          type="date"
          id="birthday"
          name="birthday"
          placeholder="Your birthday"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>
      
       <div>
  <label class="block text-gray-700 font-medium mb-1">Gender</label>
  <div class="flex gap-4 items-center">
    <label class="flex items-center space-x-2">
      <input
        type="radio"
        id="gender-male"
        name="gender"
        value="Male"
        required
        class="text-green-500 focus:ring-green-500"
      />
      <span>Male</span>
    </label>
    <label class="flex items-center space-x-2">
      <input
        type="radio"
        id="gender-female"
        name="gender"
        value="Female"
        required
        class="text-green-500 focus:ring-green-500"
      />
      <span>Female</span>
    </label>
  </div>
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
  <button type="button" onclick="togglePassword('password', 'toggleIcon1')" class="absolute right-4 top-12 transform -translate-y-1/2 text-gray-600">
    <i class="fas fa-eye" id="toggleIcon1"></i>
  </button>
</div>

<div class="relative">
  <label for="confirm-password" class="block text-gray-700 font-medium mb-1">Confirm Password</label>
  <input
    type="password"
    id="confirm-password"
    name="confirm-password"
    placeholder="Re-enter your password"
    required
    class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
  />
  <button type="button" onclick="togglePassword('confirm-password', 'toggleIcon2')" class="absolute right-4 top-12 transform -translate-y-1/2 text-gray-600">
    <i class="fas fa-eye" id="toggleIcon2"></i>
  </button>
</div>

      <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full transition">
        Register
      </button>
    </form>

    <p class="mt-6 text-center text-gray-600 text-sm">
      Already have an account?
      <a href="/" class="text-green-600 font-semibold underline">Login here</a>.
    </p>
  </main>

  <script>
    document.getElementById('register').addEventListener('submit', async function(event) {
      event.preventDefault(); 

      const formData = new FormData(this);
      const data = Object.fromEntries(formData.entries());

      if (data.password !== data['confirm-password']){
        alert("Passwords do not match.");
        return;
      }

      try{
        const response = await fetch("http://localhost:8000/api/register", {
         method: "POST",
         headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
         },
         body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok){
          alert("Registration successfull!");
          localStorage.setItem("user", JSON.stringify(result.user));
          window.location.href = "/";
        } else {
          alert("Error: " + (result.message || "Something went wrong"));
          console.log(result);
        }
      } catch (error){
        console.log("Request failed", error);
      }
    });

   function togglePassword(inputId, iconId) {
  const passwordInput = document.getElementById(inputId);
  const icon = document.getElementById(iconId);
  const isPassword = passwordInput.type === "password";

  passwordInput.type = isPassword ? "text" : "password";
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
   }
  </script>
</body>
</html>
