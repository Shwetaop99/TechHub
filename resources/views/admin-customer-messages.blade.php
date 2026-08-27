<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Customer Messages — TechHub</title>
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

        body {
            margin: 0;
            background: #f5f7fb;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        /* =========================================================
   ADMIN SUPPORT NOTIFICATION
========================================================= */

.admin-support-notification {

    position: fixed;

    top: 25px;
    right: 25px;

    width: 360px;

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 15px;

    border-radius: 16px;

    background: #ffffff;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 15px 40px rgba(15, 23, 42, .18);

    z-index: 99999;

    transform: translateX(430px);

    opacity: 0;

    transition: .35s ease;
}


.admin-support-notification.show {

    transform: translateX(0);

    opacity: 1;

}


.admin-support-notification-icon {

    width: 44px;
    height: 44px;

    flex-shrink: 0;

    display: grid;

    place-items: center;

    border-radius: 12px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 18px;

}


.admin-support-notification-content {

    flex: 1;

}


.admin-support-notification-content strong {

    display: block;

    margin-bottom: 3px;

    color: #111827;

    font-size: 13px;

}


.admin-support-notification-content p {

    margin: 0;

    color: #667085;

    font-size: 11px;

    line-height: 1.5;

}


.admin-support-notification > button {

    border: 0;

    background: transparent;

    color: #98a2b3;

    font-size: 20px;

    cursor: pointer;

}


@media (max-width: 600px) {

    .admin-support-notification {

        top: 15px;

        right: 15px;

        left: 15px;

        width: auto;

    }

}

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            padding: 25px 18px;

            background: white;
            border-right: 1px solid #e5e7eb;
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
            color: white;

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

            transition: .2s;
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
            color: white;

            font-size: 10px;
            font-weight: bold;

            text-align: center;
        }


        /* MAIN */

        .main-content {
            margin-left: 250px;

            min-height: 100vh;

            padding: 40px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .eyebrow {
            margin-bottom: 7px;

            color: #2563eb;

            font-size: 10px;
            font-weight: bold;

            text-transform: uppercase;
        }

        .page-title {
            margin: 0;

            font-size: 34px;
            font-weight: bold;
        }

        .page-title span {
            color: #2563eb;
        }

        .page-subtitle {
            margin-top: 8px;

            color: #667085;

            font-size: 13px;
        }


        /* MESSAGE PANEL */

        .message-panel {
            display: grid;

            grid-template-columns: 330px 1fr;

            min-height: 650px;

            overflow: hidden;

            border: 1px solid #e5e7eb;
            border-radius: 16px;

            background: white;

            box-shadow:
                0 8px 30px rgba(0,0,0,.05);
        }


        /* CONVERSATIONS */

        .conversation-list {
            border-right: 1px solid #e5e7eb;

            background: #fafbfc;
        }

        .conversation-header {
            padding: 20px;

            border-bottom: 1px solid #e5e7eb;
        }

        .conversation-header h5 {
            margin: 0;

            font-size: 15px;
            font-weight: bold;
        }

        .conversation-header p {
            margin: 5px 0 0;

            color: #98a2b3;

            font-size: 11px;
        }

        .conversation-item {
            display: block;

            padding: 16px 18px;

            border-bottom: 1px solid #edf0f4;

            color: inherit;

            text-decoration: none;

            transition: .2s;
        }

        .conversation-item:hover {
            background: #f1f5f9;
        }

        .conversation-item.active {
            background: #eff6ff;

            border-left: 3px solid #2563eb;
        }

        .conversation-name {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 5px;

            font-size: 13px;
            font-weight: bold;
        }

        .conversation-type {
            color: #667085;

            font-size: 10px;
        }

        .conversation-preview {
            overflow: hidden;

            margin-top: 7px;

            color: #98a2b3;

            font-size: 11px;

            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .unread-dot {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #ef4444;
        }


        /* CHAT */

        .chat-area {
            display: flex;

            flex-direction: column;

            min-width: 0;
        }

        .chat-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            padding: 20px 24px;

            border-bottom: 1px solid #e5e7eb;
        }

        .customer-info {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .customer-avatar {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #eff6ff;

            color: #2563eb;

            font-size: 18px;
        }

        .customer-name {
            margin: 0;

            font-size: 15px;
            font-weight: bold;
        }

        .customer-email {
            margin-top: 3px;

            color: #98a2b3;

            font-size: 10px;
        }

        .order-info {
            color: #667085;

            font-size: 10px;

            text-align: right;
        }


        /* MESSAGES */

        .chat-messages {
            flex: 1;

            overflow-y: auto;

            padding: 25px;

            background: #f8fafc;
        }

        .message {
            display: flex;

            gap: 10px;

            margin-bottom: 20px;
        }

        .message.admin {
            justify-content: flex-end;
        }

        .message-icon {
            width: 32px;
            height: 32px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #e0e7ff;

            color: #4f46e5;

            font-size: 13px;
        }

        .message.admin .message-icon {
            order: 2;

            background: #dbeafe;

            color: #2563eb;
        }

        .message-body {
            max-width: 70%;
        }

        .message.admin .message-body {
            text-align: right;
        }

        .message-author {
            margin-bottom: 5px;

            color: #667085;

            font-size: 10px;
            font-weight: bold;
        }

        .message-time {
            margin-left: 6px;

            color: #9ca3af;

            font-weight: normal;
        }

        .message-bubble {
            display: inline-block;

            padding: 11px 14px;

            border-radius: 12px;

            background: white;

            color: #374151;

            font-size: 12px;

            line-height: 1.6;

            text-align: left;

            box-shadow:
                0 3px 12px rgba(0,0,0,.04);
        }

        .message.admin .message-bubble {
            background: #2563eb;

            color: white;
        }


        /* REPLY */

        .reply-area {
            padding: 18px 22px;

            border-top: 1px solid #e5e7eb;

            background: white;
        }

        .reply-form {
            display: flex;

            gap: 10px;
        }

        .reply-input {
            flex: 1;

            min-width: 0;

            padding: 12px 14px;

            border: 1px solid #d1d5db;
            border-radius: 9px;

            outline: none;

            font-size: 12px;
        }

        .reply-input:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37,99,235,.08);
        }

        .send-button {
            padding: 0 18px;

            border: 0;
            border-radius: 9px;

            background: #2563eb;

            color: white;

            font-size: 12px;
            font-weight: bold;
        }

        .send-button:hover {
            background: #1d4ed8;
        }


        /* EMPTY */

        .empty-chat {
            flex: 1;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;

            text-align: center;

            color: #667085;
        }

        .empty-chat i {
            display: block;

            margin-bottom: 12px;

            color: #9ca3af;

            font-size: 45px;
        }


        /* ALERT */

        .success-message {
            margin-bottom: 20px;

            padding: 12px 15px;

            border-radius: 9px;

            background: #ecfdf3;

            color: #027a48;

            font-size: 12px;
        }


        /* MOBILE */

        @media (max-width: 991px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;

                padding: 25px;
            }

            .message-panel {
                grid-template-columns: 280px 1fr;
            }

        }


        @media (max-width: 767px) {

            .sidebar {
                position: relative;

                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;

                padding: 20px;
            }

            .message-panel {
                grid-template-columns: 1fr;
            }

            .conversation-list {
                border-right: 0;

                border-bottom: 1px solid #e5e7eb;

                max-height: 300px;

                overflow-y: auto;
            }

            .chat-area {
                min-height: 600px;
            }

        }

    </style>

</head>


<body>


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <a href="/" class="brand">

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

            @if(($newMessages ?? 0) > 0)

                <span class="notification-badge">
                    {{ $newMessages }}
                </span>

            @endif

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


        <div class="page-header">

            <div class="eyebrow">
                <i class="bi bi-chat-dots"></i>
                Customer Support
            </div>

            <h1 class="page-title">
                Customer <span>Messages</span>
            </h1>

            <p class="page-subtitle">
                View customer enquiries and reply directly from the admin panel.
            </p>

        </div>


        @if(session('success'))

            <div class="success-message">

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        <div class="message-panel">


            <!-- CONVERSATIONS -->

            <div class="conversation-list">

                <div class="conversation-header">

                    <h5>
                        Conversations
                    </h5>

                    <p>
                        {{ $conversations->count() }}
                        conversation(s)
                    </p>

                </div>


                @forelse($conversations as $conversation)

                    @php

                        $latest =
                            $conversation->latestMessage;

                        $unread =
                            $conversation->messages
                                ->where('sender_type', 'customer')
                                ->where('is_read', false)
                                ->count();

                    @endphp


                    <a
                        href="{{ url('/admin/customer-messages/' . $conversation->id) }}"
                        class="conversation-item"
                    >

                        <div class="conversation-name">

                            <span>
                                {{ $conversation->user->name ?? 'Customer' }}
                            </span>

                            @if($unread > 0)

                                <span class="unread-dot"></span>

                            @endif

                        </div>


                        <div class="conversation-type">

                            {{ $conversation->inquiry_type }}

                        </div>


                        <div class="conversation-preview">

                            {{ $latest->message ?? 'No messages yet.' }}

                        </div>

                    </a>

                @empty

                    <div class="p-4 text-center text-muted">

                        <i
                            class="bi bi-chat-square-text d-block mb-2"
                            style="font-size:30px;"
                        ></i>

                        No customer messages yet.

                    </div>

                @endforelse

            </div>



            <!-- EMPTY CHAT AREA -->

            <div class="chat-area">

                <div class="empty-chat">

                    <div>

                        <i class="bi bi-chat-dots"></i>

                        <h4>
                            Select a conversation
                        </h4>

                        <p>
                            Choose a customer conversation from the
                            left to view messages and reply.
                        </p>

                    </div>

                </div>

            </div>

        </div>


    </main>

<!-- ADMIN CUSTOMER MESSAGE NOTIFICATION -->

<div
    id="adminSupportNotification"
    class="admin-support-notification"
>

    <div class="admin-support-notification-icon">

        <i class="bi bi-chat-dots-fill"></i>

    </div>


    <div class="admin-support-notification-content">

        <strong>
            New Customer Message
        </strong>

        <p id="adminSupportNotificationText">
            A customer sent you a new message.
        </p>

    </div>


    <button
        type="button"
        onclick="closeAdminSupportNotification()"
        aria-label="Close notification"
    >
        ×
    </button>

</div>
</body>

</html>