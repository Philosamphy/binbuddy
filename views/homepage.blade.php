<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe2Z51I3yHqpTqvR5n06t8WZIbhLd8R7E&libraries=places"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #e2f0da; }
    .notification-box {
      background-color: #36f136;
      padding: 1rem;
      border-radius: 1rem;
      border: 3px solid #000;
      position: relative;
      transition: opacity 0.5s ease;
    }
    .notification-box .icon {
      position: absolute;
      top: -18px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      border-radius: 50%;
      padding: 0.3rem 0.5rem;
      border: 2px solid black;
    }
    .bar { cursor: pointer; transition: background 0.3s; }
    .level-step { cursor: pointer; }
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

  <main class="flex px-12 pt-8 relative max-w-6xl mx-auto">
    <!-- Left: Interactive Level Tracker -->
    <div class="w-1/2 flex flex-row items-center space-x-6">
      <img src="/racoon.png" alt="Racoon in bin" class="w-60 md:w-72 lg:w-80 xl:w-96"/>
       <div id="levels" class="flex flex-col space-y-4 items-center mt-8 relative z-10">
      </div>
    </div>

    <!-- Right: Notification + Filtered Chart -->
    <div class="w-1/2 space-y-6">
      <div id="notificationBox" class="notification-box">
        <div class="icon">
          <i class="fas fa-bell text-lg"></i>
        </div>
        <button onclick="dismissNotification()" class="absolute top-2 right-3 text-black text-xl font-bold hover:text-red-600">✕</button>
        <p class="text-black font-semibold">
          <center>Congratulations! 🎉</center><br />
          You’ve just earned the <strong>Dumpster Detective</strong> badge for recycling <span id="points" class="text-black font-semibold">0 </span> items this week!<br />
          Keep digging through the trash — responsibly! ♻️ 🐾<br />
          <center><button onclick="window.location.href='/profile'" class="mt-2 px-4 py-2 bg-blue-700 text-white font-semibold rounded hover:bg-blue-800 transition">
           View your badge
           </button></center>
        </p>
      </div>

      <div class="bg-white p-4 rounded-xl shadow-md">
        <div class="flex justify-between items-center">
          <h3 class="font-bold text-xl">Recycling Tracker</h3>
          <select id="viewSelect" onchange="updateChart()" class="border border-gray-300 rounded px-2 py-1 text-sm">
            <option value="day">Daily</option>
            <option value="week">Weekly</option>
            <option value="month">Monthly</option>
          </select>
        </div>
        <canvas id="recycleChart" class="mt-4"></canvas>
      </div>

  </main>

  <!--Streak form-->
  <div id="streakModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
  <div class="bg-white p-6 rounded-lg shadow-xl w-96 max-w-full relative">
    <button onclick="closeStreakForm()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
    <h2 class="text-xl font-semibold mb-4 text-center">Maintain Your Streak</h2>
    <form onsubmit="submitStreak(event)" class="space-y-4">
      <div>
        <label class="block mb-1 font-medium">What did you recycle today?</label>
        <input type="text" id="streakTextInput" class="w-full p-2 border border-gray-300 rounded" required />
      </div>

      <div>
        <label class="block mb-1 font-medium">Picture proof of activity</label>
        <input type="file" id="streakFileInput" accept="image/*" class="w-full p-2 border border-gray-300 rounded" required />
      </div>

      <input type="hidden" id="streakLevelInput" />

      <button type="submit" id="submitStreakBtn" class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700">
        Submit
      </button>

    </form>
  </div>
</div>

  <!--footer-->
  <footer class="flex justify-center items-center bg-white px-6 py-4 shadow-md">Created by BinBuddy | © 2025 All rights reserved</footer>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Load and render the recycling chart
  const ctx = document.getElementById('recycleChart').getContext('2d');
  let chart;

  const chartData = {
    day: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      data: [3, 6, 7, 8, 9, 5, 4]
    },
    week: {
      labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
      data: [25, 30, 28, 35]
    },
    month: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
      data: [100, 120, 110, 130, 150]
    }
  };

  function initChart(view = 'day') {
    if (chart) chart.destroy();
    chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: chartData[view].labels,
        datasets: [{
          label: 'Recycled Items',
          data: chartData[view].data,
          backgroundColor: '#4ade80'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: context => ` ${context.parsed.y} items recycled`
            }
          }
        }
      }
    });
  }

  function updateChart() {
    const view = document.getElementById('viewSelect').value;
    initChart(view);
  }

  function dismissNotification() {
    document.getElementById('notificationBox').style.display = 'none';
  }

  function showStreakForm(level) {
    document.getElementById('streakModal').classList.remove('hidden');
    document.getElementById('streakLevelInput').value = level;
  }

  function closeStreakForm() {
    document.getElementById('streakModal').classList.add('hidden');
  }

const activeLevels = parseInt(localStorage.getItem('activeLevels') || '1');
const levelContainer = document.getElementById('levels');
const submittedLevels = JSON.parse(localStorage.getItem('submittedLevels') || '[]');

for (let i = 1; i <= 30; i++) {
  const isActive = i <= activeLevels;
  const isSubmitted = submittedLevels.includes(i);
  const isLocked = i > activeLevels || (i < activeLevels && !submittedLevels.includes(i));

  const offsetClass = i % 4 === 1 ? 'translate-x-4' :
                      i % 4 === 2 ? '-translate-x-4' :
                      i % 4 === 3 ? '-translate-x-6' : '-translate-x-6';

  let bgColorClass = 'bg-gray-400 cursor-not-allowed';
  let tooltip = '';

  if (isLocked && !isSubmitted) {
    tooltip = `Locked: Complete earlier levels first 🔒`;
  }

  if (isActive && isSubmitted) {
    bgColorClass = 'bg-yellow-700 cursor-pointer';
    tooltip = `Level ${i} submitted`;
  } else if (isActive && !isLocked) {
    bgColorClass = 'bg-green-500 hover:scale-110 cursor-pointer';
    tooltip = `Click to submit Level ${i}`;
  }

  levelContainer.innerHTML += `
    <div 
      class="relative group level-step ${bgColorClass} text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md transform transition ${offsetClass}" 
      ${!isLocked ? `onclick="showStreakForm(${i})"` : ''}
    >
      ${i}
      ${isLocked && !isSubmitted ? `
        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 scale-90 bg-black text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition">
          ${tooltip}
        </div>
      ` : ''}
    </div>`;
}

  function submitStreak(event) {
    event.preventDefault();

    const level = parseInt(document.getElementById('streakLevelInput').value);
    const inputText = document.getElementById('streakTextInput').value.trim();
    const inputFile = document.getElementById('streakFileInput').files[0];

    if (!inputText || !inputFile) {
      alert("Please complete the form.");
      return;
    }

    const today = new Date().toISOString().split('T')[0];
    const streaks = JSON.parse(localStorage.getItem('streaks') || '[]');
    let dailySubmittedLevels = JSON.parse(localStorage.getItem('dailySubmittedLevels') || '{}');
    
    if (!dailySubmittedLevels[today]) {
      dailySubmittedLevels[today] = [];
    }

    if (!dailySubmittedLevels[today].includes(level)) {
      dailySubmittedLevels[today].push(level);
      localStorage.setItem('dailySubmittedLevels', JSON.stringify(dailySubmittedLevels));

      if (!streaks.includes(today)) {
        streaks.push(today);
        localStorage.setItem('streaks', JSON.stringify(streaks));
      }

      if (!submittedLevels.includes(level)) {
        submittedLevels.push(level);
        localStorage.setItem('submittedLevels', JSON.stringify(submittedLevels));
      }

      let currentActive = parseInt(localStorage.getItem('activeLevels') || '24');
      const newLevel = Math.max(currentActive, level);
      localStorage.setItem('activeLevels', newLevel);

      let points = parseInt(localStorage.getItem('points') || '0');
      const updatedPoints = points + 10;
      localStorage.setItem('points', updatedPoints);
      document.getElementById("points").textContent = updatedPoints;
    }

    closeStreakForm();
    alert("Streak submitted!");
    location.reload();
  }

  window.onload = () => {
    initChart();
    const currentPoints = parseInt(localStorage.getItem('points') || '0');
    document.getElementById("points").textContent = currentPoints;
  };
</script>

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
