<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="menu-title">{{ App\Helpers\SettingsHelper::getSetting()->web_name }}</li>
            <li>
                <a href="{{ route('backoffice.dashboard') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.756 22 16.0829 22H18.0438C18.9596 22.0024 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z"
                                fill="#90959F" />
                        </svg>
                    </div>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/backoffice/event" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z" />
                        </svg>
                    </div>
                    <span class="nav-text">Event</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.promotions') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z" />
                        </svg>

                    </div>
                    <span class="nav-text">Promotion</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.bankaccounts') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_113_177)">
                                <path
                                    d="M17 4H6C4.79111 4 4 4.7 4 6V18C4 19.3 4.79111 20 6 20H18C19.2 20 20 19.3 20 18V7.20711C20 7.0745 19.9473 6.94732 19.8536 6.85355L17 4ZM17 11H7V4H17V11Z"
                                    fill="#90959F"></path>
                                <path opacity="0.3"
                                    d="M14.5 4H12.5C12.2239 4 12 4.22386 12 4.5V8.5C12 8.77614 12.2239 9 12.5 9H14.5C14.7761 9 15 8.77614 15 8.5V4.5C15 4.22386 14.7761 4 14.5 4Z"
                                    fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_113_177">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <span class="nav-text">Rekening</span>
                </a>
            </li>
            <li>
                <a href="/backoffice/riwayat-permainan" aria-expanded="false">
                    <div class="menu-icon">
                        <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.226 2.361c-0.8-0.375-1.556-0.729-2.245-1.075-1.765-0.884-3.364-1.313-4.89-1.313-3.072 0-5.197 1.772-6.53 3.105l-6.464 6.471c-3.459 3.463-4.011 6.988-1.79 11.431 0.345 0.69 0.699 1.448 1.074 2.251 2.022 4.325 4.112 8.796 7.533 8.796 0.096 0 0.191-0.003 0.288-0.011 3.53-0.276 4.532-4.822 5.416-8.831 0.14-0.635 0.274-1.244 0.41-1.79 0.238-0.944 0.705-1.53 1.986-2.814l0.176-0.177 0.108-0.108 0.285-0.284c1.284-1.284 1.87-1.751 2.816-1.989 0.541-0.136 1.148-0.27 1.782-0.409 4.007-0.884 8.55-1.886 8.825-5.423 0.278-3.588-4.327-5.745-8.781-7.83zM29.952 10.010c-0.195 2.493-5.775 3.229-9.097 4.062-1.469 0.371-2.363 1.149-3.712 2.498-0.094 0.094-0.189 0.188-0.284 0.283s-0.189 0.191-0.283 0.284c-1.349 1.351-2.125 2.244-2.495 3.715-0.834 3.325-1.568 8.912-4.058 9.107-0.045 0.003-0.090 0.005-0.135 0.005-2.642 0-4.865-6.008-6.826-9.927-1.992-3.985-1.139-6.569 1.417-9.128 0.49-0.491 1.101-1.101 1.848-1.849 0.763-0.764 1.671-1.673 2.747-2.75 0.747-0.748 1.357-1.357 1.848-1.849 1.588-1.589 3.186-2.52 5.122-2.52 1.181 0 2.489 0.345 3.996 1.102 3.983 1.997 10.122 4.265 9.912 6.968zM14.962 10.977h2v-2h-2v2zM14.962 7.977h2v-2h-2v2zM17.962 7.977h2v-2h-2v2zM17.962 10.977h2v-2h-2v2zM10.309 16.982l0.761-0.761c0.375-0.375 0.375-0.983 0-1.358s-0.982-0.375-1.357 0l-0.761 0.761-0.761-0.761c-0.375-0.375-0.982-0.375-1.357 0s-0.375 0.983 0 1.358l0.761 0.761-0.761 0.761c-0.375 0.375-0.375 0.983 0 1.357s0.983 0.375 1.357 0l0.761-0.761 0.783 0.783c0.375 0.375 0.982 0.375 1.357 0s0.375-0.983 0-1.358z">
                            </path>
                        </svg>
                    </div>
                    <span class="nav-text">Data Game</span>
                </a>
            </li>

            <li>
                <a href="/backoffice/riwayat-permainan" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="800px" height="800px" viewBox="0 0 48 48" id="b"
                            xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <style>
                                    .c {
                                        fill: none;
                                        stroke: #000000;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                    }
                                </style>
                            </defs>
                            <path class="c"
                                d="m41.712,30.7619v-13.5239c0-2.1436-1.1436-4.1244-3-5.1962l-11.712-6.7619c-1.8564-1.0718-4.1436-1.0718-6,0l-11.712,6.7619c-1.8564,1.0718-3,3.0526-3,5.1962v13.5239c0,2.1436,1.1436,4.1244,3,5.1962l11.712,6.7619c1.8564,1.0718,4.1436,1.0718,6,0l11.712-6.7619c1.8564-1.0718,3-3.0526,3-5.1962Z" />
                            <line class="c" x1="24" y1="24" x2="24" y2="11.6168" />
                            <line class="c" x1="24" y1="24" x2="13.2759" y2="30.1916" />
                            <line class="c" x1="24" y1="24" x2="34.7241" y2="30.1916" />
                        </svg>
                    </div>
                    <span class="nav-text">Riwayat Permainan</span>
                </a>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.2428 4.73756C15.2428 6.95855 17.0459 8.75902 19.2702 8.75902C19.5151 8.75782 19.7594 8.73431 20 8.68878V16.6615C20 20.0156 18.0215 22 14.6624 22H7.34636C3.97851 22 2 20.0156 2 16.6615V9.3561C2 6.00195 3.97851 4 7.34636 4H15.3131C15.2659 4.243 15.2423 4.49001 15.2428 4.73756ZM13.15 14.8966L16.0078 11.2088V11.1912C16.2525 10.8625 16.1901 10.3989 15.8671 10.1463C15.7108 10.0257 15.5122 9.97345 15.3167 10.0016C15.1211 10.0297 14.9453 10.1358 14.8295 10.2956L12.4201 13.3951L9.6766 11.2351C9.51997 11.1131 9.32071 11.0592 9.12381 11.0856C8.92691 11.1121 8.74898 11.2166 8.63019 11.3756L5.67562 15.1863C5.57177 15.3158 5.51586 15.4771 5.51734 15.6429C5.5002 15.9781 5.71187 16.2826 6.03238 16.3838C6.35288 16.485 6.70138 16.3573 6.88031 16.0732L9.35125 12.8771L12.0948 15.0283C12.2508 15.1541 12.4514 15.2111 12.6504 15.1863C12.8494 15.1615 13.0297 15.0569 13.15 14.8966Z"
                                    fill="white"></path>
                                <circle opacity="0.4" cx="19.5" cy="4.5" r="2.5" fill="white"></circle>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse" style="">
                    <li><a href="profile/overview.html">Deposit</a></li>
                    <li><a href="profile/projects.html">Withdraw</a></li>
                    <li><a href="profile/projects-details.html">Bonus</a></li>
                </ul>
            </li>

            <li>
                <a href="/backoffice/riwayat-transaksi" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.2428 4.73756C15.2428 6.95855 17.0459 8.75902 19.2702 8.75902C19.5151 8.75782 19.7594 8.73431 20 8.68878V16.6615C20 20.0156 18.0215 22 14.6624 22H7.34636C3.97851 22 2 20.0156 2 16.6615V9.3561C2 6.00195 3.97851 4 7.34636 4H15.3131C15.2659 4.243 15.2423 4.49001 15.2428 4.73756ZM13.15 14.8966L16.0078 11.2088V11.1912C16.2525 10.8625 16.1901 10.3989 15.8671 10.1463C15.7108 10.0257 15.5122 9.97345 15.3167 10.0016C15.1211 10.0297 14.9453 10.1358 14.8295 10.2956L12.4201 13.3951L9.6766 11.2351C9.51997 11.1131 9.32071 11.0592 9.12381 11.0856C8.92691 11.1121 8.74898 11.2166 8.63019 11.3756L5.67562 15.1863C5.57177 15.3158 5.51586 15.4771 5.51734 15.6429C5.5002 15.9781 5.71187 16.2826 6.03238 16.3838C6.35288 16.485 6.70138 16.3573 6.88031 16.0732L9.35125 12.8771L12.0948 15.0283C12.2508 15.1541 12.4514 15.2111 12.6504 15.1863C12.8494 15.1615 13.0297 15.0569 13.15 14.8966Z"
                                    fill="white"></path>
                                <circle opacity="0.4" cx="19.5" cy="4.5" r="2.5" fill="white">
                                </circle>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-text">Riwayat Transaksi</span>
                </a>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);">
                    <div class="menu-icon">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>

                    </div>
                    <span class="nav-text">Pengaturan</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse" style="">
                    <li><a href="profile/overview.html">Banner</a></li>
                    <li><a href="profile/projects.html">SEO</a></li>
                    <li><a href="profile/projects-details.html">Website</a></li>
                    <li><a href="profile/projects-details.html">Sosial Media</a></li>
                    <li><a href="profile/projects-details.html">Live Chat</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
