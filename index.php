<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - RealMark </title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="header-nav-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            background-image: url('service3.jpeg');
        }

        header {
            background-color: #00ffaa;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container img {
            max-height: 80px;
            width: auto;
            margin-right: 10px;
        }

        h1 {
            margin: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        section {
            padding: 20px;
            text-align: justify;
            background-color: white;
            margin: 10px;
            border-radius: 10px;
            margin-bottom: 80px; /* Increased margin to accommodate the social media icons */
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .service-item {
            width: calc(30% - 20px);
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            color: black;
            text-decoration:none ;
        }
        p{
            color: black;
            text-decoration:none ;
        }

        .service-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
            
        }
        h3{
            color: black;
            text-decoration:none ;
        }

        .images {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            color: black;
            text-decoration:none ;
        }

        .image-item {
            width: calc(50% - 20px);
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 20px;
            color: black;
            text-decoration:none ;
        }

        .image-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            color: black;
            text-decoration:none ;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            padding: 10px;
            z-index: 1000; /* Ensure the social icons stay on top */
        }

        .social-icons a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 24px;
        }
        button {
    display: block;
    margin: 0 auto; /* This centers the button horizontally */
    background-color: #333;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Add the following styles for the section containing the contact button */
section:last-child {
    text-align: center;
}

        #banner {
    height: 5px;
    width: auto;
    text-align: center;
    background-color: rgb(243, 179, 18);
    font-size: large;
    margin-bottom: 10px;
}

.banner-text {
    animation: fadeInOut 4s infinite; /* Adjust the duration as needed */
}

@keyframes fadeInOut {
    0%, 100% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
}

        @media only screen and (max-width: 600px) {
           
            .logo-container img {
                margin-bottom: 10px;
                max-width: 80%;
            }

            nav ul {
                flex-direction: column; /* Stack items vertically */
                align-items: center; /* Center items horizontally */
            }

            .service-item,
            .image-item {
                width: calc(50% - 20px);
                flex-direction: column;
            }
            nav a {
        padding: 10px 10px; /* Adjust the padding for smaller screens */
        width: 100%;
        box-sizing: border-box;
    }
    header {
                padding: 7.5px; /* Half of the original padding */
            }
            #banner {
        max-width: 100%; /* Adjust for smaller screens */
        height: 2px;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .banner-text {
        font-size: small; /* Adjust font size for smaller screens */
    }
    
        }
    </style>
</head>

<body>

    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Logo">
            <h1>REALMARK PROPERTIES</h1>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="privacy.html">Privacy</a></li>
            <li><a href="careers.html">Careers</a></li>
            <li><a href="properties.php">Properties</a></li>
            <li><a href="blog.php">Blog</a></li>
        </ul>
    </nav>
    <section id="banner">
    <div class="banner-text">
    WE ARE HIRING!
    </div>
    </section>
    <section>
        <h2>Home Page</h2>
        
        <p>Ever needed a place where you could get a genuine referral for all your properties? Whether looking to buy or
            sell? Realmark is your one-stop shop for all your property investment needs.</p>

            <p>Realmark is a leading real estate company that stands at the forefront of the industry, offering a comprehensive suite of services tailored to meet the diverse needs of its clients. With a sterling reputation built on integrity, expertise, and unwavering commitment to customer satisfaction, Realmark has become synonymous with excellence in the real estate market.

</p>
        
        <h2>Our Services</h2>
        <div class="services">
            <a href="contact.html" class="service-item">
                <img src="service1.jpeg" alt="Service 1">
                <h3>Property Sales</h3>
                <p>We offers Property Listings across Major towns in Kenya to help you find your Dream Property.</p>
    </a>
            <a href="contact.html" class="service-item">
                <img src="service2.jpeg" alt="Service 2">
                <h3>Land Survey</h3>
                <p>Qualified Professional Surveyors at your Disposal!.</p>
    </a>
            <a href="contact.html" class="service-item">
                <img src="service3.jpeg" alt="Service 3">
                <h3>Landscaping</h3>
                <p>Transform Your Home Landscape with the Pros!</p>
    </a>
            <!-- Add more service items as needed -->
        </div>
<p>Realmark, a distinguished real estate company, offers a comprehensive range of services to cater to diverse client needs. Renowned for its integrity and commitment to excellence, Realmark excels in surveying, land sales, property sales, and precise property appraisals. The company's expertise extends to relocation services, ensuring seamless transitions for clients. Realmark's cornerstone is property management, where they navigate the complexities of ownership to optimize returns for investors. Additionally, the company provides expert consultation on real estate investments, leveraging its wealth of industry knowledge to guide clients toward informed decisions. In essence, Realmark stands as a trusted partner, dedicated to realizing the aspirations of its clients in the dynamic and ever-evolving real estate market.</p>
        <h3>More Services</h3>
        <div class="images">
            <div class="image-item">
            <a href="contact.html">
                <img src="image1.jpeg" alt="Image 1">
                <h3>Agents</h3>
                <p>Our Agents are Worldclass!</p>
    </a>
            </div>
            <div class="image-item">
            <a href="contact.html">
                <img src="image2.jpeg" alt="Image 2">
                <h3>Relocate</h3>
                <p>Settle In With No Hustles!</p>
    </a>
            </div>
            <div class="image-item">
            <a href="careers.html">
                <img src="image3.webp" alt="Image 3">
                <h3>Diverse Employer</h3>
                <p>Equal Opportunity Provider!</p>
    </a>
            </div>
            <div class="image-item">
            <a href="contact.html">
                <img src="image4.jpeg" alt="Image 4">
                <h3>Innovative</h3>
                <p>Don't get left behind!</p></a>
            </div>
            <!-- Add more image items as needed -->
        </div>
        <button onclick="location.href='contact.html'" >Contact us</button>
    </section>

    <!-- Social Media Icons -->
    <div class="social-icons">
        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>

</body>

</html>
