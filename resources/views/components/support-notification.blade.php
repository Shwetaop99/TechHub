{{-- =========================================================
     GLOBAL SUPPORT NOTIFICATION
     Works for BOTH CUSTOMER and ADMIN
========================================================= --}}

<div
    id="supportNotification"
    class="support-notification"
    role="alert"
>
    <div class="support-notification-icon">
        <i id="supportNotificationIcon" class="bi bi-chat-dots-fill"></i>
    </div>

    <div
        class="support-notification-content"
        onclick="openSupportNotification()"
    >
        <strong id="supportNotificationTitle">
            New Support Message
        </strong>

        <p id="supportNotificationText">
            You have a new support message.
        </p>
    </div>

    <button
        type="button"
        class="support-notification-close"
        onclick="closeSupportNotification()"
        aria-label="Close notification"
    >
        &times;
    </button>
</div>


<style>

/* =========================================================
   SUPPORT NOTIFICATION
========================================================= */

.support-notification {
    position: fixed !important;

    right: 25px !important;
    bottom: 25px !important;

    width: 360px !important;
    max-width: calc(100vw - 30px) !important;

    display: flex !important;
    align-items: flex-start !important;

    gap: 12px !important;

    padding: 15px !important;

    background: #ffffff !important;

    border: 1px solid #dbe3f0 !important;

    border-radius: 14px !important;

    box-shadow:
        0 20px 50px rgba(15, 23, 42, 0.20) !important;

    z-index: 2147483647 !important;

    opacity: 0 !important;
    visibility: hidden !important;

    transform: translateY(25px) !important;

    pointer-events: none !important;

    transition:
        opacity .25s ease,
        transform .25s ease,
        visibility .25s ease !important;
}


.support-notification.show {
    display: flex !important;

    opacity: 1 !important;
    visibility: visible !important;

    transform: translateY(0) !important;

    pointer-events: auto !important;
}


/* =========================================================
   ICON
========================================================= */

.support-notification-icon {

    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 17px;
}


/* =========================================================
   CONTENT
========================================================= */

.support-notification-content {

    flex: 1;

    min-width: 0;

    cursor: pointer;
}


.support-notification-content strong {

    display: block;

    margin-bottom: 4px;

    color: #111827;

    font-size: 13px;

    font-weight: 700;
}


.support-notification-content p {

    margin: 0;

    color: #667085;

    font-size: 11px;

    line-height: 1.5;

    word-break: break-word;
}


/* =========================================================
   CLOSE BUTTON
========================================================= */

.support-notification-close {

    width: 22px;
    height: 22px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0;

    border: none;

    background: transparent;

    color: #98a2b3;

    font-size: 20px;

    line-height: 1;

    cursor: pointer;
}


.support-notification-close:hover {

    color: #111827;
}


/* =========================================================
   ADMIN NOTIFICATION STYLE
========================================================= */

.support-notification.admin-notification {
    border-left: 4px solid #315bea !important;
}

.support-notification.admin-notification
.support-notification-icon {
    background: #eef2ff !important;
    color: #315bea !important;
}
.support-notification-icon {

    background: #eef2ff;

    color: #315bea;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 500px) {

    .support-notification {

        left: 15px;

        right: 15px;

        bottom: 15px;

        width: auto;
    }
}

</style>


<script>

(function () {

    /* =====================================================
       DETECT CURRENT USER TYPE
    ===================================================== */

    const isAdmin =
        @json(
            session('admin_logged_in') ||
            session('normal_admin_logged_in')
        );


    /* =====================================================
       NOTIFICATION ENDPOINT
    ===================================================== */

    const notificationUrl = isAdmin

        ? "{{ url('/admin/customer-messages/check-notifications') }}"

        : "{{ url('/customer-support/check-notifications') }}";


    /* =====================================================
       VARIABLES
    ===================================================== */

    let lastSupportMessageId = null;

    let supportNotificationTimer = null;

    let supportAudioUnlocked = false;


    /* =====================================================
       AUDIO UNLOCK
       
       Browsers don't allow websites to suddenly play
       sound before the user has interacted with the page.
    ===================================================== */

    function unlockSupportAudio() {

        supportAudioUnlocked = true;

        document.removeEventListener(
            'click',
            unlockSupportAudio
        );

        document.removeEventListener(
            'keydown',
            unlockSupportAudio
        );

        document.removeEventListener(
            'touchstart',
            unlockSupportAudio
        );
    }


    document.addEventListener(
        'click',
        unlockSupportAudio
    );

    document.addEventListener(
        'keydown',
        unlockSupportAudio
    );

    document.addEventListener(
        'touchstart',
        unlockSupportAudio
    );


    /* =====================================================
       PLAY NOTIFICATION SOUND
    ===================================================== */

    function playSupportSound() {

        if (!supportAudioUnlocked) {
            return;
        }


        try {

            const AudioContext =
                window.AudioContext ||
                window.webkitAudioContext;


            if (!AudioContext) {
                return;
            }


            const audioContext =
                new AudioContext();


            if (
                audioContext.state ===
                'suspended'
            ) {

                audioContext.resume();
            }


            const oscillator =
                audioContext.createOscillator();


            const gain =
                audioContext.createGain();


            oscillator.type = 'sine';


            /*
             * First tone
             */

            oscillator.frequency.setValueAtTime(
                880,
                audioContext.currentTime
            );


            /*
             * Second tone
             */

            oscillator.frequency.setValueAtTime(
                660,
                audioContext.currentTime + 0.12
            );


            /*
             * Volume starts almost silent
             */

            gain.gain.setValueAtTime(
                0.0001,
                audioContext.currentTime
            );


            /*
             * Fade in
             */

            gain.gain.exponentialRampToValueAtTime(
                0.18,
                audioContext.currentTime + 0.02
            );


            /*
             * Fade out
             */

            gain.gain.exponentialRampToValueAtTime(
                0.0001,
                audioContext.currentTime + 0.30
            );


            oscillator.connect(gain);

            gain.connect(
                audioContext.destination
            );


            oscillator.start();

            oscillator.stop(
                audioContext.currentTime + 0.30
            );


            /*
             * Clean up AudioContext
             */

            setTimeout(function () {

                if (
                    audioContext.state !==
                    'closed'
                ) {

                    audioContext.close();

                }

            }, 500);

        }

        catch (error) {

            console.log(
                'Support notification sound unavailable.',
                error
            );

        }

    }


    /* =====================================================
       SHOW NOTIFICATION
    ===================================================== */

    window.showSupportNotification =
        function (message) {

            const popup =
                document.getElementById(
                    'supportNotification'
                );


            const title =
                document.getElementById(
                    'supportNotificationTitle'
                );


            const text =
                document.getElementById(
                    'supportNotificationText'
                );


            const icon =
                document.getElementById(
                    'supportNotificationIcon'
                );


            if (
                !popup ||
                !title ||
                !text
            ) {

                console.error(
                    'Support notification elements not found.'
                );

                return;
            }


            /*
             * ADMIN
             */

            if (isAdmin) {

                title.textContent =
                    'New Customer Message';


                icon.className =
                    'bi bi-person-lines-fill';


                popup.classList.add(
                    'admin-notification'
                );

            }


            /*
             * CUSTOMER
             */

            else {

                title.textContent =
                    'New Support Reply';


                icon.className =
                    'bi bi-chat-dots-fill';


                popup.classList.remove(
                    'admin-notification'
                );

            }


            /*
             * Message text
             */

            let messageText =
                message.text ||
                'You have a new support message.';


            /*
             * Remove "New message from..." duplication
             * only visually if needed.
             */

            text.textContent =
                messageText;


            /*
             * Store conversation ID
             */

            popup.dataset.conversationId =
                message.conversation_id || '';


            /*
             * Show popup
             */

            popup.classList.add(
                'show'
            );


            /*
             * Play sound
             */

            playSupportSound();


            /*
             * Remove previous timer
             */

            clearTimeout(
                supportNotificationTimer
            );


            /*
             * Automatically hide after 7 seconds
             */

            supportNotificationTimer =
                setTimeout(function () {

                    popup.classList.remove(
                        'show'
                    );

                }, 7000);

        };


    /* =====================================================
       CLOSE NOTIFICATION
    ===================================================== */

    window.closeSupportNotification =
        function () {

            const popup =
                document.getElementById(
                    'supportNotification'
                );


            if (popup) {

                popup.classList.remove(
                    'show'
                );

            }

        };


    /* =====================================================
       OPEN CONVERSATION
    ===================================================== */

    window.openSupportNotification =
        function () {

            const popup =
                document.getElementById(
                    'supportNotification'
                );


            if (!popup) {
                return;
            }


            const conversationId =
                popup.dataset.conversationId;


            if (!conversationId) {
                return;
            }


            /*
             * ADMIN
             */

            if (isAdmin) {

                window.location.href =
                    "{{ url('/admin/customer-messages') }}"
                    + '/'
                    + conversationId;

            }


            /*
             * CUSTOMER
             */

            else {

                /*
                 * Go to customer support page.
                 * The existing contact page will load
                 * the conversation from the database.
                 */

                window.location.href =
                    "{{ url('/customer-support') }}";

            }

        };


    /* =====================================================
       CHECK NOTIFICATIONS
    ===================================================== */

    function checkSupportNotifications() {

        fetch(
            notificationUrl,
            {

                method: 'GET',

                headers: {

                    'Accept':
                        'application/json',

                    'X-Requested-With':
                        'XMLHttpRequest'

                },

                credentials:
                    'same-origin'

            }
        )

        .then(function (response) {

            if (!response.ok) {

                console.log(
                    'Support notification HTTP error:',
                    response.status
                );

                return null;
            }


            return response.json();

        })


        .then(function (data) {

            if (!data) {
                return;
            }


            /*
             * No new message
             */

            if (!data.message) {
                return;
            }


            const messageId =
                Number(
                    data.message.id
                );


            /*
             * Invalid message ID
             */

            if (!messageId) {
                return;
            }


            /*
             * FIRST CHECK
             
             * Don't popup old unread messages
             * when the page is initially loaded.
             */

            const storageKey = isAdmin
    ? 'techhub_admin_last_support_notification'
    : 'techhub_customer_last_support_notification';


let lastSupportMessageId =
    Number(
        localStorage.getItem(storageKey) || 0
    );


/* =====================================================
   NEW MESSAGE
===================================================== */

if (
    messageId > lastSupportMessageId
) {

    lastSupportMessageId =
        messageId;


    localStorage.setItem(
        storageKey,
        messageId
    );


    showSupportNotification(
        data.message
    );
}

            /*
             * NEW MESSAGE
             */

            if (
                messageId !==
                Number(
                    lastSupportMessageId
                )
            ) {

                lastSupportMessageId =
                    messageId;


                showSupportNotification(
                    data.message
                );

            }

        })


        .catch(function (error) {

            console.log(
                'Support notification error:',
                error
            );

        });

    }


    /* =====================================================
       START POLLING
    ===================================================== */

    checkSupportNotifications();


    setInterval(
        checkSupportNotifications,
        5000
    );


})();

</script>