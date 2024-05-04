<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse border border-right">
    <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 text-dark-emphasis{{ Request::is('dashboard/pengeluaran*') ? 'active' : '' }}" aria-current="page" href="/dashboard/pengeluaran">
                    <i class="bi bi-journal-bookmark"></i>Pengeluaran</a>
                </li>
            
            </ul>
            <hr class="my-7">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2 text-dark-emphasis"><i class="bi bi-door-closed"></i>Logout</button>
                    </form>
                </li>
            </ul>
    </div>
</nav>
