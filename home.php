<?php
include 'connect.php';
session_start();

$time = 10 * 60; // 10 minutes in seconds
if (isset($_SESSION['last_activity'])) {
    $minute = time() - $_SESSION['last_activity'];
    if ($minute > $time) {
        session_unset();
        session_destroy();
        header("location:index.php");
        exit();
    }
}
$_SESSION['last_activity'] = time();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LakeVoyage Pro</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    .top-nav {
      background-color: #444;
      padding: 30px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    .top-nav ul li {
      margin: 0 200px;
    }

    .top-nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 1rem;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .top-nav ul li a:hover {
      color: #007bff;
    }

    .logout-btn {
      padding: 5px 15px;
      background-color: #007bff;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }

    .logout-btn:hover {
      background-color: #0056b3;
    }

    /* Image Section Styles */
    .image-container {
      display: flex;
      justify-content: center;
      padding: 20px;
      background-color: #f4f4f4;
      position: relative;
      overflow: hidden;
    }

    .image-container img {
      display: none;
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .image-container img.active {
      display: block;
    }

    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 2rem;
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 10px;
      border: none;
      cursor: pointer;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    /* Sidebar and Footer Styles */
    .sidebar {
      background-color: #222;
      color: #fff;
      width: 250px;
      padding: 20px;
      flex-shrink: 0;
    }

    .sidebar .logo {
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar nav ul {
      list-style: none;
      padding: 0;
    }

    .sidebar nav ul li {
      margin: 10px 0;
    }

    .sidebar nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    .sidebar .sub-menu {
      margin-left: 15px;
    }

    .main {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: auto;
    }

    footer .footer-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      padding: 20px;
    }

    footer .footer-section {
      flex: 1;
      min-width: 200px;
      margin: 10px;
    }

    footer .footer-section ul {
      list-style: none;
      padding: 0;
    }

    footer .footer-section ul li {
      margin: 5px 0;
    }

    footer .footer-section ul li a {
      color: white;
      text-decoration: none;
    }

    footer .social-links a {
      margin-right: 10px;
      color: white;
      text-decoration: none;
    }

    footer .bottom-bar {
      background-color: #222;
      color: #aaa;
      padding: 10px 0;
    }
    .social-links {
  display: flex;
  align-items: center;
  gap: 15px;
}

.social-links img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.social-links img:hover {
  transform: scale(1.1);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


  </style>
</head>
<body>
  <!-- Top Navigation -->
  <nav class="top-nav">
    <ul>
      <li><a href="cruise.php">Cruise</a></li>
      <li><a href="fishing.php">Fishing</a></li>
      <li><a href="hiking.php">Hiking</a></li>
    </ul>
    <a href="logout.php" class="logout-btn">Logout</a>
  </nav>

  <!-- Image Section -->
  <div class="image-container">
    <img src="h1.jpg" alt="Lake Kivu Image 1" class="active">
    <img src="h2.jpg" alt="Lake Kivu Image 2">
    <img src="h3.jpg" alt="Lake Kivu Image 3">
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
  </div>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="logo">
      <h2>LakeVoyage Pro</h2>
    </div>
    <nav>
      <ul>
        <li><a href="#">Booking</a></li>
        <ul class="sub-menu">
          <li><a href="#">Integrated Calendar</a></li>
        </ul>
        <li><a href="#">Maps</a></li>
        <ul class="sub-menu">
          <li><a href="#">Point of Interest Map</a></li>
          <li><a href="#">Conservation Projects Map</a></li>
          <li><a href="#">Heritage Sites Map</a></li>
        </ul>
        <li><a href="#">Homestay Listings</a></li>
        <li><a href="#">Tour Guide</a></li>
        <ul class="sub-menu">
          <li><a href="#">Tour Guide</a></li>
          <li><a href="#">Book a Tour Guide</a></li>
        </ul>
        <li><a href="#">Community Engagement</a></li>
        <li><a href="#">Feedback & Review</a></li>
        <li><a href="#">Emergency Response & Safety</a></li>
        <li><a href="#">Accessibility & Inclusivity</a></li>
      </ul>
    </nav>
  </aside>

  <!-- Footer -->
  <footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>About LakeVoyage Pro</h3>
      <p>Explore the beauty of Lake Kivu with our tailored tours and services designed to make your adventure unforgettable.</p>
    </div>
    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Booking</a></li>
        <li><a href="#">Tour Guide</a></li>
        <li><a href="#">Maps</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Contact Us</h3>
      <p>Email: support@lakevoyagepro.com</p>
      <p>Phone: +250 123 456 789</p>
      <p>Location: Lake Kivu, Rwanda</p>
    </div>
    <div class="footer-section social-links">
      <h3>Follow Us</h3>
      <a href="#" title="Facebook">
        <img src="face.png" alt="Facebook" class="social-icon">
      </a>
      <a href="#" title="Instagram">
        <img src="ig.png" alt="Instagram" class="social-icon">
      </a>
      <a href="#" title="Twitter">
        <img src="twitter.png" alt="Twitter" class="social-icon">
      </a>
    </div>
  </div>
  <div class="bottom-bar">
    <p>&copy; 2024 LakeVoyage Pro. All Rights Reserved.</p>
  </div>
</footer>

  <script>
    let currentImageIndex = 0;
    const images = document.querySelectorAll('.image-container img');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    function updateImageDisplay() {
      images.forEach((img, index) => {
        img.classList.remove('active');
        if (index === currentImageIndex) {
          img.classList.add('active');
        }
      });
    }

    prevButton.addEventListener('click', () => {
      currentImageIndex = (currentImageIndex === 0) ? images.length - 1 : currentImageIndex - 1;
      updateImageDisplay();
    });

    nextButton.addEventListener('click', () => {
      currentImageIndex = (currentImageIndex === images.length - 1) ? 0 : currentImageIndex + 1;
      updateImageDisplay();
    });
  </script>
</body>
</html>
