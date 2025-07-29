<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PSSFP - Excellence en Finances Publiques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/favicon.png" />
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-dark: #7c3aed;
            --secondary: #6366f1;
            --accent: #f59e0b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --white: #ffffff;
            --gradient-main: linear-gradient(135deg, #7e23f5ff 0%, #7e32d4ff 50%, #9059eeff 100%);
            --gradient-light: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 50%, rgba(245, 158, 11, 0.1) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.6;
            color: var(--gray-800);
            background: var(--white);
            overflow-x: hidden;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .nav-menu {
            display: flex;
            gap: 3rem;
            list-style: none;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-main);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-cta {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient-main);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }

        .btn-ghost {
            background: transparent;
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-ghost:hover {
            background: var(--gray-50);
            border-color: var(--primary);
            color: var(--primary);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            /*background: linear-gradient(135deg, var(--white) 0%, var(--gray-50) 100%);*/
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            right: -20%;
            width: 60%;
            height: 120%;
            background: var(--gradient-light);
            border-radius: 50% 0% 50% 0%;
            transform: rotate(-15deg);
            opacity: 0.7;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 2rem;
            color: var(--gray-900);
        }

        .hero-highlight {
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 3rem;
            line-height: 1.7;
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .hero-visual {
            position: relative;
            height: 600px;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .floating-card {
            position: absolute;
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-1 {
            top: 20%;
            left: -10%;
            animation: float 6s ease-in-out infinite;
        }

        .card-2 {
            bottom: 20%;
            right: -10%;
            animation: float 6s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        .section {
            padding: 8rem 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
        }

        .section-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--gray-900);
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        .specialties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .specialty-card {
            background: var(--white);
            border-radius: 1.5rem;
            padding: 3rem;
            border: 1px solid var(--gray-200);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .specialty-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-main);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .specialty-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .specialty-card:hover::before {
            transform: scaleX(1);
        }

        .specialty-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient-main);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            transition: transform 0.4s ease;
        }

        .specialty-card:hover .specialty-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .specialty-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .specialty-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .specialty-card p {
            color: var(--gray-600);
            line-height: 1.7;
        }

        .news-section {
            background: var(--gray-50);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .news-card {
            background: var(--white);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid var(--gray-200);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .news-image {
            height: 250px;
            background: var(--gradient-main);
            position: relative;
        }

        .news-content {
            padding: 2rem;
        }

        .news-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .news-card p {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .news-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .news-link:hover {
            gap: 1rem;
        }

        .testimonials {
            background: var(--gray-900);
            color: white;
        }

        .testimonial-card {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 4rem 2rem;
        }

        .testimonial-quote {
            font-size: 1.5rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            font-style: italic;
            position: relative;
        }

        .testimonial-quote::before,
        .testimonial-quote::after {
            content: '"';
            font-size: 4rem;
            color: var(--primary);
            position: absolute;
            opacity: 0.3;
        }

        .testimonial-quote::before {
            top: -1rem;
            left: -2rem;
        }

        .testimonial-quote::after {
            bottom: -3rem;
            right: -2rem;
        }

        .testimonial-author {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .testimonial-role {
            color: var(--gray-400);
        }

        .agenda-item {
            position: relative;
            margin-bottom: 3rem;
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid var(--gray-200);
            margin-left: 2rem;
            transition: all 0.3s ease;
        }

        .agenda-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .agenda-item::before {
            content: '';
            position: absolute;
            left: -3rem;
            top: 2rem;
            width: 1rem;
            height: 1rem;
            background: var(--primary);
            border-radius: 50%;
            border: 3px solid var(--white);
            box-shadow: 0 0 0 3px var(--primary);
        }

        .agenda-date {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
            color: var(--primary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .agenda-item h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .cta-section {
            background: var(--gradient-main);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
           
            animation: float 20s linear infinite;
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-section h3 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .btn-white {
            background: white;
            color: var(--primary);
            font-weight: 600;
            padding: 1rem 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background: var(--gray-900);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray-400);
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .specialties-grid {
                grid-template-columns: 1fr;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .agenda-timeline {
                padding-left: 1rem;
            }

            .agenda-item {
                margin-left: 1rem;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <nav class="nav" id="nav">
        <div class="nav-container">
            <div class="logo"  style="width:20%"><a href="<?php echo base_url(); ?>index.php"><img src="<?= base_url()?>resources/assets/images/logo.png"  style="width:23%" alt=""></a></div>
            <ul class="nav-menu">
                <li><a href="#home">Accueil</a></li>
                <li><a href="#programs">Programmes</a></li>
                <li><a href="#news">Actualités</a></li>
            </ul>
            <div class="nav-cta">
                <a href="<?= base_url('index.php/welcome/index')?>" class="btn btn-ghost">En savoir Plus</a>
                <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">Candidater</a>
            </div>
        </div>
    </nav>