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
      <div id="levels" class="flex flex-col space-y-4">
        <script>
          const levelContainer = document.currentScript.parentElement;
          for (let i = 1; i <= 10; i++) {
            levelContainer.innerHTML += `
              <div onclick="showStreakForm(${i})" class="level-step bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md hover:scale-110 transform transition">
                ${i}
              </div>`;
          }
        </script>
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
          You’ve just earned the <strong>Dumpster Detective</strong> badge for recycling 10 items this week!<br />
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

      <!-- Streak Form -->
      <div id="streakForm" class="hidden bg-white p-4 mt-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-2">Maintain Your Streak</h2>
        <form onsubmit="submitStreak(event)">
          <label class="block mb-2">What did you recycle today?</label>
          <input type="text" id="streakInput" class="w-full p-2 border border-gray-300 rounded mb-4" required />
          <input type="hidden" id="streakLevel" />
          <label class="block mb-2">Picture proof of activity</label>
          <input type="file" id="streakInput" accept="image/*" class="w-full p-2 border border-gray-300 rounded mb-4" required />
          <input type="hidden" id="streakLevel" />

          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Submit
          </button>
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Cancel
          </button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
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
      document.getElementById('streakLevel').value = level;
      document.getElementById('streakForm').classList.remove('hidden');
      window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    function submitStreak(event) {
      event.preventDefault();
      const level = document.getElementById('streakLevel').value;
      const item = document.getElementById('streakInput').value.trim();
      if (item) {
        alert(`Recycling entry for Level ${level}: ${item}`);
        document.getElementById('streakForm').classList.add('hidden');
        document.getElementById('streakInput').value = '';
      }
    }

    window.onload = () => initChart();
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
