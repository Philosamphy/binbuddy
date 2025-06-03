<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
     body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #e6f5e6;
     }

     .reward-container {
  background-color: #d2f1b2; /* Main green container */
  padding: 20px;
  border-radius: 20px;
  width: 80%;
  margin: 30px auto;
}

.reward-page-button {
  background-color: #84d165;
  color: black;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 12px;
  box-shadow: 2px 2px 0 #4c8e32;
  margin-bottom: 20px;
  cursor: default;
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
  <header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
    <div class="flex items-center space-x-4 w-full max-w-6xl">
      <img src="/logo.jpg" alt="BinBuddy Logo" class="h-10" />
      <div class="relative flex-grow max-w-xl">
        <input type="text" placeholder="Search for nearby recycling centres" class="w-full rounded-full border border-gray-300 py-2 px-4 pl-10 pr-10" />
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

   <main class="reward-container">
    <button class="reward-page-button">Reward Page</button>
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
  </main>
</body>
</html>
