<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Profile</title>

  <!-- Fonts and Icons -->
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
    }

    .avatar {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #7ac77f;
      margin-bottom: 15px;
    }

    .profile-info h2 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .profile-info p {
      margin-bottom: 6px;
      font-size: 0.95rem;
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

    .points-value {
      font-size: 1.6rem;
      font-weight: 600;
      color: #34a853;
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

    .flow {
      font-weight: 500;
      font-size: 1rem;
      text-align: center;
      margin-bottom: 20px;
    }

    .redeem-button {
      display: inline-block;
      background: #ffb703;
      color: #fff;
      padding: 12px 20px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      text-align: center;
      transition: background 0.3s;
    }

    .redeem-button:hover {
      background: #ffa000;
    }

    .badges-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 15px;
      justify-items: center;
    }

    .badges-grid img {
      width: 75px;
      transition: transform 0.3s;
    }

    .badges-grid img:hover {
      transform: scale(1.2);
    }

    .highlighted {
      border: 4px solid #9b59b6;
      border-radius: 10px;
      padding: 4px;
    }

    @media (max-width: 768px) {
      .profile-layout {
        grid-template-columns: 1fr;
      }

      .badges-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .redeem-button {
        width: 100%;
      }
    }

    .reward-list {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.reward-item {
  display: flex;
  align-items: center;
  background-color: transparent;
  padding: 10px 20px;
  border-radius: 30px;
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
  font-size: 16px;
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
  </style>
</head>
<body>
  <!-- Header -->
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

  <!-- Main Profile Layout -->
  <main>
    <div class="profile-layout">
      <!-- Profile Info -->
      <section class="card profile-info">
        <center><img src="/profile.jpg" alt="Avatar" class="avatar" /></center>
        <h2>BOB</h2>
        <p>@meow ・ Joined August 2024</p>
        <p><strong>Location:</strong> Seri Kembangan</p>
        <p><strong>Phone:</strong> +60 01010101010</p>
        <p><strong>Email:</strong> bob@meow.com</p>
        <p><strong>Birthday:</strong> Dec 25, 1990</p>
        <p><strong>Gender:</strong> Female</p>

        <div class="mt-6 flex flex-col gap-3 items-center">
          <button onclick="window.location.href='#'" class="mt-2 px-4 py-2 bg-green-700 text-white font-semibold rounded hover:bg-green-800 transition">
           Edit Profile
           </button>
           <button onclick="if(confirm('Are you sure you want to log out?')) { window.location.href = '/'; }" class="mt-2 px-4 py-2 bg-red-700 text-white font-semibold rounded hover:bg-red-800 transition">
           Logout
           </button>
       </div>
      </section>

      <!-- Points Section -->
      <section class="card points-section">
        <div class="points-header">
          <h3>Points</h3>
          <div class="points-value">210 🐾</div>
        </div>
        <div class="bins">
          <img src="/green_bin.png" alt="Green Bin" title="Paper/Organic" />
          <img src="/yellow_bin.png" alt="Yellow Bin" title="Plastic/Glass" />
          <img src="/red_bin.png" alt="Red Bin" title="Electronics/Other" />
        </div>
        <p class="flow">Collect → Earn → Redeem</p>
      <div class="reward-list">
      <div class="reward-item">
        <span class="points">200 <img src="paw.png" alt="paw icon" class="paw-icon"/></span>
        <a href="#" class="voucher">RM10 Printy Malaysia Gift Voucher</a>
        <button class="redeem-button">REDEEM</button>
      </div>
      <div class="reward-item">
        <span class="points">500 <img src="paw.png" alt="paw icon" class="paw-icon"/></span>
        <a href="#" class="voucher">RM20 Love Earth Gift Voucher</a>
        <button class="redeem-button">REDEEM</button>
      </div>
      <div class="reward-item">
        <span class="points">1000 <img src="paw.png" alt="paw icon" class="paw-icon"/></span>
        <a href="#" class="voucher">RM50 The Body Shop Gift Voucher</a>
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
          <img src="/badge.png" class="highlighted" alt="Badge" title="Legend Recycler!" />
        </div>
      </section>
    </div>
  </main>

   <script>
   function redirectToMap() {
    const location = document.getElementById('locationInput').value.trim();
    if (location) {
      window.location.href = `/search?location=${encodeURIComponent(location)}`;
    }
   } 
</script>
</body>
</html>
