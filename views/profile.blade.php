<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Profile</title>

  <!-- Fonts and Tailwind CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe2Z51I3yHqpTqvR5n06t8WZIbhLd8R7E&libraries=places"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #e2f0da;
    }

    .profile-layout {
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 30px;
      max-width: 1200px;
      margin: 40px auto;
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
    }

    .profile-info {
      text-align: center;
      font-size: 15px;
    }

    .avatar {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #7ac77f;
      margin-bottom: 15px;
    }

    .badges-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 15px;
      justify-items: center;
    }

    .badges-grid img:hover {
      transform: scale(1.2);
    }

    .highlighted {
      border: 4px solid #9b59b6;
      border-radius: 10px;
      padding: 4px;
    }

    .bins {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin: 20px 0;
    }

    .bins img {
      height: 45px;
      transition: transform 0.2s ease-in-out;
    }

    .bins img:hover {
      transform: scale(1.1);
    }

    .reward-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .reward-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .points {
      background-color: #dbf1c2;
      border-radius: 25px;
      padding: 10px 20px;
      font-weight: bold;
      font-size: 16px;
      display: flex;
      align-items: center;
    }

    .paw-icon {
      width: 35px;
      height: 20px;
      margin-left: 8px;
    }

    .voucher {
      flex-grow: 1;
      margin: 0 20px;
      color: black;
      text-decoration: underline;
    }

    .redeem-button {
      background-color: #ffd54f;
      color: black;
      padding: 10px 20px;
      font-weight: bold;
      border: none;
      border-radius: 15px;
      box-shadow: 2px 2px 0 #c89e2c;
      cursor: pointer;
    }

    .modal {
      background-color: rgba(0, 0, 0, 0.3);
      opacity: 0;
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      transition: all 0.3s ease-in-out;
      z-index: -1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .modal.open {
      opacity: 1;
      z-index: 999;
    }

    .modal-inner {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      width: 380px;
    }

    @media (max-width: 768px) {
      .profile-layout {
        grid-template-columns: 1fr;
      }

      .badges-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .points-section h3,
    .badges-section h3 {
      font-weight: 600;
      font-size: 1.2rem;
    }

    .points-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #points-value {
      font-size: 1.6rem;
      font-weight: 600;
      color: #34a853;
    }

  </style>
</head>
<body>
  <!-- Header -->
  <header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
    <div class="flex items-center space-x-4 w-full max-w-6xl">
      <img src="/logo.jpg" alt="BinBuddy Logo" class="h-10" />
      <div class="relative flex-grow max-w-xl">
        <input id="locationInput" type="text" placeholder="Search for nearby recycling centres" class="w-full rounded-full border border-gray-300 py-2 px-4 pl-10 pr-10" onkeydown="if (event.key === 'Enter') redirectToMap()" />
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

  <!-- Main Profile Layout -->
  <main>
    <div class="profile-layout">
      <!-- Profile Info -->
      <section class="card profile-info">
        <center><img src="/profile.jpg" alt="Avatar" class="avatar" /></center>
        <h2 id="userName">BOB</h2>
        <p id="userHandle">@meow ・ Joined August 2024</p>
        <p><strong>Location:</strong> <span id="userLocation">Seri Kembangan</span></p>
        <p><strong>Phone:</strong> <span id="userPhone"> +60 01010101010<span></p>
        <p><strong>Email:</strong> <span id="userEmail"> bob@meow.com</span></p>
        <p><strong>Birthday:</strong> <span id="userBirthday"> Dec 25, 1990</span></p>
        <p><strong>Gender:</strong> <span id="userGender"> Female</span></p>

        <div class="mt-6 flex flex-col gap-3 items-center">
          <button onclick="openModal()" class="px-4 py-2 bg-green-700 text-white font-semibold rounded hover:bg-green-800 transition">Edit Profile</button>
          <button onclick="if(confirm('Are you sure you want to log out?')) { window.location.href = '/'; }" class="px-4 py-2 bg-red-700 text-white font-semibold rounded hover:bg-red-800 transition">Logout</button>
        </div>
      </section>

      <!-- Points Section -->
      <section class="card points-section">
        <div class="points-header">
          <h3>Points</h3>
          <div id="points-value">0 </div>
        </div>
        <div class="bins">
          <img src="/green_bin.png" alt="Green Bin" title="Paper/Organic" />
          <img src="/yellow_bin.png" alt="Yellow Bin" title="Plastic/Glass" />
          <img src="/red_bin.png" alt="Red Bin" title="Electronics/Other" />
        </div>
        <p class="text-center font-medium">Collect → Earn → Redeem</p>
        <div class="reward-list">
          <div class="reward-item">
            <span class="points">100 <img src="/paw.png" class="paw-icon" /></span>
            <p class="voucher">RM10 Printy Malaysia Gift Voucher</p>
            <button onclick="openModal1()" class="redeem-button">REDEEM</button>
          </div>
          <div class="reward-item">
            <span class="points">200 <img src="/paw.png" class="paw-icon" /></span>
            <p class="voucher">RM20 Love Earth Gift Voucher</p>
            <button class="redeem-button">REDEEM</button>
          </div>
          <div class="reward-item">
            <span class="points">500 <img src="/paw.png" class="paw-icon" /></span>
            <p class="voucher">RM50 The Body Shop Gift Voucher</p>
            <button class="redeem-button">REDEEM</button>
          </div>
        </div>
      </section>

      <!-- Badges Section -->
      <section class="card badges-section">
        <h3>Badges</h3>
        <div class="badges-grid">
          <img src="/badge.png" alt="Badge" title="5 Recycles" />
          <img src="/badge.png" alt="Badge" title="10 Recycles" />
          <img src="/badge.png" alt="Badge" title="20 Recycles" />
          <img src="/badge.png" alt="Badge" title="30 Recycles" />
          <img src="/badge.png" alt="Badge" title="50 Recycles" />
          <img src="/badge.png" alt="Badge" title="Eco Star" />
          <img src="/badge.png" alt="Badge" title="Bin Master" />
          <img src="/badge.png" class="highlighted cursor-pointer" alt="Badge" title="Legend Recycler!" onclick="openBadgeModal()"/>
        </div>
      </section>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal" id="modal">
    <div class="modal-inner">
      <h2 class="text-2xl font-bold text-green-700 mb-4">Edit your BinBuddy Profile</h2>
      <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <input type="email" id="email" name="email" placeholder="Email Address" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <input type="text" id="location" name="location" placeholder="Location" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <input type="tel" id="phone_number" name="phone_number" placeholder="Phone Number" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <input type="date" id="birthday" name="birthday" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <div class="flex gap-4">
          <label><input type="radio" id="gender-male" name="gender" value="Male" required /> Male</label>
          <label><input type="radio" id="gender-female" name="gender" value="Female" required /> Female</label>
        </div>
        <input type="password" id="password" name="password" placeholder="Password" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required class="w-full px-4 py-2 border border-gray-300 rounded-full" />
        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-full">Edit</button>
        <button type="button" onclick="closeModal()" class="w-full bg-gray-300 py-2 rounded-full mt-2">Close</button>
      </form>
    </div>
  </div>

  <!-- Modal for voucher-->
<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" id="modal-voucher">
  <div class="modal-inner bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
    <form method="POST" class="space-y-4 text-center">
      <p><img src="/voucherrm10.png" class="mx-auto" alt="Voucher"></p>
      <p class="text-lg font-semibold text-green-700">You've redeemed the RM10 Printy Malaysia Voucher!</p>
      <button type="button" onclick="closeModal1()" class="w-full bg-gray-300 py-2 rounded-full mt-2">Close</button>
    </form>
  </div>
</div>

<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" id="badge-modal">
  <div class="modal-inner bg-white p-6 rounded-lg shadow-lg max-w-sm w-full text-center">
    <img src="/badge.png" alt="Highlighted Badge" class="mx-auto mb-4"/>
    <h3 class="text-xl font-bond text-purple-600">Legend Recycler!</h3>
    <p class="text-gray-600">You've reached the ultimate recycling milestone. Keep it up!</p>
    <button type="button" onclick="closeBadgeModal()" class="mt-4 w-full bg-gray-300 py-2 rounded-full">Close</button>
  </div>
  </div>

  <!-- Footer -->
  <footer class="flex justify-center items-center bg-white px-6 py-4 shadow-md mt-8">
    Created by BinBuddy | © 2025 All rights reserved
  </footer>

   <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
  <script>
    function redirectToMap() {
      const location = document.getElementById('locationInput').value.trim();
      if (location) {
        window.location.href = `/search?location=${encodeURIComponent(location)}`;
      }
    }

  const user = JSON.parse(localStorage.getItem("user"));
  let points = parseInt(localStorage.getItem("points")) || 0;

  if (user) {
    document.getElementById("userName").textContent = user.fullname;
    document.getElementById("userHandle").textContent = `@${user.fullname.split(" ")[0]} ・ Joined ${new Date(user.created_at).toLocaleString('default', { month: 'long', year: 'numeric' })}`;
    document.getElementById("userLocation").textContent = user.location;
    document.getElementById("userPhone").textContent = user.phone_number;
    document.getElementById("userEmail").textContent = user.email;
    document.getElementById("userBirthday").textContent = new Date(user.birthday).toLocaleDateString('en-GB', {
      year: 'numeric', month: 'short', day: 'numeric'
    });
    document.getElementById("userGender").textContent = user.gender;
    document.getElementById("points-value").textContent = points || 0;
  } else {
    alert("User not logged in.");
    window.location.href = "/";
  }

    function openModal() {
      document.getElementById("modal").classList.add("open");
    }

     function openModal1() {
      document.getElementById("modal-voucher").classList.add("open");
    }

    function closeModal() {
      document.getElementById("modal").classList.remove("open");
    }

    function closeModal1() {
      document.getElementById("modal-voucher").classList.remove("open");
    }

   document.querySelectorAll('.redeem-button').forEach(button => {
    button.addEventListener('click', function () {
      const rewardItem = button.closest('.reward-item');
      const costText = rewardItem.querySelector('.points').textContent.trim();
      const cost = parseInt(costText.replace(/\D/g, ''));

      if (points >= cost) {
        if (confirm(`Redeem this reward for ${cost} points?`)) {
          points -= cost;
          localStorage.setItem("points", points);
          document.getElementById("points-value").textContent = points;

          if (cost === 100) openModal1();

          confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 }
          });
        }
      } else {
        alert("Not enough points to redeem this reward.");
      }
    });
  });

 function handleStreakSubmission() {
  const pointsEarned = 10; 

  const user = JSON.parse(localStorage.getItem("user"));
  if (user) {
     user.points = (user.points || 0) + pointsEarned;
  localStorage.setItem("user", JSON.stringify(user));
  }

  document.getElementById("points-value").textContent = points;
}


function openBadgeModal(){
  document.getElementById("badge-modal").classList.remove("hidden");
  document.getElementById("badge-modal").classList.add("open");
}

function closeBadgeModal(){
  document.getElementById("badge-modal").classList.remove("open");
  document.getElementById("badge-modal").classList.add("hidden");
}

document.getElementById("editProfileForm").addEventListener("submit", function(e){
  e.preventDefault();

  const updatedUser = {
    fullname: document.getElementById("fullname").value,
    email: document.getElementById("email").value,
    location: document.getElementById("location").value,
    phone_number: document.getElementById("phone_number").value,
    birthday: document.getElementById("birthday").value,
    gender: document.querySelector('input[name="gender"]:checked')?.value,
    points: JSON.parse(localStorage.getItem("points")) || 0,
    created_at: user.created_at,
    id: user.id
  }

  const points = localStorage.getItem('points');

  if (points !== null){
    document.getElementById('points-value').textContent = points;
  }

  localStorage.setItem("user", JSON.stringify(updatedUser));
  location.reload();
});

document.querySelectorAll('.reward-item').forEach(item => {
  const requiredPoints = parseInt(item.querySelector('.points').textContent);
  const user = JSON.parse(localStorage.getItem("user"));
  const currentPoints = points || 0;
  if (currentPoints < requiredPoints) {
    item.querySelector('.redeem-button').disabled = true;
    item.querySelector('.redeem-button').classList.add("opacity-50", "cursor-not-allowed");
  }
});

  </script>
</body>
</html>
