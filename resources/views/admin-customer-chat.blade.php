<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Customer Chat — TechHub
    </title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

    * {
    box-sizing: border-box;
}

html, body {
    margin: 0;
    padding: 0;
    min-height: 100%;
}

body {
    background: #f5f7fb;
    color: #1f2937;
    font-family: Arial, Helvetica, sans-serif;
}

/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 250px;
    padding: 25px 18px;
    background: #ffffff;
    border-right: 1px solid #e5e7eb;
    z-index: 100;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    text-decoration: none;
}

.brand-mark {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #2563eb;
    color: #ffffff;
    font-weight: bold;
}

.brand-name {
    color: #111827;
    font-size: 21px;
    font-weight: bold;
}

.brand-name span {
    color: #2563eb;
}

.admin-label {
    margin: 10px 0 25px 50px;
    color: #2563eb;
    font-size: 10px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.sidebar-section {
    margin: 20px 0 10px 10px;
    color: #9ca3af;
    font-size: 10px;
    font-weight: bold;
    text-transform: uppercase;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 13px;
    margin-bottom: 6px;
    border-radius: 8px;
    color: #667085;
    text-decoration: none;
    font-size: 13px;
    transition: .2s ease;
}

.sidebar-link i {
    width: 20px;
    font-size: 17px;
}

.sidebar-link:hover,
.sidebar-link.active {
    background: #eff6ff;
    color: #2563eb;
}

.notification-badge {
    margin-left: auto;
    min-width: 24px;
    padding: 4px 7px;
    border-radius: 20px;
    background: #ef4444;
    color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
}

/* =========================================================
   MAIN AREA
========================================================= */

.main-content {
    margin-left: 250px;
    min-height: 100vh;
    padding: 30px;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 18px;
    color: #667085;
    font-size: 12px;
    text-decoration: none;
}

.back-link:hover {
    color: #2563eb;
}

/* =========================================================
   CHAT CARD
========================================================= */

.chat-card {
    width: 100%;
    max-width: 1050px;
    height: calc(100vh - 100px);
    min-height: 560px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(15, 23, 42, .06);
}

/* =========================================================
   CHAT HEADER
========================================================= */

.chat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 17px 20px;
    background: #ffffff;
    border-bottom: 1px solid #edf0f4;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 11px;
}

.customer-avatar {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 17px;
}

.customer-name {
    margin: 0;
    color: #111827;
    font-size: 15px;
    font-weight: 700;
}

.customer-email {
    margin-top: 3px;
    color: #98a2b3;
    font-size: 10px;
}

.conversation-details {
    text-align: right;
}

.inquiry-type {
    display: inline-block;
    padding: 5px 9px;
    border-radius: 20px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 9px;
    font-weight: 700;
}

.order-number {
    margin-top: 5px;
    color: #667085;
    font-size: 10px;
}

/* =========================================================
   CHAT MESSAGES AREA
   background carries a faint chat-wallpaper dot pattern,
   like WhatsApp's canvas
========================================================= */

.messages {
    flex: 1;
    overflow-y: auto;
    padding: 18px 22px;
    background-color: #eef2f8;
    background-image: radial-gradient(#dde3ee 1px, transparent 1px);
    background-size: 18px 18px;
}

/* =========================================================
   MESSAGE ROW
   Row is a flex container; avatar + bubble sit side by side
   and NEVER stretch past their content width.
========================================================= */

.message {
    display: flex;
    align-items: flex-end;
    width: 100%;
    margin: 0 0 3px 0;
    gap: 6px;
}

.message.start-group {
    margin-top: 10px;
}

.message:not(.admin) {
    justify-content: flex-start;
}

.message.admin {
    justify-content: flex-end;
}

/* =========================================================
   MESSAGE AVATAR
   Only show on the last message of a group (add class
   "show-avatar" via your templating if you group messages;
   otherwise it shows every time, which is fine too)
========================================================= */

.message-avatar {
    width: 24px;
    height: 24px;
    flex: 0 0 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #dfe4ec;
    color: #667085;
    font-size: 10px;
}

.message.admin .message-avatar {
    order: 2;
    background: #cfe0ff;
    color: #2563eb;
}

/* =========================================================
   MESSAGE CONTENT
   Shrink-wraps to its bubble. flex: 0 1 auto + min-width: 0
   is what stops it from stretching across the row.
========================================================= */

.message-content {
    display: flex;
    flex-direction: column;
    flex: 0 1 auto;
    width: auto;
    max-width: 60%;
    min-width: 0;
}

.message:not(.admin) .message-content {
    align-items: flex-start;
}

.message.admin .message-content {
    align-items: flex-end;
}

/* =========================================================
   MESSAGE NAME
========================================================= */

.message-name {
    margin: 0 0 2px 2px;
    color: #667085;
    font-size: 9px;
    line-height: 1.2;
    font-weight: 600;
}

.message.admin .message-name {
    margin: 0 2px 2px 0;
}

.message-time {
    margin-left: 5px;
    color: #98a2b3;
    font-size: 8px;
    font-weight: normal;
}

/* =========================================================
   CHAT BUBBLE — WhatsApp/Instagram style
   - width: fit-content + a small max-width so it hugs text
   - text-align always left, no matter which side it's on
   - white-space: normal (NOT pre-wrap) so template
     indentation/newlines in the source can't leak in as
     visible whitespace. Line breaks should come from real
     <br> tags or nl2br() server-side, not raw newlines.
========================================================= */

.message-bubble {
    display: inline-block;
    width: fit-content;
    max-width: 260px;
    height: auto;
    min-height: 0;
    margin: 0;
    padding: 6px 10px;
    border-radius: 14px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12.5px;
    line-height: 1.4;
    text-align: left;
    white-space: normal;
    overflow-wrap: break-word;
    word-break: normal;
    box-sizing: border-box;
    box-shadow: none;
}

/* CUSTOMER BUBBLE — left, grey/white like WhatsApp received */

.message:not(.admin) .message-bubble {
    background: #ffffff;
    color: #1f2937;
    border: 1px solid #e6e9ef;
    border-bottom-left-radius: 3px;
}

/* ADMIN BUBBLE — right, blue like WhatsApp/Instagram sent */

.message.admin .message-bubble {
    background: linear-gradient(135deg, #2563eb, #315bea);
    color: #ffffff;
    border: none;
    border-bottom-right-radius: 3px;
}

/* =========================================================
   CHAT SCROLLBAR
========================================================= */

.messages::-webkit-scrollbar {
    width: 6px;
}

.messages::-webkit-scrollbar-track {
    background: transparent;
}

.messages::-webkit-scrollbar-thumb {
    background: #c7cedb;
    border-radius: 10px;
}

/* =========================================================
   REPLY AREA
========================================================= */

.reply-area {
    padding: 12px 15px;
    background: #ffffff;
    border-top: 1px solid #e5e7eb;
}

.reply-form {
    display: flex;
    align-items: stretch;
    gap: 9px;
}

.reply-input {
    flex: 1;
    min-width: 0;
    height: 42px;
    resize: none;
    padding: 10px 13px;
    border: 1px solid #d7dce3;
    border-radius: 21px;
    outline: none;
    background: #f5f7fb;
    color: #344054;
    font-family: inherit;
    font-size: 12px;
}

.reply-input::placeholder {
    color: #98a2b3;
}

.reply-input:focus {
    border-color: #8ea8f7;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
}

/* =========================================================
   SEND BUTTON
========================================================= */

/* =========================================================
   SEND BUTTON
   Plain blue pill button, sized to fit icon + text label
========================================================= */

.send-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    min-width: 100px;
    width: auto;
    height: 42px;
    padding: 0 18px;
    border: none;
    border-radius: 21px;
    background: #2563eb;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    cursor: pointer;
}

.send-button:hover {
    background: #1d4ed8;
}

/* =========================================================
   SUCCESS MESSAGE
========================================================= */

.success-message {
    margin-bottom: 14px;
    padding: 10px 13px;
    border-radius: 9px;
    background: #ecfdf3;
    color: #027a48;
    font-size: 12px;
}

/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1000px) {
    .sidebar { width: 220px; }
    .main-content { margin-left: 220px; padding: 22px; }
    .message-content { max-width: 68%; }
    .message-bubble { max-width: 240px; }
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
        padding: 15px;
    }
    .main-content { margin-left: 0; padding: 12px; }
    .chat-card {
        height: calc(100vh - 45px);
        min-height: 500px;
        border-radius: 12px;
    }
    .chat-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 14px 15px;
        gap: 10px;
    }
    .conversation-details { width: 100%; text-align: left; }
    .messages { padding: 15px 12px; }
    .message-content { max-width: 80%; }
    .message-bubble {
        max-width: 220px;
        padding: 6px 9px;
        font-size: 11.5px;
        line-height: 1.4;
    }
    .message-avatar { width: 20px; height: 20px; flex-basis: 20px; font-size: 8px; }
    .reply-form { flex-direction: column; }
    .reply-input { height: 42px; border-radius: 12px; }
    .send-button { width: 100%; border-radius: 10px; }
}

/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 420px) {
    .message-content { max-width: 84%; }
    .message-bubble { max-width: 195px; padding: 6px 8px; font-size: 10.5px; }
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1000px) {

    .sidebar {
        width: 220px;
    }

    .main-content {
        margin-left: 220px;

        padding: 22px;
    }

    .message-content {
        max-width: 65%;
    }

    .message-bubble {
        max-width: 300px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .sidebar {
        position: relative;

        width: 100%;

        height: auto;

        padding: 15px;
    }

    .main-content {
        margin-left: 0;

        padding: 12px;
    }

    .chat-card {
        height: calc(100vh - 45px);

        min-height: 500px;

        border-radius: 12px;
    }

    .chat-header {
        flex-direction: column;

        align-items: flex-start;

        padding: 14px 15px;

        gap: 10px;
    }

    .conversation-details {
        width: 100%;

        text-align: left;
    }

    .messages {
        padding: 15px 12px;
    }

    .message-content {
        max-width: 78%;
    }

    .message-bubble {
        max-width: 270px;

        padding: 6px 9px;

        font-size: 11px;

        line-height: 1.35;
    }

    .message-avatar {
        width: 25px;
        height: 25px;

        flex-basis: 25px;

        font-size: 9px;
    }

    .reply-form {
        flex-direction: column;
    }

    .reply-input {
        height: 42px;
    }

    .send-button {
        height: 40px;
    }
}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 420px) {

    .message-content {
        max-width: 82%;
    }

    .message-bubble {
        max-width: 235px;

        padding: 6px 8px;

        font-size: 10.5px;
    }
}

</style>

</head>


<body>


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <a
            href="/"
            class="brand"
        >

            <span class="brand-mark">
                TH
            </span>

            <span class="brand-name">
                Tech<span>Hub</span>
            </span>

        </a>


        <div class="admin-label">
            Admin Panel
        </div>


        <hr>


        <div class="sidebar-section">
            Control Center
        </div>


        <a
            href="{{ url('/admin') }}"
            class="sidebar-link"
        >
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>


        <a
            href="{{ url('/') }}"
            class="sidebar-link"
        >
            <i class="bi bi-shop"></i>
            View Website
        </a>


        <a
            href="{{ url('/admin/products') }}"
            class="sidebar-link"
        >
            <i class="bi bi-box-seam"></i>
            Products
        </a>


        <a
            href="{{ url('/admin/customer-orders') }}"
            class="sidebar-link"
        >
            <i class="bi bi-cart3"></i>
            Orders
        </a>


        <a
            href="{{ url('/admin/customer-messages') }}"
            class="sidebar-link active"
        >

            <i class="bi bi-chat-dots"></i>

            Customer Messages

        </a>


        <a
            href="{{ url('/admin/customers') }}"
            class="sidebar-link"
        >

            <i class="bi bi-people"></i>

            Customers

        </a>


        <a
            href="{{ url('/admin/inventory') }}"
            class="sidebar-link"
        >

            <i class="bi bi-clipboard-data"></i>

            Inventory Report

        </a>


        <a
            href="{{ url('/admin/manage-admins') }}"
            class="sidebar-link"
        >

            <i class="bi bi-person-gear"></i>

            Manage Admins

        </a>


        <a
            href="{{ url('/admin/coupons') }}"
            class="sidebar-link"
        >

            <i class="bi bi-ticket-perforated"></i>

            Coupons

        </a>


        <a
            href="{{ url('/admin/settings') }}"
            class="sidebar-link"
        >

            <i class="bi bi-gear"></i>

            Settings

        </a>


        <a
            href="{{ url('/admin/visitors') }}"
            class="sidebar-link"
        >

            <i class="bi bi-graph-up-arrow"></i>

            Website Visitors

        </a>

    </aside>



    <!-- MAIN -->

    <main class="main-content">


        <a
            href="{{ url('/admin/customer-messages') }}"
            class="back-link"
        >

            <i class="bi bi-arrow-left"></i>

            Back to Customer Messages

        </a>


        @if(session('success'))

            <div class="success-message">

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif



        <div class="chat-card">


            <!-- CHAT HEADER -->

            <div class="chat-header">


                <div class="customer-info">

                    <div class="customer-avatar">

                        <i class="bi bi-person"></i>

                    </div>


                    <div>

                        <h4 class="customer-name">

                            {{ $conversation->user->name ?? 'Customer' }}

                        </h4>


                        <div class="customer-email">

                            {{ $conversation->user->email ?? 'No email available' }}

                        </div>

                    </div>

                </div>



                <div class="conversation-details">

                    <div class="inquiry-type">

                        <i class="bi bi-chat-dots me-1"></i>

                        {{ $conversation->inquiry_type }}

                    </div>


                    @if($conversation->order_id)

                        <div class="order-number">

                            <i class="bi bi-box-seam me-1"></i>

                            Order #{{ $conversation->order_id }}

                        </div>

                    @endif

                </div>

            </div>



            <!-- MESSAGES -->

            <div
                class="messages"
                id="messages"
            >


                @forelse($conversation->messages as $message)


                    <div
                        class="message {{ $message->sender_type === 'admin' ? 'admin' : 'customer' }}"
                    >


                        <div class="message-avatar">

                            @if($message->sender_type === 'admin')

                                <i class="bi bi-headset"></i>

                            @else

                                <i class="bi bi-person"></i>

                            @endif

                        </div>


                        <div class="message-content">


                            <div class="message-name">

                                @if($message->sender_type === 'admin')

                                    You

                                @else

                                    {{ $conversation->user->name ?? 'Customer' }}

                                @endif


                                <span class="message-time">

                                    {{ $message->created_at->format('d M Y, h:i A') }}

                                </span>

                            </div>


                            <div class="message-bubble">

                                {{ $message->message }}

                            </div>


                        </div>

                    </div>


                @empty


                    <div class="text-center text-muted py-5">

                        <i
                            class="bi bi-chat-square-text"
                            style="font-size:40px;"
                        ></i>

                        <p class="mt-3">
                            No messages in this conversation.
                        </p>

                    </div>


                @endforelse


            </div>



            <!-- REPLY -->

            <div class="reply-area">


                <form
                    action="{{ url('/admin/customer-messages/' . $conversation->id . '/reply') }}"
                    method="POST"
                    class="reply-form"
                >

                    @csrf


                    <textarea
                        name="message"
                        class="reply-input"
                        rows="2"
                        maxlength="2000"
                        placeholder="Type your reply to the customer..."
                        required
                    ></textarea>


                    <button
                        type="submit"
                        class="send-button"
                    >

                        <i class="bi bi-send me-1"></i>

                        Send Reply

                    </button>

                </form>


            </div>


        </div>


    </main>



    <script>

        const messages =
            document.getElementById('messages');

        if (messages) {

            messages.scrollTop =
                messages.scrollHeight;

        }

    </script>


</body>

</html>