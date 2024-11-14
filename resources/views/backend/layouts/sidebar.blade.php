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
                <a href="{{ route('backoffice.banners') }}">
                    <i class="fas fa-images"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.promotions') }}">
                    <i class="fab fa-slack"></i>
                    <span>Promotion</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-wallet"></i>
                    <span>Bank</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    {{-- <li><a href="{{ route('backoffice.banks') }}">Kode Bank</a></li> --}}
                    <li><a href="{{ route('backoffice.bankaccounts') }}">Akun Bank</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-coins"></i>
                    <span>Transaksi</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    <li><a href="{{ route('backoffice.transactions.deposit') }}">Deposit</a></li>
                    <li><a href="{{ route('backoffice.transactions.withdraw') }}">Withdraw</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('backoffice.members') }}">
                    <i class="fas fa-users"></i>
                    <span>Member</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fab fa-fantasy-flight-games"></i>
                    <span>Struktur Game</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                    {{-- <li><a href="{{ route('backoffice.category') }}">Kategori</a></li> --}}
                    <li><a href="{{ route('backoffice.provider') }}">Provider</a></li>
                    <li><a href="{{ route('backoffice.games') }}">Game</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-baseball-ball"></i>
                    <span>Togel</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('backoffice.apicredentials') }}">
                    <i class="fas fa-dice-six"></i>
                    <span>Pengaturan Api</span>
                </a>
            </li> --}}
            <li>
                <a href="#">
                    <i class="fab fa-google"></i>
                    <span>Seo Website</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backoffice.settings.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>Pengaturan Website</span>
                </a>
            </li>
        </ul>
    </div>
</div>