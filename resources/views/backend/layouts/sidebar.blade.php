<div data-simplebar class="sidebar-menu-scroll">

    <div id="sidebar-menu">
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{ route('backoffice.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.dashboard') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Event</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.promotions') }}">
                    <i class="fas fa-clipboard"></i>
                    <span>Promotion</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.bankaccounts') }} class="has-arrow waves-effect">
                    <i class="fas fa-wallet"></i>
                    <span>Rekening</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-coins"></i>
                    <span>Transaksi</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    <li><a href="{{ route('backoffice.transactions.deposit') }}">Deposit Pending</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Withdraw Pending</a></li>
                    <li><a href="{{ route('backoffice.transactions.bonus') }}">Bonus Pending</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-coins"></i>
                    <span>Riwayat Transaksi</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    <li><a href="{{ route('backoffice.transactions.deposit') }}">Semua Transaksi</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Deposit</a></li>
                    <li><a href="{{ route('backoffice.transactions.bonus') }}">Withdraw</a></li>
                    <li><a href="{{ route('backoffice.transactions.bonus') }}">Bonus</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-users"></i>
                    <span>Riwayat Transaksi</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    <li><a href="{{ route('backoffice.members') }}">List</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Saldo</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    <li><a href="{{ route('backoffice.members') }}">Website</a></li>
                    <li><a href="{{ route('backoffice.members') }}">Banner</a></li>
                    <li><a href="{{ route('backoffice.members') }}">SEO</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Live Chat</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Sosial Media</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>