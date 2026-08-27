<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact — TechHub</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
:root {
    --bg: #f7f8fa;
    --white: #ffffff;
    --border: #e5e7eb;
    --text: #172033;
    --muted: #667085;
    --blue: #315bea;
    --blue-dark: #2649c7;
    --soft-blue: #eef2ff;
    --danger: #dc2626;
    --body: 'Inter', sans-serif;
    --display: 'Space Grotesk', sans-serif;
}

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    background: var(--bg);
    color: var(--text);
    font-family: var(--body);
    overflow-x: hidden;
}

a {
    color: inherit;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: var(--display);
}

/* =========================
   TOP LINE
========================= */

.top-line {
    height: 2px;
    background: var(--blue);
}

/* =========================
   NAVBAR
========================= */

.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 12px 0;
    background: #fff;
    border-bottom: 1px solid var(--border);
}

.brand-mark {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.brand-monogram {
    width: 38px;
    height: 38px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--blue);
    color: #fff;
    font-weight: 700;
}

.brand-word {
    font-size: 20px;
    font-weight: 700;
}

.brand-word span {
    color: var(--blue);
}

.nav-link {
    color: #667085 !important;
    font-size: 13px;
    font-weight: 500;
    margin-left: 18px;
}

.nav-link:hover,
.nav-link.active {
    color: var(--blue) !important;
}

.nav-icon {
    width: 38px;
    height: 38px;
    border: 1px solid var(--border);
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    color: #475467;
}

.nav-icon:hover {
    color: var(--blue);
    border-color: #c7d2fe;
}

.btn-signup {
    border: 1px solid #c7d2fe;
    background: #f5f7ff;
    color: var(--blue);
    border-radius: 9px;
    padding: 8px 15px;
    font-size: 13px;
    font-weight: 600;
}

.btn-signup:hover {
    background: var(--blue);
    color: #fff;
}

.menu-btn {
    border: 1px solid var(--border);
    background: #fff;
    color: #344054;
    border-radius: 9px;
}

/* =========================
   SEARCH
========================= */

.search-box {
    display: none;
    padding: 12px 0;
    background: #fff;
    border-bottom: 1px solid var(--border);
}

.search-box.active {
    display: block;
}

.search-box input {
    height: 46px;
    background: #f9fafb;
    color: var(--text);
    border: 1px solid var(--border);
}

.search-box input:focus {
    background: #fff;
    border-color: #aab8f5;
    box-shadow: none;
}

.search-box button {
    background: var(--blue);
    border: 0;
    color: #fff;
    font-weight: 600;
}

/* =========================
   OFFCANVAS
========================= */

.offcanvas {
    width: 300px !important;
    background: #fff;
    border-right: 1px solid var(--border);
}

.offcanvas-header {
    border-bottom: 1px solid var(--border);
    padding: 20px;
}

.offcanvas-header h4 {
    margin: 0;
    font-size: 18px;
}

.category {
    margin-bottom: 5px;
    border-radius: 8px;
}

.category a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 13px;
    text-decoration: none;
    color: #475467;
    font-size: 14px;
}

.category:hover {
    background: #f5f7ff;
}

.category:hover a {
    color: var(--blue);
}

/* =========================
   HERO
========================= */

.contact-hero {
    padding: 58px 0 0;
    background: #fff;
    border-bottom: 1px solid var(--border);
}

.hero-grid,
.hero-orb,
.hero-orb-left {
    display: none;
}

.contact-hero .container {
    position: relative;
}

.eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: var(--blue);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.eyebrow .dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--blue);
}

.contact-hero h1 {
    margin: 14px 0 12px;
    font-size: clamp(2.3rem, 5vw, 4rem);
    line-height: 1.05;
    letter-spacing: -2px;
    max-width: 700px;
}

.contact-hero h1 .gradient {
    color: var(--blue);
}

.hero-copy {
    max-width: 560px;
    color: var(--muted);
    font-size: 15px;
    line-height: 1.7;
}

.hero-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 22px;
}

.btn-main {
    border: 0;
    border-radius: 9px;
    padding: 12px 20px;
    background: var(--blue);
    color: #fff;
    font-weight: 700;
}

.btn-main:hover {
    background: var(--blue-dark);
    color: #fff;
}

.btn-outline-tech {
    border: 1px solid var(--border);
    border-radius: 9px;
    padding: 12px 20px;
    background: #fff;
    color: #344054;
    font-weight: 600;
}

.btn-outline-tech:hover {
    color: var(--blue);
    border-color: #c7d2fe;
}

/* =========================
   HERO INFO
========================= */

.hero-rail {
    margin-top: 40px;
    border-top: 1px solid var(--border);
}

.rail-item {
    padding: 22px 6px 24px;
    display: flex;
    align-items: flex-start;
    gap: 13px;
}

.rail-item + .rail-item {
    border-left: 1px solid var(--border);
}

.rail-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border-radius: 9px;
    display: grid;
    place-items: center;
    background: var(--soft-blue);
    color: var(--blue);
}

.rail-label {
    color: var(--blue);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.rail-value {
    font-weight: 700;
    font-size: 15px;
    margin: 2px 0;
}

.rail-detail {
    color: var(--muted);
    font-size: 12px;
    margin: 0;
}

/* =========================
   MAIN SECTION
========================= */

.section {
    padding: 60px 0;
}

.contact-section {
    background: var(--bg);
}

.section-kicker {
    display: inline-flex;
    padding: 6px 10px;
    border: 1px solid #dbe3ff;
    border-radius: 7px;
    background: #f5f7ff;
    color: var(--blue);
    font-size: 10px;
    font-weight: 700;
}

.section-title {
    font-size: clamp(1.8rem, 4vw, 2.7rem);
    letter-spacing: -1px;
}

.section-subtitle {
    color: var(--muted);
    max-width: 620px;
    line-height: 1.7;
}

/* =========================
   SUPPORT CONSOLE
========================= */

.console {
    max-width: 1080px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 18px;
    align-items: start;
}

.console-nav {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 7px;
    box-shadow: 0 4px 16px rgba(15, 23, 42, .04);
    position: sticky;
    top: 85px;
}

.support-tab {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 9px;
    border: 0;
    background: transparent;
    color: #475467;
    padding: 11px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 2px;
}

.support-tab i {
    color: #98a2b3;
}

.support-tab:hover {
    background: #f5f7ff;
    color: var(--blue);
}

.support-tab.active {
    background: #eef2ff;
    color: var(--blue);
}

.support-tab.active i {
    color: var(--blue);
}

.message-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 19px;
    height: 19px;
    padding: 0 5px;
    margin-left: auto;
    border-radius: 10px;
    background: #ef4444;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
}

/* =========================
   PANELS
========================= */

.support-tab-content {
    display: none;
}

.support-tab-content.active {
    display: block;
}

/* =========================
   FORM
========================= */

.support-form-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px;
    box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
}

.support-form-card h3 {
    font-size: 22px;
}

.support-description {
    color: var(--muted);
    font-size: 13px;
}

.support-divider {
    border: 0;
    border-top: 1px solid var(--border);
    margin: 18px 0 22px;
}

.form-label {
    font-size: 10px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--muted);
    font-weight: 700;
    margin-bottom: 7px;
}

.form-control,
.form-select {
    background: #fff;
    border: 1px solid #dfe3e8;
    color: var(--text);
    border-radius: 9px;
    padding: 11px 13px;
    min-height: 45px;
}

.form-control:focus,
.form-select:focus {
    border-color: #9aaef5;
    box-shadow: 0 0 0 3px rgba(49, 91, 234, .08);
}

.support-form-card textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.btn-send {
    width: 100%;
    border: 0;
    border-radius: 9px;
    padding: 12px;
    background: var(--blue);
    color: #fff;
    font-weight: 700;
}

.btn-send:hover {
    background: var(--blue-dark);
}

.support-success {
    max-width: 1080px;
    margin: 0 auto 16px;
    padding: 11px 14px;
    border-radius: 9px;
    background: #ecfdf3;
    border: 1px solid #bbf7d0;
    color: #15803d;
    font-size: 13px;
}

/* =========================
   CONVERSATION CARD
========================= */

.conversation-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.conversation-card {
    overflow: hidden;
    border: 1px solid var(--border);
    border-radius: 13px;
    background: #fff;
    box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
}

.conversation-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 13px 16px;
    border-bottom: 1px solid var(--border);
    background: #fafbfc;
}

.conversation-type {
    color: #111827;
    font-size: 13px;
    font-weight: 700;
}

.conversation-type i {
    width: 28px;
    height: 28px;
    display: inline-grid;
    place-items: center;
    margin-right: 6px;
    border-radius: 8px;
    background: var(--soft-blue);
    color: var(--blue);
}

.conversation-date {
    margin-top: 4px;
    margin-left: 35px;
    color: #98a2b3;
    font-size: 10px;
}

.conversation-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.delete-conversation-btn {
    border: 1px solid #fecaca;
    background: #fff;
    color: var(--danger);
    padding: 6px 9px;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 600;
}

.delete-conversation-btn:hover {
    background: #fef2f2;
}

.unread-badge {
    padding: 5px 8px;
    border-radius: 8px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 9px;
    font-weight: 700;
}

/* =========================
   CHAT
========================= */

/* =========================
   CHAT
========================= */

.conversation-messages {
    padding: 18px 20px;
    background-color: #f5f7fb;
    background-image: radial-gradient(#e3e7ee 1px, transparent 1px);
    background-size: 16px 16px;
}

.support-message {
    width: 100%;
    display: flex;
    align-items: flex-end;
    gap: 8px;
    margin-bottom: 10px;
}

.support-message:last-child {
    margin-bottom: 0;
}

.admin-message {
    justify-content: flex-start;
}

.customer-message {
    justify-content: flex-end;
}

.message-avatar {
    width: 26px;
    height: 26px;
    flex: 0 0 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 11px;
}

.admin-message .message-avatar {
    background: #eef2ff;
    color: var(--blue);
    order: 1;
}

.customer-message .message-avatar {
    background: #f3f4f6;
    color: #667085;
    order: 2;
}

/* Shrink-wraps to bubble content — flex: 0 1 auto + min-width: 0
   is what stops it stretching across the row */
.message-content {
    display: flex;
    flex-direction: column;
    flex: 0 1 auto;
    width: auto;
    min-width: 0;
    max-width: 55%;
}

.admin-message .message-content {
    align-items: flex-start;
    order: 2;
}

.customer-message .message-content {
    align-items: flex-end;
    order: 1;
}

.message-top {
    display: flex;
    align-items: center;
    gap: 7px;
    margin: 0 2px 4px;
    font-size: 9px;
    color: #98a2b3;
}

.message-top strong {
    color: #344054;
    font-weight: 700;
}

/* Hugs its own text, no pre-wrap so template indentation
   can never leak in as visible whitespace */
.message-bubble {
    display: inline-block;
    width: fit-content;
    max-width: 240px;
    padding: 7px 11px;
    border-radius: 14px;
    font-size: 12px;
    line-height: 1.45;
    text-align: left;
    white-space: normal;
    overflow-wrap: break-word;
    word-break: normal;
}

.admin-message .message-bubble {
    background: #f3f4f6;
    color: #344054;
    border: 1px solid #e7e9ed;
    border-bottom-left-radius: 3px;
}

.customer-message .message-bubble {
    background: linear-gradient(135deg, var(--blue), var(--blue-dark));
    color: #fff;
    border-bottom-right-radius: 3px;
    box-shadow: 0 4px 12px rgba(49,91,234,.15);
}

/* =========================
   REPLY
========================= */

.customer-reply-box {
    padding: 13px 16px;
    border-top: 1px solid var(--border);
    background: #fafbfc;
}

.reply-input-row {
    display: flex;
    gap: 8px;
}

.reply-input {
    flex: 1;
    resize: none;
    padding: 10px 14px;
    border: 1px solid #dfe3e8;
    border-radius: 21px;
    background: #fff;
    font-size: 12px;
    outline: none;
}

.reply-input:focus {
    border-color: #9aaef5;
    box-shadow: 0 0 0 3px rgba(49, 91, 234, .07);
}

.reply-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 80px;
    padding: 0 16px;
    border: 0;
    border-radius: 21px;
    background: var(--blue);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.reply-button:hover {
    background: var(--blue-dark);
}

.mark-read-button {
    border: 0;
    background: transparent;
    color: var(--muted);
    font-size: 10px;
}

/* =========================
   EMPTY STATE
========================= */

.empty-messages {
    padding: 48px 25px;
    text-align: center;
    border: 1px solid var(--border);
    border-radius: 13px;
    background: #fff;
}

.empty-icon {
    width: 56px;
    height: 56px;
    margin: 0 auto 16px;
    display: grid;
    place-items: center;
    border-radius: 14px;
    background: var(--soft-blue);
    color: var(--blue);
    font-size: 23px;
}

.empty-messages h4 {
    margin-bottom: 7px;
    font-size: 18px;
}

.empty-messages p {
    max-width: 420px;
    margin: 0 auto 20px;
    color: var(--muted);
    font-size: 13px;
    line-height: 1.6;
}

.empty-button {
    display: inline-block;
    border: 0;
    border-radius: 8px;
    padding: 10px 17px;
    background: var(--blue);
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
}

/* =========================
   FOOTER
========================= */

footer {
    background: #fff;
    border-top: 1px solid var(--border);
    padding: 48px 0 25px;
}

footer p {
    color: var(--muted);
    font-size: 13px;
}

footer small {
    color: #98a2b3;
    font-size: 9px;
}

/* =========================
   NOTIFICATION
========================= */

.support-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 340px;
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 13px;
    border-radius: 12px;
    background: #fff;
    border: 1px solid var(--border);
    box-shadow: 0 12px 30px rgba(15, 23, 42, .14);
    z-index: 99999;
    transform: translateX(380px);
    opacity: 0;
    transition: .3s ease;
}

.support-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.support-notification-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    display: grid;
    place-items: center;
    border-radius: 9px;
    background: var(--soft-blue);
    color: var(--blue);
}

.support-notification-content {
    flex: 1;
}

.support-notification-content strong {
    display: block;
    margin-bottom: 3px;
    font-size: 12px;
}

.support-notification-content p {
    margin: 0;
    color: var(--muted);
    font-size: 10px;
}

.support-notification > button {
    border: 0;
    background: transparent;
    color: #98a2b3;
    font-size: 18px;
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 860px) {

    .console {
        grid-template-columns: 1fr;
    }

    .console-nav {
        position: static;
        display: flex;
        gap: 5px;
        overflow-x: auto;
    }

    .support-tab {
        min-width: 190px;
    }
}

@media (max-width: 600px) {

    .contact-hero {
        padding: 50px 0 0;
    }

    .contact-hero h1 {
        font-size: 2.35rem;
        letter-spacing: -1px;
    }

    .section {
        padding: 48px 0;
    }

    .support-form-card {
        padding: 20px;
    }

    .conversation-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .conversation-actions {
        width: 100%;
        justify-content: space-between;
    }

    .conversation-messages {
        padding: 16px 13px;
    }

    .message-content {
        max-width: 78%;
    }

    .message-bubble {
        max: width 190px;
        padding: 6px 9px;
        font-size: 11.5px;
    }

    .message-avatar {
        width: 30px;
        height: 30px;
    }

    .reply-input-row {
        flex-direction: column;
    }

    .reply-button {
        min-height: 40px;
    }

    .support-notification {
        top: 12px;
        left: 12px;
        right: 12px;
        width: auto;
    }
}
</style>
</head>

<body>

<div class="top-line"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <button class="btn menu-btn" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#menu">
            <i class="bi bi-grid-3x3-gap fs-5"></i>
        </button>

        <a class="brand-mark ms-3" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-2">

            <a class="nav-link d-none d-lg-inline" href="/">Home</a>
            <a class="nav-link d-none d-lg-inline" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline active" href="/contact">Contact</a>
            <a class="nav-link d-none d-lg-inline" href="/login">Login</a>

            <a href="/signup" class="btn btn-signup ms-lg-2 d-none d-sm-inline-block">
                Sign Up
            </a>

            <button type="button" class="btn nav-icon ms-1" id="searchToggle" aria-label="Search">
                <i class="bi bi-search"></i>
            </button>

            <a href="/cart" class="text-decoration-none nav-icon" aria-label="Cart">
                <i class="bi bi-bag"></i>
            </a>

        </div>
    </div>
</nav>

<!-- SEARCH -->
<div class="search-box" id="searchBox">
    <div class="container">
        <form action="/" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search products..." autocomplete="off">
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
</div>

<!-- SIDEBAR — categories -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menu">
    <div class="offcanvas-header">
        <div>
            <small>TECHHUB / EXPLORE</small>
            <h4 class="mt-1">Categories</h4>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-3">
        <div class="category"><a href="{{ url('/category/Laptops') }}"><i class="bi bi-laptop"></i>Laptops</a></div>
        <div class="category"><a href="{{ url('/category/Phones') }}"><i class="bi bi-phone"></i>Phones</a></div>
        <div class="category"><a href="{{ url('/category/Headphones') }}"><i class="bi bi-headphones"></i>Headphones</a></div>
        <div class="category"><a href="{{ url('/category/Earbuds') }}"><i class="bi bi-earbuds"></i>Earbuds</a></div>
        <div class="category"><a href="{{ url('/category/Smart-Watches') }}"><i class="bi bi-smartwatch"></i>Smart Watches</a></div>
        <div class="category"><a href="{{ url('/category/Monitors') }}"><i class="bi bi-display"></i>Monitors</a></div>
        <div class="category"><a href="{{ url('/category/Keyboards') }}"><i class="bi bi-keyboard"></i>Keyboards</a></div>
        <div class="category"><a href="{{ url('/category/Mouse') }}"><i class="bi bi-mouse2"></i>Mouse</a></div>
        <div class="category"><a href="{{ url('/category/Gaming') }}"><i class="bi bi-controller"></i>Gaming</a></div>
        <div class="category"><a href="{{ url('/category/Cameras') }}"><i class="bi bi-camera"></i>Cameras</a></div>
    </div>
</div>

<!-- HERO -->
<section class="contact-hero">

    <div class="hero-grid"></div>
    <div class="hero-orb"></div>
    <div class="hero-orb-left"></div>

    <div class="container">

        <div class="eyebrow">
            <span class="dot"></span>
            SUPPORT / TECHHUB
        </div>

        <h1>Let's <span class="gradient">talk</span>.</h1>

        <p class="hero-copy">
            Have a question about a product, your order, or TechHub?
            Send us a message and our team will get back to you.
        </p>

        <div class="hero-actions">
            <a href="#contactForm" class="btn btn-main">
                Send a Message <i class="bi bi-arrow-down ms-2"></i>
            </a>
            <a href="mailto:support@techhub.com" class="btn btn-outline-tech">
                Email Support
            </a>
        </div>

        <div class="hero-rail row g-0">
            <div class="col-lg-4 col-12">
                <div class="rail-item">
                    <div class="rail-icon"><i class="bi bi-envelope"></i></div>
                    <div>
                        <div class="rail-label">Email</div>
                        <div class="rail-value">support@techhub.com</div>
                        <p class="rail-detail">Best for order numbers &amp; attachments.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="rail-item">
                    <div class="rail-icon"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <div class="rail-label">Response Time</div>
                        <div class="rail-value">Under 24 hours</div>
                        <p class="rail-detail">Mon–Sat, 9am–7pm.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="rail-item">
                    <div class="rail-icon"><i class="bi bi-chat-dots"></i></div>
                    <div>
                        <div class="rail-label">Live Status</div>
                        <div class="rail-value" style="color: var(--green);">Support online</div>
                        <p class="rail-detail">Track replies from "My Inquiries" below.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     CUSTOMER SUPPORT CONSOLE
========================================================= -->
<section class="section contact-section" id="contactForm">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">CUSTOMER SUPPORT</div>
            <h2 class="section-title mt-2">How can we help?</h2>
            <p class="section-subtitle mx-auto">
                Send us an enquiry or continue a conversation with our support team.
            </p>
        </div>

        @if(session('success'))
            <div class="support-success">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="console">

            <!-- SIDE NAV -->
            <div class="console-nav">
                <button type="button" class="support-tab active" onclick="showSupportTab('newInquiry', this)">
                    <i class="bi bi-send"></i>
                    New Inquiry
                </button>

                <button type="button" class="support-tab" onclick="showSupportTab('myMessages', this)">
                    <i class="bi bi-chat-dots"></i>
                    My Inquiries

                    @if(
                        isset($conversations) &&
                        $conversations->sum(
                            fn($conversation) =>
                                $conversation->messages
                                    ->where('sender_type', 'admin')
                                    ->where('is_read', false)
                                    ->count()
                        ) > 0
                    )
                        <span class="message-count">
                            {{
                                $conversations->sum(
                                    fn($conversation) =>
                                        $conversation->messages
                                            ->where('sender_type', 'admin')
                                            ->where('is_read', false)
                                            ->count()
                                )
                            }}
                        </span>
                    @endif
                </button>
            </div>

            <!-- MAIN PANEL -->
            <div>

                <!-- TAB 1 — NEW INQUIRY -->
                <div id="newInquiry" class="support-tab-content active">
                    <div class="support-form-card">

                        <div class="section-kicker">SEND A MESSAGE</div>
                        <h3 class="mt-2 mb-2">Send us a direct message</h3>
                        <p class="support-description">
                            Fill out the details below and our team will respond as soon as possible.
                        </p>

                        <hr class="support-divider">

                        <form action="{{ url('/customer-support') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                                        placeholder="Enter your name"
                                        required
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                        placeholder="name@example.com"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Inquiry Type</label>
                                <select name="subject" class="form-select" required>
                                    <option value="">Select an enquiry type</option>
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Order Status / Dispatch">Order Status / Dispatch</option>
                                    <option value="Bulk & Wholesale Discount">Bulk & Wholesale Discount</option>
                                    <option value="Damaged or Missing Item Claim">Damaged or Missing Item Claim</option>
                                    <option value="Custom Product Request">Custom Product Request</option>
                                    <option value="Return Order">Return Order</option>
                                    <option value="Replace Order">Replace Order</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Your Message</label>
                                <textarea
                                    name="message"
                                    class="form-control"
                                    rows="6"
                                    placeholder="Describe your enquiry or order details..."
                                    required
                                >{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="btn-send">
                                <i class="bi bi-send me-2"></i>
                                Submit Message
                            </button>
                        </form>

                    </div>
                </div>

                <!-- TAB 2 — MY MESSAGES -->
                <div id="myMessages" class="support-tab-content">

                    @guest
                        <div class="empty-messages">
                            <div class="empty-icon"><i class="bi bi-person-lock"></i></div>
                            <h4>Please login to view your messages</h4>
                            <p>Login to see your enquiries and replies from the TechHub support team.</p>
                            <a href="{{ url('/login') }}" class="empty-button">Login</a>
                        </div>
                    @else

                        @if(isset($conversations) && $conversations->count() > 0)

                            <div class="conversation-list">

                                @foreach($conversations as $conversation)

                                    <div class="conversation-card">

                                        <div class="conversation-header">
                                            <div class="conversation-info">
                                                <div class="conversation-type">
                                                    <i class="bi bi-chat-left-text"></i>
                                                    {{ $conversation->inquiry_type }}
                                                </div>
                                                <div class="conversation-date">
                                                    {{ $conversation->last_message_at
                                                        ? $conversation->last_message_at->format('d M Y, h:i A')
                                                        : $conversation->created_at->format('d M Y, h:i A')
                                                    }}
                                                </div>
                                            </div>

                                            <div class="conversation-actions">
                                                @if(
                                                    $conversation->messages
                                                        ->where('sender_type', 'admin')
                                                        ->where('is_read', false)
                                                        ->count() > 0
                                                )
                                                    <span class="unread-badge">New Reply</span>
                                                @endif

                                                <form
                                                    action="{{ url('/customer-support/' . $conversation->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete this entire conversation? This cannot be undone.');"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-conversation-btn">
                                                        <i class="bi bi-trash3"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="conversation-messages">
                                            @foreach($conversation->messages->sortBy('created_at') as $message)
                                                <div class="support-message {{ $message->sender_type === 'admin' ? 'admin-message' : 'customer-message' }}">

                                                    <div class="message-avatar">
                                                        @if($message->sender_type === 'admin')
                                                            <i class="bi bi-headset"></i>
                                                        @else
                                                            <i class="bi bi-person"></i>
                                                        @endif
                                                    </div>

                                                    <div class="message-content">
                                                        <div class="message-top">
                                                            <strong>
                                                                @if($message->sender_type === 'admin')
                                                                    TechHub Support
                                                                @else
                                                                    You
                                                                @endif
                                                            </strong>
                                                            <span>{{ $message->created_at->format('d M, h:i A') }}</span>
                                                        </div>

                                                        <div class="message-bubble">
                                                            {{ $message->message }}
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="customer-reply-box">
                                            <form action="{{ url('/customer-support/' . $conversation->id . '/reply') }}" method="POST">
                                                @csrf
                                                <div class="reply-input-row">
                                                    <textarea
                                                        name="message"
                                                        rows="2"
                                                        class="reply-input"
                                                        placeholder="Type your reply..."
                                                        required
                                                    ></textarea>
                                                    <button type="submit" class="reply-button">
                                                        <i class="bi bi-send"></i>
                                                        Send
                                                    </button>
                                                </div>
                                            </form>

                                            @if(
                                                $conversation->messages
                                                    ->where('sender_type', 'admin')
                                                    ->where('is_read', false)
                                                    ->count() > 0
                                            )
                                                <form
                                                    action="{{ url('/customer-support/' . $conversation->id . '/read') }}"
                                                    method="POST"
                                                    class="mt-2"
                                                >
                                                    @csrf
                                                    <button type="submit" class="mark-read-button">
                                                        <i class="bi bi-check2-all"></i>
                                                        Mark replies as read
                                                    </button>
                                                </form>
                                            @endif
                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="empty-messages">
                                <div class="empty-icon"><i class="bi bi-chat-square-text"></i></div>
                                <h4>No conversations yet</h4>
                                <p>Send your first enquiry and your conversation with TechHub support will appear here.</p>
                                <button type="button" class="empty-button" onclick="showSupportTab('newInquiry', document.querySelector('.support-tab'))">
                                    Send an Inquiry
                                </button>
                            </div>

                        @endif

                    @endguest

                </div>

            </div>

        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container text-center">
        <div class="brand-mark justify-content-center mb-3">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </div>
        <p class="mb-3">Technology that fits the way you live, work and play.</p>
        <small>© {{ date('Y') }} TECHHUB — BUILT FOR THE NEXT MOVE</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

    /* =========================================================
       CUSTOMER SUPPORT NOTIFICATIONS
    ========================================================= */

    let lastSupportMessageId = null;
    let supportAudioContext = null;

    function enableSupportSound() {
        if (!supportAudioContext) {
            supportAudioContext = new (window.AudioContext || window.webkitAudioContext)();
        }
        if (supportAudioContext.state === 'suspended') {
            supportAudioContext.resume();
        }
    }

    function playSupportSound() {
        enableSupportSound();
        if (!supportAudioContext) return;

        const oscillator = supportAudioContext.createOscillator();
        const gain = supportAudioContext.createGain();

        oscillator.type = 'sine';
        oscillator.frequency.setValueAtTime(880, supportAudioContext.currentTime);

        gain.gain.setValueAtTime(0.001, supportAudioContext.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.25, supportAudioContext.currentTime + 0.03);
        gain.gain.exponentialRampToValueAtTime(0.001, supportAudioContext.currentTime + 0.5);

        oscillator.connect(gain);
        gain.connect(supportAudioContext.destination);

        oscillator.start();
        oscillator.stop(supportAudioContext.currentTime + 0.5);
    }

    document.addEventListener('click', enableSupportSound, { once: true });
    document.addEventListener('keydown', enableSupportSound, { once: true });

    function showSupportNotification(message) {
        const popup = document.getElementById('supportNotification');
        const text = document.getElementById('supportNotificationText');
        if (!popup) return;

        if (message && message.text) {
            text.textContent = message.text;
        }

        popup.classList.add('show');
        playSupportSound();

        setTimeout(function () {
            popup.classList.remove('show');
        }, 6000);
    }

    function closeSupportNotification() {
        const popup = document.getElementById('supportNotification');
        if (popup) popup.classList.remove('show');
    }

    function checkSupportNotifications() {
        fetch("{{ url('/customer-support/check-notifications') }}")
            .then(function (response) { return response.json(); })
            .then(function (data) {
                if (!data.success) return;

                if (data.message && data.message.id !== lastSupportMessageId) {
                    if (lastSupportMessageId !== null) {
                        showSupportNotification(data.message);
                    }
                    lastSupportMessageId = data.message.id;
                }
            })
            .catch(function (error) {
                console.log('Support notification error:', error);
            });
    }

    setInterval(checkSupportNotifications, 5000);
    checkSupportNotifications();

    // =========================================================
    // SEARCH
    // =========================================================

    const searchToggle = document.getElementById('searchToggle');
    if (searchToggle) {
        searchToggle.addEventListener('click', function () {
            const searchBox = document.getElementById('searchBox');
            if (!searchBox) return;
            searchBox.classList.toggle('active');
            if (searchBox.classList.contains('active')) {
                const input = searchBox.querySelector('input');
                if (input) input.focus();
            }
        });
    }

    // =========================================================
    // CUSTOMER SUPPORT TABS
    // =========================================================

    function showSupportTab(tabId, button) {
        const contents = document.querySelectorAll('.support-tab-content');
        contents.forEach(function (content) { content.classList.remove('active'); });

        const buttons = document.querySelectorAll('.support-tab');
        buttons.forEach(function (tabButton) { tabButton.classList.remove('active'); });

        const selected = document.getElementById(tabId);
        if (selected) selected.classList.add('active');

        if (button) button.classList.add('active');
    }

</script>

<!-- CUSTOMER MESSAGE NOTIFICATION -->
<div id="supportNotification" class="support-notification">
    <div class="support-notification-icon">
        <i class="bi bi-chat-dots-fill"></i>
    </div>
    <div class="support-notification-content">
        <strong>New Support Reply</strong>
        <p id="supportNotificationText">TechHub Support replied to your message.</p>
    </div>
    <button type="button" onclick="closeSupportNotification()">×</button>
</div>

</body>
</html>