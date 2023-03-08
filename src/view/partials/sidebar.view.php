<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; position: sticky;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Quản lý thư viện</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link mb-3 <?= preg_match('/\/$/i', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>" aria-current="page">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/tat-ca-sach" class="nav-link mb-3 <?= preg_match('/\/tat-ca-sach/i', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>" aria-current="page">
                <i class="fa-solid fa-book"></i>
                Tất cả sách
            </a>
        </li>

        <li class="nav-item">
            <a href="/sach-da-muon" class="nav-link mb-3 <?= preg_match('/\/sach-da-muon/i', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>" aria-current="page">
                <i class="fa-solid fa-book"></i>
                Sách đã mượn
            </a>
        </li>

    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Admin</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="/dang-xuat">Đăng xuất</a></li>
        </ul>
    </div>
</div>